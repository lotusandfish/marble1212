<?php 
include('inc/header.php');
$sql = "SELECT songID, songName, songImg, catName, audio, price,song.lastUpdated, album.albumName FROM song INNER JOIN album ON song.albumID = album.albumID ORDER BY catName DESC";
$query = mysqli_query($conn,$sql);

// Click Del icon
if(isset($_GET['del']) && $_GET['del'] != null){
	$id = $_GET['del'];
	$sql = "DELETE FROM song WHERE songID = $id";
	if($query = mysqli_query($conn, $sql)){

		

		function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 
		function_alert('Deleted success fully!');

		 header('location:songmn.php');
	}
}


			  
			

//Click Add
if(isset($_POST['add'])){
			$id = "";
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
			$sql= "INSERT INTO song VALUES ('$id','$songName','$lastUpdated','$albumID','$catName','$price','$songImg','$audio') ";
			if ($query = mysqli_query($conn, $sql)) {
				
				header("location:songmn.php");
				function function_alert($message) { 
      	    	// Display the alert box  
	    	    	echo "<script>alert('$message');</script>"; 
				} 
		        function_alert('Added! success fully!');

				
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
 
 <h1 style="text-align: center; color:#FF0094 ; margin-bottom: 25px; "> List of Songs</h1>
 <table style="color:#FF0094; background: #343A40;" class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Image</th>
		      <th scope="col">Name</th>
		      <th scope="col">Album</th>
		      <th scope="col">Category</th>
		      <th scope="col">Audio</th>
		      <th scope="col">Price</th>
		      <th scope="col">Last Updated</th>
		      <th style="text-align: center;" scope="col" colspan="2">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while ($item = mysqli_fetch_array($query)) { ?>
		  	
		  
		    <tr>
		      <th scope="row"><?= $item['songID'] ?></th>
		      <td><img style="width: 90px; height: 90px;" title="<?= $item['songName']  ?>" src="images/<?= $item['songImg'] ?>"></td>
		      <td><?= $item['songName'] ?></td>
		      <td><?= $item['albumName'] ?></td>
		      <td><?= $item['catName'] ?></td>
		      <td>
		      	<audio style="outline: none;" controls="">
		      		<source src="audio/<?= $item['audio'] ?>" type="audio/mp3">
		      	</audio>
		      </td>
		      <td><?= number_format($item['price'],2) ?> $</td>
		      <td><?= $item['lastUpdated'] ?></td>
		      <td style="text-align: center;"><a href="updatesong.php?edit=<?= $item['songID'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-edit"></i></span></a></td>
		      <td style="text-align: center;"><a href="songmn.php?del=<?= $item['songID'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-trash-alt"></i></span></a></td>
		    </tr>
		     <?php } ?>
		     <script type="text/javascript">
					//just play 1 audio
					$("audio").on("play", function() {
				    $("audio").not(this).each(function(index, audio) {
				        audio.pause()
				        audio.currentTime = 0;
				    });
					});
				</script>
		     
		    
		  </tbody>
		</table>
		<h2 style="text-align: center; color:#FF0094; ">----------------------------------------------------------------------------------------------------------------------</h2>
		<div style="margin: 20px;border: 1px solid gray; text-align: center; width: 50%; position: absolute; left: 50%; transform: translateX(-50%);">
			<h2 style="margin:20px; color:#FF0094; ">Add a new Song</h2>
			<form method="POST" enctype="multipart/form-data">
				<label>Song Name :</label>
				<input type="text" name="songName" required=""><br>
				<label>Song Image :</label>
				<input name="songImg" type="file"  ><br>
				<label>Song Audio :</label>
				<input name="audio" type="file" ><br>
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
				<input type="text" name="price" pattern="[0-9]+" title="please enter number only" max="999" min="0" required="required"><br>
 				<input style="width: 20%; margin: 10px;" type="submit" name="add" value="Add Song">
			</form>
		</div>
