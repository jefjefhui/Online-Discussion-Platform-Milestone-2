<div class="container-fluid">
<h1>Welcome to AskItNow!</h1>
  <p>Feel free to explore this discussion forum and help each other!</p>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-2 bg-info overflow-auto" style="height:775px "><h1>Filtering</h1><h3>Filtering function is available in the navigation bar, please try it out!</h3>

</div>
<div class="col-6 bg-light overflow-auto" style="height:775px"><h1>All the questions:</h1>
<?php
//$theQuestions = $questions[0];
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
//echo $questions;
?>
</div>
<div class="col-4 bg-primary overflow-auto" style="height:775px"><h1>Descriptions:</h1><h3>This is the home page of the discussion platform, which shows all the current questions. You can click on the questions and view the details and current responses. On the left, you can filter questions by category. Thank you.</h3></div>
</div>
</div>

