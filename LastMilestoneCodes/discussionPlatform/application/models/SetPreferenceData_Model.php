<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class SetPreferenceData_Model extends CI_Model{

 
    //public function retrieveQ(){
     // $query =$this->db->query("select * from questions");
      //$ToArray = $query->row_array();

    //  return $query->result_array();
      

      //return $ToArray;
   // }


   public function executePreference($username,$preferenceData){

    $Biology=0;
    $Business=0;
    $Chemistry=0;
    $Communications=0;
    $ComputerScience=0;
    $Engineering=0;
    $Literature=0;
    $MATH=0;
    $Medicine=0;
    $Physics=0;
    $Psychology=0;
    $SocialScience=0;
    $Technology=0;
    $Others=0;




    foreach($preferenceData as $x){

        if($x=='Biology'){
            $Biology=1;
        }
        if($x=='Business'){
            $Business=1;

        }
        if($x=='Chemistry'){
            $Chemistry=1;

        }
        if($x=='communications'){
            $Communications=1;

        }
        if($x=='ComputerScience'){
            $ComputerScience=1;

        }
        if($x=='Engineering'){
            $Engineering=1;

        }
        if($x=='Literature'){
            $Literature=1;

        }
        if($x=='MATH'){
            $MATH=1;

        }
        if($x=='Medicine'){
            $Medicine=1;

        }
        if($x=='Physics'){
            $Physics=1;

        }
        if($x=='Psychology'){
            $Psychology=1;

        }
        if($x=='socialScience'){
            $SocialScience=1;

        }
        if($x=='Technology'){
            $Technology=1;

        }
        if($x=='Others'){
            $Others=1;

        }


    }
    //if the usersname doesn't exist in the db, use insert
     //if the username exist in the db, use update statement 

     $result = $this->db->query("select * from userPreference where userName='$username'");
     $numberofRows = $result->num_rows();



if($numberofRows==0){
    //do insert here
    $this->db->query("INSERT INTO userPreference (userName, Biology, Business,Chemistry,Communications,ComputerScience,Engineering,Literature,MATH,Medicine,Physics,Psychology,SocialScience,Technology,Others)
VALUES ('$username',$Biology,$Business,$Chemistry,$Communications,$ComputerScience,$Engineering,$Literature,$MATH,$Medicine,$Physics,$Psychology,$SocialScience,$Technology,$Others);");


   }else{
       //do upate statement here
       $this->db->query("UPDATE userPreference
       SET Biology =$Biology, Business = $Business, Chemistry=$Chemistry,Communications=$Communications,ComputerScience=$ComputerScience,Engineering=$Engineering,Literature=$Literature,MATH=$MATH,Medicine=$Medicine,Physics=$Physics,Psychology=$Psychology,SocialScience=$SocialScience,Technology=$Technology,Others=$Others
       WHERE userName='$username';");

   }

   

 
}
 }
?>