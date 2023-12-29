<div class="container">
      <div class="col-4 offset-4">
			<form action="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/HeadToContactUs/upload" enctype="multipart/form-data" method="post" class="dropzone">
				<h2 class="text-center">If you have doubt, no worries, just contact us now!</h2>      
				<p>This is the contact us page. It allows you to leave any concerns to the AskItNow team. To make users feel confortable to leave comments, we will only record your response, and user information is not recorded. But we will record your region information for future marketing purposes. Please keep in mind, there are format restrictions and size restrictions. The uploads can only be jpg,mp4,mkv,png and jpeg.You can use drag and drop to upload mutiple files there.</p>
                <label for="topic">Topic:</label><br> 
                
					<div class="form-group">
						<input type="text" class="form-control"  required="required" name="topic">
					</div>
                    <label for="concerns">Your Concerns:</label><br>
					<div class="form-group">
                    <textarea id="concerns" name="concerns" rows="10" cols="35" required="required"></textarea>
					</div>
                    
                    <?php echo $error;?>
					
		


                    
				
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>
					 
					
</form>
	</div>
</div>




