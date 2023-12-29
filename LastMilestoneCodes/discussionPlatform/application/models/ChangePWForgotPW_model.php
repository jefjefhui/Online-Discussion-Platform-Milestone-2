<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class ChangePWForgotPW_model extends CI_Model{


    public function updatePWChange($validPWChange,$currentEmail){
      //$query =$this->db->query("UPDATE users SET password ='$validPWChange' WHERE username='$currentUserName'");
      $data = array(
        'password' => $validPWChange
        
                   );

      $this->db->where('Email', $currentEmail);
      $this->db->update('users', $data);

    }

  

    


     


 

 
}
?>