<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	incude('base.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
	<center><h2>Login Form</h2></center>
			<div class="imgcontainer">
				<img src="imgs/avatar.png" alt="Avatar" class="avatar">
			</div>
		<form action="slogin.php" method="post">
		
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
				
			</div>
		</form>
		<div class="inner_container">
		<form action="reset-password.php" method="post">
				<input type="hidden" name="pageinfo" value="a">
				<button type="submit" class="login_button" name="pwd">Forgot Password</button>
	    </div>
	    </form>
		 <?php
                  if(isset($_GET["newpwd"])){
                      if($_GET["newpwd"]=="passwordupdated"){
                          echo '<p class="signupsucess">PASSWORD UPDATED!!</p>';
                      }
                  }
                 ?>
		
		<?php
			if(isset($_POST['login']))
			{
				@$username=$_POST['username'];
				@$password=$_POST['password'];
				$query = "select * from student where username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($con,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['passsword'] = $password;
					
					//header( "Location: homepage.php");
					echo "<script>window.location.href='shome.php';</script>";
					}
					else
					{
						echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>