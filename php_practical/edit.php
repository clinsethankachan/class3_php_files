<!DOCTYPE html>
<html>
<head>
	<title>editing using php </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 

		$id=$_GET['$id'];
		include "conn.php";
		$query="SELECT * FROM `student` WHERE `id`=$id";
		$result=mysqli_query($con,$query);
		while($row=mysqli_fetch_assoc($result)){
			$name=$row['name'];
			$age=$row['age'];
			$email=$row['email'];
			$password=$row['password'];
		}

	 ?>

	 <form>
	 	<input type="hidden" name="id"  value="<?php echo $id;?>" id="id">
	 	<input type="text" name="name" placeholder="Enter your name" class="form-control" value="<?php echo $name;?>" id="name">
	 	<input type="number" name="age" placeholder="enter your age" class="form-control" value="<?php echo $age;?>" id="age">
	 	<input type="email" name="email" placeholder="enter your email" class="form-control" value="<?php echo $email;?>" id="email">
	 	<input type="password" name="password" placeholder="enter your password" class="form-control" value="<?php echo $password;?>" id="password"><br/>

	 	<input type="button" name="button" value="Update" class="btn btn-primary" id="button">


	 </form>
	 <table class="table" id="history_display">
	 	<thead>
	 		<th>Id</th>
	 		<th>Name</th>
	 		<th>Age</th>
	 		<th>Email</th>
	 		<th>Password</th>
	 		<th>Action</th>
	 	</thead>
	 	
	 </table>
	 <script type="text/javascript">
	 
	 	$('#button').click(function(){
	 		var name=$('#name').val()
	 		var age=$('#age').val()
	 		var email=$('#email').val()
	 		var password=$('#password').val()

	 		$.ajax({
	 			url:"Update.php",
	 			type:"post",
	 			data:{
	 				name:name,
	 				age:age,
	 				email:email,
	 				password:password,
	 				id:id
	 			},
	 			Success:function(response){
	 				alert(response)
	 				call()
	 			},
	 			error:function(response){
	 				alert(response)
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
                        $('#history_display').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td>"+value.id+"</td>";
                            table_content+="<td>"+value.name+"</td>";
                            table_content+="<td>"+value.age+"</td>";
                            table_content+="<td>"+value.email+"</td>";
                            table_content+="<td>"+value.password+"</td>";
		 
  table_content+="<td><a class='btn btn-primary' href='edit.php?id="+value.id+"'>Edit</a><button class='btn btn-danger' onclick='dele("+value.id+")'>Delete</button><button class='btn btn-primary' onclick='view("+value.id+")'>View</button></td>";
                            table_content+="</tr>";
                        });
                        $('#history_display').append(table_content)
           
				},
				error: function(){
					alert('Something went wrong');
				}
			})
		}
		call()
	})




	 </script>

</body>
</html>