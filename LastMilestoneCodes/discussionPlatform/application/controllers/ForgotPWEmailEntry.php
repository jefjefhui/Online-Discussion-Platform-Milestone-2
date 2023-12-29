<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forgotPWEmailEntry extends CI_Controller {


	public function index()
	{
        
        $this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
        $this->load->view('ForgotPWEnterEmail');
        $this->load->view('template/footer');
		
			
	}
    public function userVeriInput(){
        $this->load->helper('form');
		$this->load->helper('url');
        $data['error']= "";
        $userInputVeri = $this->input->post('verificationCode');
        $theVeriCode =$_SESSION['veriCode'];
        if($userInputVeri==$theVeriCode){
            $this->load->view('template/header');
            $this->load->view("ForgotPWChangePW",$data);
            $this->load->view('template/footer');
        }
        else{
            //this block is to handle when the user entry doesn't match the verification code. In this block, give them a notice and make a link to head back to login, and tell them to click on forgot password to setup everything again if they want
            $this->load->view('template/header');
            $this->load->view("ForgotPWFailed");
            $this->load->view('template/footer');
        
        }
        

    }

    public function validatePW(){
        $this->load->model('ChangePWForgotPW_model');
        $this->load->helper('form');
		$this->load->helper('url');	
        //Validate the new password

        //check length 
        //check uppercase
        //check lowercase
        //check number 
        //check special character 
        //check first second entry equal or not 
        //give corresponding error 
        //if everything is satisfied, change the password from the DB and give a confirmation page, the confirmation page needs to include back to login page button
        $checkLength=0;
        $checkUpper=0;
        $checkLower=0;
        $checkNumber=0; 
        $checkSpecial=0; 
        $checkFirstSecond=0; 

        $firstInput = $this->input->post('firstInputPW');
        $secondInput = $this->input->post('secondInputPW');
        $theVeriEmailAd =$_SESSION['veriEmailAd'];



        $data1['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least 5 characters. </div> ";
        $data2['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one uppercase character. </div> ";
        $data3['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one lowercase character. </div> ";
        $data4['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one numerical character. </div> ";
        $data5['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one special character. </div> ";
        $data6['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Your re-enter password doesn't match your previous entry. </div> ";



        $pWLen = strlen($firstInput);
		if($pWLen>=5){
			$checkLength =1;
		}

        if(preg_match('/[A-Z]/', $firstInput)){
			$checkUpper=1;
		}

        if(preg_match('/[a-z]/', $firstInput)){
			$checkLower=1;
		}


        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstInput))
			{
			 $checkSpecial=1;
			}


            if (preg_match('~[0-9]+~', $firstInput)) {
                $checkNumber=1;
            }


            if ($firstInput==$secondInput){
                $checkFirstSecond=1;
    
            }
        
        //take corresponding action 
        if($checkLength==0){
            //give error message here 
             $this->load->view('template/header');
             $this->load->view('ForgotPWChangePW',$data1);
             $this->load->view('template/footer');
        }elseif($checkUpper==0){
            $this->load->view('template/header');
             $this->load->view('ForgotPWChangePW',$data2);
             $this->load->view('template/footer');
        }elseif($checkLower==0){
            $this->load->view('template/header');
             $this->load->view('ForgotPWChangePW',$data3);
             $this->load->view('template/footer');
        }elseif($checkNumber==0){
            $this->load->view('template/header');
             $this->load->view('ForgotPWChangePW',$data4);
             $this->load->view('template/footer');

        }elseif($checkSpecial==0){
            $this->load->view('template/header');
             $this->load->view('ForgotPWChangePW',$data5);
             $this->load->view('template/footer');
        }elseif($checkFirstSecond==0){
            $this->load->view('template/header');
             $this->load->view('ForgotPWChangePW',$data6);
             $this->load->view('template/footer');
        }else{
            //this block execute the password change
            $this->ChangePWForgotPW_model->updatePWChange($firstInput, $theVeriEmailAd); 
            $this->load->view('template/header');
            $this->load->view('ForgotPWChangeSuccess');
            $this->load->view('template/footer');



        }

    }


    public function processEmail(){
        $this->load->helper('form');
		$this->load->helper('url');
        $userInputEmail = $this->input->post('Email'); //getting user input email from the form
        //view header and footer and load the model in later stage  

        	//send an email to the user which contains the verification code
				$config = Array(
					'protocol'=>'smtp',
					'smtp_host'=>'mailhub.eait.uq.edu.au',
					'smtp_port'=>25,
					'mailtype'=>'html',
					'charset'=>'iso-8859-1',
					'wordwrap'=>TRUE,
					'mailtype'=>'html',
					'starttls'=>true,
					'newline'=>"\r\n"

				);

				$this->email->initialize($config);
				$this->email->from($userInputEmail);
				$this->email->to($userInputEmail);
				//$this->email->cc($currentEmail);
				$this->email->subject("Verification from AskItNow");

                $RandomNumber = rand(0,10000);



				$emailMessage ="Your verification code is:"."  ".$RandomNumber."   "."Thank you for using AskItNow.";

				$this->email->message($emailMessage);

				$this->email->send();

                //$_SESSION['veriCode']=$RandomNumber;
                $this->session->set_userdata('veriCode',$RandomNumber);
                $this->session->set_userdata('veriEmailAd',$userInputEmail);

                $this->load->view('template/header');
                $this->load->view('ForgotPWVeriInput');
                $this->load->view('template/footer');
    }
}
?>