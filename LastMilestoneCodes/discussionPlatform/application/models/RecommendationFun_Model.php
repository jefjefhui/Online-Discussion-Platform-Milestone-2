<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class RecommendationFun_Model extends CI_Model{

 
 //   public function retrieveQ(){
    //  $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

    //  return $query->result_array();
      

      //return $ToArray;
    //}

    public function checkIfPreferenceExist($userName){

        $result = $this->db->query("select * from userPreference where userName='$userName'");
        $numberOfResults = $result->num_rows();

        return $numberOfResults;


    }


    //This function grab all the prefernece out 
    public function pickedPreference($userName){
        $yourArray = array();
        $yourPrefernece = $this->db->query("select * from userPreference where userName='$userName'");
        $yourPreferenceToRowArray = $yourPrefernece->result_array();
        foreach ($yourPreferenceToRowArray as $row){
            if($row['Biology']==1){
               array_push($yourArray,'Biology');

            }
            if($row['Business']==1){
                array_push($yourArray,'Business');
 
             }
             if($row['Chemistry']==1){
                array_push($yourArray,'Chemistry');
 
             }
             if($row['Communications']==1){
                array_push($yourArray,'Communications');
 
             }
             if($row['ComputerScience']==1){
                array_push($yourArray,'ComputerScience');
 
             }
             if($row['Engineering']==1){
                array_push($yourArray,'Engineering');
 
             }
             if($row['Literature']==1){
                array_push($yourArray,'Literature');
 
             }
             if($row['MATH']==1){
                array_push($yourArray,'MATH');
 
             }
             if($row['Medicine']==1){
                array_push($yourArray,'Medicine');
 
             }
             if($row['Physics']==1){
                array_push($yourArray,'Physics');
 
             }
             if($row['Psychology']==1){
                array_push($yourArray,'Psychology');
 
             }
             if($row['SocialScience']==1){
                array_push($yourArray,'SocialScience');
 
             }
             if($row['Technology']==1){
                array_push($yourArray,'Technology');
 
             }
             if($row['Others']==1){
                array_push($yourArray,'Others');
 
             }
          
            


        }
        return $yourArray;

    }

    public function getTheResult($preference){
       $formatABit = array_map('strval',$preference);
      


      //grab all the questions that belongs to user preference 
      $this->db->select('*');
      $this->db->where_in('category',$formatABit);
       //$resultWithinPreference = $this->db->query("SELECT * from questions WHERE category IN ($formatABit)");
      // $resultWithinPreferenceToResultArray =$resultWithinPreference->result_array();
      $resultWithinPreferenceToResultArray=$this->db->get('questions')->result_array();

       $qualifiedQIDArray = array();


       foreach($resultWithinPreferenceToResultArray as $row){

         array_push($qualifiedQIDArray,$row['qid']);



       }

       $qidCountLikesAssoArray = array();


       //All the qulified QID in qualitiedQIDArray
       //use the QID to find the total likes 
       //make associateive array, key:qid, value:total likes
       //use arsprt to sort the values from large to small 
       //figure out what showrealted info will accept and make the data and pass it into showrelatedinfo 

       foreach($qualifiedQIDArray as $value){

         $amountOfLikes = $this->db->query("select * from likeStatus where questionID=$value AND likeStatus=1");
         $qidCountLikesAssoArray[$value]=$amountOfLikes->num_rows();




       }

       arsort($qidCountLikesAssoArray);


       $questionsTitle = array();


       foreach($qidCountLikesAssoArray as $x=>$y){


         $questionInformation = $this->db->query("select * from questions where qid=$x");
         $questionInformationToArray = $questionInformation->result_array();
         foreach($questionInformationToArray as $row){
            $questionsTitle[$x]=$row['title'];

         }
        




       }


       return $questionsTitle;

       


    }
 
}
?>