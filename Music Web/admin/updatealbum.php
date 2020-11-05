<?php 
include('inc/header.php');

function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 

if(isset($_POST['save'])){
			$id = $_GET['edit'];
			$albumName = $_POST['albumName'];
			$lastUpdated = date("Y-m-d"); 
			$authID = $_POST['authID'];
			
			$sql = "UPDATE album SET albumName ='$albumName', lastUpdated = '$lastUpdated', authID = '$authID' WHERE albumID = $id";
			if ($query = mysqli_query($conn, $sql)) {
				
				function_alert("Updated success fully!"); 
				header("location:albummn.php");
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
	input:hover[type="button"] 
		{
			background: #89CFF0;
		}


 </style>

 <div style="margin: 20px;border: 1px solid gray; text-align: center; width: 50%; position: absolute; left: 50%; transform: translateX(-50%);">
			<h2 style="margin:20px; color:#FF0094; ">Update Album</h2>
			<form method="POST">
				<?php 
					$id = $_GET['edit'];
					$sql = "SELECT * FROM album WHERE albumID = $id ";
					$query = mysqli_query($conn,$sql);
					$row = mysqli_fetch_array($query)
				 ?>
				<label>Album Name :</label>
				<input type="text" name="albumName" required="" value="<?= $row['albumName'] ?>"><br>
				<label>Author :</label>
				<select name="authID" style="width: 30%; color:#FF0094; background:#343A40; ">

					<?php 
						$sql1 = "SELECT * FROM author";
						$query1 = mysqli_query($conn, $sql1);
						
						while($option = mysqli_fetch_array($query1)){
					 ?>
					<option value="<?= $option['authID'] ?>"><?= $option['authName'] ?></option>
					<?php } ?>
				</select><br>
				
				<input style="width: 20%; margin: 10px;" type="submit" name="save" value="Save">
				<input style="width: 20%; margin: 10px;" type="button" value="Back" onClick="document.location.href='albummn.php';">

			</form>
		</div>