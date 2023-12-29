<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class AddQuestionToDB_model extends CI_Model{

    
    public function addQuestion($data){


        //Insert the new question to the DB
        $this->db->insert("questions",$data);


        //When one questions is added, make sure every user need to add one row of data to likestatus table. For instnace, if there are 10 users, add 10 rows of data
        //likestatusid in likestatus table: grab the last row of data, and add one, use that as likestatusid.
        //username:select all the username from the database, and loop through them 
        //questionID: grab the last row of data in the questions table, as it is what I want to add data based on. 
        //likestatus: all the inital value is 0, which means "not liked yet"
        //The following codes will follow the instructions above. 



        //These codes are looking for the last row of likestatusID(the most recent added value, the largest id #)
        $theMostRecentAddedRow = $this->db->query("SELECT * FROM likeStatus ORDER BY likeStatusID DESC LIMIT 1");
        $theLastRowID =$theMostRecentAddedRow->row();
        $theLastRowIDValue = $theLastRowID->likeStatusID;


        //How many rows of users there? This will give you how many users are there 
        $totalNumberOfUser =$this->db->query("SELECT * From users");
        $numberofUser = $totalNumberOfUser->num_rows();


        //Upper bound of for looop 
        $upperbound = $theLastRowIDValue + $numberofUser;


       //Starting point 
       $startingPoint = $theLastRowIDValue+1;
        

       //grab all the usernames
       $allTheUsers = $this->db->query("SELECT username FROM users");
       $allTheUsersValue = $allTheUsers->result_array();
       $userArray = array();
       foreach ($allTheUsersValue as $row){

        array_push($userArray,"$row[username]");



       }

       $loopIndex=0;


       //Grab the questionID
       $questionJustAddedID = $this->db->query("SELECT * FROM questions ORDER BY qid DESC LIMIT 1");
       $questionJustAddedIDToRow = $questionJustAddedID->row();
       $questionJustAddedIDToRowValue =$questionJustAddedIDToRow->qid;





        for ($x=$startingPoint; $x<=$upperbound; $x++) {

            
            
            //make the array outside this for loop, which includes all the users 
            //for the first iteration of for, grab the first array item, so on and so forth 
            //the iterations of the for loop should be the same as the number of users in the array 

            $this->db->query("INSERT INTO likeStatus VALUES ($x,'$userArray[$loopIndex]',$questionJustAddedIDToRowValue,0);");
            $loopIndex = $loopIndex +1;

            
             

            
          }




    //The following codes is going to append the pinItem table when a question is created. 
    /////////////////////////////

      //These codes are looking for the last row of pinStatusID(the most recent added value, the largest id #)
      $theMostRecentAddedPinStatusID = $this->db->query("SELECT * FROM pinItem ORDER BY pinStatusID DESC LIMIT 1");
      $theLastRowPinStatusID =$theMostRecentAddedPinStatusID->row();
      $pinItemLastRowIDValueValue = $theLastRowPinStatusID->pinStatusID;



        //How many rows of users there? This will give you how many users are there 
        $totalNumberOfUser2 =$this->db->query("SELECT * From users");
        $numberofUser2 = $totalNumberOfUser2->num_rows();



         //Upper bound of for looop 
         $upperbound2 = $pinItemLastRowIDValueValue + $numberofUser2;



          //Starting point 
       $startingPoint2 = $pinItemLastRowIDValueValue+1;




         //grab all the usernames
         $allTheUsers2 = $this->db->query("SELECT username FROM users");
         $allTheUsersValue2 = $allTheUsers2->result_array();
         $userArray2 = array();
         foreach ($allTheUsersValue2 as $row){
  
          array_push($userArray2,"$row[username]");
  
  
  
         }


         $loopIndex2=0;


         //Grab the questionID
       $questionJustAddedID2 = $this->db->query("SELECT * FROM questions ORDER BY qid DESC LIMIT 1");
       $questionJustAddedIDToRow2 = $questionJustAddedID2->row();
       $questionJustAddedIDToRowValue2 =$questionJustAddedIDToRow2->qid;



       for ($x=$startingPoint2; $x<=$upperbound2; $x++) {

            
            
        //make the array outside this for loop, which includes all the users 
        //for the first iteration of for, grab the first array item, so on and so forth 
        //the iterations of the for loop should be the same as the number of users in the array 

        $this->db->query("INSERT INTO pinItem VALUES ($x,'$userArray2[$loopIndex2]',$questionJustAddedIDToRowValue2,0);");
        $loopIndex2 = $loopIndex2 +1;

        
         

        
      }








































    }

}
?>