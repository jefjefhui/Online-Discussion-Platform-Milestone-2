<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GoToPreferencePage extends CI_Controller {


	public function index()
	{
        $data["error"]="";
        $this->load->helper('form');
		$this->load->helper('url');
        $this->load->view('template/header');

        if (!$this->session->userdata('logged_in'))//check if user already login
		{
			$this->load->view('login', $data); //if user has not login ask user to login
		}else{
			$this->load->view('PreferencePage'); //if user already logined show main page
		}
		$this->load->view('template/footer');

		
       
	}


    public function handlePreferenceSubmit(){
        $this->load->helper('form');
		$this->load->helper('url');
        $this->load->model("SetPreferenceData_Model");

       
         
        // $data2['preference']=$chosenPreference;

        //$checkingPonint = ' ';

       // if(array_key_exists('preference', $_GET['preference'])){
          //  $checkingPonint='True';

        //}else{

           // $checkingPonint='false';
        //}

        if (isset($_GET['preference'])) {
            // checkbox has been checked
             $chosenPreference =$_GET['preference'];

             $this->SetPreferenceData_Model->executePreference($_SESSION['username'],$chosenPreference);

             //Add header, submission success page(Includes message, and link back home/recommendation) and footer)
         $this->load->view('template/header');
 
         $this->load->view('ChangePreferenceSuccess');
 
 
         $this->load->view('template/footer');
            
            


        }else{

            $this->load->view('template/header');

            $this->load->view('EmptyPreferenceNotAllow');


            $this->load->view('template/footer');




        }










        //if(empty($chosenPreference)){
        


      //  }else{
            

           



       // }
        



        








       //  $data["error"]="";
        //$this->load->helper('form');
		//$this->load->helper('url');
       // $this->load->view('template/header');

       // if (!$this->session->userdata('logged_in'))//check if user already login
	//	{
		//	$this->load->view('login', $data); //if user has not login ask user to login
	//	}else{
		//	$this->load->view('PreferencePage',$data2); //if user already logined show main page
		//}
	//	$this->load->view('template/footer');






    }
}