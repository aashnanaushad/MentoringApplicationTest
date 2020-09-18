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
<?php
	if($flag==1){
		//no navbar
	}else{
		?>
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
			<?php
			}
			?>

		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
                 <!-- <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
					<img src="../imgs/avatar.png" /> 
				</div> -->
				 <div class="w-full  py-6 overflow-y-hidden">
					<div class="impg">
						<?php
						$img=$row['img_destination'];
						echo "<img src='upload-images/".$img."' alt='no image'>"; 
						?>
					</div> 
					<div class="mb-4">
						<label class="block text-gray-700 text-md font-bold mb-2" >
							PROFESSIONAL DETAILS
						</label>
						<p class="text-gray-700 text-base"><b>Admission No:</b> <?php echo $row['username'];?></p>
						<p class="text-gray-700 text-base"><b>Batch: </b><?php echo $row['start_yr'];?> - <?php echo $row['end_yr'];?></p>
						<p class="text-gray-700 text-base"><b>Department:</b> <?php echo $row['dept'];?></p>
					</div>
					<br />
					<div class="mb-6">
						<label class="block text-gray-700 text-md font-bold mb-2" >
							PERSONAL DETAILS
						</label>
						<p class="text-gray-700 text-base"><b>Name    : </b><?php echo $row['name'];?></p>
						<p class="text-gray-700 text-base"><b>Email ID: </b><?php echo $row['email'];?></p>
						<p class="text-gray-700 text-base"><b>DOB     : </b><?php echo $row['dateofbirth'];?></p>
						<p class="text-gray-700 text-base"><b>Age     : </b>
						<?php 
						//age calculations
						 $dob=new DateTime($row['dateofbirth']);
						 $today=date('Y-m-d');
						 $age=$dob -> diff(new DateTime);
						 echo $age->y;
						 ?></p>
                        <p class="text-gray-700 text-base"><b>Gender  : </b><?php echo $row['gender'];?></p>
						<p class="text-gray-700 text-base"><b>Address : </b><?php echo $row['address'];?></p>
                        <p class="text-gray-700 text-base"><b>Contact : </b><?php echo $row['phone_no'];?></p>
						<p class="text-gray-700 text-base"><b>Father  : </b><?php echo $row['father'];?></p>
						<p class="text-gray-700 text-base"><b>Occupation: </b><?php echo $row['focc'];?></p>
						<p class="text-gray-700 text-base"><b>Mother  : </b><?php echo $row['mother'];?></p>
                        <p class="text-gray-700 text-base"><b>Occupation: </b><?php echo $row['mocc'];?></p>
					</div>
                    <div class="container">
            <label class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2" >
			   Academic details
			</label>
			<div class="shadow overflow-hidden rounded border-b border-gray-200">
             <table class="min-w-full bg-white">
              <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/20 text-left py-3 px-4 ">QUALIFICATION</th>
                <th class="w-1/20 text-left py-3 px-4 ">NAME OF SCHOOL & SYLLABUS</th>
                <th class="w-1/20 text-left py-3 px-4 ">TOTAL MARKS</th>
                <th class="w-1/20 text-left py-3 px-4 ">PERCENTAGE</td>
            </tr>
            </thead>
            <tbody class="text-gray-700">
            <tr>
                <td class="w-1/20 text-left py-3 px-4">GRADE X</td>
       			<td class="w-1/20 text-left py-3 px-4"><?php echo $row["school10"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["mark10"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["perc10"];?></td>
      		</tr>
      		<tr class="bg-gray-100">
        		<td class="w-1/20 text-left py-3 px-4">GRADE XII</td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["school12"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["mark12"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["perc12"];?></td>
      		</tr>
      		<tr>
        		<td class="w-1/20 text-left py-3 px-4">Any Other</td>
       		 	<td class="w-1/20 text-left py-3 px-4"><?php echo $row["othername"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["othermark"];?></td>
        		<td class="w-1/20 text-left py-3 px-4"><?php echo $row["otherperc"];?></td>
      		</tr>
    		</tbody>
    		</table>
  	  </div>
	</div>
    <div class="md:px-32 py w-full">
            <label class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2" >
				Semester wise performance
			</label>
            <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">SEMESTER</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">CGPA</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">NO: OF ARREARS</th>
            </tr>
            </thead>
            <tbody class="text-gray-700">
            <tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 1</td>
       			<td class="text-left py-3 px-4"> <?php echo $row["C1"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A1"];?></td>
      		</tr>
      		<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 2</td>
        		<td class="text-left py-3 px-4"><?php echo $row["C2"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A2"];?></td>
      		</tr>
			<tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 3</td>
       			<td class="text-left py-3 px-4"><?php echo $row["C3"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A3"];?></td>
      		</tr>
			<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 4</td>
        		<td class="text-left py-3 px-4" ><?php echo $row["C4"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A4"];?></td>
      		</tr>
			<tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 5</td>
       			<td class="text-left py-3 px-4" ><?php echo $row["C5"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A5"];?></td>
      		</tr>
			<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 6</td>
        		<td class="text-left py-3 px-4" ><?php echo $row["C6"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A6"];?></td>
      		</tr>
			<tr>
                <td class="w-1/3 text-left py-3 px-4">SEMESTER 7</td>
       			<td class="text-left py-3 px-4"><?php echo $row["C7"];?></td>
        		<td class="text-left py-3 px-4" ><?php echo $row["A7"];?></td>
      		</tr>
			<tr class="bg-gray-100">
        		<td class="w-1/3 text-left py-3 px-4">SEMESTER 8</td>
        		<td class="text-left py-3 px-4"><?php echo $row["C8"];?></td>
        		<td class="text-left py-3 px-4"><?php echo $row["A8"];?></td>
      		</tr>
      		</tbody>
    		</table>
  		</div>
	</div>
                    
					<br>
					<br>
					<div class="flex items-center justify-between">
					<?php
					if($flag==1){
					?>
						<?php echo '<a href="personal_view.php?user='.$username.'"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							More Details
						</button></a>'; ?>						
						<?php
					}else{
						?>
						<a href="personal_view.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							More Details
						</button></a>
						<?php
					}
					?>
						<br>
                    <br>
					<?php
					if($flag==1){
						?>
						<?php echo '<a href="../include/rqststudents.php?user='.$_SESSION['username'].'"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Back
						</button></a>'; ?>
						<?php
					}else{
						?>
					<div class="flex items-center justify-between">
						<a href="edit.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Edit Profile
						</button></a>
						<?php
					}
					?>
					</div>
					</div>
				</div>
					
			</div>
		</div>
</body>
</html>