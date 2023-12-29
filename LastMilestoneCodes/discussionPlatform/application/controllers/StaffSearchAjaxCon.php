<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffSearchAjaxCon extends CI_Controller {


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
		$this->load->view('StaffSearchAjaxView');
		$this->load->view('template/footer');
		}
	}
	public function fetch()
	{

		
		$output = '';
		$query = '';
		$this->load->model('StaffSearch_Model');
		if($this->input->post('query'))
		{
		 $query = $this->input->post('query');
		}
		$data = $this->StaffSearch_Model->fetch_data($query);
		$output .= '
		<div class="table-responsive">
		   <table class="table table-bordered table-striped">
			<tr>
			 <th>Last Name</th>
			 <th>First Name</th>
			 <th>Email</th>
			
			
			</tr>
		';
		if($data->num_rows() > 0)
		{
		 foreach($data->result() as $row)
		 {
		  $output .= '
			<tr>
			 <td>'.$row->LastName.'</td>
			 <td>'.$row->FirstName.'</td>
			 <td>'.$row->Email.'</td>
			 
			
			</tr>
		  ';
		 }
		}
		else
		{
		 $output .= '<tr>
			 <td colspan="5">No Data Found</td>
			</tr>';
		}
		$output .= '</table>';
		echo $output;
    





	}
}