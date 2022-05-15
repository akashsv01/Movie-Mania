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
if(isset($_POST['delconf'])){
  $queryno = "select max(entryNo) from admincurrentmovies;";
  $resultt = mysqli_query($conn,$queryno);
  $rows = mysqli_fetch_row($resultt);
  $norow = $rows[0]+1;
  $arr_del = array();
  $ctr = 1;
  //$ctrr = 1;
    while($ctr <= $norow){
      //echo $var;
      if(isset($_POST[$ctr])){
        //echo "<h3>$ctr</h3>";
        array_push($arr_del,$ctr);
      }
      $ctr++;
    }
    foreach($arr_del as $xy){
      $querr = "Delete from admincurrentmovies where entryNo = '$xy'";
      $resultt = mysqli_query($conn,$querr);
    }
    header("Location:admin.php?delcon=true");
}
?>
