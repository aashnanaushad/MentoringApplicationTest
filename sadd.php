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
    <link href="css/tailwind.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class=" bg-blue-400 ">
<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row1['name'];?>)</span>
		</div>

		<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="advisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="sadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Student
				</a>
				<a href="slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Student List(Dept)
				</a>
				<a href="slist_class.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Class List
				</a>
				<a href="requeststofaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Requests
				</a>
				<a href="change_pass2.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Change Password
				</a>
				</div>
                <div>
				<a href="logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
            </div>
			
		</nav>
	<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
		<form action="sadd.php" method="post">
		<div class="-mx-3 md:flex mb-6">
				
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Username
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="username" type="text" placeholder="XXX00XX000">
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="name" type="text" placeholder="example">
			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Email ID
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="email" type="text" placeholder="example@mgits.ac.in" >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Address
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="adress" type="text" placeholder="xyz lane, pqr town">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
				DOB
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="dob"  type="text" placeholder="0000-00-00" >
			</div>
		</div>
		
		<div class="flex items-center justify-between float-right">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="sadd" type="submit">
							Add
						</button>
			</div>
		</form>
		</div>
		</div>
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
				@$reqcon=0;
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
							
							echo $reqcon ;
							$query = "insert into student values('$name','$username','$dept','$start_yr','$end_yr','$dob','$address','$email','$password','$edit','$reqcon')";
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