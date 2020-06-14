<?php
	session_start();
	require_once('dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
	//phpinfo();
?>
<html>
<head>
<title>Student</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Student Requests</h2></center>
		
		
	

		<form action="sadd.php" method="post">
			
			<div class="inner_container">
			 <center><a href="sedit_confirm.php"><button type="button" class="change_button" >Edit Requests</button></a></center>
			 <center><a href="request_forward.php"><button type="button" class="change_button">Counsellor Requests</button></a></center>
			 <center><a href="advisor.php"><button type="button" class="back_btn"><< Back to Home</button></a></center>

			</div>
		</form>
    </div>
</body>    
</html>