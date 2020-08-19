<?php
	session_start();
	require_once('../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
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
	<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
			<form action="edit.php" method="post">
			<div class="-mx-3 md:flex mb-6">
				
				<div class="md:w-1/2 px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="name" type="text" value="<?php echo $row['name']?>">
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Email
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="email" type="text" value="<?php echo $row['email']?>">
			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Address
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="address" type="text" value="<?php echo $row["address"];?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			
			<div class="md:w-1/2 px-3 mb-1 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-gender">
				Gender
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="gender"  type="text" value="<?php echo $row['gender'];?>" >
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			
			<div class="md:w-1/2 px-3 mb-1 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
				DOB
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="dateofbirth"  type="text" value="<?php echo $row['dateofbirth'];?>" >
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Contact
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="phone_no" type="text" value="<?php echo $row['phone_no'];?>" >
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			
			<div class="md:w-1/2 px-3 mb-1 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
				Father's Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="father"  type="text" value="<?php echo $row['father'];?>"  >
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Occupation
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="focc" type="text" value="<?php echo $row['focc'];?>"  >
			</div>
		</div>
		<div class="-mx-3 md:flex mb-">
			
			<div class="md:w-1/2 px-3 mb-1 md:mb-0">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
				Mother's Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="mother"  type="text" value="<?php echo $row['mother'];?>" >
			</div>
			<div class="md:w-1/2 px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
				Occupation
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" name="mocc" type="text" value="<?php echo $row['mocc'];?>"  >
			</div>
		</div>	
		<div class="container">
		<div class="-mx-3 md:flex mb-6">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
			   Academic details
			</label>
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
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="school10" type="text" placeholder="Name of school,Syllabus" value="<?php echo $row['school10'];?>"></td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="mark10" type="text" placeholder="Total Marks/Grade[X]" value="<?php echo $row['mark10'];?>"></td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="perc10" type="text" placeholder="Percentage[X]" value="<?php echo $row['perc10'];?>"></td>
      		</tr>
      		<tr class="flex w-full mb-1">
					<td class="w-1/4 text-left p-4">GRADE XII</td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="school12" type="text" placeholder="Name of school,Syllabus" value="<?php echo $row['school12'];?>"></td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="mark12" type="text" placeholder="Total Marks/Grade[XII]" value="<?php echo $row['mark12'];?>"></td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="perc12" type="text" placeholder="Percentage[XII]" value="<?php echo $row['perc12'];?>"></td>
      		</tr>
      		<tr class="flex w-full mb-1">
					<td class="w-1/4 text-left p-4">Any Other</td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="othername" type="text" placeholder="Name of school,Syllabus" value="<?php echo $row['othername'];?>"></td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="othermark" type="text" placeholder="Total Marks/Grade" value="<?php echo $row['othermark'];?>"></td>
					<td class="w-1/4 text-left p-4"><input class="w-2/3" name="otherperc" type="text" placeholder="Percetage" value="<?php echo $row['otherperc'];?>"></td>
      		</tr>
    		</tbody>
    		</table>
  		</div>
	</div>
    
	<div class="md:px-32 py w-full">
	<div class="-mx-3 md:flex mb-6">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Semester wise performance
			</label>
            <!-- <div class="shadow overflow-hidden rounded "> -->
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
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C1" type="text" placeholder="0.00" value="<?php echo $row['C1'];?>"></td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A1" type="text" placeholder="0" value="<?php echo $row['A1'];?>"></td>
      		</tr>
      		<tr class="bg-gray-100 flex w-full mb-1">
			  <td class="w-1/3 text-left p-4">SEMESTER 2</td>
			  <td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C2" type="text" placeholder="0.00" value="<?php echo $row['C2'];?>"></td>
			  <td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A2" type="text" placeholder="0" value="<?php echo $row['A2'];?>"></td>
      		</tr>
			<tr class="flex w-full mb-1">
				<td class="w-1/3 text-left p-4">SEMESTER 3</td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C3" type="text" placeholder="0.00" value="<?php echo $row['C3'];?>"></td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A3" type="text" placeholder="0" value="<?php echo $row['A3'];?>"></td>
      		</tr>
			<tr class="bg-gray-100 flex w-full mb-1">
				<td class="w-1/3 text-left p-4">SEMESTER 4</td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C4" type="text" placeholder="0.00" value="<?php echo $row['C4'];?>"></td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A4" type="text" placeholder="0" value="<?php echo $row['A4'];?>"></td>
      		</tr>
			<tr class="flex w-full mb-1">
				<td class="w-1/3 text-left p-4">SEMESTER 5</td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C5" type="text" placeholder="0.00" value="<?php echo $row['C5'];?>"></td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A5" type="text" placeholder="0" value="<?php echo $row['A5'];?>"></td>
      		</tr>
			<tr class="bg-gray-100 flex w-full mb-1">
				<td class="w-1/3 text-left p-4">SEMESTER 6</td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C6" type="text" placeholder="0.00" value="<?php echo $row['C6'];?>"></td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A6" type="text" placeholder="0" value="<?php echo $row['A6'];?>"></td>
      		</tr>
			<tr class="flex w-full mb-1">
				<td class="w-1/3 text-left p-4">SEMESTER 7</td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C7" type="text" placeholder="0.00" value="<?php echo $row['C7'];?>"></td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A7" type="text" placeholder="0" value="<?php echo $row['A7'];?>"></td>
      		</tr>
			<tr class="bg-gray-100 flex w-full mb-1">
				<td class="w-1/3 text-left p-4">SEMESTER 8</td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="C8" type="text" placeholder="0.00" value="<?php echo $row['C8'];?>"></td>
				<td class="w-1/3 text-left p-4"><input class="w-2/3 text-left p-4" name="A8" type="text" placeholder="0" value="<?php echo $row['A8'];?>"></td>
      		</tr>
      		</tbody>
    		</table>
			</div>
  		</div>
			
		
		<div class="flex items-center justify-between float-right">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="edit" type="submit">
							Edit
						</button>
			</div>
		</form>
		</div>
            <?php
			if(isset($_POST['edit']))
			{
			    $query = "update student set edit=1 where username='$username'";
				$query_run = mysqli_query($con,$query);
				@$name=$_POST['name'];
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
				@$C2=$_POST['C2'];
				@$C3=$_POST['C3'];
				@$C4=$_POST['C4'];
				@$C5=$_POST['C5'];
				@$C6=$_POST['C6'];
				@$C7=$_POST['C7'];
				@$C8=$_POST['C8'];
				@$A1=$_POST['A1'];
				@$A2=$_POST['A2'];
				@$A3=$_POST['A3'];
				@$A4=$_POST['A4'];
				@$A5=$_POST['A5'];
				@$A6=$_POST['A6'];
				@$A7=$_POST['A7'];
				@$A8=$_POST['A8'];


				if (empty($name)){
				    $name=" ";
				}
				if (empty($dateofbirth)){
				    $dob='00000000';
				}
				if (empty($address)){
				    $address=" ";
				}
				if (empty($email)){
				    $email=" ";
				}
				if (empty($gender)){
				    $gender=" ";
				}
				if (empty($phone_no)){
				    $phone_no=" ";
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

				$query = "insert into temp_student values('$name','$username','$dateofbirth','$address','$email','$phone_no','$gender','$father','$focc','$mother','$mocc','$school10','$mark10','$perc10','$school12','$mark12','$perc12','$othername','$othermark','$otherperc','$C1','$A1','$C2','$A2','$C3','$A3','$C4','$A4','$C5','$A5','$C6','$A6','$C7','$A7','$C8','$A8')";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
				    echo '<script type="text/javascript">alert("Updates saved and Request send to faculty!")</script>';
				    echo "<script>window.location.href='view.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Unsuccessful due to server error. Please try later</p>';
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