<?php

session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$database_name="movieDB";
$conn = mysqli_connect($server_name,$username,$password,$database_name);

if(isset($_POST['delbook']))
{
  $biddel = $_POST['del_if_id'];
  $scnodel = $_POST['scno_del_1'];
  $showdel = $_POST['showTime_del_1'];
  $query = "DELETE FROM bookingdetails WHERE bookingId=$biddel;";
  $delresult = mysqli_query($conn,$query);
  $string = $_SESSION['snos_del'];
  $str_arr = explode ("/", $string);

  $queryy= "SELECT * FROM usedseats WHERE screenNo='$scnodel' AND showTime='$showdel';";
  $resultt = mysqli_query($conn,$queryy);
  $i = 0;
  while($row = mysqli_fetch_assoc($resultt))
  {
    $queryy1= "DELETE FROM usedseats WHERE bookedSeat='$str_arr[$i]';";
    $resultt1 = mysqli_query($conn,$queryy1);
    $i++;
  }
  header('location:history.php?del=true');
}

?>
