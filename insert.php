<?php 

include "conn.php";
$name = $_POST['name'];
$email = $_POST['email'];
$password= $_POST['password'];

$query = "INSERT INTO `users`(`name`,`email`,`pasword`) VALUES ('$name','$email','$password')";

$result=mysqli_query($con,$query);

if($result){
	echo "successfully inserted";
}
	else
	{

	echo "failed to insert";
}




 ?>