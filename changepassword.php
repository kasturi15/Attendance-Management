<?php
	require_once 'connect.php';
		session_start();

	if (isset($_SESSION['user_id'])) {
			# code...
	$id = $_SESSION['user_id'];

		if ($_POST) {
			# code...
			$current = $_POST['current'];
			$new = $_POST['new'];
			$new1 = $_POST['password1'];
			$back = $_POST['back'];
			$change=$_POST['Change'];

			if ($change=='Change') {
				# code...

				if (!empty($current)) {
					# code...
					$result = $con->query("SELECT * FROM `login` WHERE `user_id` = '$id' AND `password` = '$current'");
					if ($result->num_rows == 1) {
						# code...
					
						if (!empty($new)) {
							# code...
							if (!empty($new1)) {
								# code...
							
								if ($new==$new1) {
									# code...
							
									$sqlcp= "UPDATE `login` SET `password` = '$new' WHERE `user_id`= '$id'";
									$resultcp= mysqli_query($con, $sqlcp);
									

							
									$_SESSION['user_id'] =$id;
									header('location: home.php');
								}
								else
									echo "The confirmation password doesnot match.";
						
							}
							else{
								echo "Re- enter the new password.";
							}
						}
						else{
							echo "Enter new password.";
						}
					}
					else
						echo "Username and Password does not match";
				}
				else{
					echo "Enter current Password.";
				}
			}
			elseif($back=='back'){
					header('location: home.php');
			}
		
		}
		
	}
	else{
				header('location: login.php');
			}


?>


<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<style type="text/css">
			body{
				background-image: url(logimg.jpg);
				color: white;
			}

			div.container{ 
				
				position: absolute;
				left: 450px;
				top: 150px;
			 }

		 	h1{
				position: absolute;
		 		left: 400px;
		 		top: 50px;
		 		font-size: 350%;
		 		font-family: fantasy;
		 	}
		</style>
	</head>

	<body>
		<h1 id="login" style="color: white;">Change Password</h1>
		<div class="container">
				
				<form action="changepassword.php" method="post">
					<div class="col-md-3">
						<label for="user">Enter your current password:</label><br/>
						<input type="Password" name="current" id="current" placeholder="Current Password" class="form-control" ><br>
			    	</div>

			   		<div class="col-md-3">
						<label for="pwd">Enter your new Password:</label><br/>
						<input type="Password" name="new" placeholder="New Password" class="form-control" ><br>
					</div>

					<div class="col-md-3">
						<label for="pwd">Re-Enter your new password:</label><br/>
						<input type="Password" name="password1" placeholder="Confirm Password" class="form-control" ><br>
					</div>

					<div>
					
						<button type="submit" name="Change" value= "Change" class="btn btn-primary">Change</button>
						
						<button type="submit" name="back"  value= "back" class="btn btn-primary">Back</button>
					</div>
				</form>
		</div>

	</body>
</html>