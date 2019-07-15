<?php 

	include 'studenthomefile.php';
	
	/*require_once 'connect.php';
	session_start();

	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
	
		$sqls3= "SELECT `S_name`, `Course`, `Semester` FROM  `student` WHERE `S_id` = '$id' ";
		$results3= mysqli_query($con, $sqls3);
		$values3 = $results3->fetch_assoc();
		$sname = $values3['S_name'];
		$course = $values3['Course'];
		$sem = $values3['Semester'];

		$sqls4="SELECT `Sub_name` FROM `subject` WHERE Course='$course'";
		$results4= mysqli_query($con,$sqls4);

		if ($_POST) {
			# code...
			$subname = $_POST['subject'];
			$mon= $_POST['month1'];

			$_SESSION['subject']=$subname;
			$_SESSION['month1']=$mon;
			$_SESSION['user_id']=$id;
			header('location:studentview.php');

		}
	}
	
	else
		header('location: Chooseuser.php');*/

	
	
 ?>