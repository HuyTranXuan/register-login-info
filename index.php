<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User info</title>
		<?php 
			include("./header.php");
			include("./services/userService.php"); 
			$user = new User;
			if (!$user->session()){
				header("location:login.php");
				exit();
			}
		?>
		<script type="text/javascript" src="function.js"></script>
	</head>
	<body>
		<div class="container paper">
			<h3>Hello <?php echo $_SESSION['email'];?></h3>
			<h3 id="info">Your current info:</h3>
			<div class="border border-primary margin-small padding-small">
				<span>
				<?php
					$user = new User;
					$info = $user->findInfoByUserId($_SESSION['id']);
					for ($i=2; $i < count($info) ; $i++) { 
						if($i==2) echo "Street Address: ";
						elseif($i==3) echo "Phone Number: ";
						elseif($i==4) echo "Postal Code: ";
						elseif($i==5) echo "City: ";
					echo $info[$i];
					echo "<br/>";
					}
				?>
				</span>
			</div>
			

			<form class="row">
				<p class="sm-2">Street Address: </p>
				<input class="sm-2" type="text" id="address">
				<button onclick="setValue(document.getElementById('address').value,'address')">Set Value</button>
			</form>
			<form class="row">
				<p class="sm-2">Phone Number: </p>
				<input class="sm-2" type="number" id="phoneNumber">
				<button onclick="setValue(document.getElementById('phoneNumber').value,'phone_num')">Set Value</button>
			</form>
			<form class="row">
				<p class="sm-2">Postal Code: </p>
				<input class="sm-2" type="number" id="postCode">
				<button onclick="setValue(document.getElementById('postCode').value,'post_code')">Set Value</button>
			</form>
			<form class="row">
				<p class="sm-2">City: </p>
				<input class="sm-2" type="text" id="city">
				<button onclick="setValue(document.getElementById('city').value,'city')">Set Value</button>
			</form>

		</div>
	</body>
</html>
