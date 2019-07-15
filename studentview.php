<?php
	
	require_once 'connect.php';
	session_start();

	if (isset($_SESSION['s_user_id'])) {
		# code...

		$subname=$_SESSION['subject'];
		$mon=$_SESSION['month1'];
		$id=$_SESSION['s_user_id'];

		$sqls3= "SELECT `S_name`, `Course`, `Semester` FROM  `student` WHERE `S_id` = '$id' ";
		$results3= mysqli_query($con, $sqls3);
		$values3 = $results3->fetch_assoc();
		$sname = $values3['S_name'];
		$course = $values3['Course'];
		$sem = $values3['Semester'];

		$sqls4= "SELECT `Sub_id` FROM `subject` WHERE `Sub_name` = '$subname'";
		$results4 = mysqli_query($con,$sqls4);
		$values4 = $results4->fetch_assoc();
		$sub_id = $values4['Sub_id'];

		$sqls5 = "SELECT `No_of_class` FROM `month_lecture` WHERE `Sub_id`='$sub_id' AND `Month`= '$mon'";
		$results5= mysqli_query($con,$sqls5);
		$values5 = $results5->fetch_assoc();
		$nclass = $values5['No_of_class'];

		$sqls6= "SELECT `Class_attended` FROM `attendance` WHERE `S_id`='$id' AND `Sub_id`='$sub_id' AND `Month`='$mon'";
		$results6= mysqli_query($con,$sqls6);
		$values6 = $results6->fetch_assoc();
		$tclass = $values6['Class_attended'];

		$per= round(($tclass*100)/$nclass);

	}

	else
		header('location: Chooseuser.php');

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
			font-size: 400%;

			 }

		.info{
			font-size: 100%; 
			position:absolute; 
			left: 170px;

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
  				<li><a href="studenthome.php"><button type="submit" class="btn btn-warning">Home</button></a></li>
  				<li style="float:right"><a href="disconnect.php"><button type="submit" class="btn btn-danger">Log out</button></a></li>
			</ul>	
		</div>

		<div class="info">
			<div class="corsm">
				<p> Enrollment Id : <strong> <?php echo $id; ?></strong></p>
					<p>Name :<strong> <?php echo $sname; ?></strong> </p>
					<p>Course : <strong><?php echo $course; ?></strong> </p>
					<p>Semester :<strong> <?php echo $sem; ?></strong> </p>
					<p>Subject : <strong><?php echo $subname;?></strong></p>
					<p>Month : <strong><?php echo $mon;?></strong></p>
					<p>No. of classes held : <strong><?php echo $nclass;?></strong></p>
					<p>No. of classes attended : <strong><?php echo $tclass;?></strong></p>
					<p>Percentage : <strong><?php echo $per;?>%</strong></p>
				
			</div>
			
		</div>	
		

	</div>
</body>
</html>