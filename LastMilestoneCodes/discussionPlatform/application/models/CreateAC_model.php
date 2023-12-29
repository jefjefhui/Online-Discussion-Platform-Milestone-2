<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class CreateAC_model extends CI_Model{

    //validations and check if the username exist or not 
    public function UsernameValidate($username){
        // Validate
        $this->db->where('username', $username);
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return false;
        } else {
            return true;
        }
    }
    public function EmailValidate($email){
        // Validate
        $this->db->where('Email', $email);
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return false;
        } else {
            return true;
        }
    }
    //Insertion of new account infomration if the inputs are valid
    public function InsertDB($data){
        
     

        $this->db->insert("users",$data);




        //start writing codes to insert necessary data to likeStatus table 
        //decide like status id : Grab the last row id in the like status table. Add 1 as the starting point. Upper-point use the number of questions as critiera. OR I can use the auto-increment,just ignore it. Just insert corresponding data.
        //decide username : The username you just created above. Get the last row of data from user, as this is exaclty the user we just added.
        //questionID: Based on the questions table qid. Maybe like previous case, add them into array.
        //like status: when user account just created, the data rows in likeStatus and pinItem are just created as well. When it first created, user didn't do anything, so it is not liked and it is not pinned, and the default values should be 0.
        //user for loop to iterate: In the for loop, embed insert statement of SQL query.
        $lastRowLikeStatusID= $this->db->query("SELECT likeStatusID FROM likeStatus ORDER BY likeStatusID DESC LIMIT 1");
        $lastRowToRow = $lastRowLikeStatusID->row();
        $lastRowToRowValues = $lastRowToRow->likeStatusID;


        $IDStartingPoint = $lastRowToRowValues+1;


        //How many rows to create? It depends on the number of questions. 
        $allTheQuestions = $this->db->query("SELECT * from questions");
        $numberOfAllTheQuestions = $allTheQuestions->num_rows();



        //Upper bound 
        $upperBoundValue = $lastRowToRowValues+$numberOfAllTheQuestions;


        //Username: Need to grab it from the last row of user 
        $resultUserName = $this->db->query("SELECT username FROM users ORDER BY id DESC LIMIT 1");
        $resultUserNameToRow = $resultUserName->row();
        $resultUserNameToRowValue = $resultUserNameToRow->username;



        //qid: make an array and append the array, make a index as well. 
        $qidArray = array();
        $allTheQID = $this->db->query("select qid from questions");
        
        

        foreach($allTheQID->result_array() as $row){

            array_push($qidArray,$row['qid']);





        }


        //Index 
        $checkingIndex = 0;




        for($x=$IDStartingPoint;$x<=$upperBoundValue;$x++){

            $this->db->query("INSERT INTO likeStatus
            VALUES ($x,'$resultUserNameToRowValue',$qidArray[$checkingIndex],0);");

            $checkingIndex=$checkingIndex+1;


        }
        //Add data to likeStatus table ends here









         //Add data to pinItem table start here 
        //start writing codes to insert necessary data to pinItem table 
        //pinStatusID: Just state the column and plug in corresponding values. Don't need to worry about the ID, as it will auto increment. 
        //userName: just grab the last row of data in users, as this is what I just inserted above, and I want to base on this username to create rows of data.
        //QuestionID: Just base on the qid in quesitons table. 
        //pinStatus: the default value of pinStatus is 0.


        $lastRowPinStatusID= $this->db->query("SELECT pinStatusID FROM pinItem ORDER BY pinStatusID DESC LIMIT 1");
        $lastRowToRow2 = $lastRowPinStatusID->row();
        $lastRowToRowValues2 = $lastRowToRow2->pinStatusID;


        $IDStartingPoint2 = $lastRowToRowValues2+1;


        //How many rows to create? It depends on the number of questions. 
        $allTheQuestions2 = $this->db->query("SELECT * from questions");
        $numberOfAllTheQuestions2 = $allTheQuestions2->num_rows();



        //Upper bound 
        $upperBoundValue2 = $lastRowToRowValues2+$numberOfAllTheQuestions2;


        //Username: Need to grab it from the last row of user 
        $resultUserName2 = $this->db->query("SELECT username FROM users ORDER BY id DESC LIMIT 1");
        $resultUserNameToRow2 = $resultUserName2->row();
        $resultUserNameToRowValue2 = $resultUserNameToRow2->username;



        //qid: make an array and append the array, make a index as well. 
        $qidArray2 = array();
        $allTheQID2 = $this->db->query("select qid from questions");
        
        

        foreach($allTheQID2->result_array() as $row){

            array_push($qidArray2,$row['qid']);





        }


        //Index 
        $checkingIndex2 = 0;




        for($x=$IDStartingPoint2;$x<=$upperBoundValue2;$x++){

            $this->db->query("INSERT INTO pinItem
            VALUES ($x,'$resultUserNameToRowValue2',$qidArray2[$checkingIndex2],0);");

            $checkingIndex2=$checkingIndex2+1;


        }
        //Add data to likeStatus table ends here







        
        
        

    }
}
?>