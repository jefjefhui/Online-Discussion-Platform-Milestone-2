<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class StaffSearch_Model extends CI_Model{

 
   // public function retrieveQ(){
     // $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

      //return $query->result_array();
      

      //return $ToArray;
   // }
   function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("staff");
  if($query != '')
  {
   $this->db->like('LastName', $query);
   $this->db->or_like('FirstName', $query);
   $this->db->or_like('Email', $query);
   
   
  }
  $this->db->order_by('staffID', 'DESC');
  return $this->db->get();
 }




 
}
?>