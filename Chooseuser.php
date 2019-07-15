<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style >
		body{
			background-image: url(logimg.jpg);
			color: white;
		}

		div.container{ 
				
				position: absolute;
				
				top: 200px;
				text-align: center;
				

		 }

		 h1{

		 	position: absolute;
		 	left: 300px;
		 	top: 50px;
		 	font-size: 400%;
		 	font-family: fantasy;
		 	text-align: center;
		 }
	</style>
</head>
<body>

	<h1 id="login">ONLINE ATTENDANCE SYSTEM</h1>
	<div class="container">
		<h2>Select user:-</h2>
		<br>
			<a href="studentlogin.php">
				<button type="button" class="btn btn-basic ">Student</button>
			</a>

			<a href="login.php">
				<button type="button" class="btn btn-basic ">Faculty</button>
			</a>
			<a href="adminlogin.php">
				<button type="button" class="btn btn-basic ">Admin</button>
			</a>
		
	</div>

</body>
</html>