<?php 
include "connector.php";
$query = "SELECT * FROM `employees`";
$result = mysqli_query($con,$query);
$json_data = array();
while ($row=mysqli_fetch_assoc($result)) {
	$json_data[]= $row;
}
echo json_encode($json_data);

 ?>