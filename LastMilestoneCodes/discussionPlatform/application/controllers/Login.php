<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
	public function index()
	{
		$this->load->model('RetrieveAllQuestions_model');
		$allTheQuestions["questions"] = $this->RetrieveAllQuestions_model->retrieveQ(); 
		$data['error']= "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
			//cookies code starts here
			//$this->load->view('login', $data); //if user has not login ask user to login
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array(
						'username' => $username,
						'logged_in' => true 	//create session variable
					);
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('mainScreen',$allTheQuestions); //if user already logined show main page
				}
			}else{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		    //cookies code ends here
		}else{
			$this->load->view('mainScreen',$allTheQuestions); //if user already logined show main page
		}
		$this->load->view('template/footer');
	}
	public function check_login()
	{
		$this->load->model('user_model');		//load user model
		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect password!! </div> ";
		$dataUserName['error']= "<div class=\"alert alert-danger\" role=\"alert\"> This username is not registered! </div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$username = $this->input->post('username'); //getting username from login form
		$password = $this->input->post('password'); //getting password from login form
		//cookies code starts here
        $remember = $this->input->post('remember'); //getting remember checkbox from login form
		//cookies code ends here
		if(!$this->session->userdata('logged_in')){	//Check if user already login
			if ( $this->user_model->login($username, $password) )//check username and password
			{
				$user_data = array(
					'username' => $username,
					'logged_in' => true 	//create session variable
				);
				//$this->session->set_userdata($user_data); //set user status to login in session
				//redirect('login'); // direct user home page
			//}elseif(!$this->user_model->userExist($username)){
				//$this->load->view('login',$dataUserName);

				//cookies code starts here
                if($remember) { // if remember me is activated create cookie
					set_cookie("username", $username, '300'); //set cookie username
					set_cookie("password", $password, '300'); //set cookie password
					set_cookie("remember", $remember, '300'); //set cookie remember
				}	
				$this->session->set_userdata($user_data); //set user status to login in session
				redirect('login'); // direct user home page
				//cookies code ends here

			}else
			{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			{
				redirect('login'); //if user already logined direct user to home page
			}
		$this->load->view('template/footer');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in'); //delete login status
		//redirect('login'); // redirect user back to login
		$data['error']= "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
			$this->load->view('login',$data);
			$this->load->view('template/footer');
	}
}
?>
