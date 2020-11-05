<?php 
include('inc/connect.php');
include('inc/header.php');

$id = "";
if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$sql = "SELECT * FROM song WHERE songID= $id";
	$query = mysqli_query($conn, $sql);

}

 ?>
 <style type="text/css">
 	.rotate {
  		animation: rotation 10s infinite linear;
	 }

	@keyframes rotation {
	  from {
	    transform: rotate(0deg);
	  }
	  to {
	    transform: rotate(359deg);
	  }
	}

	audio::-webkit-media-controls-play-button,
	audio::-webkit-media-controls-panel {
	     	background-color: #FF55B7;
	     	color: white;
	     }

 </style>
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
 <div class="row">
 	<div class="col-12" style="top: 30px; text-align: center;">
 		<?php if($row = mysqli_fetch_array($query)){ ?>
 			<h2 style="color:#FF0094; font-family: sans-serif;">Playing: <span style="color: #FF55B7"><?php echo $row['songName'] ?></span></h2>
 			<h3 style="color:#FF0094; font-family: sans-serif;">
 				Genre: <span style="color: #FF55B7"><?php echo $row['catName'] ?></span> 
 			</h3>
 			<h4 style="color:#FF0094; font-family: sans-serif;">
 				<i class="fas fa-upload" style="color:#EF7F9B; padding: 10px;"></i><span style="color: #FF55B7" ><?php echo $row['lastUpdated'] ?></span>
 			</h4>
 			<img class="rotate" style="width: 230px; height: 230px; border-radius: 50%;" src="../admin/images/<?php echo $row['songImg']?>">
 			
 			<div style="margin-top: 10px;">
 				<audio  controls autoplay="autoplay" loop="" controlsList="nodownload" style="outline: none; width: 25%;">
 					<source src="../admin/audio/<?php echo $row['audio'] ?>" type="audio/mp3">
 				</audio>
 			</div>
      <div>
        <form action="music-shopping-cart.html" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <label style="font-family: sans-serif; font-size: 18px; color:#EF7F9B;">Quantity:   </label>
          <input type="text" name="sl" value="1" readonly="">
          <button type="submit" style="margin-top: 8px; background: #FF8DCF; border: none; border-radius: 10px;"><i class="fas fa-cart-plus" style="padding:8px;"></i>Add to Cart</button>
      </form>
      </div>
 			

 		<?php } ?>
 	</div>

 	<div class="container-fluid" style="text-align: center; margin-top: 50px;">
 		<div class="row">
 			<div class="col-12">
 				<div class="card" style="background:#343A40; color: #EF7F9B; ">
           			<div class="card-header" style="text-align: center; font-family: sans-serif;">
           				<span style="font-size: 25px; "><i style="padding: 8px;" class="far fa-lightbulb"></i><strong>Relevant</strong></span>
           			</div>
        		</div>
 			</div>
 			<?php 
 				$cat = $row['catName'];
 				$sql2 = "SELECT * FROM song WHERE catName = '$cat'";
 				$query2 = mysqli_query($conn, $sql2);
 				while($row2= mysqli_fetch_array($query2)){
 			?>

 			<div class="col-sm-4 col-md-3" style="top: 10px;">
 				<div class="card bg-dark " style="margin: 10px;">
            <img class="center" src="../admin/images/<?php echo $row2['songImg'] ?>" class="card-img-top" style ="height: 330px; width: 320px;">
            <div class="card-body">
              <h5 class="card-title bg-dark" style="color: #EF7F9B; height: 20px;"><?php echo $row2['songName'] ?></h5>
            </div>
            <!-- list -->
            <!-- <ul class="list-group list-group-flush">
              <li class="list-group-item" style="background:#343A40; color: #EF7F9B; ">Album: <?php  ?></li>
              <li class="list-group-item" style="background:#343A40; color: #EF7F9B";><i class="far fa-clock" style="color:#EF7F9B; padding: 10px;"></i><?php  ?></li>
              <li class="list-group-item" style="background:#343A40; color: #EF7F9B";><i class="fas fa-upload" style="color:#EF7F9B; padding: 10px;"></i><?php  ?></li>
            </ul> -->
            <!-- end list -->
            <div class="card-body">
              <button style="background:#EF7F9B; outline: none; border:none; border-radius: 5px;" type="button" class="btn-btn-default" onclick="document.location.href='single-product.php?id=<?php echo $row2['songID'] ?>'">
                <span><i class="fas fa-play" style="padding: 5px;"></i></span>Play Now
              </button>
            </div>
          </div>
 			</div>
 		<?php } ?>
 		</div>
 	</div>
 </div>