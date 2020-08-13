<?php
	session_start();
	require_once('../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../../index.php';</script>";
	}
	$username=$_SESSION['username'];
	$query="select * from student where username='$username'";
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
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row['name'];?>)</span>
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
	<div class=" px-3 py-20 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-20 pt-20 pb-20 mb-20 " >
			<div class="bg-white shadow-md rounded px-1 pt-1 pb-1 mb-4 flex flex-col my-2">
		<form action="personal.php" method="post">
		
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Family Tree :
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="famtree" type="text" placeholder="Enter your family tree" >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-lat-name">
				Whether your parents stay along with you ?
			</label>
			<input name="stay" type="radio" id="yes" value="yes"><label for="yes">YES</label><br>
            <input name="stay" type="radio" id="no" value="no"><label for="no">NO</label><br>

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Is your home life pleasurable ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="life" type="text" placeholder="About your home life.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Do you have any social activities ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="social" type="text" placeholder="My social activities are.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				What type of skills you have ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="skills" type="text" placeholder="I am good at.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				What are your hobbies ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="hobby" type="text" placeholder="My hobbies are.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Which are your thrust areas ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="thrust" type="text" placeholder="My thrust areas are.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				what is the major objective in your life ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="obj" type="text" placeholder="My objective for life.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" for="study">
				How is your study practice?
			</label>
			<select  name="study" id="study" >
			   <option value="regular">Regular</option>
               <option value="irregular">Irregular</option>
			   <option value="bookreading">Book Reading</option>
			   <option value="memorizing">Memorizing</option>
			</select>
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" for="learn">
				What is your learning pattern ?
			</label>
			<select name="learn" id="learn" >
			    <option value="visual">Visual</option>
				<option value="auditory">Auditory</option>
				<option value="read,write,revise">Read,Write,Revise</option>
				<option value="hands-on">Kinesthetic(hands-on)</option>
            </select>
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Do you wish to change your attitude towards studies ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="attitude" type="text" placeholder="Improve my.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				What are your strengths & weakness in your behaviour ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="behaviour" type="text" placeholder="My strength and weakness.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Are you confident in your communication skills ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="communication" type="text" placeholder="Communication" >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Do you have any concerns in general ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="concerns" type="text" placeholder="Physical/Psychological/Social/Emotional." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Are you generally a stress free person?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="person" type="text" placeholder="I am.." >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Do you have any difficulty with your present theory/practical classes ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="class" type="text" placeholder="If so, in which areas :" >

			</div>
		</div>
		
		<div class="flex items-center justify-between float-right">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="personal" type="submit">
							Update
						</button>
		</div>
		</form>
		</div>
		</div>
		</div>
</body>
</html>
<?php
			if(isset($_POST['personal']))
			{    
				$query = "select * where username='$username';";
				$query_run = mysqli_query($con,$query);
				@$username=$_POST['username'];
				@$name=$_POST['name'];
				@$famtree=$_POST['famtree'];
				@$stay=$_POST['stay'];
				@$life=$_POST['life'];
				@$social=$_POST['social'];
				@$skills=$_POST['skills'];
				@$hobby=$_POST['hobby'];
				@$thrust=$_POST['thrust'];
				@$obj=$_POST['obj'];
				@$study=$_POST['study'];
				@$learn=$_POST['learn'];
				@$attitude=$_POST['attitude'];
				@$behaviour=$_POST['behaviour'];
				@$communication=$_POST['communication'];
				@$concerns=$_POST['concerns'];
				@$person=$_POST['person'];
				@$class=$_POST['class'];
				
				
				
	 $sql = "INSERT INTO personal (username,famtree,stay,life,social,skills,hobby,thrust,obj,study,learn,attitude,behaviour,communication,concerns,person,class) values ('$username','$famtree','$stay','$life',s'$social','$skills','$hobby','$thrust','$obj','$study','$learn','$attitude','$behaviour','$communication','$concerns','$person','$class')";
     $stmt = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error";
         exit();
     }
     else{
        // mysqli_stmt_bind_param($stmt,"ssss",$username,$reason,$dept,$start_yr);
         mysqli_stmt_execute($stmt);
         echo '<script type="text/javascript">alert("Update Successful")</script>';
         echo "<script>window.location.href='view.php';</script>";
	 }
    }
?>