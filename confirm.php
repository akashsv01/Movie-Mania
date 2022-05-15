<?php

session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name="movieDB";
$conn = mysqli_connect($server_name,$username,$password,$database_name);
$selected_seats = array();
?>
<!DOCTYPE html>
<head>

  <meta charset="utf-8">
  <title>Movie Mania</title>
  <link rel="stylesheet" href="user-home-page-styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style media="screen">
    body{
      background-color: #E26A2C;
    }
    table{
      border: 1px solid black;
      width: 35%;
    }
    td {
      border: 2px solid black;
      font-family: 'Readex Pro', sans-serif;
      font-weight: bold;
      font-size: 18px;
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

<?php
if(isset($_POST['confirm1']))
{
  $ctr = 1;
  //$ctrr = 1;
    while($ctr <=30){
      //echo $var;
      if(isset($_POST[$ctr])){
        // echo "<h3>$ctr</h3>";
        array_push($selected_seats,$ctr);
      }
      $ctr++;
    }
    $no_of_seats = count($selected_seats);
    $_SESSION['selSea'] = $selected_seats;
?>
  <br>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <table id="confirmpay" align = 'center' cellspacing = '1' border = '2' cellpadding = '15' style="background-color : #DADDFC;">
  <?php
  $queryy_movieName = "SELECT movieName FROM moviedetails WHERE movieId = ".strval($_SESSION['moid']);
  $resultt = mysqli_query($conn,$queryy_movieName);
  ?>
  <?php echo "<tr><td colspan='2' align = 'center' >"?>
    <img src=<?php echo 'imagesOld/movie'.$_SESSION['moid'].'.png'?> height="500" width="400"/></td></tr>
  <?php
  echo "<tr><td style='text-align : center; color: #344CB7;'>MovieName</td><td style='text-align : center;'>".mysqli_fetch_assoc($resultt)['movieName']."</td></tr>";
  echo "<tr><td style='text-align : center; color: #344CB7;'>Show Time</td><td style='text-align : center;'>"?>
  <?php
    if(strcmp($_SESSION['slot'],"Show1")==0)
     echo "10 AM - 1 PM";
    else if(strcmp($_SESSION['slot'],"Show2")==0)
      echo "2 PM - 5 PM";
    else if(strcmp($_SESSION['slot'],"Show3")==0)
       echo "6 PM - 9 PM";
    else if(strcmp($_SESSION['slot'],"Show4")==0)
        echo "10 PM - 1 AM";
    ?>
    <?php
    "</td></tr>";
  echo "<tr><td style='text-align : center; color: #344CB7;'>Screen No</td><td style='text-align : center;'>".$_SESSION['scno']."</td></tr>";
  echo "<tr><td style='text-align : center; color: #344CB7;'>Seats</td><td style='text-align : center;'>";
  for($x = 0;$x < $no_of_seats;$x++){
    if($x != 0)
      echo ",".$selected_seats[$x];
    else
      echo $selected_seats[$x];
  }
  echo "</td></tr>";
  echo "<tr><td colspan = '2' align = 'center'>";
  echo "<input type = 'submit' class='btn btn-danger' value = 'Confirm & Proceed To Pay' name = 'pay'>
        </form></td></tr>
        </table>";
  //echo $no_of_seats;
}
if(isset($_POST['pay'])){
  $selected_seatss = $_SESSION['selSea'];
  $no_of_seats = count($selected_seatss);
  //echo $no_of_seats;
  $v1 = $v2 = $sno = $cid = $mid = 0;
  $v3 = "";
  $seatnos = "";
  for($x = 0;$x < $no_of_seats;$x++)
  {
    $v1 = $_SESSION['scno'];
    $v2 = $_SESSION['slot'];
    if(strcmp($v2,"Show1")==0)
     $v3 = "10 AM - 1 PM";
    else if(strcmp($v2,"Show2")==0)
     $v3 = "2 PM - 5 PM";
    else if(strcmp($v2,"Show3")==0)
     $v3 = "6 PM - 9 PM";
    else
     {
       $v3 = "10 PM - 1 AM";
     }
    $sno = $selected_seatss[$x];
    if($x != 0)
      $seatnos = $seatnos."/".$sno;
    else
      $seatnos = $seatnos.$sno;
    $queryy_usedSeat = "INSERT INTO usedseats (screenNo,showTime,bookedSeat) values ('$v1','$v2','$sno');";
    $resultt = mysqli_query($conn,$queryy_usedSeat);
    //echo "Value inserted<br>";
  }
  $cid = $_SESSION['custId'];
  $mid = $_SESSION['moid'];
  //echo $cid,$mid,$v2,$v1,$seatnos;
  $queryy_book = "INSERT INTO bookingdetails (custId,movieid,showTime,screenNo,seatNos) values ('$cid','$mid','$v2','$v1','$seatnos');";
  $result2 = mysqli_query($conn,$queryy_book);
  //echo "payment accepted";
  //echo "<div class = 'loader'></div>";
  //header('location:userIndex.php');
  $queryy_movieName = "SELECT movieName FROM moviedetails WHERE movieId = ".strval($_SESSION['moid']);
  $resultt1 = mysqli_query($conn,$queryy_movieName);
  echo "<br /><br /><table align = 'center' cellspacing = '1' border = '2' cellpadding = '15' style='background-color : #DADDFC;'>";
  echo "<tr style='background-color: #577BC1;' ><td colspan='2' align = 'center' style='color: #F3950D;'><strong>CONFIRMED MOVIE DETAILS</strong></td></tr>";
  echo "<tr><td colspan='2' align = 'center' >";
  ?>
  <img src=<?php echo 'imagesOld/movie'.$mid.'.png'?> height="500" width="400"/></td></tr>
  <?php
  echo "<tr><td>MovieName</td><td>".mysqli_fetch_assoc($resultt1)['movieName']."</td></tr>";
  echo "<tr><td>Show Time</td><td>".$v3."</td></tr>";
  echo "<tr><td>Screen No</td><td>".$_SESSION['scno']."</td></tr>";
  echo "<tr><td>Seats</td><td>";
  for($x = 0;$x < $no_of_seats;$x++){
    if($x != 0)
      echo ",".$selected_seatss[$x];
    else
      echo $selected_seatss[$x];
    }
  $totprice = $no_of_seats*150;
  echo "</td></tr>";
  echo "<tr><td>Total Price</td><td>";
  echo "₹".$totprice;
  echo "</td></tr>";
  echo "<tr><td colspan = '2' align = 'center' style='border: none;'><a href = 'userIndex.php'><input type = 'button' class='btn btn-success' value = 'Woohoo!'></a></td></tr>";
  echo "<tr><td colspan = '2' align = 'center' style='border: none;'><button class='btn btn-danger' onclick='window.print()'>Print</button></td></tr></table><br /><br />";

}
?>

</body>
</html>
