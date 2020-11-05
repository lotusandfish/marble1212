<?php 
include('inc/connect.php');
include('inc/header.php');
$search ="";
if(!empty($_GET['s'])){
	$search = $_GET['s'];
	$sql = "SELECT * FROM song WHERE songName LIKE '%{$search}%' OR catName LIKE '%{$search}%'";
	$query = mysqli_query($conn, $sql);
	
}
else{
	echo mysqli_error($conn);
}




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
<div class="row">
      <div class="col-12">
        <div class="card" style="background:#343A40; color: #EF7F9B; ">
           <div class="card-header" style="text-align: center; font-family: sans-serif;"><span style="font-size: 25px; "><i style="padding: 8px;" class="far fa-lightbulb"></i><strong>Results for: <?php echo $search ?></strong></span></div>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="text-align: center;">
      <div class="row">
        <?php 
            while($row = mysqli_fetch_array($query)){
            

         ?>
        <div class="col-sm-6 col-md-3" style="top: 10px;">
          <div class="card bg-dark " style="margin: 10px;">
            <img class="center" src="images/<?php echo $row['songImg'] ?>" class="card-img-top" style ="height: 330px; width: 320px;">
            <div class="card-body">
              <h5 class="card-title bg-dark" style="color: #EF7F9B; height: 20px;"><?php echo $row['songName'] ?></h5>
            </div>
            <!-- list -->
            <!-- <ul class="list-group list-group-flush">
              <li class="list-group-item" style="background:#343A40; color: #EF7F9B; ">Album: <?php  ?></li>
              <li class="list-group-item" style="background:#343A40; color: #EF7F9B";><i class="far fa-clock" style="color:#EF7F9B; padding: 10px;"></i><?php  ?></li>
              <li class="list-group-item" style="background:#343A40; color: #EF7F9B";><i class="fas fa-upload" style="color:#EF7F9B; padding: 10px;"></i><?php  ?></li>
            </ul> -->
            <!-- end list -->
            <div class="card-body">
              <button style="background:#EF7F9B; outline: none; border:none; border-radius: 5px;" type="button" class="btn-btn-default" onclick="document.location.href='single-product.php?id=<?php echo $row['songID'] ?>'">
                <span><i class="fas fa-play" style="padding: 5px;"></i></span>Play Now
              </button>
            </div>
          </div>
        </div> 
        <?php 
            }
          
         ?>             
      </div>
    </div>
  </div>
