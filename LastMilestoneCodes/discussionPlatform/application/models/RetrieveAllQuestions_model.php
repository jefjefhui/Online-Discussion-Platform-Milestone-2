<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class RetrieveAllQuestions_model extends CI_Model{

 
    public function retrieveQ(){
      $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

      return $query->result_array();
      

      //return $ToArray;
    }
 
}
?>