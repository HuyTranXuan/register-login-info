<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<?php include("./header.php"); ?>
		<!-- <?php include("./services/userService.php"); ?> -->
	</head>
	<body>
		<div class="container paper">
			<h3>Login form</h3>
			<?php
				session_start();
				include("errors.php");
				$_SESSION['errors'] = array();
			?>
			<form method="POST" action="./controller/loginController.php">
			Email:<br/>
			<input type="email" name="email"/><br/>
			Password:<br/>
			<input type="password" name="password" /><br/>
			<input type="submit" value="Login" />
			</form>
			<br/>
			<a href="/register.php">Not yet registered? Register here.</a>
		</div>
	</body>
</html>
