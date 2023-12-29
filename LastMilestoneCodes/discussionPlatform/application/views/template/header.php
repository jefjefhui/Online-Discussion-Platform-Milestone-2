<html>
        <head>
                <title>AskItNow</title>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
                <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
                <script src="<?php echo base_url();?>assets/js/googlemapfunction.js"></script>


                
              
              









             
                <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
                

        </head>
        <body>
  <script>
        // Show select image using file input.
        function readURL(input) {
            $('#default_img').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#select')
                        .attr('src', e.target.result)
                        .width(300)
                        .height(200);

                };

                reader.readAsDataURL(input. files[0]);
            }
        }
    </script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">AskItNow</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if(!$this->session->userdata('logged_in')) : ?>
        <li class="nav-item">
            <a href="<?php echo base_url(); ?>login" style="margin-right:20px"> Home </a>
        </li>
        <li class="nav-item">
            <a href="#" style="margin-right:20px"> Support </a>
           </li>
           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/HeadToContactUs"> Contact US </a>
           </li>
       
        <?php endif; ?>
        <?php if($this->session->userdata('logged_in')) : ?>
        <li class="nav-item" style="margin-right:20px">
            <a href="<?php echo base_url(); ?>login"> Home </a>
        </li>
        <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/AskQuestionsNow" style="margin-right:20px"> Ask Question </a>
           </li>

           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/FilteringQuestions" style="margin-right:20px"> Filtering </a>
           </li>

           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/RecommendationFunctionCon" style="margin-right:20px"> Recommendations </a>
           </li>
           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/FavPinQuestionPageCon" style="margin-right:20px"> Favorite Questions </a>
           </li>
           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/StaffSearchAjaxCon" style="margin-right:20px"> Department Contact </a>
           </li>
           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/SupportPayment_Con" style="margin-right:20px"> Support </a>
           </li>
           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/HeadToContactUs"> Contact US </a>
           </li>
           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/LocationMap_Con" style="margin-left:20px"> Location </a>
           </li>
        <?php endif; ?>

    </ul>
    <ul class="navbar-nav my-lg-0">
    <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>login"> Login </a>
          </li>
          <?php endif; ?>
          <?php if($this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
            <a href="<?php echo base_url(); ?>login/logout"> Logout </a>
           </li>
           <li class="nav-item " style="margin-left:20px">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/yourProfile"> Profile </a>
           </li>
           <li class="nav-item">
            <a href="https://infs3202-9451aeed.uqcloud.net/discussionPlatform/GoToPreferencePage" style="margin-left:20px"> Preference </a>
           </li>
           <?php endif; ?>
    </ul>

    </div>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<div class="container">

