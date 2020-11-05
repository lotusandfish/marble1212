<?php 

include('inc/connect.php');
include('inc/header.php');
$seek = "SELECT * FROM song";
$query = mysqli_query($conn,$seek);
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



?>

    <!-- Product List -->
    <div class="row">
      <div class="col-12">
        <div class="card" style="background:#343A40; color: #EF7F9B; ">
           <div class="card-header" style="text-align: center; font-family: sans-serif;"><span style="font-size: 25px; "><i style="padding: 8px;" class="fas fa-compact-disc"></i><strong>Songs</strong></span></div>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="text-align: center;">
      <div class="row">
        <?php 
            if( mysqli_num_rows($query) > 0 ){
            while($row = mysqli_fetch_array($query)){

         ?>
        <div class="col-sm-6 col-md-3" style="top: 10px;">
          <div class="card bg-dark " style="margin: 10px;">
            <img class="center" src="admin/images/<?php echo $row['songImg'] ?>" class="card-img-top" style ="height: 330px; width: 320px;">
            <div class="card-body">
              <h5 class="card-title bg-dark" style="color: #EF7F9B; height: 20px;"><?php echo $row['songName'] ?></h5>
            </div>
            
            <div class="card-body">
              <button style="background:#EF7F9B; outline: none; border:none; border-radius: 5px;" type="button" class="btn-btn-default" onclick='document.location.href="genres/<?=makeUrl($row['catName'])?>/<?=$row['songID']?>/<?=makeUrl($row['songName'])?>.html"'>
                <span><i class="fas fa-play" style="padding: 5px;"></i></span>Play Now
              </button>
            </div>
          </div>
        </div> 
        <?php 
            }
          }
              
         ?>             
      </div>
    </div>
  </div>
  <?php include('inc/footer.php'); ?>
  </body>
</html>