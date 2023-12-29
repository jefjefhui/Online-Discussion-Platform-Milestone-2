<div class="container">
    <div class="row">
    <div class="col-3 bg-info overflow-auto" style="height:775px "><h1>Filtering</h1>
    <form action="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/FilteringQuestions/index" method='post'>
  <input type="checkbox" id="biology" name="category[]" value="Biology">
  <label for="biology">Biology</label><br>
  <input type="checkbox" id="Business" name="category[]" value="Business">
  <label for="Business">Business</label><br>
  <input type="checkbox" id="Chemistry" name="category[]" value="Chemistry">
  <label for="Chemistry">Chemistry</label><br>
  <input type="checkbox" id="Communications" name="category[]" value="communications">
  <label for="Communications">Communications</label><br>
  <input type="checkbox" id="Computer_Science" name="category[]" value="ComputerScience">
  <label for="Computer_Science">Computer Science</label><br>
  <input type="checkbox" id="Engineering" name="category[]" value="Engineering">
  <label for="Engineering">Engineering</label><br>
  <input type="checkbox" id="Literature" name="category[]" value="Literature">
  <label for="Literature">Literature</label><br>
  <input type="checkbox" id="MATH" name="category[]" value="MATH">
  <label for="MATH">MATH</label><br>
  <input type="checkbox" id="Medicine" name="category[]" value="Medicine">
  <label for="Medicine">Medicine</label><br>
  <input type="checkbox" id="Physics" name="category[]" value="Physics">
  <label for="Physics">Physics</label><br>
  <input type="checkbox" id="Psychology" name="category[]" value="Psychology">
  <label for="Psychology">Psychology</label><br>
  <input type="checkbox" id="Social_Science" name="category[]" value="socialScience">
  <label for="Social_Science">Social Science</label><br>
  <input type="checkbox" id="Technology" name="category[]" value="Technology">
  <label for="Technology">Technology</label><br>
  <input type="checkbox" id="Others" name="category[]" value="Others">
  <label for="Others">Others</label><br><br>
  
  <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
</div>

<div class="col-9 bg-light overflow-auto" style="height:775px"><h1>All the questions</h1>
<?php
//$theQuestions = $questions[0];

//echo $questions;
//echo $selected;
//you can check if there are anything inside the key selected, if null, print all, if there are elements, just print based on the elements 
$type = gettype($selected);
//echo $type;
//foreach($selected as $a=>$values){
   // echo $values;
//}
if($type=='NULL'){
  foreach($questions as $x=>$val) {
    foreach($val as $y=>$z){
        //echo "$y = $z<br>";
       // $qTitle="";
        //$whoAsked="";
      //$para="";
    if($y=="qid"){
      $link="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/QuestionDetails/showRelatedInfo/$z";
      $para=$z;
    }
    if ($y=="title"){
      $qTitle=$z;
      
      echo "<a href='$link'><h4>Title:$qTitle</h4></a>";
    }
    //if ($y=="askedUserName"){
      //$whoAsked=$z;
    //}
    
   // echo "<a href='#'><h4>Question:$qTitle</h4></a>";
  
    }
    //echo "$x = $val<br>";
  }
  

}
if($type!='NULL'){
  foreach($selected as $a=>$values){
    //echo $a;
    //echo $values;
    foreach($values as $y=>$z){
      //echo "$y = $z<br>";
     // $qTitle="";
      //$whoAsked="";
    //$para="";
  if($y=="qid"){
    $link="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/QuestionDetails/showRelatedInfo/$z";
    $para=$z;
  }
  if ($y=="title"){
    $qTitle=$z;
    
    echo "<a href='$link'><h4>Title:$qTitle</h4></a>";
  }
  //if ($y=="askedUserName"){
    //$whoAsked=$z;
  //}
  
 // echo "<a href='#'><h4>Question:$qTitle</h4></a>";

  }


  }



}


$type2= gettype($WhatISelected);
if ($type2!='NULL'){
foreach($WhatISelected as $y=>$z){
  //echo $y;
  //echo $z;

}

}


?>


</div>
            </div>
</div>
