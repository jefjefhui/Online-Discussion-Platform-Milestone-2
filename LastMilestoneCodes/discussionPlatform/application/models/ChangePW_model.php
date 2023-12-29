<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class ChangePW_model extends CI_Model{


    public function getPassword($username){
      
      $query = $this->db->query("select password from users where username='$username'");
      $covertToArray = $query->row_array();
      $result= $covertToArray["password"];

    return $result;

    }

    public function updatePWChange($validPWChange,$currentUserName){
      //$query =$this->db->query("UPDATE users SET password ='$validPWChange' WHERE username='$currentUserName'");
      $data = array(
        'password' => $validPWChange
        
                   );

      $this->db->where('username', $currentUserName);
      $this->db->update('users', $data);

    }

    public function getEmail($UserName){
      $query = $this->db->query("select Email from users where username='$UserName'");
      $toArray = $query->row_array();
      $result = $toArray['Email'];

      return $result; 

    }

    


     


 

 
}
?>