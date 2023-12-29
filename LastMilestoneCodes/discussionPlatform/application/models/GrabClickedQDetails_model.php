<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class GrabClickedQDetails_model extends CI_Model{

 
    public function getTheInfo($qid){
      $query =$this->db->query("select * from questions where qid='$qid'");
      //$ToArray = $query->row_array();

      return $query->result_array();
      

      //return $ToArray;
    }

 

     

   


   


 
}
?>