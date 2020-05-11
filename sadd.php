<?php
	session_start();
	require_once('dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$batch=$row1['batch'];
	
	$dept=$row1['dept'];
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<h2>Add student details:</h2>
		<form action="sadd.php" method="post">
			<div class="inner_container">
				<label><b>Name</b></label>
				<input type="text" placeholder="Enter Name" name="name" >
				<label><b>Username*</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>DOB</b></label>
				<input type="date" placeholder="dd-mm-yyyy" name="dob" >
				<label><b>Address</b></label>
				<input type="text" placeholder="Enter Address" name="address" >
				<label><b>Email</b></label>
				<input type="text" placeholder="user@example.com" name="email" >
				<label><b>* denotes required field</b></b></label>
				<!--<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>-->
				<a href="fhome.php"><button name="sadd" class="sign_up_btn" type="submit">Submit</button></a>
				
				<a href="fhome.php"><button type="button" class="back_btn"><< Back</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['sadd']))
			{
				@$name=$_POST['name'];
				@$username=$_POST['username'];
				@$dob=$_POST['dob'];
				@$address=$_POST['address'];
				@$email=$_POST['email'];
				@$password=$_POST['username'];
				$end=4;
				@$start_yr=$batch;
				@$end_yr=$batch+$end;
				@$edit=0;
				$dept=$dept;
				
				if (empty($name)){
				    $name=" ";
				}
				if (empty($dob)){
				    $dob='00000000';
				}
				if (empty($address)){
				    $address=" ";
				}
				if (empty($email)){
				    $email=" ";
				}
				//echo $name;
				
		    	$query = "select * from student where username='$username'";
					//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into student values('$name','$username','$dept','$start_yr','$end_yr','$dob','$address','$email','$password','$edit')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Success! student added")</script>';
								//$_SESSION['username'] = $username;
								//$_SESSION['password'] = $password;
								//header( "Location: index.php");
								echo "<script>window.location.href='advisor.php';</script>";
							}
							else
							{
								echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				
			}
			else
			{
			}
		?>
	</div>
</body>
</html>