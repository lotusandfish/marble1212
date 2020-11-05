<?php 
include('inc/header.php');

function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 
// WHen click Save
if(isset($_POST['save'])){
			$id = $_GET['edit'];
			

			$songName = $_POST['songName'];
			$lastUpdated = date("Y-m-d"); 
			$price = $_POST['price'];
			$catName = $_POST['catName'];
			$albumID = $_POST['albumID'];
			$file1 = $_FILES['songImg'];
			$songImg = $file1['name'];
			$file2 = $_FILES['audio'];
			$audio = $file2['name'];
			move_uploaded_file($file1['tmp_name'], "images/".$songImg);
			move_uploaded_file($file2['tmp_name'], "audio/".$audio);
			$sql = "UPDATE song SET songName ='$songName', lastUpdated = '$lastUpdated', albumID = '$albumID', catName = '$catName', price = '$price', songImg = '$songImg', audio = '$audio' WHERE songID = $id";
			if ($query = mysqli_query($conn, $sql)) {
				
				function_alert("Updated success fully!"); 
				header("location:songmn.php");
			}
			else{
				echo '<script language="javascript">mysqli_error($conn);</script>';
			}
}


 ?>

 <style type="text/css">
 	label{
 		color: #FF40DC;
 	}
 	input{
 		color:#FF0094;
 		background:#343A40;
 		border: none;
 		outline:none; 
 		width: 30%;

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
			<h2 style="margin:20px; color:#FF0094; ">Update Song</h2>
			<form method="POST" enctype="multipart/form-data">
				<?php 
						$id = $_GET['edit'];
						$sql3 = "SELECT * FROM song WHERE songID=$id ";
						$query3 = mysqli_query($conn, $sql3); 
						if($row = mysqli_fetch_array($query3)){
				?>
				<label>Song Name :</label>
				<input type="text" name="songName" required="" value="<?= $row['songName'] ?>"><br>
				<label>Song Image :</label>
				<input name="songImg" type="file" required=""><br>
				<label>Song Audio :</label>
				<input name="audio" type="file" required=""><br>
				<label>Category :</label>
				<select name="catName" style="width: 30%; color:#FF0094; background:#343A40; ">
					<?php 
						

						$sql1 = "SELECT * FROM category ORDER BY catName DESC";
						$query1 = mysqli_query($conn, $sql1);

						$sql2 = "SELECT * FROM album";
						$query2 = mysqli_query($conn, $sql2); 

						
						while($option = mysqli_fetch_array($query1)){
					 ?>
					<option value="<?= $option['catName'] ?>"><?= $option['catName'] ?></option>
					<?php } ?>
				</select><br>
				<label>Album :</label>
				<select name="albumID" style="width: 30%; color:#FF0094; background:#343A40;">
					<?php while($option2 = mysqli_fetch_array($query2)){ ?>
					<option value="<?= $option2['albumID'] ?>"><?= $option2['albumName'] ?></option>
					<?php } ?>
				</select><br>
				<label>Price :</label>
				
				<input type="text" name="price" pattern="[0-9]+" title="please enter number only" max="999" min="0" required="required" value="<?= $row['price'] ?>"><br>
				<?php } ?>
 				<input style="width: 20%; margin: 10px;" type="submit" name="save" value="SAVE">
 				<input style="width: 20%; margin: 10px;" type="button" value="Back" onClick="document.location.href='songmn.php';">


			</form>
		</div>

