<?php 
include "conn.php";
$id= $_POST['id'];

$query = "DELETE  FROM `users` WHERE `id`='$id'";

$result=mysqli_query($con,$query);

if($result){
	echo "successfully Deleted";
}
	else
	{

	echo "failed to Delete";
}







 ?>