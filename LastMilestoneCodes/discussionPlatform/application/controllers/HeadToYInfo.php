<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class headToYInfo extends CI_Controller {


	public function index()
	{
        $this->load->model('RetrieveInfoForProfile_model'); //load the model to retrive information from the darabase 
        $this->load->helper('form');
		$this->load->helper('url');
		$data["error"]="";
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
			$this->load->view('template/header');
			$this->load->view('login', $data); //if user has not login ask user to login
			$this->load->view('template/footer');
		}else{
			$currentUsername = $this->session->userdata('username');
			$currentFirstName = $this->RetrieveInfoForProfile_model->getfirstname($currentUsername);
			$currentLastName = $this->RetrieveInfoForProfile_model->getlastname($currentUsername);
			$currentEmail = $this->RetrieveInfoForProfile_model->getemail($currentUsername);
			$yourInfo['firstName']=$currentFirstName;
			$yourInfo['lastname']=$currentLastName;
			$yourInfo['email']=$currentEmail;
			$yourInfo['username']=$currentUsername;
			$this->load->view('template/header');
			$this->load->view('profileYourInfo',$yourInfo);
			$this->load->view('template/footer');

		}
		
		
		
		
		
		
		
		
		
        
		
		
	}
}
?>