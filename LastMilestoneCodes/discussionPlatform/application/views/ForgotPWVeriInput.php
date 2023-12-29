<div class="container">
      <div class="row">
				<h1 class="text-center">Verification</h1>    		
	</div>
    <div class="row">
      <h1 class="text-center">Please enter your verification code from the mail and click next.</h1>
    </div>


    <div class="col-4 offset-4">
	  <?php echo form_open(base_url().'ForgotPWEmailEntry/userVeriInput'); ?>
				  
			
			
					<label for="verificationCode">Verification Code:</label>
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="verificationCode">
					</div> 
				
			
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Next</button>
					</div>
					<?php echo form_close(); ?>
	</div>
    
</div>