<?php 
include('inc/header.php');
function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 

$sql = "SELECT * FROM category";
$query = mysqli_query($conn,$sql);

if(isset($_GET['del']) && $_GET['del'] != null){
	$id = $_GET['del'];
	$sql = "DELETE FROM category WHERE category.catName = '$id'";
	if($query123 = mysqli_query($conn, $sql)){
		function_alert('Deleted success fully!'); 
		header('location:catemn.php');
		
	}
}

if(isset($_POST['add'])){
			$id = $_POST['catName'];
			$Des = $_POST['Des'];
			$lastUpdated = date("Y-m-d"); 
			
						
			$sql= "INSERT INTO category VALUES ('$id','$Des','$lastUpdated')";
			if ($query = mysqli_query($conn, $sql)) {
				
				function_alert("Added success fully!"); 
				header("location:catemn.php");
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

<h1 style="text-align: center; color:#FF0094 ; margin-bottom: 25px; "> List of Categories</h1>
 <table style="color:#FF0094; background: #343A40;" class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Description</th>
		      <th scope="col">LastUpdated</th>
		      <th style="text-align: center;" scope="col" colspan="2">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while ($item = mysqli_fetch_array($query)){ ?>
		    <tr>
		      <th scope="row"><?= $item['catName'] ?></th>
		      <td><?= $item['catDes'] ?></td>
		      <td><?= $item['lastUpdated'] ?></td>
		      <td style="text-align: center;"><a href="updateCate.php?edit=<?= $item['catName'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-edit"></i></span></a></td>
		      <td style="text-align: center;"><a href="catemn.php?del=<?= $item['catName'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-trash-alt"></i></span></a></td>
		    </tr>
		     <?php } ?>
		    
		    
		  </tbody>
</table>
		<h2 style="text-align: center; color:#FF0094; ">----------------------------------------------------------------------------------------------------------------------</h2>
		<div style="margin: 20px;border: 1px solid gray; text-align: center; width: 50%; position: absolute; left: 50%; transform: translateX(-50%);">
			<h2 style="margin:20px; color:#FF0094; ">Add a new Category</h2>
			<form method="POST">
				<label>Category Name :</label>
				<input type="text" name="catName" required=""><br>
				<label>Description :</label>
				<input type="text" name="Des" required=""><br>
				<input style="width: 20%; margin: 10px;" type="submit" name="add" value="Add Category">
			</form>
		</div>