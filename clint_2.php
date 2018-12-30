<?php 

include "con1.php";
$name = $_POST['name'];
$age = $_POST['age'];
$mark = $_POST['mark'];
$dob = $_POST['dob'];
$query = "INSERT INTO `student` (`name`, `age`, `mark`, `dob`) VALUES ('$name', '$age', '$mark', '$dob')";
$result = mysqli_query($con,$query);

if($result){
	echo "successfully inserted";
}
else{
	echo "Failed to insert";
}


 ?>