<?php
	session_start();
	require_once('../dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
	}
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">
	<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight">Administrator</span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="fadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Faculty
				</a>
				<a href="cadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Counselor
				</a>
				<a href="assignhod.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Assign HOD
				</a>
				<a href="viewallfaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Faculty
				</a>
				<a href="studentlist.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Students
				</a>
				<a href="homepage.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 ">
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
					<form action="homepage.php" method="post" >
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
						<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="common/forgotpassword/reset-password.php">
							<form action="reset-password.php" method="post">
								<input type="hidden" name="pageinfo" value="c">
								<button type="submit" name="newpwd">Forgot Password?</button>
							</form>
						</a>
					</div>
					
			</div>
		
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