<div class="container">
      <div class="col-4 offset-4">
	  <?php echo form_open(base_url().'CreateAC/genAC'); ?>
				<h2 class="text-center">Please Enter Your Information To Create Your Account</h2>    
				<label for="firstname">First name:</label>
				<div class="form-group">
						<input type="text" class="form-control"  required="required" name="firstname">
					</div>
					<label for="lastname">Last Name:</label>
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="lastname">
					</div> 
					<label for="Email">Email Address:</label>
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="Email">
					</div> 
					<label for="username">Username:</label>  
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="username">
					</div>
					<label for="password">Password:</label>
					<div class="form-group">
						<input type="password" class="form-control"  required="required" name="password">
					</div>
					<div class="form-group">
						<label>Captcha</label>
						<br>
						<?php echo $captcha_image;?>

                    </div>
					<div class="form-group">
					   <label>Enter Captcha Text</label>
					   <input type="text" name="captcha" class="form-control" required>
                    </div>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Create</button>
					</div>
					<?php echo form_close(); ?>
	</div>
</div>