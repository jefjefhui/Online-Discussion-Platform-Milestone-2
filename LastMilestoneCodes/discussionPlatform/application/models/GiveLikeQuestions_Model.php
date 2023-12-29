<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class GiveLikeQuestions_Model extends CI_Model{

 
    public function retrieveQ(){
      $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

      return $query->result_array();
      

      //return $ToArray;
    }

    public function grabLikeButtonText($username,$qid){
       // $stringUserName = strval($username);

        $query = $this->db->query("select likeStatus from likeStatus where username='$username' AND questionID=$qid");
        
        return $query->row();

    }

    public function changeLikeStatusToOne($username,$qid){

        $this->db->query("UPDATE likeStatus SET likeStatus=1 where username='$username' AND questionID=$qid");


        

    }


    public function changeLikeStatusToZero($username,$qid){

        $this->db->query("UPDATE likeStatus SET likeStatus=0 where username='$username' AND questionID=$qid");




    }


    public function getAllTheCurrentLikes($questionID){
        $query =$this->db->query("select * from likeStatus where questionID=$questionID AND likeStatus=1");


        return $query->num_rows();


    }


    




 
}
?>