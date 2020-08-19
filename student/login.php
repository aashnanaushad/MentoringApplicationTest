<?php
	session_start();
	require_once('../dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="../css/tailwind.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class=" bg-blue-400 ">
		<nav class="flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6">
			<span class="font-semibold text-xl tracking-tight">Student Login</span>
		</div>
			<div>
			<a href="../index.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Home</a>
			</div>
	
		</nav>
		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
					<img src="../imgs/login1.gif"/>
				
					<form action="login.php" method="post"  >
					<div class="mb-4">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							Username
						</label>
						<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" type="text" placeholder="Username" required>
					</div>
					<div class="mb-6">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							Password
						</label>
						<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************" required>
						<!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
					</div>
					<div class="flex items-center justify-between">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="login" type="submit">
							LogIn
						</button>
						</form>
						<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="../common/forgotpassword/reset-password.php">
							<form action="../common/forgotpassword/reset-password.php" method="post">
								<input type="hidden" name="pageinfo" value="a">
								<button type="submit"  name="pwd" >Forgot Password?</button>
							</form>
						</a>
					</div>
					
				</div>
		 <?php
                  if(isset($_GET["newpwd"])){
                      if($_GET["newpwd"]=="passwordupdated"){
						//   echo '<p class="signupsucess">PASSWORD UPDATED!!</p>';
						  echo '<script type="text/javascript">alert("PASSWORD UPDATED!!")</script>';
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
					echo "<script>window.location.href='view.php';</script>";
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
</body>
</html>
