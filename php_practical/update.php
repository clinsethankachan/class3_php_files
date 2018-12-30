<?php 

include "conn.php";
$id=$_POST['id'];
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$password=$_POST['password'];
$password=password_hash($password,PASSWORD_BCRYPT);

$query="UPDATE `student` SET `name`='$name',`age`='$age',`email`='$email',`password`='$password' WHERE `id`='$id'";
$result=mysqli_query($con,$query);
if($result){
	echo "Successfully updated";
}
else{
	echo "failed to update";
}




 ?>