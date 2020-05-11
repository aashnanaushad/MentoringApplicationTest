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
<title>Faculty</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<center><h2>Profile</h2></center>
		<form action="fview.php" method="get">
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div classs="inner_container">
			<?php
			    $username=$_SESSION['username'];
			    $query="select * from faculty where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=$query_run->fetch_assoc();
			        $result=$row['name'];
			        $dept=$row['dept'];
			        $result1=$row['qualification'];
			        $result2=$row['designation'];
			        $result3=$row['email'];
			        $type=$row['user_type'];
			        $batch=$row['batch'];
			    }
			 ?>
			<h3> Username:<?php echo $username;?></h3>
			<h3> Department:<?php echo $dept;?></h3>
			<h3> Name: <?php echo $result;?></h3>
			<h3> Qualification: <?php echo $result1;?></h3>
			<h3> Designation: <?php echo $result2;?></h3>
			<h3> Email: <?php echo $result3;?></h3>
			<?php if ($type!='faculty')
			{ ?>
			<h3> Assigned: <?php echo $type;?></h3>
			<?php } ?>
			<?php if ($type=='advisor')
			{ ?>
			<h3> Batch: <?php echo $batch;?></h3>
			<?php } ?>
			<div class="inner_container">
			        <a href="fedit.php"><button type="button" class="back_btn"> Edit >> </button></a>
			        <?php if ($type=='faculty')
		        	{ ?>
					<a href="fhome.php"><button type="button" class="back_btn"><< Back to Home</button></a>		
					<?php } ?>
					<?php if ($type=='HOD')
		        	{ ?>
					<a href="hod.php"><button type="button" class="back_btn"><< Back to Home</button></a>		
					<?php } ?>
					<?php if ($type=='advisor')
		        	{ ?>
					<a href="advisor.php"><button type="button" class="back_btn"><< Back to Home</button></a>		
					<?php } ?>
			</div>
		</form>
	</div>
</body>
</html>