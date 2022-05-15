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
<head>
  <meta charset="utf-8">
  <title>Movie Mania</title>
  <link rel="stylesheet" href="admin-page-styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/735f3849e9.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <style media="screen">
    input[type=checkbox]{
      transform : scale(1.5);
    }
  </style>
  </head>
  <body>
    <section class="container-fluid" id="title">

      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="admin.php"><img src="imagesOld/movie_mania.png" height="18"> Movie Mania</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="#navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="signout.php"><button class="btn btn-danger">SIGN OUT</button></a>
            </li>
          </ul>
        </div>

      </nav>
      <!-- Title -->
      <div class="row">
        <div class="col-lg-12">
            <h2 style="color:#FFAB4C;">Current Screening Movies</h2>
        </div>
      </div>


    </section>
    <center>
      <div class = "row movies" >
      <?php
      $queryy = "SELECT movieId,movieName,movieGenre,screenNo,showTime FROM admincurrentmovies ac natural join moviedetails;";
      $resultt = mysqli_query($conn,$queryy);
      $url = "BookTicket.php?ids=";
      $urlimg = "imagesOld/movie";
      if (mysqli_num_rows($resultt) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($resultt)) {
        $presurl = $url.$row['movieId'];
        $presimgurl = $urlimg.$row['movieId'].'.png';
      ?>
      <div class="col-lg-3 csmov">
        <a target="_blank" href="">
          <?php //echo $presimgurl;?>
        <img src="<?php echo $presimgurl?>" alt= "<?php echo $presimgurl?>" width="250" height="300">
      </a><br>
        <em><b style="color: red;"><?php echo $row['movieName'];?></b></em><br>
        <span style="color: black;">Movie Id : </span><em><b><?php echo $row['movieId'];?></b></em><br>
        <span style="color: black;">Screen No : </span><em><b><?php echo $row['screenNo'];?></b></em><br>
        <span style="color: black;">Show Time : </span><em><b>
          <?php
            if(strcmp($row['showTime'],"Show1")==0)
             echo "10 AM - 1 PM";
            else if(strcmp($row['showTime'],"Show2")==0)
              echo "2 PM - 5 PM";
            else if(strcmp($row['showTime'],"Show3")==0)
               echo "6 PM - 9 PM";
            else if(strcmp($row['showTime'],"Show4")==0)
                echo "10 PM - 1 AM";
          ?>
        </b></em><br>
        <br><br>
      </div>
      <?php

      }
      echo "</div>";
      }
      ?>

      <div style="background-color: #7267CB;">
        <br>
        <p  align = 'center' ><a href = "admin.php?addNew=true" name = "addmov"><button class="btn btn-warning" style="font-weight: bold;">Add New Movies</button></a>
            &emsp;<a href = "admin.php?add=true" name = "addmov"><button class="btn btn-warning" style="font-weight: bold;">Add Screening Movies</button></a>
            &emsp;<a href = "admin.php?del=true" name = "Delmov"><button class="btn btn-warning" style="font-weight: bold;">Delete Movie</button></a>
            &emsp;<a href = "admin.php?view=true" name = "viewdet"><button class="btn btn-warning" style="font-weight: bold;">View Details</button></a></p>
        <br>
        <br>

      <?php
      if(isset($_GET['addNew'])){
      ?>
          <form action = "addNew.php" method  = "post">
          <table align = 'center' cellspacing="4" cellpadding="3">
            <tr>
              <td style="font-weight: bold; color: khaki;">Movie Name &emsp;</td>
              <td><input type="text" name = 'mname'></td>
            </tr>
            <tr>
              <td style="font-weight: bold; color: khaki;">Duration  &emsp;</td>
              <td><input type="number" name = 'mdura'></td>
            </tr>
            <tr>
              <td style="font-weight: bold; color: khaki;">Movie Genre  &emsp; </td>
              <td><input type="text" name = 'mgen'></td>
            </tr>
            <tr>
              <td style="font-weight: bold; color: khaki;">Movie language  &emsp;</td>
              <td><input type="text" name = 'mlang'></td>
            </tr>
            <tr>
              <td colspan = '2' align = 'center'><input class="btn btn-danger" type = 'submit' name = 'addnewform' value = 'Add Movie'></td>
            </tr>
            <tr>
              <td>   </td>
            </tr>
            <tr>
              <td>   </td>
            </tr>
            <tr>
              <td>   </td>
            </tr>
          </table>
        </form>
      <?php
      }
      else if(isset($_GET['add'])){
      ?>
          <form action = "add.php" method  = "post">
          <table align = 'center' cellspacing="4" cellpadding="3">
            <tr>
              <td style="font-weight: bold; color: khaki;">Movie Id &emsp;</td>
              <td><input type="text" name = 'mnid'></td>
            </tr>
            <tr>
              <td style="font-weight: bold; color: khaki;">ScreenNo &emsp;</td>
              <td><input type="number" name = 'mscr'></td>
            </tr>
            <tr>
              <td style="font-weight: bold; color: khaki;">Showtime &emsp;</td>
              <td><select name="mshow">
                    <option value = 'Show1'>Show1</option>
                    <option value = 'Show2'>Show2</option>
                    <option value = 'Show3'>Show3</option>
                    <option value = 'Show4'>Show4</option>
                  </select>
              </td>
            </tr>
            <tr>
              <td colspan = '2' align='center'><input class="btn btn-danger" type = 'submit' name = 'addform' value = 'AddMovie'></td>
            </tr>
            <tr>
              <td>   </td>
            </tr>
            <tr>
              <td>   </td>
            </tr>
            <tr>
              <td>   </td>
            </tr>
          </table>
        </form>
      <?php
      }
      else if(isset($_GET['del'])){
      ?>

          <h3 align="center" style="color:#FF7272;">Select the shows you want to delete<h3>
            <center>
          <form action = "del.php" method  = "post">

      <?php
            $queryy = "SELECT * FROM admincurrentmovies";
            $resultt = mysqli_query($conn,$queryy);
            if (mysqli_num_rows($resultt) > 0) {
            // output data of each row
            echo "<table align = 'center' cellspacing= '10' cellpadding='5' border = '3' style='font-size: 25px; font-family: \"Readex Pro\", sans-serif; background-color: #FFEF82;'>";
            echo "<tr style='background-color: #E9D5DA;'><th style='border: 1px solid black;'></th><th style='border: 1px solid black;'>Entry No. </th><th style='border: 1px solid black;'>Movie Id </th><th style='border: 1px solid black;'>Screen No </th><th style='border: 1px solid black;'>Show Time</th></tr>";
            while($row = mysqli_fetch_assoc($resultt)) {
            ?>
              <tr>
                <td style="border: 1px solid black; width: 50px; text-align : center;"><input type = 'checkbox' name = '<?php echo $row['entryNo'];?>'></td>
                <td style="text-align : center; border: 1px solid black;"><?php echo $row['entryNo'];?></td>
                <td style="text-align : center; border: 1px solid black;"><?php echo $row['movieId'];?></td>
                <td style="text-align : center; border: 1px solid black;"><?php echo $row['screenNo'];?></td>
                <td style="text-align : center; border: 1px solid black;"><?php echo $row['showTime'];?></td>
              </tr>
          <?php
          }
        }
          echo "<tr><td></td><td></td><td align = 'center'><input type = 'submit' class='btn btn-success' name = 'delconf'></td>
          <td align = 'center'><input type = 'reset' class='btn btn-danger' name = ''></td> </tr>";
          echo "</table> </form> </center> <br /> <br />";
      }
      else if(isset($_GET['view']))
      {
          echo "<center>";
          echo "<span style='font-size : 35px; border: 2px solid black; padding: 3px;'>&emsp;Movie Booking History &emsp;</span><br><br>";
          echo "</center>";
          $eq = 1;
          $queryy_hist = "SELECT * FROM bookingdetails natural join moviedetails";
          $resultt1 = mysqli_query($conn,$queryy_hist);
          if (mysqli_num_rows($resultt1) > 0) {
            ?>
            <div class="row">
            <?php
            while($row = mysqli_fetch_assoc($resultt1))
            {
              ?>
              <div class="col-lg-4">
              <?php
                $queryy_cname = "SELECT custFirstName AS cn FROM custdetails WHERE custId='$row[custId]'";
                $resultt2 = mysqli_query($conn,$queryy_cname);
                $row1 = mysqli_fetch_assoc($resultt2);
                echo "<center><br />";
                echo "<h2 style='color : #FF8C32; font-weight: bold;font-family: \"Readex Pro\", sans-serif;'>Booking ".$eq."</h2>";
                $eq++;
          ?>

                <table align="center" cellspacing="5" cellpadding="15" border = "2" style="background-color: #FFD59E; width: 70%;">
                  <tr>
                    <td style="text-align : center; border: 1px solid black;">Customer Name</td>
                    <td style="text-align : center; border: 1px solid black;">
                      <?php
                          echo $row1['cn'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align : center; border: 1px solid black; ">Booking Id</td>
                    <td style="text-align : center; border: 1px solid black;">
                      <?php
                          $_SESSION['bid_del'] = $row['bookingId'];
                          echo $row['bookingId'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align : center; border: 1px solid black;">Movie Name</td>
                    <td style="text-align : center; border: 1px solid black;">
                      <?php
                          echo $row['movieName'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align : center; border: 1px solid black;">Screen No</td>
                    <td style="text-align : center; border: 1px solid black;">
                      <?php
                          $_SESSION['scno_del'] = $row['screenNo'];
                          echo $row['screenNo'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align : center; border: 1px solid black;">Show Timing</td>
                    <td style="text-align : center; border: 1px solid black;">
                      <?php
                      $_SESSION['showTime_del'] = $row['showTime'];
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
                    <td style="text-align : center; border: 1px solid black;">Seats Booked</td>
                    <td style="text-align : center; border: 1px solid black;">
                      <?php
                          $_SESSION['snos_del'] = $row['seatNos'];
                          echo $row['seatNos'];
                      ?>
                    </td>
                  </tr>

                </table>
                <br />
                <br>
                <br>
              </center>
            </div>
      <?php
      }
    }
  }

      if(isset($_GET['addn'])){
        echo "<h1 align = 'center'>Added new Movie Successfully</h1>";
      }
      if(isset($_GET['addscr'])){
        if($_GET['addscr'] == 'true')
          echo "<h1 align = 'center'>Screening of the movie has started</h1>";
        else
          echo "<h1 align = 'center' style = 'color:red;' > please add the movie to start its screening</h1>";
      }
      if(isset($_GET['delcon'])){
        if($_GET['delcon'] == 'true')
          echo "<h1 align = 'center'>Show cancelled successfully</h1>";
      }
      ?>
  </div>
</div>
  </center>
  </body>
  </html>
