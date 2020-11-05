<?php 
include('inc/header.php');
function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 

if(isset($_POST['save'])){
			$id = $_GET['edit'];
			$authName = $_POST['authName'];
			$Des = $_POST['authDes'];
			$lastUpdated = date("Y-m-d"); 
						
			$sql = "UPDATE author SET authName= '$authName' ,authDes ='$Des', lastUpdated = '$lastUpdated' WHERE authID = '$id'";
			if ($query = mysqli_query($conn, $sql)) {
				
				function_alert("Updated success fully!"); 
				header("location:authmn.php");
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
			<h2 style="margin:20px; color:#FF0094; ">Update Author</h2>
			<form method="POST">
				<?php 
					$id = $_GET['edit'];
					$sql = "SELECT * FROM author WHERE authID = '$id' ";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($query)
				 ?>
				<label>Auth Name :</label>
				<input type="text" name="authName" required="" value="<?= $row['authName'] ?>"><br>
				<label>Description :</label>
				<input type="text" name="authDes" required="" value="<?= $row['authDes'] ?>"><br>
				<input style="width: 20%; margin: 10px;" type="submit" name="save">
				<input style="width: 20%; margin: 10px;" type="button" value="Back" onClick="document.location.href='authmn.php';">
			</form>
		</div>

