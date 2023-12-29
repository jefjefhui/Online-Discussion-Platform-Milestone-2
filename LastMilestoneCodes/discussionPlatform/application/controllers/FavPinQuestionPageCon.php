<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FavPinQuestionPageCon extends CI_Controller {


public function index()
{
    
    $this->load->helper('form');
    $this->load->helper('url');
    $data["error"]="";
    //$this->load->model('RecommendationFun_Model');
    
    if (!$this->session->userdata('logged_in'))//check if user already login
    {
        $this->load->view('template/header');
        $this->load->view('login', $data); //if user has not login ask user to login
        $this->load->view('template/footer');
    }else{
        $this->load->model('GetAllPinnedQuestion_Model');
        $pinnedInfo = $this->GetAllPinnedQuestion_Model->getPinned($_SESSION['username']);
        $pinnedInfoArray["details"]=$pinnedInfo;
        $this->load->view('template/header');
        $this->load->view('FavouritePinQuestionPage',$pinnedInfoArray);
        $this->load->view('template/footer');


    }
    
    
}
}
?>