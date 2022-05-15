<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name="movieDB";

$conn = mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
	die("Connection Failed : " . mysqli_connect_error());

}

if(isset($_POST['save']))
{
	 $first_name = $_POST['fname'];
	 $last_name = $_POST['lname'];
	 $gender = $_POST['gender'];
	 $email = $_POST['email'];
	 $password = $_POST['pass'];
	 $phone = $_POST['phone'];
	 $age = $_POST['age'];


	 $sql_query = "INSERT INTO custdetails (custFirstName,custLastName,custEmail,custPass,custGender,custAge,custPhone)
	 VALUES ('$first_name','$last_name','$email','$password','$gender','$age','$phone')";

	 if (mysqli_query($conn, $sql_query))
	 {
		echo "New Details Entry inserted successfully!!";
	 }
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
