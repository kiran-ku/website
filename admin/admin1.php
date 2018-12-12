<?php
	session_start();
	if(!$_SESSION){
		header("location:index.html");
    }
    session_destroy();
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Kestrelinnovatons Admin page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
   <div class="table-responsive">
    <h1 align="center">Click on below button to load database data</h1><br/>
    <div align="center">
     <button type="button" name="load_data" id="load" class="btn btn-info">Load Data</button>
    </div><br/>
    <div id="admin_table"> </div>
   </div>
  </div>
  <a href="logout.php">Logout</a>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#load').click(function(){
  $.ajax({
   url:"drivers.csv",
   dataType:"text",
   success:function(data)
   {
    var admin_data = data.split(/\r?\n|\r/);
    var table_data = '<table class="table table-bordered table-striped">';
    for(var count = 0; count<admin_data.length; count++)
    {
     var cell_data = admin_data[count].split("#");
     table_data += '<tr>';
     for(var cell_count=0; cell_count<cell_data.length; cell_count++)
     {
      if(count === 0)
      {
       table_data += '<th>'+cell_data[cell_count]+'</th>';
      }
      else
      {
       table_data += '<td>'+cell_data[cell_count]+'</td>';
      }
     }
     table_data += '</tr>';
    }
    table_data += '</table>';
    $('#admin_table').html(table_data);
   }
  });
 });
 
});
</script>
