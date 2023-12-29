<div class="container">
      <div class="col-12 offset-0">
	  
				<h3 class="text-center">Welcome to the favourite questions page!!</h3> 
                <h3 class="text-center">The following are all your pinned questions. When you pin a question, it is like a bookmark, the question will be saved and show it here, so that it is easier for you to look back to your favourite questions.</h3> 
                <h3 class="text-center">Here are the questions:</h3>
                
             
            
                
                <?php


                foreach($details as $x=>$val){

                    echo"<a href='https://infs3202-9451aeed.uqcloud.net/discussionPlatform/QuestionDetails/showRelatedInfo/$x'><h4>Title:$val</h4></a>";
                   // echo $x;
                  //  echo $val;





                }

               //echo $resultOutcome;











                ?>


				
				
					
					
					 
					
					
					
					
					
					
	</div>
</div>