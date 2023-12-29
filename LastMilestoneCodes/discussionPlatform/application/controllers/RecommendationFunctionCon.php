<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecommendationFunctionCon extends CI_Controller {


	public function index()
	{
        
        $this->load->helper('form');
		$this->load->helper('url');
		$data["error"]="";
		$this->load->model('RecommendationFun_Model');
		
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
			$this->load->view('template/header');
			$this->load->view('login', $data); //if user has not login ask user to login
			$this->load->view('template/footer');
		}else{
		$isPreferenceSet = $this->RecommendationFun_Model->checkIfPreferenceExist($_SESSION['username']);
		
		if($isPreferenceSet!=0){
		$userPreference = $this->RecommendationFun_Model->pickedPreference($_SESSION['username']);
		$returnTargetArray =$this->RecommendationFun_Model->getTheResult($userPreference);
		$dataData["resultOutcome"]=$returnTargetArray;
		$this->load->view('template/header');
        $this->load->view('recommendationFunction',$dataData);
		$this->load->view('template/footer');
		}
		else{
			$this->load->view('template/header');
			$this->load->view('PreferenceNotSet');
			$this->load->view('template/footer');

		}

		}
		
		
	}
}
?>