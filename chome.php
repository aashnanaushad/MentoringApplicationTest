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
<title>Counselor</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Home Page</h2></center>
		<center><h3>Welcome Counselor(<?php echo $_SESSION['username']; ?>)</h3></center>
		<div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		</div>
		<form action="cview.php" method="post">
			
			<div class="inner_container">
			 <a href="changepass.php"><button class="login_button" type="button">Change Password</button></a>
			 <a href="cview.php"><button type="button" class="login_button">View Profile</button></a>
			 <a href="active_chats.php"><button type="button"class="login_button">active chats</button></a>
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