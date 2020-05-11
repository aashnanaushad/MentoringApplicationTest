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
		<center><h2>Profile</h2></center>
		<form action="cview.php" method="get">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
			<?php
			    $username=$_SESSION['username'];
			    $query="select * from counselor where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=mysqli_fetch_row($query_run);
			        $result=$row[0];
			        $result1=$row[2];
			        $result2=$row[3];
			    }
			 ?>
			<h3>Username:<?php echo $username;?></h3>
			<h3>Name: <?php echo $result;?></h3>
			<h3>Qualification: <?php echo $result1;?></h3>
			<h3>Email: <?php echo $result2;?></h3>
			<div class="inner_container">
			    <a href="cedit.php"><button type="button" class="back_btn"> Edit >> </button></a>
				<a href="chome.php"><button type="button" class="back_btn"><< Back to Home</button></a>	
			</div>
		</form>
	</div>
</body>
</html>