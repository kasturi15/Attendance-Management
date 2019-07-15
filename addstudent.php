<?php

	require_once 'connect.php';
		session_start();

		if (isset($_SESSION['a_user_id'])) {
			# code...

			$id=$_SESSION['a_user_id'] ;

			if ($_POST) {
				# code...
				$name=$_POST['name'];
				$s_id=$_POST['s_id'];
				$course=$_POST['course'];
				$sem=$_POST['sem'];
				$pass=$_POST['password'];

				if(!empty($name)&& !empty($s_id) && !empty($course) && !empty($sem) && !empty($pass))
				{
					$sqla1="INSERT INTO `student`(`S_id`,`S_name`,`Course`,`Semester`) VALUES ('$s_id','$name','$course','$sem')";

					$resulta1 =mysqli_query($con,$sqla1);

					$sqla2= "INSERT INTO `studnet_login`(`s_user_id`,`s_password`) VALUES ('$s_id','$pass')";

					$resulta2 = mysqli_query($con,$sqla2);

					$_SESSION['a_user_id']=$id;
					header('location:adminhome.php');

				}
				else
					echo "Enter all the fields";

			}
			
		}

		else
			header('location:Chooseuser.php');

?>



<!DOCTYPE html>
<html>
<head>
	<title>add student</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		body{
			background-color: #F0F4C3;
			color: black;
		}

		div.container{ 
				
				position: absolute;
				left: 350px;
				top: 150px;


		 }

		 h1{

		 	position: absolute;
		 	left: 400px;
		 	top: 50px;
		 	font-size: 400%;
		 	font-family: fantasy;
		 }
	</style>
</head>
<body>
	<h1 id="login">Add Student</h1>
	<hr/>
	<div class="container" >
		<div><h3>Enter the details of Student</h3></div>

		<form action="addstudent.php" method="post">
				<div class="col-md-6">
					<label for="name">Name:</label><br/>
						<input type="text" name="name" id="name" class="form-control" ><br>
			    </div>
			    <div class="col-md-6">
					<label for="s_id">Enrollment Id:</label><br/>
					<input type="text" name="s_id" class="form-control" ><br>
				</div>

				<div class="col-md-6">
					<label for="course">Course :</label><br/>
					<input type="text" name="course" class="form-control" ><br>
				</div>

				<div class="col-md-6">
					<label for="sem">Semester :</label>
					<input type="text" name="sem" class="form-control" ><br>
				</div>

				<div class="col-md-6">
					<label for="pwd">Create Password :</label>
					<input type="Password" name="password" class="form-control" ><br>
				</div>
				<div>
					<button type="submit" name="add" value= "add" class="btn btn-primary">ADD</button>
					
					<button type="button" name="reset"  value= "reset" class="btn btn-primary">Reset</button>
					
				</div>
			</form>
	
			
</div>


</body>
</html>