<?php

session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name="movieDB";
$conn = mysqli_connect($server_name,$username,$password,$database_name);
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
  <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&Montserrat:wght@900&display=swap" rel="stylesheet">

  <style media="screen">
    body{
      background-color: #E26A2C;
    }
    h1 span{

      color: #2D46B9;
      font-weight: bold;
      background-color: #E8F6EF;
    }
    table{
      border: 1px solid black;
      width: 30%;
    }
    td {
      border: 2px solid black;
      font-family: 'Readex Pro', sans-serif;
      font-weight: bold;
      font-size: 18px;
    }
    tr:nth-child(even) {
      background-color: #FFC4E1;
    }

    tr:nth-child(odd) {
      background-color: rgba(150, 212, 212, 0.4);
    }
  </style>
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
  echo "<center>";
  echo "<h1><span>&emsp; Your Movie Booking History &emsp;</span></h1><br><br>";
  echo "</center>";
  $eq = 1;
  $queryy_hist = "SELECT * FROM bookingdetails natural join moviedetails WHERE custId =".strval($_SESSION['custId']);
  $resultt1 = mysqli_query($conn,$queryy_hist);
  if (mysqli_num_rows($resultt1) > 0) {
    while($row = mysqli_fetch_assoc($resultt1))
    {
        echo "<center><br />";
        echo "<h2 style='color: #FFCC1D;font-weight: bold;font-family: \"Readex Pro\", sans-serif;'>Booking ".$eq."</h2>";
  ?>

        <table align="center" cellspacing="5" cellpadding="15" border = "2" style="background-color: yellow;">
          <tr>
            <td>Booking Id</td>
            <td>
              <?php
                  #$_SESSION['bid_del'] = $row['bookingId'];
                  echo $row['bookingId'];
              ?>
            </td>
          </tr>
          <tr>
            <td>Movie Name</td>
            <td>
              <?php
                  echo $row['movieName'];
              ?>
            </td>
          </tr>
          <tr>
            <td>Screen No</td>
            <td>
              <?php
                  #$_SESSION['scno_del'] = $row['screenNo'];
                  echo $row['screenNo'];
              ?>
            </td>
          </tr>
          <tr>
            <td>Show Timing</td>
            <td>
              <?php
              #$_SESSION['showTime_del'] = $row['showTime'];
              if(strcmp($row['showTime'],"Show1")==0)
               echo "10 AM - 1 PM";
              else if(strcmp($row['showTime'],"Show2")==0)
                echo "2 PM - 5 PM";
              else if(strcmp($row['showTime'],"Show3")==0)
                 echo "6 PM - 9 PM";
              else if(strcmp($row['showTime'],"Show4")==0)
                  echo "10 PM - 1 AM";
              ?>
            </td>
          </tr>
          <tr>
            <td>Seats Booked</td>
            <td>
              <?php
                  $_SESSION['snos_del'] = $row['seatNos'];
                  echo $row['seatNos'];
              ?>
            </td>
          </tr>

          <tr>
            <td colspan="2" >
              <center>
              <form action="del_booking.php" method="post">
                <input type='hidden' name = 'del_if_id' value = "<?php echo $row['bookingId']?>" >
                <input type='hidden' name = 'scno_del_1' value = "<?php echo $row['screenNo']?>" >
                <input type='hidden' name = 'showTime_del_1' value = "<?php echo $row['showTime']?>" >
                <input type="submit" class="btn btn-dark" name="delbook" value="Delete Booking">
              </form>
            </center>
            </td>
          </tr>

        </table>
      </center>

<?php
    echo "<br />";
    $eq++;
    }
  }
?>
</body>
</html>
