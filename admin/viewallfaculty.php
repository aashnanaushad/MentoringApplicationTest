<?php
	session_start();
	require_once('../dbconfig/config.php');
	//phpinfo();
?>

<html>  
<head lang="en">    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="..\css\tailwind.min.css"> 
    <title>View faculty</title>  
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
  
            <h1 class="mb-8 text-center text-2xl text-white">
                Faculty List
            </h1> 
            <div class="py-5 bg-blue-400 flex justify-center">
			<div class="flex bg-white shadow-md rounded px-2 py-2 w-2/3" >
            <table class="text-left w-full ">
                <thead class="bg-blue-400 flex text-white w-full"> 
        
                <tr class="flex w-full mb-5">
                    <th class="p-4 w-1/6">Department</th>
                    <th class="p-4 w-1/6">User Name</th>  
                    <th class="p-4 w-1/6">Designation</th>    
                    <th class="p-4 w-1/6">Type</th>  
                    <th class="p-4 w-1/6">Batch</th>
                    <th class="p-4 w-1/6">Edit User</th>  
                </tr>  
                </thead>  
                <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                <?php  
                
                $view_users_query="select * from faculty order by dept ";//select query for viewing users.  
                $run=mysqli_query($con,$view_users_query);//here run the sql query.  
        
                while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
                {  
                    $user_dept=$row['dept'];
                    $user_id=$row['username'];  
                    $designation=$row['designation'];  
                    $user_email=$row['email'];  
                    $user_pass=$row['user_type'];  
                    $batch=$row['batch'];
                    
        
        
                ?>  
                <form action="viewallfaculty.php" method="post">
                <tr class="flex w-full mb-1">
        <!--here showing results in the table --> 
                    <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_dept; ?></td>
                    <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id;  ?></td>  
                    <td class="p-4 w-1/6 overflow-hidden"><?php echo $designation;  ?></td>  
                    <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_pass;  ?></td> 
                    <td class="p-4 w-1/6 overflow-hidden"><?php if($batch!=0) echo $batch; ?></td>
                    <td class="p-4 w-1/6 overflow-hidden"><a href="viewallfaculty.php"><button class="text-red-400" type="submit" name="<?php echo $user_id;?>">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
                </tr>  
                </form>
                <?php
                    if(isset($_POST[$user_id]))
                    {
                        $batch=$_POST['batch'];
                        $query="delete from faculty where username='$user_id'";
                        $query_run = mysqli_query($con,$query);
                        if($query_run)
                        {
                                echo '<script type="text/javascript">alert("Faculty deleted successfully ")</script>';
                                    echo "<script>window.location.href='homepage.php';</script>";
                        }
                        else
                        {
                            echo '<script type="text/javascript">alert("DB error")</script>';
                        }
                    }
                ?>
                <?php } ?>  
                </tbody> 
            </table>  
        </div>
    </div>
</body>  
  
</html> 