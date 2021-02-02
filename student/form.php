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
	$query="select * from form where username='$username'";
	$query_run = mysqli_query($con,$query);
	if($query_run)
	{
		if(mysqli_num_rows($query_run)==0){
			$form = 1;
		}else{
			$form=0;
		}
		$row=$query_run->fetch_assoc();
	}
	$cause1=" ";
	$factors1=" ";
	$cognitive1=" ";
	$emotional1=" ";
    $socialeff1=" ";
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Concern Form</title>
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
	<div class=" px-3 py-20 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-20 pt-20 pb-20 mb-20 " >
			<div class="bg-white shadow-md rounded px-1 pt-1 pb-1 mb-4 flex flex-col my-2">
		<form action="form.php" method="post">
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<p class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
				This is for a confidential assessment of certain parameters which may cause burden in your day-to-day life.
				Read carefully and give your sincere inputs under each heads.Please select the stress factors those are applicable to you.
				All the remarks will be kept confidentially.
			</p>
			
			</div>
		</div>
		
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" >
				Name :  <?php echo $r['name'];?>
			</label>
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" >
				D.O.B :  <?php echo $r['dateofbirth'];?>
			</label>
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" >
				Gender :  <?php echo $r['gender'];?> 
			</label>
            </div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" >
				Branch :  <?php echo $r['dept'];?>
			</label>
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" >
				Batch :  <?php echo $r['start_yr'];?>
			</label>
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name" >
				Reg No :  <?php echo $r['username'];?>
			</label>
			</div>
		</div>
		<section class="-mx-3 md:flex mb-">
			<section class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-aspiration" >
				What are your usual causes of stress ?
			</label>
			
			<input type="checkbox" name="cause[]" id="Family Issues" value="Family Issues">
               <label for="Family Issues">Family Issues</label>
			   <br>
			<input type="checkbox" name="cause[]" id="Financial Issues" value="Financial Issues">
               <label for="Financial Issues">Financial Issues</label>
			   <br>
			<input type="checkbox" name="cause[]" id="Health related Issues" value="Health related Issues">
               <label for="Health related Issues">Health related Issues</label>
			   <br>
			<input type="checkbox" name="cause[]" id="Academic related Issues" value="Academic related Issues">
               <label for="Academic related Issues">Academic related Issues</label>
			   <br>
			<input type="checkbox" name="cause[]" id="Behavioural Issues" value="Behavioural Issues">
               <label for="Behavioural Issues">Behavioural Issues</label>
			   <br>
			<input type="checkbox" name="cause[]" id="Emotional Issues" value="Emotional Issues">
               <label for="Emotional Issues">Emotional Issues</label>
			   <br>
			<input type="checkbox" name="cause[]" id="Relationships related Issues" value="Relationships related Issues">
               <label for="Relationships related Issues">Relationships related Issues</label>
			   <br>
			<input type="checkbox" name="cause[]" id="none of the above" value="none of the above">
               <label for="none of the above">None of the above</label>
			   <br>
			<input type="checkbox" name="cause[]" id="others" value="others">
               <label for="others">Others</label>
			   <br>
			   <br>
			
		    Any Other(Please Mention) : <input name="cause[]" id="cause1" type = "text" placeholder="Please Mention" value=<?php $cause1 ?>>
			<br>
			</section>
		</section>
        <br>
		<br>
		<section class="-mx-3 md:flex mb-">
			<section class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				How do you usually experience stress(in the situations selected from the list above)?Please,describe in few words the physical sensations and the feelings you encounter when you call yourself as feeling stressed.
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="expstress" type="text" value=" " placeholder="Mention here" value="<?php echo $row['expstress']?>">

			</section>
		</section>
		<br>
		<br>
        
		<section class="-mx-3 md:flex mb-">
			<section class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-aspiration" >
				What are the most pressing factors in your current academic context(related to this program of study)? Select all that apply.
			</label>
			
			<input type="checkbox" name="factors[]" id="Academic Workload" value="Academic Workload">
               <label for="Academic Workload">Academic Workload</label>
			   <br>
			<input type="checkbox" name="factors[]" id="Study & Life balancing" value="Study & Life balancing">
               <label for="Study & Life balancing">Study & Life balancing</label>
			   <br>
			<input type="checkbox" name="factors[]" id="Relationship with faculty members" value="Relationship with faculty members">
               <label for="Relationship with faculty members">Relationship with faculty members</label>
			   <br>
			<input type="checkbox" name="factors[]" id="Relationship with classmates" value="Relationship with classmates">
               <label for="Relationship with classmates">Relationship with classmates</label>
			   <br>
			<input type="checkbox" name="factors[]" id="Grades" value="Grades">
               <label for="Grades">Grades</label>
			   <br>
			<input type="checkbox" name="factors[]" id="Lack of Interest in Engineering" value="Lack of Interest in Engineering">
               <label for="Lack of Interest in Engineering">Lack of Interest in Engineering</label>
			   <br>
			<input type="checkbox" name="factors[]" id="Difficulty with online classrooms" value="Difficulty with online classrooms">
               <label for="Difficulty with online classrooms">Difficulty with online classrooms</label>
			   <br>
			<input type="checkbox" name="factors[]" id="Financial pressure(fees,living costs)" value="Financial pressure(fees,living costs)">
               <label for="Financial pressure(fees,living costs)">Financial pressure(fees,living costs)</label>
			   <br>
			<input type="checkbox" name="factors[]" id="none of the above" value="none of the above">
               <label for="none of the above">None of the above</label>
			   <br>
			<input type="checkbox" name="factors[]" id="others" value="others">
               <label for="others">Others</label>
			   <br>
			   <br>
			
		    Any Other(Please Mention) : <input name="factors[]" id="factors1" type = "text" placeholder="Please Mention" value=<?php $factors1 ?>>
			<br>
			</section>
		</section>
        <br>
		<br>
		<section class="-mx-3 md:flex mb-">
			<section class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-aspiration" >
				What are the usual cognitive effects of stress you've noticed at yourself? Select all that apply.
			</label>
			
			<input type="checkbox" name="cognitive[]" id="Low attention span" value="Low attention span">
               <label for="Low attention span">Low attention span</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Memory Issues and fogetfulness" value="Memory Issues and fogetfulness">
               <label for="Memory Issues and fogetfulness">Memory Issues and fogetfulness</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Difficulty in concentrating" value="Difficulty in concentrating">
               <label for="Difficulty in concentrating">Difficulty in concentrating</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Low analyzing and comprehending capacity" value="Low analyzing and comprehending capacity">
               <label for="Low analyzing and comprehending capacity">Low analyzing and comprehending capacity</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Concentration difficulty" value="Concentration difficulty">
               <label for="Concentration difficulty">Concentration difficulty</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Poor self-motivation" value="Poor self-motivation">
               <label for="Poor self-motivation">Poor self-motivation</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Lack of an aim" value="Lack of an aim">
               <label for="Lack of an aim">Lack of an aim</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Slow learning" value="Slow learning">
               <label for="Slow learning">Slow learning</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Lack of interest in academics" value="Lack of interest in academics">
               <label for="Lack of interest in academics">Lack of interest in academics</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Subject related difficulty" value="Subject related difficulty">
               <label for="Subject related difficulty">Subject related difficulty</label>
			   <br>
		    <input type="checkbox" name="cognitive[]" id="Instruction related difficulty" value="Instruction related difficulty">
               <label for="Instruction related difficulty">Instruction related difficulty</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Academic perfomance anxiety" value="Academic perfomance anxiety">
               <label for="Academic perfomance anxiety">Academic perfomance anxiety</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Test anxiety/Fear of examinations" value="Test anxiety/Fear of examinations">
               <label for="Test anxiety/Fear of examinations">Test anxiety/Fear of examinations</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="Poor time management" value="Poor time management">
               <label for="Poor time management">Poor time management</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="none of the above" value="none of the above">
               <label for="none of the above">None of the above</label>
			   <br>
			<input type="checkbox" name="cognitive[]" id="others" value="others">
               <label for="others">Others</label>
			   <br>
			   <br>
			
		    Any Other(Please Mention) : <input name="cognitive[]" id="cognitive1" type = "text" placeholder="Please Mention" value=<?php $cognitive1 ?>>
			<br>
			</section>
		</section>
		<br>
		<br>

		<section class="-mx-3 md:flex mb-">
			<section class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-aspiration" >
				What are the usual emotional effects of stress you've noticed at yourself? Select all that apply.
			</label>
			
			<input type="checkbox" name="emotional[]" id="Irritability or anger" value="Irritability or anger">
               <label for="Irritability or anger">Irritability or anger</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Poor self esteem" value="Poor self esteem">
               <label for="Poor self esteem">Poor self esteem</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Restlessness" value="Restlessness">
               <label for="Restlessness">Restlessness</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Feeling of lonliness" value="Feeling of lonliness">
               <label for="Feeling of lonliness">Feeling of lonliness</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Anxiety or Fear" value="Anxiety or Fear">
               <label for="Anxiety or Fear">Anxiety or Fear</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Inferiority complexes" value="Inferiority complexes">
               <label for="Inferiority complexes">Inferiority complexes</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Superiority complexes" value="Superiority complexes">
               <label for="Superiority complexes">Superiority complexes</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Lack of confidence" value="Lack of confidence">
               <label for="Lack of confidence">Lack of confidence</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Poor sleep" value="Poor sleep">
               <label for="Poor sleep">Poor sleep</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Moodiness,grief or depression" value="Moodiness,grief or depression">
               <label for="Moodiness,grief or depression">Moodiness,grief or depression</label>
			   <br>
		    <input type="checkbox" name="emotional[]" id="Substance abuse" value="Substance abuse">
               <label for="Substance abuse">Substance abuse</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Overthinking or chain of thoughts" value="Overthinking or chain of thoughts">
               <label for="Overthinking or chain of thoughts">Overthinking or chain of thoughts</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="Negativity" value="Negativity">
               <label for="Negativity">Negativity</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="none of the above" value="none of the above">
               <label for="none of the above">None of the above</label>
			   <br>
			<input type="checkbox" name="emotional[]" id="others" value="others">
               <label for="others">Others</label>
			   <br>
			   <br>
			
		    Any Other(Please Mention) : <input name="emotional[]" id="emotional1" type = "text" placeholder="Please Mention" value=<?php $emotional1 ?>>
			<br>
			</section>
		</section>
		<br>
		<br>

		<section class="-mx-3 md:flex mb-">
			<section class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-aspiration" >
				What are the usual social effects of stress you've noticed at yourself? Select all that apply.
			</label>
			
			<input type="checkbox" name="socialeff[]" id="Withdrawing or isolated from people" value="Withdrawing or isolated from people">
               <label for="Withdrawing or isolated from people">Withdrawing or isolated from people</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Difficulty in sharing ideas" value="Difficulty in sharing ideas">
               <label for="Difficulty in sharing ideas">Difficulty in sharing ideas</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Difficulty in engaging multiple problem solving" value="Difficulty in engaging multiple problem solving">
               <label for="Difficulty in engaging multiple problem solving">Difficulty in engaging multiple problem solving</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Blaming" value="Blaming">
               <label for="Blaming">Blaming</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Criticizing" value="Criticizing">
               <label for="Criticizing">Criticizing</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Intolerance of group activities" value="Intolerance of group activities">
               <label for="Intolerance of group activities">Intolerance of group activities</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Difficulty in giving support to others" value="Difficulty in giving support to others">
               <label for="Difficulty in giving support to others">Difficulty in giving support to others</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Difficulty in taking support from others" value="Difficulty in taking support from others">
               <label for="Difficulty in taking support from others">Difficulty in taking support from others</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Impatience with others" value="Impatience with others">
               <label for="Impatience with others">Impatience with others</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Isolation feeling in a group" value="Isolation feeling in a group">
               <label for="Isolation feeling in a group">Isolation feeling in a group</label>
			   <br>
		    <input type="checkbox" name="socialeff[]" id="Stage fear" value="Stage fear">
               <label for="Stage fear">Stage fear</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Lack of synergy" value="Lack of synergy">
               <label for="Lack of synergy">Lack of synergy</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="Lack of trust in others" value="Lack of trust in others">
               <label for="Lack of trust in others">Lack of trust in others</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="none of the above" value="none of the above">
               <label for="none of the above">None of the above</label>
			   <br>
			<input type="checkbox" name="socialeff[]" id="others" value="others">
               <label for="others">Others</label>
			<br>
			<br>
		    Any Other(Please Mention) : <input name="socialeff[]" id="socialeff1" type = "text" placeholder="Please Mention" value=<?php $socialeff1 ?>>
			<br>
			</section>
		</section>
		<div class="flex items-center justify-between float-right">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="form" type="submit">
							Submit
						</button>
		</div>


        </form>
		</div>
		</div>
		</div>
