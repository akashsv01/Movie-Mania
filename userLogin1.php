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
      <strong>Log In to your <em>Movie Mania</em> Account!</strong><br><br><br>
      <strong style = "color:red;"><?php
      if(isset($_GET['dup'])){
        echo "EMAIL already exists!! Use a different email account!";
      }
      if(isset($_GET['chg'])){
        echo "Password updated successfully!";
      }
      ?>
    </strong>
    </div>
    <h1></h1>

    <form class="loginbox" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <br>
    Email &emsp; &emsp;<input type="text" placeholder="Enter Your Email" value="" name = 'email'>
    <br><br>
     Password &emsp; <input type="password" placeholder="Enter Your Password" value="" name = 'pass'>



    <br><br><input type="submit" name="save" value="Sign In">

    <?php
    if(isset($_POST['save']))
    {
      $email = $_POST['email'];
     	$password = $_POST['pass'];
      $flag = -1;
      $adminFlag = -1;
      //########################################################################################################
      $result = mysqli_query($conn,"SELECT custId,custFirstName,custEmail,custPass FROM custdetails");
      //########################################################################################################
      if (mysqli_num_rows($result) > 0)
      {
         //output data of each row
         while($row = mysqli_fetch_assoc($result))
         {
           //echo "id: " . $row["custId"]. " - Name: " . $row["custFirstName"]. " " . $row["custLastName"]. "<br>";
           if($email == 'admin@gmail.com' && $password == 'admin@123')
           {
             $adminFlag = 1;
             break;
           }
           if($row['custEmail'] == $email && $row['custPass'] == $password)
           {
             $flag = 1;
             break;
           }
         }
         if($adminFlag == 1)
         {
           $_SESSION['custName'] = $row['custFirstName'];
           $_SESSION['custId'] = $row['custId'];
           header('location:admin.php');
         }
         else if($flag == 1)
         {
           $_SESSION['custName'] = $row['custFirstName'];
           $_SESSION['custId'] = $row['custId'];
           header('location:userIndex.php');
         }
         else
         {
           ?>
           <br>
           <span class="err"><?php echo "Invalid Details"; ?></span>

           <?php
         }
       }
       else
       {
         echo "Haha";
       }
   }

   ?>
   <br><br>

   <a href="resetpass.php"><p>Reset Password</p></a>
   <p>Don't have an account?<a href="userRegForm.html">&emsp;Sign Up</p></a>

    </form>
    </center>

  </body>
</html>
