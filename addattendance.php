<?php 
	
	require_once 'connect.php';
		session_start();

			if (isset($_SESSION['course'])) {
			# code...

				$course=$_SESSION['course'];
				$sem= $_SESSION['semester'];
				$mon= $_SESSION['month'];
				$id = $_SESSION['user_id'];

				$sql= "SELECT `Sub_name`, `Sub_id` FROM  `subject` WHERE `Sub_Sem` ='$sem' AND `T_id` ='$id' AND `Course`='$course'";
				$result = mysqli_query($con,$sql);
				$value = $result->fetch_assoc();
				$sub =$value['Sub_name'];
				$subid =$value['Sub_id'];

				$sql1 ="SELECT `S_id`, `S_name` FROM `student` WHERE `Course` ='$course' AND `Semester`='$sem' ORDER BY `S_name`";
				$result1 = mysqli_query($con,$sql1);
				
				if ($_POST) {
					$nclass=$_POST['no_of_class'];
					$tclass=$_POST['class_attend'];
					
						
					if (!empty($nclass)&& !empty($tclass)) {
						# code...
						$sql= "INSERT INTO `month_lecture`(`Month`,`No_of_class`,`Sub_id`) VALUES ('$mon','$nclass','$subid')";
						$result = mysqli_query($con,$sql);
						$n= count($tclass);

						for ($i=0; $i < $n; $i++) { 
							# code...
							if ($tclass[$i]<=$nclass) {
								# code...
							
								$value1=mysqli_fetch_assoc($result1);
								$sid=$value1['S_id'];
								$sql2="INSERT INTO `attendance`(`S_id`,`Sub_id`,`Month`,`Class_attended`) VALUES ('$sid','$subid','$mon','$tclass[$i]')";
								$result2=mysqli_query($con,$sql2);
							}
							else
								echo "Value for Classes attended should be less than no of classes held";
						}

						$_SESSION['user_id']= $id;
						header('location:home.php');
						
					}

				}
			}

		else
			header('location:login.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Attendance</title>
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

			 }

		.info{
			font-size: 100%; 
			position:absolute; 
			left: 110px;

		}
		
	</style>
</head>
<body>
	<div class="container" >
		<div class="page-header">
			<a href="disconnect.php">
					<button type="button" class="btn btn-danger" style="float: right;">Log out</button>
				</a>
			<h1 class="lg">Add Attendance</h1>
			<hr/>	
		</div>

		<div class="info">
			<p>Course : <?php echo $course; ?> </p>
			<p>Semester :  <?php echo $sem; ?></p>
			<p>Subject: <?php echo $sub; ?></p>
			<p>Month :  <?php echo $mon; ?></p>
			<form action="addattendance.php" method="post">
				<label for="nclass">No. of lectures held: </label>
				<input type="number" name="no_of_class" >

				<hr/>
				<table class="table table-bordered">
					<tr>
						<th>Enrollment No.</th>
						<th>Name of Student</th>
						<th>No. of Lectures attended</th>
					</tr>

					<?php

						while ($value1 = mysqli_fetch_assoc($result1)) {
							# code...

							echo "<tr>";
							echo "<td>".$value1['S_id']."</td>";
							echo "<td>".$value1['S_name']."</td>";
							echo '<td><input type="number" name="class_attend[]" ></td>';
							echo "</tr>";

						}
					?>
					
				</table>
				<div>
					<button type="submit" name="submit" class="btn btn-success">Submit</button>
				</div>
			</form >
		</div>
		

	</div>
</body>
</html>