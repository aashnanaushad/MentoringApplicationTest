<?php
	session_start();
	require_once('../../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../../index.php';</script>";
    //header('location:index.php');
     }
    //phpinfo();
    
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$dept1=$row1['dept'];
    $flag=0;
?>

<html>  
<head lang="en">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="..\..\css\tailwind.min.css">
    <title>View faculty</title>  
</head>  
<body class=" bg-blue-400 ">
	<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row1['name'];?>)</span>
		</div>
		<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="hod.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
					</a>
				<a href="request_fwdhod.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Requests
				</a>
				<a href="assignadvisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Assign advisor
				</a>
				<a href="../mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<a href="viewfaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Faculty
				</a>
				<a href="../slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					List Students
				</a>
				<a href="../changepassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 ">
					Change Password
				</a>
				 </div> 
				<div>
				<a href="../../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>
            <h1 class="mb-8 text-center text-2xl text-white">
    Faculty list
  </h1> 
  <div class="py-5 bg-blue-400 flex justify-center">
			<div class="flex bg-white shadow-md rounded px-2 py-2 w-2/3" >
            <table class="text-left w-full ">
		<thead class="bg-blue-400 flex text-white w-full"> 
  
        <tr class="flex w-full mb-4">
  
            <th class="p-4 w-1/6">User Name</th>  
            <th class="p-4 w-1/6">Department</th>
            <th class="p-4 w-1/6">Designation</th>    
            <th class="p-4 w-1/6">Type</th>  
            <th class="p-4 w-1/6">Batch</th>
            <th class="p-4 w-1/6">Assign advisor</th>  
        </tr>  
        </thead>  
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
        <?php  
         
        $view_users_query="select * from faculty where dept='$dept1' and user_type!='HOD' ";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row['username'];  
            $designation=$row['designation'];  
            $user_email=$row['email'];  
            $user_type=$row['user_type'];  
            $dept=$row['dept'];
            $batch=$row['batch'];
        ?>  
        <form action="assignadvisor.php" method="post">
        
        <tr class="flex w-full mb-1"> 
<!--here showing results in the table -->  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $dept; ?></td>
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $designation;  ?></td>   
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_type;  ?></td> 
            <?php if($user_type=="advisor" && $batch !=0){ ?>
                <td class="p-4 w-1/6 overflow-hidden"><?php echo $batch;  ?></td> 
            <?php } 
            else { ?>
                 <td class="p-4 w-1/6 overflow-hidden focus:bg-blue-400"><input type="text"  name="batch" value=" "/></td>
            <?php } ?>
            <?php  if ($user_type != "advisor") { ?>
            <td class="p-4 w-1/6 overflow-hidden"><a href="assignadvisor.php"><button class="text-green-400" type="submit"  name="<?php echo "$user_id"; ?>">Assign</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
            <?php }
                else { ?>
            <td class="p-4 w-1/6 overflow-hidden"><a href="assignadvisor.php"><button class="text-red-400" type="submit"  name="<?php echo "$user_id"; ?>">DeAssign</button></a></td>
                <?php 
                    $flag=1;
            } ?>
        </tr>  
            </form>
        <?php
			if(isset($_POST[$user_id]))
			{
                if($flag == 1){
                    $user_type="faculty";
                    $batch=0;
                    $query = "update faculty set user_type='$user_type',batch='$batch' where username='$user_id' ";
                    $query_run = mysqli_query($con,$query);
			        	if($query_run)
				    	{
					      echo '<script type="text/javascript">alert("Successfully de-assigned advisor ")</script>';
					        echo "<script>window.location.href='hod.php';</script>";
				    	}
				    	else
				    	{
					        echo '<script type="text/javascript">alert("cannot de-assign advisor!!")</script>';
				    	}
                }
                else{
				$batch=$_POST['batch'];
				$query="select * from faculty where batch='$batch' and user_type='advisor' and dept='$dept'";
                $query_run = mysqli_query($con,$query);
                
			    if($query_run)
			    {
				    if(mysqli_num_rows($query_run)<2)
				    {
				
				        $query = "update faculty set user_type='advisor',batch='$batch' where username='$user_id' ";
				         $query_run = mysqli_query($con,$query);
			        	if($query_run)
				    	{
					      echo '<script type="text/javascript">alert("Successfully assigned advisor ")</script>';
					        echo "<script>window.location.href='hod.php';</script>";
				    	}
				    	else
				    	{
					        echo '<script type="text/javascript">alert("cannot assign advisor!!")</script>';
				    	}
				    }
				    else
				    {
				        echo '<script type="text/javascript">alert("Already 2 advisors for the same batch exist!!")</script>';
				    }
			    }
			    else
			    {
			        echo '<script type="text/javascript">alert("DB error")</script>';
                }
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