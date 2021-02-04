<?php
	session_start();
	require_once('../dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
	}
	//phpinfo();
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$query_run = mysqli_query($con,$query);
	if($query_run)
	{
			        //$row=mysqli_fetch_row($query_run);
        $row=$query_run->fetch_assoc();
	}
	$user_type = $row['user_type'];
	if($user_type == "HOD"){
		$flag = 1;
	}
	else if($user_type == "advisor"){
		$flag = 2;
	}
	else{
		$flag = 0;
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Password_change</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">
<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row['name'];?>)</span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				
				<?php 
					if($flag == 2){
				?>
				<a href="advisor/advisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="advisor/sadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Student
				</a>
				<a href="slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Student List(Dept)
				</a>
				<a href="advisor/slist_class.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Class List
				</a>
				<a href="mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<a href="advisor/requeststofaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Advisorship
				</a>
				<?php } ?>
				<?php 
					if($flag == 1){
				?>
				<a href="hod/hod.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
					</a>
				<a href="hod/request_fwdhod.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Requests
				</a>
				<a href="hod/assignadvisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Assign advisor
				</a>
				<a href="mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<a href="hod/viewfaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Faculty
				</a>
				<a href="slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Students
				</a>
				<?php } ?>
				<?php 
					if($flag == 0){
				?>
				<a href="home.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Students of Department
				</a>
				<a href="mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<?php } ?>
				<a href="changepassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
					Change Password
				</a>
				 </div>
				<div>
				<a href="../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>
		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
					<form action="changepassword.php" method="post" >
					<div class="mb-4">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							Current Password
						</label>
						<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************" required>
						<!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
					</div>
					<div class="mb-6">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							New Password
						</label>
						<input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="npassword" type="password" placeholder="******************" required>
						<!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
					</div>
					<div class="flex items-center justify-between">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="change" type="submit">
							Change 
						</button>
						</form>
						<!-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="../common/forgotpassword/reset-password.php">
							<form action="../common/forgotpassword/reset-password.php" method="post">
								<input type="hidden" name="pageinfo" value="a">
								<button type="submit" name="newpwd">Forgot Password?</button>
							</form>
						</a> -->
					</div>
					
			</div>
		
		<?php
	if(isset($_POST['change']))
	{
		@$password=$_POST['password'];
		@$npassword=password_hash($_POST['npassword'],PASSWORD_DEFAULT);
		$username=$_SESSION['username'];
		$query = "select * from faculty where username='$username';";
		//echo $query;
		$query_run = mysqli_query($con,$query);
		//echo mysql_num_rows($query_run);
		if($query_run)
		{
			if(mysqli_num_rows($query_run)>0)
			{
				$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
				if(password_verify($password,$row['password'])){
						$query = "update faculty set password='$npassword' where username='$username'";
						$query_run = mysqli_query($con,$query);
						if($query_run){
						$_SESSION['username'] = $username;
						$_SESSION['password'] = $npassword;
						
						
						//header( "Location: homepage.php");
						if($row['user_type']=="HOD"){
							echo "<script>window.location.href='hod/hod.php';</script>";
						}else if($row['user_type']=="advisor"){
							echo "<script>window.location.href='advisor/advisor.php';</script>";
						}else{
							echo "<script>window.location.href='home.php';</script>";
						}
					}else{
						echo '<script type="text/javascript">alert("Database Error")</script>';
						if($row['user_type']=="HOD"){
							echo "<script>window.location.href='hod/hod.php';</script>";
						}else if($row['user_type']=="advisor"){
							echo "<script>window.location.href='advisor/advisor.php';</script>";
						}else{
							echo "<script>window.location.href='home.php';</script>";
						}
					}
				}else{
					echo '<script type="text/javascript">alert("Password Incorrect!!")</script>';
					echo "<script>window.location.href='changepassword.php';</script>";
				}
			}else{    					
				//header( "Location: homepage.php");
				if($row['user_type']=="HOD"){
					echo "<script>window.location.href='hod/hod.php';</script>";
				}else if($row['user_type']=="advisor"){
					echo "<script>window.location.href='advisor/advisor.php';</script>";
				}else{
					echo "<script>window.location.href='home.php';</script>";
				}
			}
		}else{
			echo '<script type="text/javascript">alert("Database Error")</script>';
			if($row['user_type']=="HOD"){
				echo "<script>window.location.href='hod/hod.php';</script>";
			}else if($row['user_type']=="advisor"){
				echo "<script>window.location.href='advisor/advisor.php';</script>";
			}else{
				echo "<script>window.location.href='home.php';</script>";
			}
		}
	}else{
		 
	}
		?>
		
	</div>
</body>
</html>