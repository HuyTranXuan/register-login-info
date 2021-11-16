<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Title</title>
		<?php include("./header.php"); ?>
		<?php include("./services/userService.php"); ?>
	</head>
	<body>
		<div class="container paper">
			<h3>Registration form</h3>
			<?php	
				include("errors.php");	
				$_SESSION['errors'] = array();
			?>
			<form action="./controller/registerController.php" method="POST" >
				Email:<br />
				<input type="email" name="email" <br />
				First name:<br />
				<input type="text" name="fname" <br />
				Last name:<br />
				<input type="text" name="lname" <br />
				Password:<br />
				<input type="password" name="password" /><br />
				<input type="submit" value="Register"/>
			</form>

			<a href="/login.php">Already registered? Login here.</a>
		</div>
	</body>
</html>
