<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div style="height: 250px;width: 400px;margin:auto;border:2px solid #eee;padding:20px;">
		<?php if(isset($_GET['message'])){
			$message=$_GET['message'];
		 ?>
		<div class="alert alert-danger">
			<?php echo $message;?>
			
		</div>
		<?php }
		 ?>
	<form action="verify.php" method="post">

		
		<input type="email" name="email" placeholder="enter your email" class="form-control" id="email"><br/>
		<input type="password" name="password" placeholder="enter your password" class="form-control" id="password"><br/>
		<select name="role" class="form-control">
			<option>Select Role</option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
			
		</select><br/>
		<input type="submit" name="submit" value="Login" class="btn btn-primary" id="button">
		
	</form>
 </div>


</body>
</html>