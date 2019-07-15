<?php 
	
	require_once 'connect.php';
		session_start();

		if (isset($_SESSION['a_user_id'])) {
			# code...
			
		}

		else
			header('location:Chooseuser.php');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style>
		body{
			background-color: #F0F4C3;
			color: black;
		}
		div.container{
			position: absolute;
			top: 50px;
			left: 120px;
		}

		.lg{
			font-size: 400%;
			font-family: fantasy;

			 }

		
	</style>
</head>
<body>
	<div class="container" >
		<div class="page-header">
			<a href="disconnect.php">
					<button type="button" class="btn btn-danger" style="float: right;">Log out</button>
				</a>
			<h1 class="lg">Welcome Admin!!</h1>
			<hr/>	
		</div>

		<div>
			<p style="font-size: 150%;">Student Updation:</p>
			<ul>
				<a href="addstudent.php">
					<li>ADD Student</li>
				</a>

				<a href="#">
				<li>Update Student</li>
				</a>

				<a href="#">
				<li>REMOVE Student</li>
				</a>
			</ul>

			<p style="font-size: 150%;">Teacher Updation:</p>
			<ul>
				<a href="#">
				<li>ADD Teacher</li>
				</a>

				<a href="#">
				<li>Update Teacher</li>
				</a>

				<a href="#">
				<li>REMOVE Teacher</li>
				</a>
			</ul>

			<p style="font-size: 150%;">Subject Updation:</p>
			<ul>
				<a href="#">
				<li>ADD Subject</li>
				</a>

				<a href="#">
				<li>REMOVE Subject</li>
				</a>
			</ul>

		</div>
		
	</div>

</body>
</html>