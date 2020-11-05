<?php 

if(isset($_POST['signup'])){
	include("inc/connect.php");
	$user = $_POST['name'];
	$pass = $_POST['pass'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$role = "guest";
	$lastUpdated = date("Y-m-d");

	$sql = "INSERT INTO user(username,password,name,address,phone,mail,role,lastUpdated) VALUES ('$user' , '$pass' , '$name', '$address', '$phone','$email' , '$role' , '$lastUpdated')";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo '<script type="text/javascript">alert("Sign Up successfully!Redirect to Login Page in 3 second");</script>';
		header( "refresh:1;url='login.php'" );

	}
	else{
	  echo mysqli_error($conn);
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
 			width: 70%;
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
 	<script type="text/javascript">
  $(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode==73){        
             return false;
    }
});

$(document).on("contextmenu",function(e){        
   e.preventDefault();
});
</script>
 	<div class="box" >
 			
 			<h1>Sign Up</h1>
	 		<form method="post" autocomplete="off">
	 			<label><i class="fas fa-user icon"></i></label>
	 			<input type="text" name="name" placeholder="Enter username" required="" pattern="^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" title="username is 5-20 characters long, only include A-Z or a-z and 0-9"><br>
	 			<label><i class="fas fa-key icon"></i></label>
	 			<input type="password" name="pass" placeholder="Enter password" required="" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,20}$" title="password is 5-20 characters long, contains at least 1 Upercase, 1 Lowercase and 1 Number"><br>
	 			<label><i class="fas fa-user-tag icon"></i></label>
	 			<input type="text" name="name" placeholder="Enter your name" required=""><br>
	 			<label><i class="fas fa-map-marked-alt icon"></i></label>
	 			<input type="text" name="address" required="" placeholder="Enter your address"><br>
	 			<label><i class="fas fa-mobile icon"></i></label>
	 			<input type="text" name="phone" pattern="(09|01[2|6|8|9])+([0-9]{8})" required="" placeholder="Enter your phone number"><br>
	 			<label><i class="fas fa-envelope icon"></i></label>
	 			<input type="email" name="email" placeholder="Enter email"><br>

	 			<input class="login-btn" type="submit" name="signup" value="Sign Up">
	 			<hr>
	 			<a href="login.php">Sign In!</a>
	 		</form>
 		
 	</div>
 </body>
 </html>