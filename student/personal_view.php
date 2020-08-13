<?php
	session_start();
	require_once('../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
	}
			    $username=$_SESSION['username'];
			    $query="select * from personal where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=$query_run->fetch_assoc();
				}
				

?>
<!DOCTYPE html>
<html>
<head>
<title>Student</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">
	<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?></span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="view.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="request_counselor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Request Counselor
				</a>
				<a href="changepass.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
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
                 <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
				
				</div>
				<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
					
                <div class=mb-6>
	            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
			       More Details:
	            </label>
	                    <p class="text-gray-700 text-base">Family Tree : <br><?php echo $row['famtree'];?></p>
						<p class="text-gray-700 text-base">Whether you stay along with your parents? <br> <?php echo $row['stay'];?></p>
                        <p class="text-gray-700 text-base">Is your home life pleasurable ?<br><?php echo $row['life'];?></p>
						<p class="text-gray-700 text-base">Do you have any social activities ?<br><?php echo $row['social'];?></p>
						<p class="text-gray-700 text-base">What type of skills you have?<br><?php echo $row['skills'];?></p>
						<p class="text-gray-700 text-base">What are your hobbies ?<br><?php echo $row['hobby'];?></p>
                        <p class="text-gray-700 text-base">Which are your thrust areas ?<br><?php echo $row['thrust'];?></p>
						<p class="text-gray-700 text-base">What is the major objective in your life ?<br><?php echo $row['obj'];?></p>
						<p class="text-gray-700 text-base">How is your study practice ?<br> <?php echo $row['study'];?></p>
                        <p class="text-gray-700 text-base">What is your learning pattern ?<br><?php echo $row['learn'];?></p>
						<p class="text-gray-700 text-base">Do you wish to change your attitude towards studies ?<br><?php echo $row['attitude'];?></p>
						<p class="text-gray-700 text-base">What are your strengths & weakness in your behaviour ?<br><?php echo $row['behaviour'];?></p>
						<p class="text-gray-700 text-base">Are you confident in your communication skills ?<br><?php echo $row['communication'];?></p>
                        <p class="text-gray-700 text-base">Do you have any concerns in general ?<br><?php echo $row['concerns'];?></p>
						<p class="text-gray-700 text-base">Are you generally a stress free person?<br><?php echo $row['person'];?></p>
                        <p class="text-gray-700 text-base">Do you have any difficulty with your present theory/practical classes ?<br><?php echo $row['class'];?></p>
                </div>
                    
					<br>
					<br>
					<div class="flex items-center justify-between">
						<a href="personal.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Update details
						</button></a>
					<br>
					<br>
					<div class="flex items-center justify-between">
						<a href="view.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Back
					    </button></a>
					</div>
				</div>
					
			</div>
		</div>
</body>
</html>