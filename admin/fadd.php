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
<title>Add Faculty</title>
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
				<a href="sadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Student
				</a>
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
				<a href="common/logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>
		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
			<form action="fadd.php" method="post">
		<div class="-mx-3 md:flex mb-6">
				
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Username
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="username" type="text" placeholder="00XX000">
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
				Qualification
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="qualification" type="text" placeholder="ABC">

			</div>
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Designation
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="designation" type="text" placeholder="Professor">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
				Department
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="dept"  type="text" placeholder="XXX" >
			</div>
		</div>
		
		<div class="flex items-center justify-between float-right">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="fadd" type="submit">
							Add
						</button>
			</div>
		</form>
		</div>
		<?php
			if(isset($_POST['fadd']))
			{
				@$name=$_POST['name'];
				@$username=$_POST['username'];
				@$qualification=$_POST['qualification'];
				@$designation=$_POST['designation'];
				@$email=$_POST['email'];
				@$password=$_POST['username'];
				@$dept=$_POST['dept'];
				$type='faculty';
				$batch=0;
				
					$query = "select * from faculty where username='$username'";
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
							$query = "insert into faculty values('$name','$username','$dept','$qualification','$designation','$email','$password','$type','$batch')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Success! Faculty added")</script>';
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
	</div>
</body>
</html>