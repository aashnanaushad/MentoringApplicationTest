<?php
	session_start();
	require_once('dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
	$username=$_SESSION['username'];
			    $query="select * from faculty where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=$query_run->fetch_assoc();
			    }
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Advisor</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/tailwind.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class=" bg-blue-400 ">
	<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row['name'];?>)</span>
		</div>
		<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="fview.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="changepassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Change Password
				</a>

				<div class="relative inline-flex">
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                 <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                   <option>Student</option>
                   <option a href="sadd.php">Add Student</option></a>
                   <option a href="slist_dept.php">Students Of Department</option></a>
                   <option a href="slist_class.php" >Students Of Class</option></a>
				   <option a href="confirm_requests.php" >Requests</option></a>
				
                  </select>
				</div>
                <div>
				<a href="logout.php" class=" mr-0 inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
            </div>
			</div>
			
		</nav>
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
		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
				<div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
					<img src="imgs/avatar.png" />

				</div>
				<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
					<div class="mb-4">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							Professional Details:
						</label>
						<p class="text-gray-700 text-base">Unique ID: <?php echo $username;?></p>
						<p class="text-gray-700 text-base">Department: <?php echo $dept;?></p>
						<p class="text-gray-700 text-base">Designation: <?php echo $result2;?></p>
					</div>
					<div class="mb-6">
						<label class="block text-gray-700 text-sm font-bold mb-2" >
							Personal Details:
						</label>
						<p class="text-gray-700 text-base">Name: <?php echo $result;?></p>
						<p class="text-gray-700 text-base">Email ID: <?php echo $result3;?></p>
						<p class="text-gray-700 text-base">Qualification: <?php echo $result1;?></p>
					</div>
					<div class="flex items-center justify-between">
						<a href="fedit.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" name="login">
							Edit Profile
						</button></a>
					</div>
				</div>

	</div>
</body>
</html>