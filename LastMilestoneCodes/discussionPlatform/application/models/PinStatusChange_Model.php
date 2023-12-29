<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class PinStatusChange_Model extends CI_Model{

 
    public function retrieveQ(){
      $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

      return $query->result_array();
      

      //return $ToArray;
    }


    public function pinChangeToOne($userName,$qID){
       // $pinValue =$this->db->query("select pinStatus from pinItem where userName='$userName' and questionID=$qID");
       // $pinStatusValue = $pinValue->row()->pinStatus;

       // if($pinStatusValue=0){

            $this->db->query("UPDATE pinItem
            SET  pinStatus=1
            WHERE userName='$userName' and questionID=$qID;");


      //  }
 

        
    }


    public function pinChangeToZero($userName,$qID){
       // $pinValue =$this->db->query("select pinStatus from pinItem where userName='$userName' and questionID=$qID");
       // $pinStatusValue = $pinValue->row()->pinStatus;

   
      //  if($pinStatusValue==1){

            $this->db->query("UPDATE pinItem
            SET  pinStatus=0
            WHERE userName='$userName' and questionID=$qID;");



       // }

        
    }












    public function getPinText($userName,$qid){

        //retrive the current value on pinStatus
        $pinValue =$this->db->query("select * from pinItem where userName='$userName' and questionID=$qid");
        $xxx = $pinValue->row_array();
        $pinStatusValue=$xxx['pinStatus'];

        return $pinStatusValue;


    }
 
}
?>