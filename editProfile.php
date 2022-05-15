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

  <section class="container-fluid" id="title" style="height: 25vh;">

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="userIndex.php"><img src="imagesOld/movie_mania.png" height="18"> Movie Mania</a>

      <input id="search-input" type="search" id="form1" class="form-control w-25" />
      <button type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
      </button>



      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="#navbarSupportedContent">
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
            <a class="nav-link" href="" style="color: #E26A2C;"><b>History</b></a>
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

$cid = $_SESSION['custId'];
$cname = $_SESSION['custName'];
// echo $cid;
// echo $cname;
//echo "<center><table><form action ='profile.php' method = 'post' id = 'change'>";
?>
  <center>
    <section style="background-color: #E26A2C; height: 75vh; font-size: 20px;">
    <br><br><br><br>
    <table cellspacing="7" cellpadding="10" border="3" style="background-color: #DADDFC;">
      <form action = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method = 'post'>
   <tr>
     <td><b>First Name</b></td>
     <td><input type = 'text' name = 'editFN' style="background-color: #D3E4CD;" /></td>
   </tr>
   <tr>
     <td><b>Last Name</b></td>
     <td><input type = 'text' name = 'editLN' style="background-color: #D3E4CD;" /></td>
   </tr>
   <tr>
     <td><b>Email</b></td>
     <td><input type = 'email' name = 'editemail' style="background-color: #D3E4CD;" /></td>
   </tr>
   <tr>
     <td><b>Phone Number</b></td>
     <td><input type = 'tel' name = 'editPh' pattern="[789]{1}[0-9]{9}" style="background-color: #D3E4CD;"/></td>
   </tr>
   <tr>
     <td colspan = 2 align = "center"><input type = 'submit' value = 'Save Changes' name = 'change' style="color: #FFF; background-color: #334756;"/></td>
   </tr>
   </form></table>
<?php
  if(isset($_POST['change'])){
    // echo $cid;
    // echo $cname;
    $newFN = $_POST['editFN'];
    $newLN = $_POST['editLN'];
    $newEmail = $_POST['editemail'];
    $newph = $_POST['editPh'];
    if($newFN=="" || $newLN=="" || $newEmail=="" || $newph=="")
    {
      if( strlen($newph)!=10 )
      {
        echo "<p style='color: #F6F6F6;'>Phone number must be of 10 digits!</p>";
      }
      else {
        echo 'Cannot insert empty fields!';
      }

    }

    else
    {
      $queryy = "UPDATE custdetails SET custFirstName = '$newFN', custLastName = '$newLN', custEmail = '$newEmail', custPhone = '$newph' WHERE custId = '$cid';";
      $resultt = mysqli_query($conn,$queryy);
      $_SESSION['custName'] = $newFN;
      //echo $newFN
      header('location:profile.php');
    }

}

?>

</section>
</center>
</body>
</html>
