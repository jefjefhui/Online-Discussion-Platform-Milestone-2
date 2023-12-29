<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class MultipleFiles_model extends CI_Model{

 
    public function insertToDB($fileName,$path,$topic,$concerns,$location){
     // $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

      //return $query->result_array();
      

      //return $ToArray;
      $data = array(
          'file_Name'=>$fileName,
          'path'=>$path,
          'topic'=>$topic,
          'concerns'=>$concerns,
          'location'=>$location






      );

      $query = $this->db->insert('multipleFiles',$data);
    }
 
}
?>