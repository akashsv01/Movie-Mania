<?php

session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name="movieDB";
$conn = mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
  die("Connection Failed : " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Movie Mania</title>
  <link rel="stylesheet" href="user-home-page-styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/735f3849e9.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>

  <section class="container-fluid" id="title">

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="userIndex.php"><img src="imagesOld/movie_mania.png" height="18"> Movie Mania</a>

      <input id="search-input" type="search" id="form1" class="form-control w-25" />
      <button type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
      </button>



      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="userIndex.php" style="color: #E26A2C;"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="DispMovies.php" style="color: #E26A2C;"><b>Movies</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php" style="color: #E26A2C;"><b>Profile</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.php" style="color: #E26A2C;"><b>History</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" style="color: #E26A2C;"><b>About</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signout.php"><button class="btn btn-primary">SIGN OUT</button></a>
          </li>
        </ul>
      </div>

    </nav>
  </section>
  <section id="movies">

    <center>
      <h2 style="margin-bottom: 25px; color: #FCDEC0;">All Movies</h2>
      <div class="row">
<?php
$queryy = "SELECT DISTINCT(movieId),movieName,movieGenre FROM admincurrentmovies ac natural join moviedetails;";
$resultt = mysqli_query($conn,$queryy);
$url = "BookTicket.php?ids=";
$urlimg = "imagesOld/movie";
if (mysqli_num_rows($resultt) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($resultt)) {
  $presurl = $url.$row['movieId'];
  $presimgurl = $urlimg.$row['movieId'].'.png';
?>
<div class="col-lg-4">
  <a target="_blank" href="">
    <?php //echo $presimgurl;?>
  <img src="<?php echo $presimgurl?>" alt="Movie1" width="250" height="300">
</a><br>
  <em><b><?php echo $row['movieName'];?></b> </em><br>
  <em><b><?php echo $row['movieGenre'];?></b></em><br>
  <b>Rating :</b> ⭐⭐⭐⭐<br />
  <b>Votes : 10K</b><br>
  <a  href="<?php echo $presurl;?>"><button class="BookNow">Book Tickets</button></a>
  <br><br>
</div>
<?php
}
?>
</section>
<?php
}
?>
