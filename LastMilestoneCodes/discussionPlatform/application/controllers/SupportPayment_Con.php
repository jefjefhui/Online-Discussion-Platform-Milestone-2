<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupportPayment_Con extends CI_Controller {


	public function index()
	{
        
        $this->load->helper('form');
		$this->load->helper('url');
		$data["error"]="";
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
			$this->load->view('template/header');
			$this->load->view('login', $data); //if user has not login ask user to login
			$this->load->view('template/footer');
		}else{
			$this->load->view('template/header');
        $this->load->view('SupportPayment_View');
		$this->load->view('template/footer');

		}
		
		
	}
}
?>