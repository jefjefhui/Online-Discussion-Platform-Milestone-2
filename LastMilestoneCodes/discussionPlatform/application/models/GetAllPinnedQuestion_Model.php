<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class GetAllPinnedQuestion_Model extends CI_Model{

 
   // public function retrieveQ(){
    //  $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

     // return $query->result_array();
      

      //return $ToArray;
    //}

public function getPinned($userName){
    $outCome = $this->db->query("select questionID from pinItem where userName='$userName' AND pinStatus=1");

    $result = $outCome->result_array();

    $target = array();


    foreach($result as $row1){

        $qidValue =$row1['questionID'];


        $theQuestions = $this->db->query("select * from questions where qid=$qidValue");

        $aaa=$theQuestions->result_array();

        foreach($aaa as $row2){

            $target[$row1['questionID']]=$row2['title'];


        }









    }



return $target;

}

 
}
?>