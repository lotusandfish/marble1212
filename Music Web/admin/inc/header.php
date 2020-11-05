<?php 
	session_start();
	include('connect.php');
	$today = date("F j, Y, g:i a");
	
	 
	



 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin Panel</title>
 	
 </head>
 <body>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a48ea8ae22.js" crossorigin="anonymous"></script>

  <style type="text/css">
  	body{
  		background: black;
  		
  	}
    audio::-webkit-media-controls-play-button,
       audio::-webkit-media-controls-panel {
       background-color: #FF0094;
       color: white;
       }
  	
  </style>
  <div class="container-fluid">
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="songmn.php">Songs</a>
      <a class="nav-item nav-link" href="albummn.php">Albums</a>
      <a class="nav-item nav-link" href="authmn.php">Author</a>
      <a class="nav-item nav-link" href="catemn.php">Categories</a>
      <a class="nav-item nav-link" href="ordermn.php">Order</a>
      <a class="nav-item nav-link" href="usermn.php">User</a>
      <a style="margin-left: 220px; " class="nav-item nav-link"><i style="color:#FF0094; padding-right: 10px;" class="far fa-clock"></i><div id="clock" style="color: #FF0094; text-align: center; float: right;">&nbsp;</div></a>
      
    </div>
  </div>
  	<div style="float: right; color:#FF0094; margin:10px; padding-right: 10px; ">

  		Welcome: <?php echo $_SESSION['user'] ?>
  		
  	</div>
  	<div style="float: right;">
      	<a style="color:#FF0094;" class="nav-item nav-link" href="logout.php" ><i style="padding: 5px;" class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>


    <div id="clock" style="color: #FF0094; text-align: center;">&nbsp;</div>
    

  </div>
<script type="text/javascript">
	var d = new Date(<?php echo time() * 1000 ?>);

function updateClock() {
  // Increment the date
  d.setTime(d.getTime() + 1000);

  // Translate time to pieces
  var currentHours = d.getHours();
  var currentMinutes = d.getMinutes();
  var currentSeconds = d.getSeconds();

  // Add the beginning zero to minutes and seconds if needed
  currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
  currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

  // Add either "AM" or "PM"
  var timeOfDay = (currentHours < 12) ? "AM" : "PM";

  // Convert the hours our of 24-hour time
  currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
  currentHours = (currentHours == 0) ? 12 : currentHours;

  // Generate the display string
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}

window.onload = function() {
  updateClock();
  setInterval('updateClock()', 1000);
}
</script>
 </body>
 </html>