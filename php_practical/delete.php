<?php 

include "conn.php";

$id=$_POST['id'];
$query="DELETE FROM `student` WHERE `id`='$id'";
$result=mysqli_query($con,$query);

if($result){
	echo "Deleted successfully";
}
else{
	echo "Failed to delete";
}




 ?>