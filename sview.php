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
<title>Student</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Profile</h2></center>
		<form action="sview.php" method="get">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div class="profile">
			<?php
			    $username=$_SESSION['username'];
			    $query="select * from student where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        //$row=mysqli_fetch_row($query_run);
			        $row=$query_run->fetch_assoc();
			    }
			 ?>
			<h3>Username:<?php echo $username;?></h3>
			<h3>Name: <?php echo $row['name'];?></h3>
			<h3>Department: <?php echo $row['dept'];?></h3>
			<h3>Batch: <?php echo $row['start_yr'];?></h3>
			<h3>Passout year: <?php echo $row['end_yr'];?></h3>
			<h3>DateOFBirth: <?php echo $row["dateofbirth"];?></h3>
			<h3>Address: <?php echo $row["address"];?></h3>
			<h3>Email: <?php echo $row["email"];?></h3>
			<div class="inner_container">
			    <a href="sedit.php"><button type="button" class="back_btn"> Edit >> </button></a>
			    <a href="shome.php"><button type="button" class="back_btn"><< Back to Home</button></a>	
			</div>
		</form>
	</div>
</body>
</html>