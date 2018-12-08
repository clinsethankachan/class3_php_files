<?php 
include "connector.php";
$emp_name = $_POST['emp_name'];
$emp_email = $_POST['emp_email'];
$emp_no = $_POST['emp_no'];
$emp_address = $_POST['emp_address'];
$emp_dob = $_POST['emp_dob'];
$emp_blood_group = $_POST['emp_blood_group'];
$emp_doj = $_POST['emp_doj'];

$query = "INSERT INTO `employees`(`emp_name`, `emp_email`, `emp_no`, `emp_address`, `emp_dob`, `emp_blood_group`, `emp_doj`) VALUES ('$emp_name','$emp_email','$emp_no','$emp_address','$emp_dob','$emp_blood_group','$emp_doj')";
$result = mysqli_query($con,$query);
if($result)
	{
		echo "Successfully Inserted";
	}
	else{

		echo "failed to insert";
	}


 ?>