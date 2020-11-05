<?php 
include('inc/header.php');
function function_alert($message) { 
      	    	// Display the alert box  
	    	echo "<script>alert('$message');</script>"; 
			} 

$sql = "SELECT * FROM orders";
$query = mysqli_query($conn,$sql);

if(isset($_GET['del']) && $_GET['del'] != null){
	$id = $_GET['del'];
	$sql = "DELETE FROM orders WHERE orderID = '$id'";
	if($query = mysqli_query($conn, $sql)){
		function_alert('Deleted success fully!'); 
		header('location:ordermn.php');
		
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


 <h1 style="text-align: center; color:#FF0094 ; margin-bottom: 25px; "> List of Orders</h1>
 <table style="color:#FF0094; background: #343A40;" class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="row">ID</th>
		      <th scope="col">Username</th>
		      <th scope="col">Name</th>
		      <th scope="col">Adress</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Mail</th>
		      <th scope="col">Note</th>
		      <th scope="col">Toltal Amount</th>
		      <th scope="col">Payment Method</th>
		      <th scope="col">Order Date</th>
		      <th style="text-align: center;" scope="col" colspan="2">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php while ($item = mysqli_fetch_array($query)){ ?>
		    <tr>
		      <th scope="row"><?= $item['orderID'] ?></th>
		      <td><?= $item['username'] ?></td>
		      <td><?= $item['name'] ?></td>
		      <td><?= $item['address'] ?></td>
		      <td><?= $item['phone'] ?></td>
		      <td><?= $item['mail'] ?></td>
		      <td><?= $item['note'] ?></td>
		      <td><?= $item['total_amount'] ?> $</td>
		      <td><?= $item['payment_method'] ?></td>
		      <td><?= $item['orderDate'] ?></td>
		      <td style="text-align: center;"><a href="orderDetail.php?view=<?= $item['orderID'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-eye"></i></span></a>
		      </td>
		      <td style="text-align: center;"><a href="ordermn.php?del=<?= $item['orderID'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-trash-alt"></i></span></a>
		      </td>
		    </tr>
		     <?php } ?>
		    
		    
		  </tbody>
</table>
		