<?php
	session_start();
	require_once('../dbconfig/config.php');
    //phpinfo();
    $username;
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
    //header('location:index.php');
     }
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$dept1=$row1['dept'];
    $type=$row1['user_type'];
	if($type == "HOD"){
		$flag = 1;
	}
	else if($type == "advisor"){
		$flag = 2;
	}
	else{
		$flag = 0;
	}
?>

<html>  
<head lang="en">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="..\css\tailwind.min.css"> 
    <title>View students</title>  
</head>   
  
<body class=" bg-blue-400 ">
<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row1['name'];?>)</span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				
				<?php 
					if($flag == 2){
				?>
				<a href="advisor/advisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="advisor/sadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Student
				</a>
				<a href="slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Student List(Dept)
				</a>
				<a href="advisor/slist_class.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Class List
				</a>
				<a href="mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<a href="advisor/requeststofaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Advisorship
				</a>
				<?php } ?>
				<?php 
					if($flag == 1){
				?>
				<a href="hod/hod.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
					</a>
				<a href="hod/request_fwdhod.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Requests
				</a>
				<a href="hod/assignadvisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Assign advisor
				</a>
				<a href="mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<a href="hod/viewfaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Faculty
				</a>
				<a href="slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Students
				</a>
				<?php } ?>
				<?php 
					if($flag == 0){
				?>
				<a href="home.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Students of Department
				</a>
                <a href="mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<?php } ?>
				<a href="changepassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
					Change Password
				</a>
				 </div>
				<div>
				<a href="../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>
<!-- <div class="container "> -->
	<h1 class="mb-8 text-center text-2xl text-white">
    Student list  
  </h1> 
  <div class="py-5 bg-blue-400 flex justify-center">
			<div class="flex bg-white shadow-md rounded px-2 py-2 w-2/3" >
            <table class="text-left w-full ">
		<thead class="bg-blue-400 flex text-white w-full"> 
  
        <tr class="flex w-full mb-4">
  
            <th class="p-4 w-1/6">User Name</th>  
            <th class="p-4 w-1/6">Dept</th>  
            <th class="p-4 w-1/6">Batch</th>    
            <th class="p-4 w-1/6">Email</th>
            <th class="p-4 w-1/6">More Details</th>  
			<th class="p-4 w-1/6">IDP Test Marks</th>
        </tr>  
        </thead>  
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
        <?php  
         
        $view_users_query="select * from student where mentorship='$username'";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row['username'];  
            $department=$row['dept'];  
            $sy=$row['start_yr'];  
            $ey=$row['end_yr'];
            $user_email=$row['email']; 
  
        ?>  
        <form action="../faculty/mentorview.php" method="post">
        
			<tr class="flex w-full mb-1">
<!--here showing results in the table -->  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $department;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $sy;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden "><?php echo $user_email; ?></td>
            <td class="p-4 w-1/6 overflow-hidden"> <input type="hidden" name="text" value="<?php echo $user_id; ?>">
                   <button type="submit" class="px-4 text-blue-600">View</button>
			</td>
			</form>
			<form action="../faculty/IDP_view.php" method="post">
			<td class="p-4 w-1/6 overflow-hidden"> <input type="hidden" name="text" value="<?php echo $user_id; ?>">
                   <button type="submit" class="px-4 text-blue-600">Update</button>
			</td>
			</form>
		</tr>  
        
        
        <?php
     } ?>
        </tbody>  
       
  
    </table> 
    </div>
    </div>
</body>  
  
</html> 