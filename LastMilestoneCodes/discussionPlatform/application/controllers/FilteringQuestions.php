<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FilteringQuestions extends CI_Controller {


	public function index()
	{
        $this->load->model('Filtering_Questions_Model');
        $this->load->helper('form');
		$this->load->helper('url');
		$data["error"]="";
        $yourQuestions["questions"]=$this->Filtering_Questions_Model->retrieveQ();
        $yourQuestions["selected"]=$this->input->post("category");
		$filterOutcome = $this->Filtering_Questions_Model->filterApplied($this->input->post("category"));
		$yourQuestions["selected"]=$filterOutcome;
		$yourQuestions["WhatISelected"]=$this->input->post("category");
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
			$this->load->view('template/header');
			$this->load->view('login', $data); //if user has not login ask user to login
			$this->load->view('template/footer');
		}else{
			$this->load->view('template/header');
        $this->load->view('Filtering_home_Page',$yourQuestions);
		$this->load->view('template/footer');

		}
		
		
	}
}
?>