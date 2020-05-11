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
<title>Add Counselor</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<h2>Add counselor details:</h2>
		<form action="cadd.php" method="post">
			<div class="inner_container">
				<label><b>Name</b></label>
				<input type="text" placeholder="Enter Name" name="name" >
				<label><b>Username*</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Qualification</b></label>
				<input type="text" placeholder="Enter Qualification" name="qualification" >
				<label><b>Email</b></label>
				<input type="text" placeholder="Enter EmailID" name="email" >
				<!--<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>-->
				<label><b>* denotes required field</b></label>
				<a href="homepage.php"><button name="cadd" class="sign_up_btn" type="submit">Submit</button></a>
				
				<a href="homepage.php"><button type="button" class="back_btn"><< Back</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['cadd']))
			{
				@$name=$_POST['name'];
				@$username=$_POST['username'];
				@$qualification=$_POST['qualification'];
				@$email=$_POST['email'];
				@$password=$_POST['username'];
				
					$query = "select * from counselor where username='$username'";
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
							$query = "insert into counselor values('$name','$username','$qualification','$email','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Success! Counselor added")</script>';
								//$_SESSION['username'] = $username;
								//$_SESSION['password'] = $password;
								//header( "Location: index.php");
								echo "<script>window.location.href='homepage.php';</script>";
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