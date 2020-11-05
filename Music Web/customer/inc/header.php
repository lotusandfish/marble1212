<?php 
session_start();
include('connect.php');

   


$sql="SELECT songID,songName, songImg, albumName, songDuration, song.lastUpdated FROM song INNER JOIN album ON song.albumID = album.albumID";
$query = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <base href="http://localhost/MUSIK/customer/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a48ea8ae22.js" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
    <style type="text/css">
      button:hover{
        cursor: pointer;
      }
      
      body{
        background: black;
      }
      .center{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
      }
     


    </style>
  </head>
  <body>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    <!-- Navigation Bar -->
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background: black;">
  <a class="navbar-brand" href="index.html" style="color:#FF0094;">
    <img src="http://www.clker.com/cliparts/Y/b/G/k/G/c/hot-pink-music-note-md.png" style="width:30px; height:30px;"  class="d-inline-block align-top">
    CisUm
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Albums <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a  class="nav-link" href="#"></a>
      </li>
    </ul>
    <div style="float: right; color:#FF0094; margin:10px; ">Welcome: <?php echo $_SESSION['NaMe'] ?></div>
    <form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search something...">
      <button style="background:#DF0094; color: white;" class="btn my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" class="col-12">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="width: 100%; height: 300px;" class="d-block " src="https://i0.wp.com/visionviral.com/wp-content/uploads/2020/09/Jack-Hoa-Hai-Duong-Official-Music-Video.jpg?fit=1280%2C720&ssl=1" alt="First slide">
    </div>
    <div class="carousel-item">
      <img style="width: 100%; height: 300px;" class="d-block " src="https://i.ytimg.com/vi/t-wBwTEp9TY/maxresdefault.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img style="width: 100%; height: 300px;" class="d-block " src="https://i.ytimg.com/vi/6O_OqFFQwf0/maxresdefault.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>