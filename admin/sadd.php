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
<title>Add Student</title>
<link rel="stylesheet" href="../css/style.css">
    <link href="../css/tailwind.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class=" bg-blue-400 ">
    <nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight">Administrator</span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
                <a href="homepage.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Home
				</a>
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
				<a href="changepass.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 ">
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
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Upload CSV File 
			</label>
</div></div>
	   <form action="script.php" method="post" enctype="multipart/form-data">
	   <div class="-mx-3 md:flex mb-6">
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
       <input type="file" name="excelDoc" id="excelDoc" required/>
</div>
       <div class="md:w-1/2 px-3 mb-6 md:mb-0">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="uploadBtn" id="uploadBtn" type="submit">
						Upload
						</button>
</div>
</div>
	   
       </form>
	   <br>
		<form action="sadd.php" method="post">
		
		<div class="-mx-3 md:flex mb-6">
				
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Username <div class="inline text-red-700">*</div>
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="username" type="text" placeholder="XXX00XX000" required>
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="name" type="text" placeholder="example">
			</div>
		</div>
        <div class="-mx-3 md:flex mb-6">
				
            <div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Department <div class="inline text-red-700">*</div>
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="dept" type="text" placeholder="XXX" required>
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Batch <div class="inline text-red-700">*</div>
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="batch" type="text" placeholder="0000" required>
			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			<div class="md:w-full px-3 mb-6 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Email ID
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="email" type="text" placeholder="example@mgits.ac.in" >

			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			
			<div class="md:w-full px-3 mb-6 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Address
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="address" type="text" placeholder="xyz lane, pqr town">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-dateofbirth">
				DOB <div class="inline text-red-700">*</div>
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="dateofbirth"  type="text" placeholder="0000-00-00" required>
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Contact
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="phone_no" type="text" placeholder="1234567890" >
			</div>
		</div>

        <div class="-mx-3 md:flex mb-6">
				
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
   
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Gender
			</label>
			<label class="inline-flex items-center mt-3"><input name="gender" class="form-radio h-5 w-5 text-gray-600" type="radio" id="male" value="male"><label for="male" class="ml-2 text-gray-700">Male</label></label><br>
            <label class="inline-flex items-center mt-3"><input name="gender" class="form-radio h-5 w-5 text-gray-600" type="radio" id="female" value="female"><label for="female" class="ml-2 text-gray-700">Female</label></label><br>
            <label class="inline-flex items-center mt-3"><input name="gender" class="form-radio h-5 w-5 text-gray-600" type="radio" id="other" value="other"><label for="other" class="ml-2 text-gray-700">Other</label></label><br>
		    </div>
		</div>
		<div class="-mx-3 md:flex mb-6">
				
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Father's Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="father" type="text" placeholder="Name">
			</div>
			<div class="md:w-1/2 px-3 ">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Occupation
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="focc" type="text" placeholder="Occupation">
			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
				
			<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Mother's Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="mother" type="text" placeholder="Name">
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
			    Occupation
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="mocc" type="text" placeholder="Occupation">
			</div>
		</div>
        
		<div class="container">
		<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
			   Academic details
			</label>
			<div class="shadow overflow-hidden rounded border-b border-gray-200">
			<div class="-mx-3 md:flex mb-6">
			
             <table class="text-left w-full ml-8">
              <thead class="bg-gray-800 flex text-white w-full">
            <tr class="flex w-full mb-4">
                <th class="w-1/4 p-4">QUALIFICATION</th>
                <th class="w-1/4 p-4">NAME OF SCHOOL & SYLLABUS</th>
                <th class="w-1/4 p-4">TOTAL MARKS</th>
                <th class="w-1/4 p-4">PERCENTAGE</td>
            </tr>
            </thead>
            <tbody class="text-grey-light flex flex-col items-center justify-between w-full" >
            <tr class="flex w-full mb-1">
                <td class="w-1/4 text-left p-4">GRADE X</td>
       			<td class="w-1/4 text-left p-4"><input name="school10" type="text" placeholder="Name of school,Syllabus" class="w-2/3"></td>
        		<td class="w-1/4 text-left p-4"><input name="mark10" type="text" placeholder="Total Marks/Grade[X]" class="w-2/3"></td>
        		<td class="w-1/4 text-left p-4"><input name="perc10" type="text" placeholder="Percentage[X]" class="w-2/3"></td>
      		</tr>
      		<tr class="flex w-full mb-1">
        		<td class="w-1/4 text-left p-4">GRADE XII</td>
        		<td class="w-1/4 text-left p-4"><input name="school12" type="text" placeholder="Name of school,Syllabus" class="w-2/3"></td>
        		<td class="w-1/4 text-left p-4"><input name="mark12" type="text" placeholder="Total Marks/Grade[XII]" class="w-2/3"></td>
        		<td class="w-1/4 text-left p-4"><input name="perc12" type="text" placeholder="Percentage[XII]" class="w-2/3"></td>
      		</tr>
      		<tr class="flex w-full mb-1">
        		<td class="w-1/4 text-left p-4">Any Other</td>
       		 	<td class="w-1/4 text-left p-4"><input name="othername" type="text" placeholder="Name of school,Syllabus" class="w-2/3"></td>
        		<td class="w-1/4 text-left p-4"><input name="othermark" type="text" placeholder="Total Marks/Grade" class="w-2/3"></td>
        		<td class="w-1/4 text-left p-4"><input name="otherperc" type="text" placeholder="Percetage" class="w-2/3"></td>
      		</tr>
    		</tbody>
    		</table>
  		</div>
	</div>
    
	<div class="md:px-32 py w-full">
	<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 mt-2" >
				Semester wise performance
			</label>
	<div class="-mx-3 md:flex mb-6">
            
            <div class="shadow overflow-hidden rounded ">
            <table class="w-full ml-8">
            <thead class="bg-gray-800 text-white w-full flex">
            <tr class="flex w-full mb-4">
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">SEMESTER</th>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">CGPA</th>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">NO: OF ARREARS</th>
            </tr>
            </thead>
            <tbody class="text-grey-700 flex flex-col items-center justify-between w-full" >
            <tr class="flex w-full mb-1">
                <td class="w-1/3 text-left p-4">SEMESTER 1</td>
       			<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C1" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A1" type="text" placeholder="0"></td>
      		</tr>
      		<tr class="bg-gray-100 flex w-full mb-1">
        		<td class="w-1/3 text-left p-4">SEMESTER 2</td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C2" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A2" type="text" placeholder="0"></td>
      		</tr>
			  <tr class="flex w-full mb-1">
                <td class="w-1/3 text-left p-4">SEMESTER 3</td>
       			<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C3" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A3" type="text" placeholder="0"></td>
      		</tr>
			<tr class="bg-gray-100 flex w-full mb-1">
        		<td class="w-1/3 text-left p-4">SEMESTER 4</td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C4" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A4" type="text" placeholder="0"></td>
      		</tr>
			<tr class="flex w-full mb-1">
                <td class="w-1/3 text-left p-4">SEMESTER 5</td>
       			<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C5" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A5" type="text" placeholder="0"></td>
      		</tr>
			<tr class="bg-gray-100 flex w-full mb-1">
        		<td class="w-1/3 text-left p-4">SEMESTER 6</td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C6" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A6" type="text" placeholder="0"></td>
      		</tr>
			<tr class="flex w-full mb-1">
                <td class="w-1/3 text-left p-4">SEMESTER 7</td>
       			<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C7" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A7" type="text" placeholder="0"></td>
      		</tr>
			<tr class="bg-gray-100 flex w-full mb-1">
        		<td class="w-1/3 text-left p-4">SEMESTER 8</td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C8" type="text" placeholder="0.00"></td>
        		<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A8" type="text" placeholder="0"></td>
      		</tr>
      		</tbody>
    		</table>
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
                @$batch=$_POST['batch'];
				@$dept=$_POST['dept'];
				@$dateofbirth=$_POST['dateofbirth'];
				@$address=$_POST['address'];
				@$email=$_POST['email'];
				@$phone_no=$_POST['phone_no'];
				@$gender=$_POST['gender'];
				@$father=$_POST['father'];
				@$focc=$_POST['focc'];
				@$mother=$_POST['mother'];
				@$mocc=$_POST['mocc'];
				@$school10=$_POST['school10'];
				@$mark10=$_POST['mark10'];
				@$perc10=$_POST['perc10'];
				@$school12=$_POST['school12'];
				@$mark12=$_POST['mark12'];
				@$perc12=$_POST['perc12'];
				@$othername=$_POST['othername'];
				@$othermark=$_POST['othermark'];
				@$otherperc=$_POST['otherperc'];
				@$C1=$_POST['C1'];
				@$A1=$_POST['A1'];
				@$C2=$_POST['C2'];
				@$A2=$_POST['A2'];
				@$C3=$_POST['C3'];
				@$A3=$_POST['A3'];
				@$C4=$_POST['C4'];
				@$A4=$_POST['A4'];
				@$C5=$_POST['C5'];
				@$A5=$_POST['A5'];
				@$C6=$_POST['C6'];
				@$A6=$_POST['A6'];
				@$C7=$_POST['C7'];
				@$A7=$_POST['A7'];
				@$C8=$_POST['C8'];
				@$A8=$_POST['A8'];
				@$password=password_hash($_POST['username'],PASSWORD_DEFAULT);
				$end=4;
				@$start_yr=$batch;
				@$end_yr=$batch+$end;
				@$edit=0;
				@$reqcon=0;
                @$mentor=NULL;
                @$img="alt.jpg";
				
				if (empty($name)){
				    $name=" ";
				}
				if (empty($dateofbirth)){
				    $dateofbirth='0000-00-00';
				}
				if (empty($address)){
				    $address=" ";
				}
				if (empty($email)){
				    $email=" ";
				}
				if (empty($phone_no)){
				    $phone_no=" ";
				}
				if (empty($gender)){
				    $gender=" ";
				}
				if (empty($father)){
				    $father=" ";
				}
				if (empty($focc)){
				    $focc=" ";
				}
				if (empty($mother)){
				    $mother=" ";
				}
				if (empty($mocc)){
				    $mocc=" ";
				}
				if (empty($school10)){
				    $school10= " ";
				}
				if (empty($mark10)){
				    $mark10=0.0;
				}
				if (empty($perc10)){
					$perc10=0.0;
				}
				if (empty($school12)){
				    $school12 = " ";
				}
				if (empty($mark12)){
				    $mark12=0.0;
				}
				if (empty($perc12)){
				    $perc12=0.0;
				}
				if (empty($otherschool)){
				    $otherschool=" ";
				}
				if (empty($othermark)){
				    $othermark=0.0;
				}
				if (empty($otherperc)){
				    $otherperc=0.0;
				}
				if (empty($C1)){
				    $C1=0.0;
				}
				if (empty($A1)){
				    $A1=0;
				}
				if (empty($C2)){
				    $C2=0.0;
				}
				if (empty($A2)){
				    $A2=0;
				}
				if (empty($C3)){
				    $C3=0.0;
				}
				if (empty($A3)){
				    $A3=0;
				}
				if (empty($C4)){
				    $C4=0.0;
				}
				if (empty($A4)){
				    $A4=0;
				}
				if (empty($C5)){
				    $C5=0.0;
				}
				if (empty($A5)){
				    $A5=0;
				}
				if (empty($C6)){
				    $C6=0.0;
				}
				if (empty($A6)){
				    $A6=0;
				}
				if (empty($C7)){
				    $C7=0.0;
				}
				if (empty($A7)){
				    $A7=0;
				}
				if (empty($C8)){
				    $C8=0.0;
				}
				if (empty($A8)){
				    $A8=0;
				}
		    	$query = "select * from student where username='$username'";
				$query_run = mysqli_query($con,$query);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into student values('$name','$username','$dept','$start_yr','$end_yr','$dateofbirth','$address','$email','$password','$mentor','$edit','$reqcon','$phone_no','$gender','$father','$focc','$mother','$mocc','$school10','$mark10','$perc10','$school12','$mark12','$perc12','$othername','$othermark','$otherperc','$C1','$A1','$C2','$A2','$C3','$A3','$C4','$A4','$C5','$A5','$C6','$A6','$C7','$A7','$C8','$A8','$img')";
                            $query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Success! student added")</script>';
								echo "<script>window.location.href='sadd.php';</script>";
							}
							else
							{
                                // echo '<p class="bg-danger msg-block">$query</p>';
                                echo '<script type="text/javascript">alert("Unsuccessful due to server error. Please try later")</script>';
								// echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
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