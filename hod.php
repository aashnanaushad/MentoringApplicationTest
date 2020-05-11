<?php
	session_start();
	require_once('dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
    //header('location:index.php');
     }
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="sub-wrapper">
		<center><h2>Home Page</h2></center>
		<center><h3>Welcome HOD(<?php echo $_SESSION['username']; ?>)</h3></center>
		<div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		</div>
		
		<form action="fview.php" method="post">
			
			<div class="inner_container">
			  <center> <a href="changepass.php"><button class="change_button" type="button">Change Password</button></a></center>
			 <center><a href="fview.php"><button type="button" class="change_button">View Profile</button></a></center>
			 
			</div>
		</form>

		<form action="sadd.php" method="post">
			
			<div class="inner_container">
			 <center><a href="viewfaculty.php"><button type="button" class="change_button" >Faculties of Department</button></a></center>
			 <center><a href="slist_dept.php"><button type="button" class="change_button" >Students of Department</button></a></center>
			<!-- <center><a href="#"><button type="button" class="change_button">Confirm Edits</button></a></center>-->
			<center><a href="assignadvisor.php"><button type="button" class="change_button">Assign Advisor</button></a></center>
				<center><a href="request_fwdhod.php"><button type="button" class="change_button" >Counselor request</button></a></center>
			</div>
		</form>

		<form action="logout.php" method="post">
			<div class="inner_container">
				<button class="change_button2" type="submit">Log Out</button>
			</div>
		</form>
        
	</div>
</body>
</html>