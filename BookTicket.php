<?php

session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name="movieDB";
$conn = mysqli_connect($server_name,$username,$password,$database_name);
?>

<!DOCTYPE html>
<head>

      <meta charset="utf-8">
      <title>Movie Mania</title>
      <link rel="stylesheet" href="user-home-page-styles.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

      <style>
          body{
            background-color: #E26A2C;
          }
          h3{
            display:inline;
          }
          .c1{
            color:red;
          }
          .c2{
            color:green;
          }
          table{
            text-align: center;
          }
          td {
            border: 2px solid black;
            font-family: 'Readex Pro', sans-serif;
            font-weight: bold;
            font-size: 18px;
          }
          h1 span{

            color: #2D46B9;
            font-weight: bold;
            background-color: #E8F6EF;
          }
          h3 span{
            font-family: 'Roboto Slab', serif;
          }
        </style>

      <script src="https://kit.fontawesome.com/735f3849e9.js" crossorigin="anonymous"></script>

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&family=Readex+Pro:wght@300&Montserrat:wght@900&display=swap" rel="stylesheet">

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>

  <section class="container-fluid" id="title" style="height: 25vh;">

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

  <center>

  <h1><span>&emsp; Available Time Slots &emsp;</span></h1><br />

  </center>
<?php
if(!$conn)
{
  die("Connection Failed : " . mysqli_connect_error());
}
$moid = $_GET['ids'];
$queryy_showtimes = "SELECT screenNo,showTime FROM admincurrentmovies WHERE movieId = '$moid';";
$resultt = mysqli_query($conn,$queryy_showtimes);
if (mysqli_num_rows($resultt) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($resultt)) {
?>
  <center>
  <h3>
    <span>
      <?php
      if(strcmp($row['showTime'],"Show1")==0)
       echo "10 AM - 1 PM";
      else if(strcmp($row['showTime'],"Show2")==0)
        echo "2 PM - 5 PM";
      else if(strcmp($row['showTime'],"Show3")==0)
         echo "6 PM - 9 PM";
      else if(strcmp($row['showTime'],"Show4")==0)
          echo "10 PM - 1 AM";
      ?>&emsp;
    </span>
  </h3>
  <a href = "BookTicket.php?ids=<?php echo $moid?>&slot=<?php echo $row['showTime']?>&scno=<?php echo $row['screenNo']?>"><button type = "button" class="btn btn-dark" action = "">Book for this slot</button></a>
  <br><br>
  </center>
<?php

}
}

if(isset($_GET['slot'])){
  $usedSeats = array();
  $queryy_used_seats = "SELECT bookedSeat FROM usedseats WHERE screenNo = '$_GET[scno]' AND showTime = '$_GET[slot]';";
  $_SESSION['moid'] = $_GET['ids'];
  $_SESSION['slot'] = $_GET['slot'];
  $_SESSION['scno'] = $_GET['scno'];
  $result2 = mysqli_query($conn,$queryy_used_seats);
  if (mysqli_num_rows($result2) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result2)) {
      //echo 'seat --> '.$row['bookedSeat'].'<br>';
      array_push($usedSeats,$row['bookedSeat']);
}
}
$ctr = 1;
$v = 30-count($usedSeats);
echo "<br><br><h1 align = 'center'><span>&emsp; Available seats: ".$v." &emsp;</span></h1>";
?>
<table align = 'center' border='1' cellspacing = '2' cellpadding = '15' style="background-color: #DADDFC; width: 35%;">
  <form action = "confirm.php" method = "POST">
<?php
for ($x = 1; $x <= 6; $x++) {
  echo "<tr>";
  for ($y = 1; $y <= 5; $y++){
    if(in_array($ctr,$usedSeats)){
    echo "<td><h3 class = 'c1'>$ctr</h3></td>";
  }
    else{
    echo "<td><h3 class = 'c2'>$ctr</h3><br><input type = 'checkbox' name = '$ctr'</td>";
  }
  $ctr++;
  }
  echo "</tr>";
}
echo "<tr><td  colspan = '5' align = 'center'><input type = 'submit' class='btn btn-dark' value = 'Book Now' name = 'confirm1'></td></tr>";
echo "</form></table><br />";
}
// if(isset($_POST['confirm'])){
// $ctr = 1;
//   while($ctr <=30){
//     $var = 'S'.$ctr;
//     if(isset($_POST[$var])){
//       echo "<h3 class = 'c1'>$ctr</h3>";
//     }
//     $ctr++;
//   }
// }
?>

</body>
</html>
