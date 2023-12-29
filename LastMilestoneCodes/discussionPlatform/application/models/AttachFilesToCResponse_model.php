<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class AttachFilesToCResponse_model extends CI_Model{

 
    public function joinDataResult($qid){
      $query =$this->db->query("SELECT responses.response,responses.responseUserName,replyFiles.filename FROM responses LEFT JOIN replyFiles ON responses.responseID=replyFiles.responseID WHERE questionID=$qid;");
      //$ToArray = $query->row_array();

      return $query->result_array();
      

      //return $ToArray;
    }
 
}
?>