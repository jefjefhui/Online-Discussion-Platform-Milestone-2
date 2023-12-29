<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class User_model extends CI_Model{

    // Log in
    public function login($username, $password){
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    public function userExist($inputUser){
      //validate and check if username exist
      $this->db->where('username', $inputUser);
      $result = $this->db->get('users');

      if($result->num_rows() == 1){
          return true;
      } else {
          return false;
      }

    }
}
?>