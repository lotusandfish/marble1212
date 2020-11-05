<?php 
include('inc/header.php');

$sql123 = "SELECT albumID, albumName, album.lastUpdated, author.authName FROM album INNER JOIN author WHERE album.authID = author.authID";
$query123 = mysqli_query($conn,$sql123);

function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 



// Click Del icon
if(isset($_GET['del']) && $_GET['del'] != null){
	$id = $_GET['del'];
	$sql = "DELETE FROM album WHERE albumID = $id";
	if($query = mysqli_query($conn, $sql)){
		function_alert('Deleted success fully!'); 
		header('location:albummn.php');
		
	}
}

if(isset($_POST['add'])){
			$id = "";
			$albumName = $_POST['albumName'];
			$lastUpdated = date("Y-m-d"); 
			$authID = $_POST['authID'];
						
			$sql= "INSERT INTO album VALUES ('$id','$albumName','$lastUpdated','$authID')";
			if ($query = mysqli_query($conn, $sql)) {
				
				function_alert("Added success fully!"); 
				header("location:albummn.php");
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

 <h1 style="text-align: center; color:#FF0094 ; margin-bottom: 25px; "> List of Albums</h1>
 <table style="color:#FF0094; background: #343A40;" class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Author</th>
		      <th scope="col">LastUpdated</th>
		      <th style="text-align: center;" scope="col" colspan="2">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while ($item = mysqli_fetch_array($query123)){ ?>
		    <tr>
		      <th scope="row"><?= $item['albumID'] ?></th>
		      <td><?= $item['albumName'] ?></td>
		      <td><?= $item['authName'] ?></td>
		      <td><?= $item['lastUpdated'] ?></td>
		      <td style="text-align: center;"><a href="updatealbum.php?edit=<?= $item['albumID'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-edit"></i></span></a></td>
		      <td style="text-align: center;"><a href="albummn.php?del=<?= $item['albumID'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-trash-alt"></i></span></a></td>
		    </tr>
		     <?php } ?>
		    
		    
		  </tbody>
</table>
		<h2 style="text-align: center; color:#FF0094; ">----------------------------------------------------------------------------------------------------------------------</h2>
		<div style="margin: 20px;border: 1px solid gray; text-align: center; width: 50%; position: absolute; left: 50%; transform: translateX(-50%);">
			<h2 style="margin:20px; color:#FF0094; ">Add a new Album</h2>
			<form method="POST">
				<label>Album Name :</label>
				<input type="text" name="albumName" required=""><br>
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
				
				<input style="width: 20%; margin: 10px;" type="submit" name="add" value="Add Album">
			</form>
		</div>
