<?php 

include "conn.php";
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$password=$_POST['password'];
$password=password_hash($password,PASSWORD_BCRYPT);

$query="INSERT INTO `student`(`name`, `age`, `email`, `password`) VALUES ('$name','$age','$email','$password')";
$result=mysqli_query($con,$query);
if($result){
	echo "Successfully inserted";
}
else{
	echo "Failed to Insert";
}




 ?>