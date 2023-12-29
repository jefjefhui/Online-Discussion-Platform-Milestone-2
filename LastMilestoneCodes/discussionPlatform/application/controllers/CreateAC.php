<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateAC extends CI_Controller {
	
	public function index()
	{

		$data['error']= "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('captcha');

         //codes for captcha configurations
		 $vals = array(
			//'word'          => 'Random word',
			'img_path'      => '/var/www/htdocs/discussionPlatform/assets/captchaimagetwo/',
			'img_url'       => 'https://infs3202-9451aeed.uqcloud.net/discussionPlatform/assets/captchaimagetwo',
			'font_path'     => './path/to/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	
			// White background and border, black text and red grid
			'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
			)
	);
	       $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data['captcha_image']=$image;



		$this->load->view('template/header');
		$this->load->view('createAccount',$data);
		$this->load->view('template/footer');
	}

	public function genAC(){

        //captcha in genAc 
		$this->load->helper('captcha');
		 //codes for captcha configurations
		 $vals = array(
			//'word'          => 'Random word',
			'img_path'      => '/var/www/htdocs/discussionPlatform/assets/captchaimagetwo/',
			'img_url'       => 'https://infs3202-9451aeed.uqcloud.net/discussionPlatform/assets/captchaimagetwo',
			'font_path'     => './path/to/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	
			// White background and border, black text and red grid
			'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
			)
	);








		
		$this->load->model('CreateAC_model');
		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Both username and emails address are used by other user, pick another one!! </div> ";
		//$data3['error']="";
		$data2['error']="<div class=\"alert alert-danger\" role=\"alert\"> Email address is already registered, pick another one!! </div> ";
		$data3['error']="<div class=\"alert alert-danger\" role=\"alert\">  Username is already registered, pick another one!! </div> ";
		$data4['error']="<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least 5 characters, includes lowercase, uppercase and special characters.</div> ";
		$data5['error']="<div class=\"alert alert-danger\" role=\"alert\"> Your password is too short, it must have at least 5 characters.</div> ";
		$data6['error']="<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one uppercase character</div> ";
		$data7['error']="<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one lowercase character</div> ";
		$data8['error']="<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one special character</div> ";
		$data9['error']="<div class=\"alert alert-danger\" role=\"alert\"> Your password need to have at least one number</div> ";
		$data777['error']="<div class=\"alert alert-danger\" role=\"alert\"> Your CAPTCHA input is incorrect</div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$username = $this->input->post('username'); //obtain the username from the createAccount form 
		$password = $this->input->post('password');//obtain the password from the createAccount form 
		$fName = $this->input->post('firstname');//obtain the first name from the createAccount form 
		$lName = $this->input->post('lastname');//obtain the last name from the createrAccount form 
		$email = $this->input->post('Email'); //obtain the last name from the createAccount form 
		$UsernamevalidationResult = $this->CreateAC_model->UsernameValidate($username);
        $EmailvalidationResult = $this->CreateAC_model->EmailValidate($email);
		$passwordValidation;

        	// The check password code will start in the next line
			//function checkPassword($passwordPara){
				$lenghCheck = strlen($password);
				$checkUpper=0;
				$checkLower=0;
				$checkLen=0;
				$checkSpecialC=0;
				$checkNumbers=0;
				if($lenghCheck>=5){
				   $checkLen=1;
				}
				if(preg_match('/[A-Z]/', $password)){
					$checkUpper=1;
				   }
				if (preg_match('/[a-z]/', $password)){
				   $checkLower=1;
				}
				if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password))
					{
					 $checkSpecialC=1;
					}
				if (preg_match('~[0-9]+~', $password)) {
						$checkNumbers=1;
					}
				if($checkLen==1 and $checkUpper==1 and $checkLower==1 and $checkSpecialC==1){
					//return true;
					$passwordValidation=1; 
				}else{
					$passwordValidation=0; 
				}
		
			//}
        
		//checkPassword($password);
		
		
		if ($UsernamevalidationResult==false and $EmailvalidationResult==false){
           //captcha code 
		   $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data['captcha_image']=$image;


		   $this->load->view('template/header');
           $this->load->view('createAccount',$data);
		   $this->load->view('template/footer');
		}
		elseif($UsernamevalidationResult==true and $EmailvalidationResult==false){
            //captcha code 
			$cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data2['captcha_image']=$image;


			
			$this->load->view('template/header');
			$this->load->view('createAccount',$data2);
			$this->load->view('template/footer');
		}
		elseif($UsernamevalidationResult==false and $EmailvalidationResult==true){

           //captcha code 
		   $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data3['captcha_image']=$image;

			
			$this->load->view('template/header');
			$this->load->view('createAccount',$data3);
			$this->load->view('template/footer');
		}
		//elseif($passwordValidation==0)
		//{
            //$this->load->view('template/header');
		//	$this->load->view('createAccount',$data4);
		//	$this->load->view('template/footer');
		//}
		elseif($checkLen==0){
           //captcha code 
		   $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data5['captcha_image']=$image;

			$this->load->view('template/header');
			$this->load->view('createAccount',$data5);
			$this->load->view('template/footer');

		}elseif($checkUpper==0){
           //captcha code 
		   $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data6['captcha_image']=$image;



			$this->load->view('template/header');
			$this->load->view('createAccount',$data6);
			$this->load->view('template/footer');

		}
		elseif($checkLower==0){
           //captcha code 
		   $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data7['captcha_image']=$image;



			$this->load->view('template/header');
			$this->load->view('createAccount',$data7);
			$this->load->view('template/footer');

		}elseif($checkSpecialC==0){
           //captcha code 
		   $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data8['captcha_image']=$image;



			$this->load->view('template/header');
			$this->load->view('createAccount',$data8);
			$this->load->view('template/footer');
		}elseif($checkNumbers==0){
           //captcha code 
		   $cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data9['captcha_image']=$image;



			$this->load->view('template/header');
			$this->load->view('createAccount',$data9);
			$this->load->view('template/footer');

		}else{
			$userCaptchaInput = $this->input->post('captcha');
			$actualCaptchaWord =$_SESSION["captchaTextInfo"];
			if($userCaptchaInput==$actualCaptchaWord){
			$qdata["username"]=$username;
			$qdata["password"]=$password;
			$qdata["firstname"]=$fName;
			$qdata["lastname"]=$lName;
			$qdata["email"]=$email;
			$this->CreateAC_model->InsertDB($qdata);
			$this->load->view('template/header');
			$this->load->view('createSuccess');
			$this->load->view('template/footer');

			}else{
                //captcha code 
				$cap =create_captcha($vals);
		   $image = $cap['image'];
		   $captchaword = $cap['word'];
		   $this->session->set_userdata('captchaTextInfo',$captchaword);
		   $data777['captcha_image']=$image;


				$this->load->view('template/header');
				$this->load->view('createAccount',$data777);
				$this->load->view('template/footer');


			}



		}


	}
	
}
?>