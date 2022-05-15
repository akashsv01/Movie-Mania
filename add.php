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
if(isset($_POST['addform'])){
$mnid = $_POST['mnid'];
$mscr = $_POST['mscr'];
$mshow = $_POST['mshow'];
$queryno = "select count(*) from admincurrentmovies;";
$resultt = mysqli_query($conn,$queryno);
$rows = mysqli_fetch_row($resultt);
$norow = $rows[0]+1;
echo $mshow;
$queryy = "INSERT INTO admincurrentmovies (movieId,screenNo,showTime) values ('$mnid','$mscr','$mshow');";
if($resultt = mysqli_query($conn,$queryy)){
  header('location:admin.php?addscr=true');
}
else{
  header('location:admin.php?addscr=false');
}

}
