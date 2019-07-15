<?php

		require_once 'connect.php';
		session_start();

		if (isset($_SESSION['user_id'])) {
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
						$result = $con->query("SELECT * FROM `login` WHERE `user_id` = '$user' AND `password` = '$pass'");

						if ($result->num_rows == 1) {
							# code...
							$value = $result->fetch_assoc();
							$id = $value['user_id'];
						
							$_SESSION['user_id'] =$id;
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