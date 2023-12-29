<footer>
    <div class="container">
        <div class="row vcenter">
            <div class="col-xs-6">
                <p>&copy; 2022-<?php echo date("M"); ?></p>
            </div>
        </div>
    </div>
</footer>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD3HpBznL-c4SfO77ghAktN10QjKibLLk&region=AU&language=EN&callback=initMap&libraries=&v=weekly" 
defer>
            </script>

</body>
</html>


<script>
$(document).ready(function(){

load_data();

function load_data(query)
{
 $.ajax({
  url:"https://infs3202-9451aeed.uqcloud.net/discussionPlatform/StaffSearchAjaxCon/fetch",
  method:"POST",
  data:{query:query},
  success:function(data){
   $('#result').html(data);
  }
 })
}

$('#search_text').keyup(function(){
 var search = $(this).val();
 if(search != '')
 {
  load_data(search);
 }
 else
 {
  load_data();
 }
});
});

</script>