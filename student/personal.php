<?php
	session_start();
	require_once('../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../../index.php';</script>";
	}
	$username=$_SESSION['username'];
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
	$aspiration1 = "";
	
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
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" >
				Family Tree :
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="famtree" type="text" placeholder="Enter your family tree" value="<?php echo $row['famtree']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-lat-name">
				Whether your parents stay along with you ?
			</label>
			<input name="stay" type="radio" id="yes" value="yes" ><label for="yes">YES</label><br>
            <input name="stay" type="radio" id="no" value="no"><label for="no">NO</label><br>

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Is your home life pleasurable ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="life" type="text" placeholder="About your home life.." value="<?php echo $row['life']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Do you have any social activities ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="social" type="text" placeholder="My social activities are.." value="<?php echo $row['social']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				What type of skills you have ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="skills" type="text" placeholder="I am good at.." value="<?php echo $row['skills']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				What are your hobbies ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="hobby" type="text" placeholder="My hobbies are.." value="<?php echo $row['hobby']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Which are your thrust areas ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="thrust" type="text" placeholder="My thrust areas are.." value="<?php echo $row['thrust']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				what is the major objective in your life ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="obj" type="text" placeholder="My objective for life.." value="<?php echo $row['obj']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" for="study">
				How is your study practice?
			</label>
			<select  name="study" id="study" value="<?php echo $row['study']?>">
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
			<select name="learn" id="learn" value="<?php echo $row['learn']?>">
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
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="attitude" type="text" placeholder="Improve my.." value="<?php echo $row['attitude']?>">

			</div>
		</div>
		
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Additional skill sets acquired
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="addskill" type="text" placeholder="Mention here" value="<?php echo $row['addskill']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Add on courses/certifications
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="courses" type="text" placeholder="Mention about completed courses" value="<?php echo $row['courses']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Extracurricular Skills/Achievement
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="extraskill" type="text" placeholder="I am good at.." value="<?php echo $row['extraskill']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Projects Undertaken
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="project" type="text" placeholder="Mention here" value="<?php echo $row['project']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Internships Undertaken
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="internship" type="text" placeholder="Mention here" value="<?php echo $row['internship']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Events Participated
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="hacks" type="text" placeholder="CONTESTS/EVENTS/HACKATHONS" value="<?php echo $row['hacks']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" for="aspiration">
				Aspiration Set
			</label>
			<select  name="aspiration" id="aspiration" value="<?php echo $row['aspiration']?>">
			   <option value="Dream company jobs">Dream company jobs</option>
               <option value="Campus cream placements">Campus cream placements</option>
			   <option value="Higher study Abroad">Higher study Abroad</option>
			   <option value="Higher study in Teir 1 institutions in India">Higher study in Teir 1 institutions in India</option>
			   <option value="others">Others</option>
			</select>
		    If Others: <input name="aspiration1" placeholder="Please specify" value="<?php echo $aspiration1 ?>">
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				What are your strengths & weakness in your behaviour ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="behaviour" type="text" placeholder="My strength and weakness.." value="<?php echo $row['behaviour']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Are you confident in your communication skills ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="communication" type="text" placeholder="Communication" value="<?php echo $row['communication']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Do you have any concerns in general ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="concerns" type="text" placeholder="Physical/Psychological/Social/Emotional." value="<?php echo $row['concerns']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Are you generally a stress free person?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="person" type="text" placeholder="I am.." value="<?php echo $row['person']?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Do you have any difficulty with your present theory/practical classes ?
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="class" type="text" placeholder="If so, in which areas :" value="<?php echo $row['class']?>">

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
				@$username=$_SESSION['username']; 
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
				@$addskill=$_POST['addskill'];
				@$courses=$_POST['courses'];
				@$extraskill=$_POST['extraskill'];
				@$project=$_POST['project'];
				@$internship=$_POST['internship'];
				@$hacks=$_POST['hacks'];
				@$aspiration=$_POST['aspiration'];
				@$behaviour=$_POST['behaviour'];
				@$communication=$_POST['communication'];
				@$concerns=$_POST['concerns'];
				@$person=$_POST['person'];
				@$class=$_POST['class'];

				$query = "select * from personal where username='$username'";
				$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0){
					$query = "update personal set username='$username',famtree= '$famtree',stay='$stay',life='$life',social='$social',skills='$skills',hobby='$hobby',thrust='$thrust',obj='$obj',study='$study',learn='$learn',attitude='$attitude',addskill='$addskill',courses='$courses',extraskill='$extraskill',project='$project',internship='$internship',hacks='$hacks',aspiration='$aspiration',behaviour='$behaviour',communication='$communication',concerns='$concerns',person='$person',class='$class' where username='$username'";
					$query_run = mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Updates saved!")</script>';
						echo "<script>window.location.href='personal_view.php';</script>";
					}
					else
					{
						echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
					}
				}
				else
				{
					$query = "insert into personal values('$username','$famtree','$stay','$life','$social','$skills','$hobby','$thrust','$obj','$study','$learn','$attitude','$addskill','$courses','$extraskill','$project','$internship','$hacks','$aspiration','$behaviour','$communication','$concerns','$person','$class')";
					$query_run = mysqli_query($con,$query);
					if($query_run)
					{	
						echo '<script type="text/javascript">alert("Updates saved!")</script>';
						echo "<script>window.location.href='personal_view.php';</script>";
					}
					else
					{
						echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
					}
				}	
			}
?>