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
<title>Password_change</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Change password</h2></center>
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
		<form action="changepass.php" method="post">
		
			<div class="inner_container">
				<label><b>Current Password</b></label>
				<input type="password" placeholder="Enter Current Password" name="password" required>
				<label><b>New Password</b></label>
				<input type="password" placeholder="Enter New Password" name="npassword" required>
				<button class="login_button" name="change" type="submit">Change</button>
			</div>
		</form>
		
		<?php
			if(isset($_POST['change']))
			{
				@$password=$_POST['password'];
				@$npassword=$_POST['npassword'];
				$username=$_SESSION['username'];
				$query = "select * from student where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					$query = "update student set password='$npassword' where username='$username'";
					$query_run = mysqli_query($con,$query);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $npassword;
					
					
					//header( "Location: homepage.php");
					echo "<script>window.location.href='logout.php';</script>";
					}
					else
					{
						//echo '<script type="text/javascript">alert("Something went wrong")</script>';
                        $query = "select * from faculty where username='$username' and password='$password';";
        				//echo $query;
        				$query_run = mysqli_query($con,$query);
        				//echo mysql_num_rows($query_run);
        				if($query_run)
        				{
        					if(mysqli_num_rows($query_run)>0)
        					{
        					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
        					$query = "update faculty set password='$npassword' where username='$username';";
        					$query_run = mysqli_query($con,$query);
        					
        					$_SESSION['username'] = $username;
        					$_SESSION['password'] = $npassword;
        					
        					
        					//header( "Location: homepage.php");
        					echo "<script>window.location.href='logout.php';</script>";
        					}
        					else
        					{
        						//echo '<script type="text/javascript">alert("Something went wrong")</script>';
        						 $query = "select * from counselor where username='$username' and password='$password'";
                				//echo $query;
                				$query_run = mysqli_query($con,$query);
                				//echo mysql_num_rows($query_run);
                				if($query_run)
                				{
                					if(mysqli_num_rows($query_run)>0)
                					{
                					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                					$query = "update counselor set password='$npassword' where username='$username';";
                					$query_run = mysqli_query($con,$query);
                					
                					$_SESSION['username'] = $username;
                					$_SESSION['password'] = $npassword;
                					
                					
                					//header( "Location: homepage.php");
                					echo "<script>window.location.href='logout.php';</script>";
                					}
                					else
                					{
                						//echo '<script type="text/javascript">alert("Something went wrong")</script>';
                						$query = "select * from admin where username='$username' and password='$password';";
                        				//echo $query;
                        				$query_run = mysqli_query($con,$query);
                        				//echo mysql_num_rows($query_run);
                        				if($query_run)
                        				{
                        					if(mysqli_num_rows($query_run)>0)
                        					{
                        					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                        					$query = "update admin set password='$npassword' where username='$username'";
                        					$query_run = mysqli_query($con,$query);
                        					
                        					$_SESSION['username'] = $username;
                        					$_SESSION['password'] = $npassword;
                        					
                        					
                        					//header( "Location: homepage.php");
                        					echo "<script>window.location.href='logout.php';</script>";
                        					}
                        					else
                        					{
                        						echo '<script type="text/javascript">alert("Something went wrong")</script>';
                        					}
                        				}
                        				else
                        				{
                        				    echo '<script type="text/javascript">alert("DB ERROR")</script>';
                        				}
                					}
                				}
        					}
					    }
			    	}   
				}	
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>