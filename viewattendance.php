<?php 
	
	require_once 'connect.php';
		session_start();

			if (isset($_SESSION['course'])) {
			# code...

				$course=$_SESSION['course'];
				$sem= $_SESSION['semester'];
				$mon= $_SESSION['month'];
				$id = $_SESSION['user_id'];

				$sql= "SELECT `Sub_name`, `Sub_id` FROM  `subject` WHERE `Sub_Sem` ='$sem' AND `T_id` ='$id' ";
				$result = mysqli_query($con,$sql);
				$value = $result->fetch_assoc();
				$sub =$value['Sub_name'];
				$subid =$value['Sub_id'];

				$sql3= "SELECT `No_of_class` FROM `month_lecture` WHERE `Month`='$mon' AND `Sub_id` = '$subid'";
				$result3= mysqli_query($con,$sql3);
				$value3 = $result3->fetch_assoc();
				$nclass= $value3['No_of_class']; 

				$sql1="SELECT student.S_id, student.S_name, attendance.Class_attended, concat(round((attendance.Class_attended*100)/'$nclass'), ' %') AS percent FROM student, attendance WHERE student.Course='$course' AND student.Semester='$sem' AND attendance.Sub_id='$subid' AND attendance.Month='$mon' AND student.S_id=attendance.S_id  ORDER BY student.S_name";
				$result1 =mysqli_query($con,$sql1); 

				if ($_POST) {
					# code...
					$from = $_POST['from'];
					$to = $_POST['to'];

					if (!empty($from)&&(!empty($to))) {
						# code...
						$sql1="SELECT student.S_id, student.S_name, attendance.Class_attended, concat(round((attendance.Class_attended*100)/'$nclass'), ' %') AS percent FROM student, attendance WHERE student.Course='$course' AND student.Semester='$sem' AND attendance.Sub_id='$subid' AND attendance.Month='$mon' AND student.S_id=attendance.S_id AND (attendance.Class_attended*100)/'$nclass' BETWEEN '$from' AND '$to' ORDER BY student.S_name";
						$result1 =mysqli_query($con,$sql1); 


					}
				}
				
			}

		else
			header('location:login.php');
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>View Attendance</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style>
		body{
			background-color: #F0F4C3;
			color: black;
		}
		div.container{
			position: absolute;
			top: 60px;
			left: 100px;
		}

		.lg{
			
			font-family: fantasy;
			text-align: center;

			 }

		.info{
			font-size: 100%; 
			position:absolute; 
			left: 110px;

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
			
			<h1 class="lg">Attendance Record</h1>
			<ul>
  				<li><a href="home.php"><button type="submit" class="btn btn-warning">Home</button></a></li>
  				<li style="float:right"><a href="disconnect.php"><button type="submit" class="btn btn-danger">Log out</button></a></li>
			</ul>	
			<hr>
		</div>

		<div class="info">
			<div class="corsm">
				<p><br>COURSE  : <strong> <?php echo $course; ?></strong> <br>
					SEMESTER  : <strong><?php echo $sem; ?></strong><br>
					SUBJECT  : <strong><?php echo $sub; ?></strong><br>
					MONTH  : <strong> <?php echo $mon; ?></strong><br>
					NO. OF LECTURES HELD  : <strong><?php echo $nclass; ?></strong>
					

				</p>
			</div>
			
			<div>
				<p>Select the range</p>
				<form class="form-inline" action="viewattendance.php" method="post">
					
						<div class="form-group">
							<label for="from">From: </label><br/>
							<input type="text" name="from" id="from"  class="form-control" ><br>
			    		</div>

			    	<div class="form-group offset-md-1">
						<label for="to">To: </label><br/>
						<input type="text" name="to" id="to"  class="form-control" ><br>
			    	</div>
			    	<div class="offset-sm-1">
			    		<button type="submit" class="btn btn-info">Search</button>
			    	
						</div>
				</form >
				<hr/>
			</div>
				<table class="table table-bordered">
					<tr>
						<th>Enrollment No.</th>
						<th>Name of Student</th>
						<th>No. of Lectures attended</th>
						<th>Percent of attendance</th>
					</tr>

					<?php
						$count=0;
						while ($value1 = mysqli_fetch_assoc($result1)) {
							# code...

							echo "<tr>";
							echo "<td>".$value1['S_id']."</td>";
							echo "<td>".$value1['S_name']."</td>";
							echo "<td align = \"centre\">".$value1['Class_attended']."</td>";
							echo "<td maxlength='4'>".$value1['percent'].'</td>';
							echo "</tr>";
							$count=$count+1;
						}

						echo "<p>No. of Students: ".$count."</p>"; 
					?>
					
				</table>	
		</div>
		

	</div>
</body>
</html>