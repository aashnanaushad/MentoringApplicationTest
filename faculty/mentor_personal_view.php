<?php
	session_start();
	require_once('../dbconfig/config.php');
	$flag=0;
	$username;
	if(isset($_GET['user'])){
		$_GET['user'] = $_GET['user'];
		$username=$_GET['user'];
		$flag=1;
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
                </div>
                    
					
					<br>
					<br>
					<div class="flex items-center justify-between">
						 
					<?php echo'<a href="mentorview.php?user='.$username.'"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Back
					    </button></a>';?>
					</div>

				</div>
					
			</div>
		</div>
</body>
</html>