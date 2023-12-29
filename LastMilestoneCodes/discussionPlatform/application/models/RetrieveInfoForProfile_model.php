<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class RetrieveInfoForProfile_model extends CI_Model{


    public function getfirstname($username){
      
      $query = $this->db->query("select FirstName from users where username='$username'");
      $covertToArray = $query->row_array();
      $result= $covertToArray["FirstName"];

    return $result;

    }

    public function getlastname($username){
       
        $query = $this->db->query("select LastName from users where username='$username'");
        $covertToArray = $query->row_array();
        $result= $covertToArray["LastName"];
  
      return $result;
  
      }


      public function getemail($username){
       
        $query = $this->db->query("select Email from users where username='$username'");
        $covertToArray = $query->row_array();
        $result= $covertToArray["Email"];
  
      return $result;
  
      }


 

 
}
?>