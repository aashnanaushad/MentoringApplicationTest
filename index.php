<?php 
	include('base.php');
	?>

<!DOCTYPE html>
<html>
<head>
<title>MITS-Mentoring Platform</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h1>Mentoring Platform</h1></center>
			<div class="imgcontainer">
				<img src="imgs/mits.png" alt="Avatar" class="mits">
			</div>
		<form action="index.php" method="post">
			<div class="inner_container">
				<a href="<?php echo BASE_URL; ?>/slogin.php"><button type="button" class="login_button">Student</button></a>
				<a href="<?php echo BASE_URL; ?>/flogin.php"><button type="button" class="login_button">Faculty</button></a>
				<a href="<?php echo BASE_URL; ?>/clogin.php"><button type="button" class="login_button">Counselor</button></a>
				<a href="<?php echo BASE_URL; ?>/login.php"><button type="button" class="login_button">Admin</button></a>
			</div>
			</div>
		</form>
	</div>
</body>
</html>