</body>
</html>
<?php
			if(isset($_POST['form']))
			{   
				@$username=$_SESSION['username'];
				@$name=$r['name'];
				@$dob=$r['dateofbirth'];
				@$gender=$r['gender'];
				@$branch=$r['dept'];
				@$batch=$r['start_yr'];
				@$regno=$r['username']; 
				//@$cause=$_POST['cause'];
                $checkbox1=$_POST['cause'];  
                $causechk="";  
                foreach($checkbox1 as $causechk1)  
                {  
                    $causechk .= $causechk1.",";  
                }
				@$expstress=$_POST['expstress'];
				//@$factors=$_POST['factors'];
				$checkbox2=$_POST['factors'];  
                $factorschk="";  
                foreach($checkbox2 as $factorschk1)  
                {  
                    $factorschk .= $factorschk1.",";  
                }
				//@$cognitive=$_POST['cognitive'];
				$checkbox3=$_POST['cognitive'];  
                $cognitivechk="";  
                foreach($checkbox3 as $cognitivechk1)  
                {  
                    $cognitivechk .= $cognitivechk1.",";  
                }
				//@$emotional=$_POST['emotional'];
				$checkbox4=$_POST['emotional'];  
                $emotionalchk="";  
                foreach($checkbox4 as $emotionalchk1)  
                {  
                    $emotionalchk .= $emotionalchk1.",";  
                }
				//@$socialeff=$_POST['socialeff'];
				$checkbox5=$_POST['socialeff'];  
                $socialeffchk="";  
				foreach($checkbox5 as $socialeffchk1)  
                {  
                    $socialeffchk .= $socialeffchk1.",";  
				}
			    
				
				
				//@$cause1=$_POST['cause1'];
				//@$factors1=$_POST['factors1'];
				//@$cognitive1=$_POST['cognitive1'];
				//@$emotional1=$_POST['emotional1'];
				//@$socialeff1=$_POST['socialeff1'];
				

				if($causechk == "others"){
					$causechk = $cause1 ;
				}
				if($factorschk == "others"){
					$factorschk = $factors1 ;
				}
				if($cognitivechk == "others"){
					$cognitivechk = $cognitive1 ;
				}
				if($emotionalchk == "others"){
					$emotionalchk = $emotional1 ;
				}
				if($socialeffchk == "others"){
					$socialeffchk = $socialeff1 ;
				}
				

				$query = "select * from form where username='$username'";
				$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0){
					$query = "update form set username='$username',name='$name',dob= '$dob',gender='$gender',branch='$branch',batch='$batch',regno='$username',cause='$causechk',expstress='$expstress',factors='$factorschk',cognitive='$cognitivechk',emotional='$emotionalchk',socialeff='$socialeffchk' where username='$username'";
					$query_run = mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript">alert("Updates saved!")</script>';
						echo "<script>window.location.href='view.php';</script>";
					}
					else
					{
						echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
					}
				}
				else
				{
					$query = "insert into form values('$username','$name','$dob','$gender','$branch','$batch','$regno','$causechk','$expstress','$factorschk','$cognitivechk','$emotionalchk','$socialeffchk')";
					$query_run = mysqli_query($con,$query);
					if($query_run)
					{	
						echo '<script type="text/javascript">alert("Updates saved!")</script>';
						echo "<script>window.location.href='view.php';</script>";
					}
					else
					{
						echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
					}
				}	
			}
?>