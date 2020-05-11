<?php
	session_start();
	require_once('dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
		<center><h3>Welcome <?php echo $_SESSION['username']; ?></h3></center>
		<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
		<form action="fadd.php" method="post">
			
			<div class="inner_container">
			 <a href="changepass.php"><button class="login_button" type="button">Change Password</button></a>
			 <a href="fadd.php"><button type="button" class="login_button">Add Faculty</button></a>
			 <a href="cadd.php"><button type="button" class="login_button">Add Counselor</button></a>
			 <a href="viewallfaculty.php"><button type="button" class="login_button">Faculty List</button></a>
			 <a href="studentlist.php"><button type="button" class="login_button">Student List</button></a>
			 <a href="assignhod.php"><button type="button" class="login_button">Assign HOD</button></a>
			</div>
		</form>
		<form action="logout.php" method="post">
			
			<div class="inner_container">
		        <button class="logout_button" type="submit">Log Out</button>	
			</div>
		</form>
	</div>
</body>
</html>