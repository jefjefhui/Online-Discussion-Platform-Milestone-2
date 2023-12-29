<div class="container">
      <div class="row">
				<h1 class="text-center">Forgot your password? No worries, we can fix it right now.</h1>    		
	</div>
    <div class="row">
      <h1 class="text-center">Please enter your registered email address in the entry and press submit. Afterwards, please check your mailbox, as you will recevice the verification code for next step .</h1>
    </div>


    <div class="col-4 offset-4">
	  <?php echo form_open(base_url().'ForgotPWEmailEntry/processEmail'); ?>
				  
			
			
					<label for="Email">Your Email Address:</label>
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="Email">
					</div> 
				
			
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>
					<?php echo form_close(); ?>
	</div>
    
</div>





