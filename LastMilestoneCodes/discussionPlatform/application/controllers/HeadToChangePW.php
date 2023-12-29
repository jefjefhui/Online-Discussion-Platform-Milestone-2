<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class headToChangePW extends CI_Controller {


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
			$this->load->view('profileChangePW',$data); //if user already logined show main page
		}
		$this->load->view('template/footer');
		
	}
	public function changeUserPW(){
		$this->load->model('ChangePW_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$data1["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your orginal password doesn't match system's record.Plese enter the right password </div> ";
		$data2["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your password needs to have at least 5 characters. </div> ";
		$data3["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your password needs to have at least one uppercase character. </div> ";
		$data4["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your password needs to have at least one lowercase character. </div> ";
		$data5["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your password needs to have at least one special character. </div> ";
		$data6["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your re-enter password doesn't match your previous entry, please check it again. </div> ";
		$data7["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your original password entry cannot be empty. </div> ";
		$data8["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your new password 1st entry cannot be empty. </div> ";
		$data9["error"]="<div class=\"alert alert-danger\" role=\"alert\"> Your new password 2nd entry cannot be empty. </div> ";
		$data10["error"]="<div class=\"alert alert-danger\" role=\"alert\"> You must fill in all the entires!! </div> ";
		$Testing["error"]="<div class=\"alert alert-danger\" role=\"alert\"> password is changed successfully</div> ";
		$data11["error"]="<div class=\"alert alert-danger\" role=\"alert\"> You must have at least one number for your password </div> ";
		$originalPW = $this->input->post('originalPW');
		$firstEntry = $this->input->post('firstTry');
		$secondEntry = $this->input->post('secondTry');
		$currentUserName = $this->session->userdata('username');

		$passwordFromDB = $this->ChangePW_model->getPassword($currentUserName);

		$currentEmail =$this->ChangePW_model->getEmail($currentUserName);


		$checkOriginalPW = 0;
		$newPWLen=0;
		$newPWUpper=0;
		$newPWLower=0;
		$newPWSpecial=0;
		$newPWNumber=0;
		$checkOriginalPWEmpty = 0;
		$checkfirstAttemptEmpty = 0;
		$checkSecondAttemptEmpty = 0;
		$checkFirstSecondEqual=0;
        //Check all of the above conditions, if all of these condictions meet, change the password. Afterwards, send a email as well. If condistons not meet, give corresponding error to user.


		//check if user's original password input same as what stores in the system 
		if($originalPW==$passwordFromDB){
			$checkOriginalPW=1;
		}
		//else{
		//$this->load->view('template/header');
        //$this->load->view('profileChangePW',$data1);
		//$this->load->view('template/footer');
		//}
		
		//Check if user's first input of new password meet the length requirement
		$pWLen = strlen($firstEntry);
		if($pWLen>=5){
			$newPWLen =1;
		}
		//else{
		//	$this->load->view('template/header');
		//	$this->load->view('profileChangePW',$data2);
		//	$this->load->view('template/footer');
		//}

		//Check if user's first input of new password meet the uppercase requirement 
		if(preg_match('/[A-Z]/', $firstEntry)){
			$newPWUpper=1;
		}
		//else{
			//$this->load->view('template/header');
		//	$this->load->view('profileChangePW',$data3);
			//$this->load->view('template/footer');
		//}

		//Check if user's first input of new password meet the lowercase requirement 
		if(preg_match('/[a-z]/', $firstEntry)){
			$newPWLower=1;
		}
		//else{$this->load->view('template/header');
		//	$this->load->view('profileChangePW',$data4);
		//	$this->load->view('template/footer');
		//}

		//Check if user's first input meet the special characters requirement 
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstEntry))
			{
			 $newPWSpecial=1;
			}
			//else{
			//	$this->load->view('template/header');
			//	$this->load->view('profileChangePW',$data5);
			//	$this->load->view('template/footer');
			//}

		//Check if the user's first input meet the number characters requirement 
		if (preg_match('~[0-9]+~', $firstEntry)) {
			$newPWNumber=1;
		}





		//check if the first entry and the second entry are both the same 
        if ($firstEntry==$secondEntry){
			$checkFirstSecondEqual=1;

		}
		//else{
		//	$this->load->view('template/header');
		//	$this->load->view('profileChangePW',$data6);
		//	$this->load->view('template/footer');
		//}

		//check is orginal password empty
		if(empty($originalPW)==false){
			$checkOriginalPWEmpty=1;
		 

		}
		//else{
				//give error message here 
			//	$this->load->view('template/header');
			//	$this->load->view('profileChangePW',$data7);
			//	$this->load->view('template/footer');

		//}


		//check is the first new pw entry is empty or not 
		if(empty($firstEntry)==false){
			$checkfirstAttemptEmpty=1;
		}
		//else{
			//give error message here 
		//	$this->load->view('template/header');
		//	$this->load->view('profileChangePW',$data8);
		//	$this->load->view('template/footer');
		//}





		//check the second new pw entry is empty or not 
		if(empty($secondEntry)==false){
			$checkSecondAttemptEmpty=1;
		}
		//else{
			//give error message here 
		//	$this->load->view('template/header');
		//	$this->load->view('profileChangePW',$data9);
		//	$this->load->view('template/footer');

		//}

		







		if($checkOriginalPWEmpty==0 or $checkfirstAttemptEmpty==0 or $checkSecondAttemptEmpty==0){
		   //give error message here 
			$this->load->view('template/header');
			$this->load->view('profileChangePW',$data10);
			$this->load->view('template/footer');

		}elseif($checkOriginalPW==0){
			//give error message here 
			$this->load->view('template/header');
			$this->load->view('profileChangePW',$data1);
			$this->load->view('template/footer');
		}elseif($newPWLen==0){
			//give error message here 
			$this->load->view('template/header');
			$this->load->view('profileChangePW',$data2);
			$this->load->view('template/footer');
		}elseif($newPWUpper==0){
				//give error message here 
				$this->load->view('template/header');
				$this->load->view('profileChangePW',$data3);
				$this->load->view('template/footer');
		}elseif($newPWLower==0){
			//give error message here 
			$this->load->view('template/header');
			$this->load->view('profileChangePW',$data4);
			$this->load->view('template/footer');
		}elseif($newPWSpecial==0){
			//give error message here 
			$this->load->view('template/header');
			$this->load->view('profileChangePW',$data5);
			$this->load->view('template/footer');
		}elseif($newPWNumber==0){
			
			//give error message here for no numerical characters 
			$this->load->view('template/header');
			$this->load->view('profileChangePW',$data11);
			$this->load->view('template/footer');
		}elseif($checkFirstSecondEqual==0){
             //give error message here 
			$this->load->view('template/header');
			$this->load->view('profileChangePW',$data6);
			$this->load->view('template/footer');
		}else{
			//This is the place to implement all the actions if it satisfy all the requirements
			//Firslty, change the password in the DB
			//Second, send a email to notify the user the password has changed. 


				//Test Code 
			    //$this->load->view('template/header');
				//$this->load->view('profileChangePW',$Testing);
				//$this->load->view('template/footer');
				$this->ChangePW_model->updatePWChange($firstEntry,$currentUserName);
				//$this->load->view('template/header');
				//$this->load->view('profileChangePW',$Testing);
				//$this->load->view('template/footer');


				//build a page to show password has changed suffessfully, and have a button lead users back to the home page of profile 
				$this->load->view('template/header');
				$this->load->view('ChangePWSuccess');
				$this->load->view('template/footer');



				//send an email to the user and tell them their passwrd just changed
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
				$this->email->from($currentEmail);
				$this->email->to($currentEmail);
				//$this->email->cc($currentEmail);
				$this->email->subject("Your AskItNow's password just changed!!");



				$emailMessage ="Dear user,your AskItNow's password just changed. If that is not you, please reset your password from forgot password at the login page.";

				$this->email->message($emailMessage);

				$this->email->send();





		}

		

		
		

	}
}
?>