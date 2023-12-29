<div class="container">
      <div class="row">
				<h1 class="text-center">Changing Password</h1>    		
	</div>
    <div class="row">
      <h2 class="text-center">Change your password here.</h2>
    </div>


    <div class="col-4 offset-4">
	  <?php echo form_open(base_url().'ForgotPWEmailEntry/validatePW'); ?>
				  
			
			
					<label for="firstInputPW">Your new password:</label>
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="firstInputPW">
					</div> 
                    <label for="secondInputPW">Re-enter your new password:</label>
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="secondInputPW">
					</div> 

                    <div class="form-group">
					<?php echo $error; ?>
					</div>
				
			
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>
					<?php echo form_close(); ?>
	</div>
    
</div>