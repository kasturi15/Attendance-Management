<?php 
	//include 'studenthomefile.php';
	require_once 'connect.php';
	session_start();

	if(isset($_SESSION['s_user_id']))
	{
		$id = $_SESSION['s_user_id'];
	
		$sqls1= "SELECT `S_name`, `Course`, `Semester` FROM  `student` WHERE `S_id` = '$id' ";
		$results1= mysqli_query($con, $sqls1);
		$values1 = $results1->fetch_assoc();
		$sname = $values1['S_name'];
		$course = $values1['Course'];
		$sem = $values1['Semester'];

		$sqls2="SELECT `Sub_name` FROM `subject` WHERE Course='$course' AND Sub_Sem='$sem'";
		$results2= mysqli_query($con,$sqls2);

		if($_POST) {
			# code...
			$subname = $_POST['subject'];
			$mon= $_POST['month1'];

			$_SESSION['subject']=$subname;
			$_SESSION['month1']=$mon;
			$_SESSION['s_user_id']=$id;
			header('location:studentview.php');

		}
	}
	
	else
		header('location: Chooseuser.php');

	
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Home</title>
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
			font-size: 400%;
			font-family: fantasy;

			 }

		.info{
			font-size: 150%; 
			position:absolute; 
			left: 120px;

		}
		
	</style>

</head>
<body>
	<div class="container" >
		<div class="page-header">
			<a href="disconnect.php">
					<button type="button" class="btn btn-danger" style="float: right;">Log out</button>
				</a>
			<h1 class="lg">Welcome!!</h1>
			<hr/>	
		</div>
	
		<div class="info">
			<p> Enrollment Id :  <?php echo $id; ?></p>
			<p>Name : <?php echo $sname; ?> </p>
			<p>Course : <?php echo $course; ?> </p>
			<p>Semester : <?php echo $sem; ?> </p>
			
			<hr/>
		
			<form action="studenthome.php" method="post">
				<div >
					<label for="subject">Select Subject - </label>
					<select name="subject" required>
						<?php

							while($values2= mysqli_fetch_assoc($results2))
							{
								echo "<option>".$values2['Sub_name']."</option>";
							}
						?>
					</select>
				</div><br>

				<div >
					<label for="month">Select Month - </label>
					<select name="month1" required>
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
				
								
				<button type="submit" value="check" name="check" class="btn btn-success">Check</button>

				
			</div>
			</form>
		</div>
	</div>
</body>
</html>