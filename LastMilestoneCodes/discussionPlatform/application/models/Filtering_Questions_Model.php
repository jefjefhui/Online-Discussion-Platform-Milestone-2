<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class Filtering_Questions_Model extends CI_Model{

 
    public function retrieveQ(){
      $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

      return $query->result_array();
      

      //return $ToArray;
    }

    public function filterApplied($values){

    //$theInCondition = '" . implode("','", array_map('mysql_real_escape_string', $arr)). "';
   // $filterEscape = array_map('mysql_real_escape_string',$values);
    //$theInCondition = implode(",",$filterEscape);

    //$yourQuery = "SELECT * FROM questions WHERE category IN ('" 
    // . implode("','", array_map('mysql_real_escape_string', $values)) 
    // . "')";
    if(is_array($values)){
      $convertToString=array_map('strval', $values);
    $separatedByComma= implode(",",$convertToString);

    //$sql = "SELECT * FROM questions WHERE category IN ($separatedByComma)";


     //"SELECT * FROM questions WHERE category='Technology'"


     // $query = $this->db->query($sql);


     

//$names=array('Technology','Business');
 
      $this->db->select('*');
      $this->db->where_in('category', $convertToString);//WHERE author IN ('Bob', 'Geoff')
      $query =$this->db->get('questions');












      return $query->result_array();



    }
    



    }
 
}
?>