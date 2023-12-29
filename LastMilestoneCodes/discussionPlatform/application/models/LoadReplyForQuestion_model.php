<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class LoadReplyForQuestion_model extends CI_Model{

 
    public function grabReply($qid){
        $query =$this->db->query("select * from responses where questionID='$qid'");
        //$ToArray = $query->row_array();
  
        return $query->result_array();
    }
 
}
?>