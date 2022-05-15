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
$email = $password = ''?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="user_login_styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&Montserrat:wght@900&display=swap" rel="stylesheet">
    <style media="screen">
      .err{
        color: #FF6D6D;
      }
    </style>
  </head>

  <body>
    <center>
    <a href="index.html"><img src="imagesOld\movie_mania.png" alt="logo" width="100"></a>
    <br><br><br><br><br><br>
    <div class="textbox">
      <strong>Reset your<em>Movie Mania</em> Account Password!</strong><br><br><br>
    </div>
    <h1></h1>

    <form class="loginbox" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <br>
    Email &emsp; &emsp;<input type="text" placeholder="Enter Your Email" value="" name = 'email'>
    <br><br>
    New Password &emsp; <input type="password" placeholder="Enter Your New Password" value="" name = 'newpass'>

    <br><br><input type="submit" name="save" value="Update Changes">

    <?php
    if(isset($_POST['save']))
    {
      $email = $_POST['email'];
     	$password = $_POST['newpass'];
      //########################################################################################################
      $result = mysqli_query($conn,"UPDATE custdetails SET custPass='$password' WHERE custEmail='$email'");
      //########################################################################################################
      if ($result > 0)
      {
         header('location:userLogin1.php?chg=1');
      }
      else
       {
         echo "Haha";
       }
   }

   ?>
   <br><br>
   <a href="changepswd.html"><p>Reset Password</p></a>
   <p>Don't have an account?<a href="userRegForm.html">&emsp;Sign Up</p></a>

   </form>
    </center>

  </body>
</html>
