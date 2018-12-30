<!DOCTYPE html>
<html>
<head>
	<title>Display using php and ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
	$id = $_GET['id'];
	 include "conn.php";
	$query="SELECT * FROM `users` WHERE `id` = $id";
	$result=mysqli_query($con,$query);
	while ($row=mysqli_fetch_assoc($result)) {
		$name=$row['name'];
		$email=$row['email'];
		$password=$row['password'];
	}

	?>

	<form>
		<input type="hidden" name="id" value="<?php echo $id;?>" id="id">

		<input type="text" name="name" placeholder="enter your name" class="form-control" id="name" value="<?php echo $name;?>">
		<input type="email" name="email" placeholder="enter your email" class="form-control" id="email" value="<?php echo $email;?>">
		<input type="password" name="password" placeholder="enter your password" class="form-control" id="password" value="<?php echo $password;?>">
		<input type="button" name="submit" value="update" class="btn btn-primary" id="button">
		
	</form>
	<table class="table" id="history_display">
		<thead>
			<th>id</th>
			<th>Name</th>
			<th>email</th>
			<th>password</th>
			<th>Action</th>
		</thead>
		
	</table>
	<script type="text/javascript">
		$(function(){
			$('#button').click(function(){
				var id=$('#id').val()
				var name=$('#name').val()
				var email=$('#email').val()
				var password=$('#password').val()
				alert('hi'+name)

				$.ajax({
					url:"update.php",
					type:"post",
					data:{
						name:name,
						email:email,
						password:password,
						id:id

					},

					success:function(response){
						alert(response)
						call()
					},
					error:function(response){
						alert(response)
						console.log(response)
					}


				})


			})
			function call(){
			$.ajax({
				url:'view.php',
				type:'get',
				data:{

				},
				success: function(response){
					var obj=JSON.parse(response);
					var table_content=""
					$('#history_display').find('tr:not(:first)').remove();
					$.each(obj,function(index,value){
						table_content+="<tr>";
						table_content+="<td>"+value.id+"</td>";
						table_content+="<td>"+value.name+"</td>";
						table_content+="<td>"+value.email+"</td>";
						table_content+="<td>"+value.password+"</td>";
						table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-primary' onclick='view("+value.id+")'>View</button></td>";
						    table_content+="</tr>";
					});
					$("#history_display").append(table_content);
 
				},
				error:function(){
					alert('something went wrong');
				}
			})
		}
		call()
		})



	</script>

</body>
</html>