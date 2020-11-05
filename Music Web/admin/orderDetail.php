<?php 
include('inc/header.php');


if(isset($_GET['view'])){

	$id = $_GET['view'];
	$sql = "SELECT * FROM `orderdetail` WHERE orderID = $id";
	$query = mysqli_query($conn,$sql);

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


 <h1 style="text-align: center; color:#FF0094 ; margin-bottom: 25px; "> List of Orders</h1>
 <table style="color:#FF0094; background: #343A40;" class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="row">Order ID</th>
		      <th scope="col">Song Image</th>
		      <th scope="col">Song Name</th>
		      <th scope="col">Price</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while ($item = mysqli_fetch_array($query)){ ?>
		    <tr>
		      <th scope="row"><?= $item['orderID'] ?></th>
		      <td><img style="width: 90px; height: 90px;" src="images/<?= $item['songImg'] ?>"></td>
		      <td><?= $item['songName'] ?></td>
		      <td><?= number_format($item['price'],2) ?> $</td>
		    </tr>
		     <?php } ?>
		    
		    
		  </tbody>
</table>
		