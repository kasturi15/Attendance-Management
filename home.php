<?php 

	require_once 'connect.php';
	session_start();

	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
	
	$sql= "SELECT `T_name` FROM  `teacher` WHERE `T_id` = '$id' ";
	$result= mysqli_query($con, $sql);
	$value = $result->fetch_assoc();
	$tname = $value['T_name'];

	if ($_POST) {
		# code...
		$course = $_POST['course'];
		$sem= $_POST['semester'];
		$mon= $_POST['month'];

		if(!empty($course)) {
			# code...

			$add = $_POST['add'];
			$view= $_POST['view'];
			$update= $_POST['update'];

			if ($add=='add') {
				# code...
				$_SESSION['course']=$course;
				$_SESSION['semester']=$sem;
				$_SESSION['month']=$mon;
				$_SESSION['user_id']= $id;
				header('location:addattendance.php');

			}

			elseif ($update=='update') {
				# code...
				$_SESSION['course']=$course;
				$_SESSION['semester']=$sem;
				$_SESSION['month']=$mon;
				$_SESSION['user_id']= $id;
				header('location:updateattendance.php');

			}

			elseif ($view=='view') {
				# code...
				$_SESSION['course']=$course;
				$_SESSION['semester']=$sem;
				$_SESSION['month']=$mon;
				$_SESSION['user_id']= $id;
				header('location:viewattendance.php');
			}

			else
				header('location:home.php');

		}
	}

	}
	
	else
		header('location: login.php');

	
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Faculty Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style>
		body{
			background-color: #F0F4C3;
			color: black;
		}
		div.container{
			position: absolute;
			top: 50px;
			left: 100px;
		}

		.lg{
			
			font-family: fantasy;
			text-align: center;
			font-size:300%;

			 }

		.info{
			font-size: 150%; 
			position:absolute; 
			left: 120px;

		}

		ul {
    		list-style-type: none;
    		margin: 0;
    		padding: 0;
   			overflow: hidden;
    		background-color: #F0F4C3;
		}

		li {
    		float: left;
		}

		li a {
    		display: block;
    		color: white;
    		text-align: center;
    		padding: 8px 16px;
    		text-decoration: none;
		}

		li a:hover:not(.active) {
    		background-color: #F0F4C3;
		}
		
	</style>

</head>
<body>
	<div class="container" >
		<div class="page-header">
			
			<h1 class="lg"><strong>Welcome !!</strong></h1>
			<ul>
  				<li><a href="home.php"><button type="submit" class="btn btn-warning">Home</button></a></li>
  				<li style="float:right"><a href="disconnect.php"><button type="button" class="btn btn-danger">Log out</button></a></li>
  				<li style="float:right"><a href="changepassword.php"><button type="button" class="btn btn-info">Change Password</button></a></li>
			</ul>	
			<hr/>	
		</div>
	
		<div class="info">
			<p>Name : <?php echo $tname; ?> </p>

			<p>Id :  <?php echo $id; ?></p>
			<hr/>
		
			<form action="home.php" method="post">
			<p>To Add/View the attendance select the correct option:</p>
			<div >
				<label for="course">Select Course - </label>
				<select name="course" required>
					<option value="M.C.A.">M.C.A.</option>
					<option value="M.Tech">M.Tech</option>
				</select>
			</div><br>
			
			<div >
				<label for="semester">Select Semester - </label>
				<select name="semester" required>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div><br>

			<div >
				<label for="month">Select Month - </label>
				<select name="month" required>
					<option value="January">January</option>
					<option value="Feburary">Feburary</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="Decebmer">Decebmer</option>
				</select>
			</div><br>

			<div >
				
				<button type="submit" value="add" name="add" class="btn btn-success">Add</button>
				<button type="submit" value="update" name="update" class="btn btn-success">Update</button>
				
				<button type="submit" value="view" name="view" class="btn btn-success">View</button>

				<button type="submit" value="cancel" class="btn btn-primary">Cancel</button>
			</div>
			</form>
		</div>
	</div>
</body>
</html>