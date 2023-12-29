<div class="container">
<h1>Your Profile</h1>
</div>




<div class="container-fluid">
<div class="row">


<div class="col-2 bg-light overflow-auto" style="height:775px">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/HeadToYInfo">Your Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/HeadToChangePW">Chage your password</a>
    </li>
  </ul>
</div>


<div class="col-10 bg-info overflow-auto" style="height:775px"><h1>This is the place to change your password. Do you want to change your password? follow the instructions below!</h1>
<h2>1.Filled in the form below. If your entry is not valid,a warning will appear.Fix it based on the warnings.</h2>
<h2>2. An notification email will be sent to your registered email address when the password has changed successfully.</h2>

<div class="container">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'HeadToChangePW/changeUserPW'); ?>
				<h3 class="text-center">Change your password in the following form</h3>       
					<div class="form-group">
          <label for="originalPW">Enter your original password:</label>
						<input type="password" class="form-control" placeholder="" required="required" name="originalPW">
					</div>
					<div class="form-group">
          <label for="firstTry">Enter your new password:</label>
						<input type="password" class="form-control" placeholder="" required="required" name="firstTry">
					</div>
          <div class="form-group">
          <label for="secondTry">Re-enter your new password:</label>
						<input type="password" class="form-control" placeholder="" required="required" name="secondTry">
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
</div>



</div>
</div>