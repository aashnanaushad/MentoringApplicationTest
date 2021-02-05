<?php
	session_start();
	require_once('../dbconfig/config.php');
	$flag=0;
	$username;
	if(isset($_POST['text'])){
		$_POST['text'] = $_POST['text'];
		$username=$_POST['text'];
		$flag=1;
	}if(isset($_GET['user'])){
		$_GET['user'] = $_GET['user'];
		$username=$_GET['user'];
		$flag=1;
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
<title>IDP</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">
<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
				 <div class="w-full  py-6 overflow-y-hidden"> 
					<div class="mb-4">
						<label class="block text-gray-700 text-md font-bold mb-2" >
							PROFESSIONAL DETAILS
						</label>
						<p class="text-gray-700 text-base"><b>Admission No:</b> <?php echo $row['username'];?></p>
						<p class="text-gray-700 text-base"><b>Batch: </b><?php echo $row['start_yr'];?> - <?php echo $row['end_yr'];?></p>
						<p class="text-gray-700 text-base"><b>Department:</b> <?php echo $row['dept'];?></p>
					</div>
					<br />
    <div class="md:px-32 py w-full">
            <label class="block uppercase tracking-wide text-grey-darker text-md font-bold mb-2" >
				IDP Performance
			</label>
            <div class="shadow overflow-hidden rounded border-b border-gray-200">
            <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Test #</th>
                <th class="w-1/2 text-left py-3 px-4 uppercase font-semibold text-sm">Marks</th>
            </tr>
            </thead>
            <tbody class="text-gray-700">
            <tr>
                <td class="w-1/2 text-left py-3 px-4">Test 1</td>
       			<td class="w-1/2 text-left py-3 px-4"> <?php echo $row["C1"];?></td>
      		</tr>
      		<tr class="bg-gray-100">
              <td class="w-1/2 text-left py-3 px-4">Test 2</td>
       			<td class="text-left py-3 px-4"> <?php echo $row["C1"];?></td>
      		</tr>
			<tr>
            <td class="w-1/2 text-left py-3 px-4">Test 3</td>
       			<td class="w-1/2 text-left py-3 px-4"> <?php echo $row["C1"];?></td>
      		</tr>
			<tr class="bg-gray-100">
            <td class="w-1/2 text-left py-3 px-4">Test 4</td>
       			<td class="w-1/2 text-left py-3 px-4"> <?php echo $row["C1"];?></td>
      		</tr>
			<tr>
            <td class="w-1/2 text-left py-3 px-4">Test 5</td>
       			<td class="w-1/2 text-left py-3 px-4"> <?php echo $row["C1"];?></td>
      		</tr>
			<tr class="bg-gray-100">
            <td class="w-1/2 text-left py-3 px-4">Test 6</td>
       			<td class="w-1/2 text-left py-3 px-4"> <?php echo $row["C1"];?></td>
      		</tr>
			<tr>
            <td class="w-1/2 text-left py-3 px-4">Test 7</td>
       			<td class="w-1/2 text-left py-3 px-4"> <?php echo $row["C1"];?></td>
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
						<?php echo '<a href="mentor_personal_view.php?user='.$username.'"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							More Details
						</button></a>'; ?>						
						<?php
					}else{
						?>
						<a href="mentor_personal_view.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
							Update
						</button></a>
						<?php
					}
					?>
						<br>
                    <br>
					<?php
					if($flag==1){
						?>
						<?php echo '<a href="../faculty/mentor.php?user='.$_SESSION['username'].'"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded focus:outline-none focus:shadow-outline" >
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