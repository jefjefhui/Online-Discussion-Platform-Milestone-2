<div class="container">
      <div class="col-12 offset-1  ">
	  
			  
                <?php
                $pinCheck ='True';
                foreach ($info as $key => $value){
                    foreach($value as $x =>$y){
                        if($x=="askedUserName"){
                            echo "<h5>Asked by:$y</h5>";
                            echo "<form action='https://infs3202-9451aeed.uqcloud.net/discussionPlatform/QuestionDetails/ShowRelatedInfo/$questionID/$currentUser' method='POST'>

                                <button type='submit'>$LikeButtonText</button>
                            
                            </form>";
                            echo "<h5>Current Likes:$amountOfLikes</h5>";



                            echo "<form action='https://infs3202-9451aeed.uqcloud.net/discussionPlatform/QuestionDetails/ShowRelatedInfo/$questionID/$currentUser/$pinCheck' method='POST'>

                                <button type='submit'>$pinText</button>
                            
                            </form>";




                            echo $questionID;
                            echo $currentUser;
                            echo $LikeButtonText;
                        }
                    if($x=="question"){
                        echo "<h5>Question:$y</h5>";
                    }
                   
                    
                    
                    //echo "<h5>$x:$y</h5>";
                }
                }
                $userName="";
                $userResponse = "";
                //$checkPoint = 0;
                $filePath="";
                foreach($join as $a =>$b){
                    foreach($b as $c =>$d ){
                
                        
                        if ($c=="responseUserName"){
                            $userName=$d;}
                        if($c=="response"){
                            $userResponse=$d;
                        }
                        if($c=="filename" ){
                            if(!is_null($d)){
                            $filePath='https://infs3202-9451aeed.uqcloud.net/discussionPlatform//uploads/'.$d;
                            }

                        }
                        
    
                    }
                    
                    echo "<div class='media border p-3'>
        
                    <div class='media-body'>
                      <h4>$userName </h4>
                      <p>$userResponse</p> 
                      <img src=$filePath>
            
                    </div>
                  </div>";

                   

                  

                  //echo"<div></div>";
               

                       
                 // $checkPoint=0;
                  $filePath="";
                }

           // foreach($join as $xx =>$yy){

              // foreach($yy as $cc =>$dd){
                   // echo $cc;
                 //   echo $dd;

               // }
            //}






            
                ?>
            
				<!--<a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/Login">Click here to head back to login!</a>-->

                
                
                
              
                
              <!--  <div class="media border p-3">
    
    <div class="media-body">
      <h4>John Doe </h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
    </div>
  </div>-->

  
      <div class="col-4 offset-3">
      
      
<form action="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/QuestionDetails/replyQuestion" enctype="multipart/form-data" method="post">
				       
				<label for="reply">Reply:</label>
                <div class="form-group">
                    <textarea id="reply" name="reply" rows="10" cols="40" required="required"></textarea>
                     </div>
                    <label for="upload">Files Upload:</label>
                    <? php echo $error;?>
                    <div class="form-group">
                    <input type="file" name="userFileUpload" size="20"/>


            </div>
					
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>
					  
            </form>
            
	
            </div>

        <?php echo $testing;?>
					
					
					 
					
					
					
					
					
					
	</div>
</div>