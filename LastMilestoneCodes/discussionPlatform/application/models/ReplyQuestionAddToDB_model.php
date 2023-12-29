<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class ReplyQuestionAddToDB_model extends CI_Model{

 
    public function addReplyToDB($response){
     $this->db->insert("responses",$response);
    }
 
}
?>