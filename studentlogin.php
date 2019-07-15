<?php

		require_once 'connect.php';
		session_start();

		if (isset($_SESSION['s_user_id'])) {
			# code...
			header('location: studenthome.php');
		}

		if ($_POST) {
			# code...
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$back = $_POST['back'];
			$signin=$_POST['sign'];

			if ($signin=='sign') {
				# code...

				if (!empty($user)) {
					# code...
					if (!empty($pass)) {
						# code...
						$results = $con->query("SELECT * FROM `student_login` WHERE `s_user_id` = '$user' AND `s_password` = '$pass'");

						if ($results->num_rows == 1) {
							# code...
							$values = $results->fetch_assoc();
							$id = $values['s_user_id'];
						
							$_SESSION['s_user_id'] =$id;
							header('location: studenthome.php');
							
						
						}
						else{
								echo "username and password did not match.";
						}
					}
					else{
						echo "password is required.";
					}
				}
				else{
					echo "Username is required.";
				}
			}
			elseif($back=='back'){
					header('location: Chooseuser.php');
			}

			else{
					header('location: studentlogin.php');
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		body{
			background-image: url(logimg.jpg);
			color: white;
		}

		div.container{ 
				
				position: absolute;
				left: 500px;
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
	<h1 id="login">Student Login</h1>
<div class="container" >
	<div><h2>Login</h2></div>
	
			<form action="studentlogin.php" method="post">
				<div class="col-md-3">
					<label for="user">Enrollment Id:</label><br/>
					<input type="text" name="username" id="user" placeholder="Enter User id" class="form-control" ><br>
			    </div>
			    <div class="col-md-3">
					<label for="pwd">Password:</label><br/>
					<input type="Password" name="password" placeholder="Enter Password" class="form-control" ><br>
				</div>
				<div>
						
						<button type="submit" name="sign" value= "sign" class="btn btn-primary">Sign In</button>
						<button type="submit" name="back"  value= "back" class="btn btn-primary">Back</button>
						
					
				</div>
			</form>
</div>

</body>
</html>