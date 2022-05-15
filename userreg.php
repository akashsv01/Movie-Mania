<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name="movieDB";
session_start();
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
	 $flag = -1;
			$querry = "select * from custdetails where custEmail = '$email'";
			$results = mysqli_query($conn, $querry);
			$rows = mysqli_fetch_row($results);
		  $norow = $rows[0];
			if($norow[0] != 0){
				header('location:userLogin1.php?dup=true');
			}
			else{

			 $sql_query = "INSERT INTO custdetails (custFirstName,custLastName,custEmail,custPass,custGender,custAge,custPhone)
			 VALUES ('$first_name','$last_name','$email','$password','$gender','$age','$phone')";

			 if (mysqli_query($conn, $sql_query))
			 {
				 //$_SESSION['custName'] = $first_name;
				 $sql_query_1 = "SELECT custId,custFirstName,custEmail,custPass FROM custdetails";
				 $res = mysqli_query($conn,$sql_query_1);
				 if (mysqli_num_rows($res) > 0)
				 {
						//output data of each row
						while($row = mysqli_fetch_assoc($res))
						{
							//echo "id: " . $row["custId"]. " - Name: " . $row["custFirstName"]. " " . $row["custLastName"]. "<br>";
							if($row['custEmail'] == $email && $row['custPass'] == $password)
							{
								$flag = 1;
								break;
							}
						}
						if($flag == 1)
						{
							$_SESSION['custName'] = $row['custFirstName'];
							$_SESSION['custId'] = $row['custId'];
							require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
							$mail = new PHPMailer;
							$mail->isSMTP();
							$mail->isHTML(true);
							$mail->SMTPSecure = 'ssl';
							$mail->SMTPAuth = true;
							$mail->Host = 'smtp.gmail.com';
							$mail->Port = 465;
							$mail->Username = '*********'; //Enter the email address from which you want to send the users a confirmation email upon successful login.
							$mail->Password = '*********'; //Enter the password of the corresponding email address
							$mail->setFrom('*********');  //Enter the same email address as mentioned above!
							$mail->addAddress($email);
							$mail->Subject = 'Hello from Movie Mania!';
							$mail->Body = 'Hello '.$_SESSION['custName'].'!! <br /><br />Glad that you signed up with Movie Mania.<br />Hope you will have a memorable experience with us!!';
							//send the message, check for errors
							if (!$mail->send())
							{
									echo "ERROR: " . $mail->ErrorInfo;
							}
							else{
									echo "SUCCESS";
							}
							header('location:userIndex.php');
						}
		     //header('location:userIndex.php'); /* Redirect browser */
			   }
				 else
			     {
					echo "Error: " . $sql . "" . mysqli_error($conn);
				 }
				 //mysqli_close($conn);
		   }
	}
}
?>
