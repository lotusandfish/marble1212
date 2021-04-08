<?php 
ob_start(); // fix header();
include('inc/header.php');

$_SESSION['purchased'] = 0;

$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$_GET['customer']."'");
$row = mysqli_fetch_array($query);

if(isset($_POST['check-out'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$total_amount = $_SESSION['total_amount'];
	$pay = $_POST['pay'];
	$time = current_timestamp();
	
	$sql = "INSERT INTO order(customer_name, customer_address, total_price, date_modified, customer_phone, pay) VALUES('$name', '$address', '$total_amount', '$time', '$phone', '$pay') RETURNING orderid";
	$query = mysqli_query($conn, $sql);
	
	if($query){
		echo "Oke!";
	}
	else{
		$res1 = pg_get_result($query);
		echo pg_result_error($res1);
	}	
	
}


ob_flush();
?>

<script type="text/javascript">
  $(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode==73){        
             return false;
    }
});

$(document).on("contextmenu",function(e){        
   e.preventDefault();
});
</script>

<style type="text/css">
 	input{
 		color:#FF0094;
 		background:#343A40;
 		border: none;
 		outline:none; 
 		width: 70%;

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
	table{
		width: 100%;
	}
	td{
		color:#FF40DC;
	}
	textarea{
		width: 70%;
	}
</style>

<div class="row">
  	<div class="col-12">
 		<div class="card" style="background:#343A40; color: #EF7F9B; ">
           	<div class="card-header" style="text-align: center; font-family: sans-serif;">
           		<span style="font-size: 25px; ">
           			<i style="padding: 8px;" class="far fa-credit-card"></i>
           			<strong>Check Out</strong>
           		</span>
           	</div>
        </div>
 	</div> 
</div>
<div style="width: 100%;">
	<div style="width: 50%; margin-left: 25%; ">
	
	<form style="margin: 30px; " method="post">
		<table>
		    <tr>
		      <td align="right">Account Name :</td>
		      <td align="left"><input type="text" readonly="" name="name" value="<?= $_GET['customer'] ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Customer Name :</td>
		      <td align="left"><input type="text" readonly="" name="name" value="<?= $row['name'] ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Address :</td>
		      <td align="left"><input type="text" readonly="" name="address" value="<?= $row['address'] ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Phone :</td>
		      <td align="left"><input type="text" readonly="" name="phone" value="<?= $row['phone'] ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Mail :</td>
		      <td align="left"><input type="text" readonly="" name="mail" value="<?= $row['mail'] ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Total Amount ($) :</td>
		      <td align="left"><input type="text" name="total_amount" readonly="" value="<?= $_SESSION['total_amount']  ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Note :</td>
		      <td align="left"><textarea style="background:#343A40; color: #EF7F9B; outline: none;" name="note" rows="4" cols="50"></textarea></td>
		    </tr>
		    <tr>
		      <td align="right">Payment Methods :</td>
		      <td align="left">
		      	<select style="background:#343A40; color: #EF7F9B; outline: none;" name="pay">
					<option value="ATM TP-Bank">ATM TP-Bank</option>
					<option value="Master Card">Master Card</option>
					<option value="Visa">Visa</option>
				</select>
				<input style="width: 20%;margin-left: 30%;"  type="submit" name="check-out" value="Confirm">
			 </td>
		    </tr>

  		</table>
		
		
	</form>
</div>
</div>













<?php include('inc/footer.php') ?>
