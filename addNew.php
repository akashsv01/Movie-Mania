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
if(isset($_POST['addnewform'])){
$mname = $_POST['mname'];
$mdura = $_POST['mdura'];
$mgen = $_POST['mgen'];
$mlang = $_POST['mlang'];
$queryno = "select count(*) from moviedetails;";
$resultt = mysqli_query($conn,$queryno);
$rows = mysqli_fetch_row($resultt);
$norow = $rows[0]+1;
$queryy = "INSERT INTO moviedetails (movieId,movieName,movieDuration,movieGenre,movieLang) values ('$norow','$mname','$mdura','$mgen','$mlang');";
if($resultt = mysqli_query($conn,$queryy)){
  header('location:admin.php?addn=true');
}
else{
  header('location:admin.php?addn=false');
}

}
