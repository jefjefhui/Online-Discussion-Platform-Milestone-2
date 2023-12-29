<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AskQuestionsNow extends CI_Controller {

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
        $this->load->view('AskQuestionsPage');
		$this->load->view('template/footer');

		}
	}

	public function createQuestions(){
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('AddQuestionToDB_model');
		$title = $this->input->post('title');
		$academicLevel = $this->input->post("level");
		$category = $this->input->post("category");
		$question = $this->input->post("questionText");
		$currentUser =$_SESSION['username'];


		//create an array for insertion 
		$questionInfo["question"]=$question;
		$questionInfo["category"]=$category;
		$questionInfo["askedUserName"]=$currentUser;
		$questionInfo["title"]=$title;
		$questionInfo["academicLevel"]=$academicLevel;


		//Use the function in the model to insert data into the question table in DB
		$this->AddQuestionToDB_model->addQuestion($questionInfo);
		$this->load->view('template/header');
        $this->load->view('QuestionAdded');
		$this->load->view('template/footer');
		


		//For every account in the user table, create one row of data, questionsID is the question just created above 



		//For every account in the user table, create one row of data, questionsID is the question just created above




	}
}