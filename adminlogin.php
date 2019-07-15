<?php

		require_once 'connect.php';
		session_start();

		if (isset($_SESSION['a_user_id'])) {
			# code...
			header('location: adminhome.php');
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
						$resulta1 = $con->query("SELECT * FROM `admin_login` WHERE `a_user_id` = '$user' AND `a_password` = '$pass'");

						if ($resulta1->num_rows == 1) {
							# code...
							$valuea1 = $resulta1->fetch_assoc();
							$id = $valuea1['a_user_id'];
					
							$_SESSION['a_user_id'] = $id;
							header('location: adminhome.php');
													
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
					header('location: Chooseuser.php');
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
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
	<h1 id="login">Admin Login</h1><br>
<div class="container" >
	<div><h2>Login</h2></div>
	
			<form action="adminlogin.php" method="post">
				<div class="col-md-3">
					<label for="user">User Id:</label><br/>
					<input type="text" name="username" id="user" placeholder="Enter User id" class="form-control" ><br>
			    </div>
			    <div class="col-md-3">
					<label for="pwd">Password:</label><br/>
					<input type="Password" name="password" placeholder="Enter Password" class="form-control" ><br>
				</div>
				<div>
					
						<button type="submit" name="back"  value= "back" class="btn btn-primary">Back</button>
						<button type="submit" name="sign" value= "sign" class="btn btn-primary">Sign In</button>
					
				</div>
			</form>
</div>

</body>
</html>