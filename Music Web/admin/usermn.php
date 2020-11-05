<?php 
include('inc/header.php');

$sql12 = "SELECT * FROM user";
$query12 = mysqli_query($conn,$sql12);

function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 



// Click Del icon
if(isset($_GET['del']) && $_GET['del'] != null){
	$id = $_GET['del'];
	$sql = "DELETE FROM user WHERE username = '$id'";
	if($query = mysqli_query($conn, $sql)){
		function_alert('Deleted success fully!'); 
		header('location:usermn.php');
		
	}
}

if(isset($_POST['add'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$mail = $_POST['mail'];
			$role = $_POST['role'];
			$lastUpdated = date("Y-m-d"); 			
			$sql= "INSERT INTO user VALUES ('$username','$password','$name','$address','$phone','$mail','$role','$lastUpdated')";
			if ($query = mysqli_query($conn, $sql)) {
				
				function_alert("Added success fully!"); 
				header("location:usermn.php");
			}
			else{
				echo '<script language="javascript">mysqli_error($conn)</script>';
			}
}

 ?>

 <style type="text/css">
 	input{
 		color:#FF0094;
 		background:#343A40;
 		border: none;
 		outline:none; 
 		width: 30%;

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
	
 </style>

 <h1 style="text-align: center; color:#FF0094 ; margin-bottom: 25px; "> List of Users</h1>
 <table style="color:#FF0094; background: #343A40;" class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">Username</th>
		      <th scope="col">Password</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Mail</th>
		      <th scope="col">Role</th>
		      <th scope="col">LastUpdated</th>
		      <th style="text-align: center;" scope="col" colspan="2">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while ($item = mysqli_fetch_array($query12)){ ?>
		    <tr>
		      <th scope="row"><?= $item['username'] ?></th>
		      <td><?= $item['password'] ?></td>
		      <td><?= $item['name'] ?></td>
		      <td><?= $item['address'] ?></td>
		      <td><?= $item['phone'] ?></td>
		      <td><?= $item['mail'] ?></td>
		      <td><?= $item['role'] ?></td>
		      <td><?= $item['lastUpdated'] ?></td>
		      <td style="text-align: center;"><a href="updateUser.php?edit=<?= $item['username'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-edit"></i></span></a></td>
		      <td style="text-align: center;"><a href="usermn.php?del=<?= $item['username'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-trash-alt"></i></span></a></td>
		    </tr>
		     <?php } ?>
		    
		    
		  </tbody>
</table>
		<h2 style="text-align: center; color:#FF0094; ">----------------------------------------------------------------------------------------------------------------------</h2>
		<div style="margin: 20px;border: 1px solid gray; text-align: center; width: 50%; position: absolute; left: 50%; transform: translateX(-50%);">
			<h2 style="margin:20px; color:#FF0094; ">Add a new User</h2>
			<form method="POST">
				<label>Username :</label>
				<input type="text" name="username" required="" pattern="^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$" title="username is 5-20 characters long, only include A-Z or a-z and 0-9"><br>
				<label>Password :</label>
				<input type="password" name="password" required=""><br>
				<label>Name :</label>
				<input type="text" name="name" required=""><br>
				<label>Address :</label>
				<input type="text" name="address" required=""><br>
				<label>Phone :</label>
				<input type="text" name="phone" required=""><br>
				<label>Mail :</label>
				<input type="email" name="mail" required=""><br>
				<label>Role :</label>
				<select name="role" style="width: 30%; color:#FF0094; background:#343A40;">
					<option value="guest">guest</option>
					<option value="admin">admin</option>
				</select><br>
				
				<input style="width: 20%; margin: 10px;" type="submit" name="add" value="Add User">
			</form>
		</div>

