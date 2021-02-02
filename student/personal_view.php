<?php
	session_start();
	require_once('../dbconfig/config.php');
	$flag=0;
	$username;
	if(isset($_GET['user'])){
		$_GET['user'] = $_GET['user'];
		$username=$_GET['user'];
		$flag=1;
	}else{
		if(!isset($_SESSION['username'])){
    			echo "<script>window.location.href='../index.php';</script>";
		}else{
			$username=$_SESSION['username'];
		}
	}
				$q = "select * from student where username='$username'";
				$q_run = mysqli_query($con,$q);
				if($q_run)
				{
					$r=$q_run->fetch_assoc();
				}
			    $query="select * from personal where username='$username'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
			        $row=$query_run->fetch_assoc();
				}
				$form_query='select * from form where username="'.$username.'";';
				$form_query_run = mysqli_query($con,$form_query);
				if($form_query_run){
					if(mysqli_num_rows($form_query_run)==0){
						$form = 1;
					}else{
						$form=0;
					}
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
	<?php
	if($flag==1){
		//no navbar
	}else{
	?>
	<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $r['name'];?>)</span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="view.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="request_counselor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Request Counselor
				</a>
				<?php
                if($form==1){
					?>
					<a href="form.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
						Student Form
					</a>
					<?php
				}
				?>
				<a href="changepass.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
					Change Password
				</a>
				 </div> 
				<div>
				<a href="../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>
			<?php
	}
	?>

		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
        
				<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
					
                <div class=mb-6>
	            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"  >
			       More Details:<?php if($flag==1){echo $r['name'];}?>
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
						<br>
						<p class="text-gray-700 text-base"><b>Additional Skill sets Acquired</b><br><?php echo $row['addskill'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Add On Courses/Certifications</b><br><?php echo $row['courses'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Extracurricular Skills/Acheivements</b><br><?php echo $row['extraskill'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Projects Undertaken</b><br><?php echo $row['project'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Internships Undertaken</b><br><?php echo $row['internship'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Contests/Events/Hackathons Participated</b><br><?php echo $row['hacks'];?></p>
						<br>
						<p class="text-gray-700 text-base"><b>Aspiration Set</b><br><?php echo $row['aspiration'];?></p>


						
					



                </div>
                    
					<br>
					<br>
					<?php
					if($flag==0){
					?>
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
					<?php
					}else{
						?>
					<div class="flex items-center justify-between">
					<br>
					<br>
					<div class="flex items-center justify-between">
					 <?php echo'<a href="view.php?user='.$username.'"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Back
					    </button></a>';?>
					</div>
					<?php
					}
					?>
				</div>
					
			</div>
		</div>
</body>
</html>