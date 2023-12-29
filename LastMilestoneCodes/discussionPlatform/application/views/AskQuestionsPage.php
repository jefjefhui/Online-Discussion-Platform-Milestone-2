<div class="container">
    
      <div class="col-4 offset-4">
      <h1 class="text-center">Ask Questions</h1>
      <h5 class="text-center">Please enter the details to ask question</h5>   
	  <?php echo form_open(base_url().'AskQuestionsNow/createQuestions'); ?>
				 
				<label for="title">Title:</label>
				<div class="form-group">
						<input type="text" class="form-control"  required="required" name="title">
					</div>
                    <label for="level">Academic Level:</label>
                    <div class="form-group">
                        <select name="level" id="level">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="undergrad">Undergradaute</option>
                        <option value="postgrad">Post-Graduate</option>
                        <option value="others">Others</option>
                        </select>
                    </div>
                    <label for="category">Choose a category:</label>
                    <div class="form-group">
                    <select name="category" id="category">
                    <option disabled selected value> -- select an option -- </option>
                    <option value="Biology">Biology</option>
                    <option value="Business">Business</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="communications">Communications</option>
                    <option value="ComputerScience">Computer Science</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Literature">Literature</option>
                    <option vlaue="MATH">MATH</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Physics">Physics</option>
                    <option value="Psychology">Psychology</option>
                    <option value="socialScience">Social Science</option>
                    <option value="Technology">Technology</option>
                    <option value="Others">Others</option>
                    </select>
                     </div>
                    <label for="questionText">Plese type your question here:</label>
                    <div class="form-group">
                    <textarea id="questionText" name="questionText" rows="15" cols="45"></textarea>
                     </div>



 
				
					
					
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block my-4">Ask</button>
					</div>
					<?php echo form_close(); ?>
	</div>
</div>