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
        
				<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
					
                <div class=mb-6>
	            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"  >
			       More Details:
	            </label>
	                    <p class="text-gray-700 text-base"><b>Family Tree : </b> <br><?php echo $row['famtree'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Whether you stay along with your parents?</b> <br> <?php echo $row['stay'];?></p>
						<br>
                        <p class="text-gray-700 text-base"><b>Is your home life pleasurable ?</b><br><?php echo $row['life'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Do you have any social activities ?</b><br><?php echo $row['social'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>What type of skills you have?</b><br><?php echo $row['skills'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>What are your hobbies ?</b><br><?php echo $row['hobby'];?></p>
						<br>
                        <p class="text-gray-700 text-base"><b>Which are your thrust areas ?</b><br><?php echo $row['thrust'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>What is the major objective in your life ?</b><br><?php echo $row['obj'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>How is your study practice ?</b><br> <?php echo $row['study'];?></p>
						<br>
                        <p class="text-gray-700 text-base"><b>What is your learning pattern ?</b><br><?php echo $row['learn'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Do you wish to change your attitude towards studies ?</b><br><?php echo $row['attitude'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>What are your strengths & weakness in your behaviour ?</b><br><?php echo $row['behaviour'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Are you confident in your communication skills ?</b><br><?php echo $row['communication'];?></p>
						<br>
                        <p class="text-gray-700 text-base"><b>Do you have any concerns in general ?</b><br><?php echo $row['concerns'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Are you generally a stress free person?</b><br><?php echo $row['person'];?></p>
						<br>
                        <p class="text-gray-700 text-base" ><b>Do you have any difficulty with your present theory/practical classes ?</b><br><?php echo $row['class'];?></p>
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