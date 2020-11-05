<?php
ob_start(); // fix header();

include('inc/connect.php');
include('inc/header.php');


$totalAmount = 0;

if($_SESSION['purchased'] == 0){
	header('location:index.php');
}

if(isset($_GET['del'])){
	unset($_SESSION['cart'][$_GET['del']]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  $id = $_REQUEST['id'];
	  $q = mysqli_query($conn, "SELECT * FROM song WHERE songID = $id");
	  $product = mysqli_fetch_array($q);
	  $_SESSION['cart'][$id] = $product;
	  $_SESSION['cart'][$id]['sl'] = 1;                 
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
	.row{
			text-align: center;
		}
		audio::-webkit-media-controls-play-button,
	     audio::-webkit-media-controls-panel {
	     background-color: #FF0094;
	     color: white;
	     }
	.cart-empty{
		text-align: center;
		color: #FF0094;
		width: 100%;
	}
</style>

<div class="row">
  	<div class="col-12">
 		<div class="card" style="background:#343A40; color: #EF7F9B; ">
           	<div class="card-header" style="text-align: center; font-family: sans-serif;">
           		<span style="font-size: 25px; ">
           			<i style="padding: 8px;" class="far fa-file-audio"></i>
           			<strong>Your Song</strong>
           		</span>
       		</div>
        </div>
 	</div> 
</div>
<div class="row">
	
        
        <table style="color:#FF0094; background: #343A40; border-color: black;" class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Image</th>
		      <th scope="col">Name</th>
		      <th scope="col">Category</th>
		      <th scope="col">Audio</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 

			    if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
			      
			      	foreach($_SESSION['cart'] as $item){
			      		
		    ?>
		    <tr>
			      <th scope="row"><?= $item['songID'] ?></th>
			      <td><img style="width: 100px; height: 100px;" src="../admin/images/<?= $item['songImg'] ?>"></td>
			      <td><?= $item['songName'] ?></td>
			      <td><?= $item['catName'] ?></td>
			      <td>
			      	<audio style="outline: none;" controls="" controlsList="nodownload">
			      	<source src="../admin/audio/<?= $item['audio']  ?>" type="audio/mp3">
			      	</audio>
			      </td>
			  
			  	 <td><i class="fas fa-file-download"></i><a href="audio/<?= $item['audio']  ?>" download> Download</a></td>
			  	 <?php }

			  } ?>
		    </tr>
		    <tr  style=" font-size: 20px;">
		    	<td colspan="6" style="text-align: center;"><a href="index.php">Buy More Song!</a></td>
		    </tr>
		  </tbody>
		</table>

		<script type="text/javascript">
					//only play 1 audio tag in the sample
					$("audio").on("play", function() {
					    $("audio").not(this).each(function(index, audio) {
					        audio.pause()
					        audio.currentTime = 0;
					    });
					});
		</script>

           


        
</div>

<?php include('inc/footer.php'); ?>

 
