<?php 



	/*require_once 'connect.php';
	session_start();

	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
	
		$sqls1= "SELECT `S_name`, `Course`, `Semester` FROM  `student` WHERE `S_id` = '$id' ";
		$results1= mysqli_query($con, $sqls1);
		$values1 = $results1->fetch_assoc();
		$sname = $values1['S_name'];
		$course = $values1['Course'];
		$sem = $values1['Semester'];

		$sqls2="SELECT `Sub_name` FROM `subject` WHERE Course='$course'";
		$results2= mysqli_query($con,$sqls2);*/

		if ($_POST) {
			# code...
			$subname = $_POST['subject'];
			$mon= $_POST['month1'];
			//echo $subname;
			$id= $_SESSION['user_id'];
			header('location:studentview.php');

		}
	/*}
	
	else
		header('location: Chooseuser.php');*/

	
	
 ?>