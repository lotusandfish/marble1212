<?php 
session_start();



if(isset($_POST['enter'])){
	include("inc/connect.php");
	$user = $_POST['name'];
	$pass = $_POST['pass'];
	$sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
	$query = mysqli_query($conn,$sql);
	if($result = mysqli_fetch_array($query)){
		
		if($result['role'] == 'admin'){
			$_SESSION['user'] = $user;
			$_SESSION['NaMe'] = $result['name'];
			header('location:../admin/index.php');
			

		}
		else{
			$_SESSION['user'] = $user;
			$_SESSION['NaMe'] = $result['name'];
			
			header('location:index.php');
			
		}
	}
	else{

			function function_alert($message) { 
      
	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 
  			  
			// Function call 
			function_alert("Incorrect username or password!"); 
	}
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>CisUm</title>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<script src="https://kit.fontawesome.com/a48ea8ae22.js" crossorigin="anonymous"></script>
 	<style type="text/css">
 		body{
 			background: black;
 			font-family: sans-serif;
 		}
 		.box{
 			position: fixed; 
 			top: 50%; 
 			left: 50%;
 			transform: translate(-50%;-50%); 
 			text-align: center; 
 			width: 400px; 
 			height: 400px; 
 			
 			-webkit-transform: translate(-50%, -50%);
			-moz-transform: translate(-50%, -50%);
			-o-transform: translate(-50%, -50%);
		  	-ms-transform: translate(-50%, -50%);
		  	box-sizing: border-box;
		  	justify-content: center;

 		}
 		
 		h1{
 			color: #FF0094;
 			font-family: sans-serif;
 		}

 		input{
 			padding: 10px;
 			margin: 10px;
 			margin-bottom: 15px;
 			outline: none;
 			width: 60%;
 			border: none;
 			border-bottom: 3px solid #EF7F9B;
 			background: black;
 			color:#FF0094 ;
 			font-family: sans-serif;
 			font-size: 20px;
 		}

 		::placeholder {
		  color: #FF0094;
		}


 		.icon{
 			font-size: 25px;
 			padding: 5px;
 			color: #FF0094;
 			padding-right: 2.5px;

 		}

 		.login-btn{
 			border-radius: 5px;
 			background: #FF0094;
 			border: none;
 			color: white;
 			width: 30%;
 		}

 		.login-btn:hover{
 			cursor: pointer;
 			background: #EF7F9B;
 			width: 40%;
 		}

 		hr{
 			border-color: #EF7F9B;
 			width: 50%;
 		}

 		a{
 			text-decoration: none;
 			color: #FF0094;
 			font-size: 16px;
 		}
 		


 	</style>
 </head>
 <body>
 	<div class="box" >
 			
 			<h1>Login</h1>
	 		<form method="post" autocomplete="off">
	 			<label><i class="fas fa-user icon"></i></label>
	 			<input type="text" name="name" placeholder="Enter username" required="" pattern="^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" title="username is 5-20 characters long, only include A-Z or a-z and 0-9"><br>
	 			<label><i class="fas fa-key icon"></i></label>
	 			<input type="password" name="pass" placeholder="Enter password" required=""><br>
	 			<input class="login-btn" type="submit" name="enter" value="Login">
	 			<hr>
	 			<a href="signup.php">Sign up now!</a>
	 		</form>
 		
 	</div>
 </body>
 </html>