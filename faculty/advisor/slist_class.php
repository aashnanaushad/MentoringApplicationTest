<?php
	session_start();
	require_once('../../dbconfig/config.php');
	//phpinfo();
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../../index.php';</script>";
    //header('location:index.php');
     }
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$dept1=$row1['dept'];
    $batch=$row1['batch'];
?>

<html>  
<head lang="en">    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="..\..\css\tailwind.min.css">
    <title>View students</title>  
</head>    
  
<body class=" bg-blue-400 ">
<nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row1['name'];?>)</span>
		</div>
		<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="advisor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="sadd.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Add Student
				</a>
				<a href="../slist_dept.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Student List(Dept)
				</a>
				<a href="slist_class.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Class List
				</a>
				<a href="../mentor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
				Mentorship
				</a>
				<a href="requeststofaculty.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Advisorship
				</a>
				<a href="../changepassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Change Password
				</a>
				</div>
                <div>
				<a href="../../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
            </div>
			
		</nav>
        <h1 class="mb-8 text-center text-2xl text-white">
    Students of <?php echo "$dept1  batch $batch";?>
  </h1> 
  <div class="py-5 bg-blue-400 flex justify-center">
			<div class="flex bg-white shadow-md rounded px-2 py-2 w-2/3" >
            <table class="text-left w-full ">
		<thead class="bg-blue-400 flex text-white w-full"> 
  
        <tr class="flex w-full mb-4"> 
  
            <th class="p-4 w-1/6">User Name</th>  
            <th class="p-4 w-1/6">Department</th>  
            <th class="p-4 w-1/6">Year of Join</th>  
            <th class="p-4 w-1/6">Year of Passout</th>  
            <th class="p-4 w-1/6">Email</th>
            <th class="p-4 w-1/6">Edit User</th>
            <th class="p-4 w-1/6">Mentor Id</th>
            <th class="p-4 w-1/6">Assign/Deassign</th>  
        </tr>  
        </thead>  
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
        <?php  
         
        $view_users_query="select * from student where dept='$dept1' and start_yr='$batch'";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row['username'];  
            $department=$row['dept'];  
            $sy=$row['start_yr'];  
            $ey=$row['end_yr'];
            $user_email=$row['email']; 
            $mentor=$row['mentorship'];
  
        ?>  
        <form action="slist_class.php" method="post">
        <tr class="flex w-full mb-1">
<!--here showing results in the table -->  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $department;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $sy;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $ey;  ?></td>
            <td class="p-4 w-1/6 overflow-x-scroll overflow-y-hidden"><?php echo $user_email; ?></td>
            <td class="p-4 w-1/6 overflow-hidden"><a href="slist_class.php"><button class="text-red-400" type="submit" name="<?php echo $user_id; ?>">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
            </form>
            <form action="slist_class.php" method="post">
            <?php  if ($mentor == NULL) { ?>
            <td class="p-4 w-1/6 overflow-hidden"><input type="text" name="mentor"  required/></td>  
            <?php }
                else { ?>
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $mentor;  ?></td>
            <?php } ?>
            <?php  if ($mentor == NULL) { ?>
            <td class="p-4 w-1/6 overflow-hidden"><a href="slist_class.php"><button class="text-green-400" type="submit"  name="assign<?php echo $user_id; ?>">Assign</button></a></td>
            <?php }
                else { ?>
            <td class="p-4 w-1/6 overflow-hidden"><a href="slist_class.php"><button class="text-red-400" type="submit"  name="deassign<?php echo "$user_id"; ?>">DeAssign</button></a></td>
                <?php } ?>
        </tr>  
        </form>
        
        <?php
			if(isset($_POST[$user_id]))
			{
				$batch=$_POST['batch'];
				$query="delete from student where username='$user_id'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
					      echo '<script type="text/javascript">alert("Student deleted successfully ")</script>';
					        echo "<script>window.location.href='advisor.php';</script>";
				}
			    else
			    {
			        echo '<script type="text/javascript">alert("DB error")</script>';
			    }
            }
            if(isset($_POST["assign$user_id"]))
			{
                $mentor=$_POST['mentor'];
                $query1='select * from faculty where username="'.$mentor.'";';
                $query_run1 = mysqli_query($con,$query1);
                if($query_run1){
                        if(mysqli_num_rows($query_run1)>0){
                        $query="update student set mentorship='$mentor' where username='$user_id'";
                        $query_run = mysqli_query($con,$query);
                        if($query_run)
                        {
                                echo '<script type="text/javascript">alert("Mentor assigned successfully ")</script>';
                                    echo "<script>window.location.href='slist_class.php';</script>";
                        }
                        else
                        {
                            echo '<script type="text/javascript">alert("DB error")</script>';
                        }
                    }else{
                        echo '<script type="text/javascript">alert("Invalid Faculty!!")</script>';
                        echo "<script>window.location.href='slist_class.php';</script>";
                    }
                }
            }
            if(isset($_POST["deassign$user_id"]))
			{
				// $mentor=$_POST['mentor'];
				$query="update student set mentorship=NULL where username='$user_id'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
					      echo '<script type="text/javascript">alert("Mentor de-assigned successfully ")</script>';
					        echo "<script>window.location.href='slist_class.php';</script>";
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
       </div></div>
       </br>
       <!-- <form action="slist_class.php" method="post">
       <a href="slist_class.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit" name="back">
                                   back
           </button> </a>
           </form> -->
           <?php
               if(isset($_POST['back']))
               {
                    echo "<script>window.location.href='advisor.php';</script>";
                    
               }?>
</body>  
  
</html> 