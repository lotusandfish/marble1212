<?php 
include('inc/header.php');
function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 

if(isset($_POST['save'])){
			$id = $_GET['edit'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$mail = $_POST['mail'];
			$role = $_POST['role'];
			$lastUpdated = date("Y-m-d");
						
			$sql = "UPDATE user SET password ='$password', lastUpdated = '$lastUpdated', name='$name', address = '$address', phone = '$phone', mail = '$mail', role = '$role'  WHERE username = '$id'";
			if ($query = mysqli_query($conn, $sql)) {
				
				function_alert("Updated success fully!"); 
				header("location:usermn.php");
			}
			else{
				echo '<script language="javascript">mysqli_error($conn);</script>';
			}
}


 ?>
 <style type="text/css">
 	input{
 		color:#FF0094;
 		background:#343A40;
 		border: none;
 		outline:none; 
 		width: 35%;


 	}
 	label{
 		color: #FF40DC;
 	}
 	th, tr{
 		text-align: center;
 	}
 	input:hover[type="submit"] 
		{
			background: #B16CE3;
		}
	input:hover[type="button"] 
		{
			background: #89CFF0;
		}
 </style>
 <div style="margin: 20px;border: 1px solid gray; text-align: center; width: 50%; position: absolute; left: 50%; transform: translateX(-50%);">
			<h2 style="margin:20px; color:#FF0094; ">Update User</h2>
			<form method="POST">
				<?php 
					$id = $_GET['edit'];
					$sql = "SELECT * FROM user WHERE username = '$id' ";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($query)
				 ?>
				
				<input type="hidden" name="username" required="" pattern="^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" title="username is 5-20 characters long, only include A-Z or a-z and 0-9"><br>
				<label>Password :</label>
				<input type="password" name="password" required="" value="<?= $row['password'] ?>"><br>
				<label>Name :</label>
				<input type="text" name="name" required="" value="<?= $row['name'] ?>"><br>
				<label>Address :</label>
				<input type="text" name="address" required="" value="<?= $row['address'] ?>"><br>
				<label>Phone :</label>
				<input type="text" name="phone" required="" value="<?= $row['phone'] ?>"><br>
				<label>Mail :</label>
				<input type="email" name="mail" required="" value="<?= $row['mail'] ?>"><br>
				<label>Role :</label>
				<select name="role" style="width: 30%; color:#FF0094; background:#343A40;">
					<option value="guest">guest</option>
					<option value="admin">admin</option>
				</select><br>
				<input style="width: 20%; margin: 10px;" type="submit" name="save">
				<input style="width: 20%; margin: 10px;" type="button" value="Back" onClick="document.location.href='usermn.php';">
			</form>
		</div>