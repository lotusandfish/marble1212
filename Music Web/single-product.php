<?php 
include('inc/connect.php');
include('inc/header.php');
function makeUrl($str) {

    $str = str_replace(" ", "-", $str);
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);

    $str = strtolower($str);
  
    
    return $str;
}
$id = "";
if(isset($_GET['id'])){
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
 			<img class="rotate" style="width: 230px; height: 230px; border-radius: 50%;" src="admin/images/<?php echo $row['songImg']?>">
 			
 			<div style="margin-top: 10px;">
 				<audio controls autoplay="autoplay" loop="" controlsList="nodownload" ontimeupdate="myAudio(this)" style="outline: none; width: 25%;">
 					<source src="admin/audio/<?php echo $row['audio'] ?>" type="audio/mp3">
 				</audio>
 				<script type="text/javascript">
 					function myAudio(event) {
 						if(event.currentTime>90){
 							event.pause();
 							event.currentTime = 0;
 							alert("Please Sign In to continue!");
 						}
 					}
 				</script>
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

 			<div class="col-sm-6 col-md-3" style="top: 10px;">
 				<div class="card bg-dark " style="margin: 10px;">
            <img class="center" src="admin/images/<?php echo $row2['songImg'] ?>" class="card-img-top" style ="height: 330px; width: 320px;">
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
              <button style="background:#EF7F9B; outline: none; border:none; border-radius: 5px;" type="button" class="btn-btn-default" onclick='document.location.href="genres/<?=makeUrl($row2['catName'])?>/<?=$row2['songID']?>/<?=makeUrl($row2['songName'])?>.html"'>
                <span><i class="fas fa-play" style="padding: 5px;"></i></span>Play Now
              </button>
            </div>
          </div>
 			</div>
 		<?php } ?>
 		</div>
 	</div>
 </div>