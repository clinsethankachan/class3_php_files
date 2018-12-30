<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	$email=$_GET['email'];
	session_start();
	if(!isset($_SESSION[$email])){
		header("location:login.php");
		exit;
	}
?>
<h1>Welcome</h1>

</body>
</html>