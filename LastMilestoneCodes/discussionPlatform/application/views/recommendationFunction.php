<div class="container">
      <div class="col-12 offset-0">
	  
				<h3 class="text-center">Welcome to the recommendation function, please follow the instructions below.</h3> 
                <h6 class="text-center">1.Firstly,please fill in the preference form first, as the recommendation function will use the preference as one of the sorting criteria. If you haven't submit any preference before, you cannot proceed.</h6> 
                <h6 class="text-center">2.In addition, the recommendation function will use the number of likes as the sorting criteria as well.</h6>
                <h6 class="text-center">3.When you finish filling the preference form, come back to the recommendation function. Thank you!</h6>  
                <h3 class="text-center">This is what we recommend for you. Happy learning !!</h3>
                <?php


                foreach($resultOutcome as $x=>$val){

                    echo"<a href='https://infs3202-9451aeed.uqcloud.net/discussionPlatform/QuestionDetails/showRelatedInfo/$x'><h4>Title:$val</h4></a>";
                    //echo $x;
                    //echo $val;





                }

               //echo $resultOutcome;











                ?>


				
				
					
					
					 
					
					
					
					
					
					
	</div>
</div>