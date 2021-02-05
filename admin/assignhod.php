<?php
	session_start();
	require_once('../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
     }
?>

<html>  
<head lang="en">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="..\css\tailwind.min.css">
    <title>Assign hod</title>  
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
<div class=" px-2 py-2 bg-blue-400 flex justify-center">
		<div class="w-3/4 bg-white shadow-md rounded px-4 mb-2 " >
            <div class="w-full overflow-y-hidden"> 
                <div class="mb-2">
                    <h2>Select Department & Batch:</h2></br>
                    <form class="form" action="assignhod.php" method="post">
                        <label class="text-gray-700 text-md font-bold mb-2" for="department">
                            Department:
                        </label>
                        <select id="department" class="border border-gray-lighter" name="department" required>
                            <option value="CSE">CSE</option>
                            <option value="CE">CE</option>
                            <option value="ECE">ECE</option>
                            <option value="EEE">EE</option>
                            <option value="ME">ME</option>
                        </select>
                        <!-- <div class="flex items-center justify-between"> -->
                            <button class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-400 hover:bg-blue-500 mt-4 lg:mt-0" type="submit" name="survey">
                                    Submit
                            </button>
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <div class="py-5 bg-blue-400 flex justify-center">
			<div class="flex bg-white shadow-md rounded px-2 py-2 w-2/3" >
            <table class="text-left w-full ">
                <thead class="bg-blue-400 flex text-white w-full"> 
  
                    <tr class="flex w-full mb-4">
            
                        <th class="p-4 w-1/6">User Name</th>  
                        <th class="p-4 w-1/6">Department</th>
                        <th class="p-4 w-1/6">Designation</th>  
                        <th class="p-4 w-1/6">User E-mail</th>  
                        <th class="p-4 w-1/6">Type</th>  
                        <th class="p-4 w-1/6">Assign HOD</th>  
                    </tr>  
                </thead>  
                <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                    <?php  
                    if(isset($_POST['survey'])){
                    $department = $_POST['department'];
                    $view_users_query='select * from faculty where dept="'.$department.'";';//select query for viewing users.  
                    $run=mysqli_query($con,$view_users_query);//here run the sql query.  
            
                    while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
                    {  
                        $user_id=$row['username'];  
                        $designation=$row['designation'];  
                        $user_email=$row['email'];  
                        $user_type=$row['user_type'];  
                        $dept=$row['dept'];
                    ?>  
                    <form action="assignhod.php" method="post">
                    
                    <tr class="flex w-full mb-1"> 
            <!--here showing results in the table -->  
                        <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id;  ?></td>  
                        <td class="p-4 w-1/6 overflow-hidden"><?php echo $dept; ?></td>
                        <td class="p-4 w-1/6 overflow-hidden"><?php echo $designation;  ?></td>  
                        <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_email;  ?></td>  
                        <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_type;  ?></td>  
                        <?php  if ($user_type != "HOD") { ?>
                        <td class="p-4 w-1/6 overflow-hidden"><a href="assignhod.php"><button class="text-green-400" type="submit"  name="<?php echo "$user_id"; ?>">Assign</button></a></td>  
                        <?php 
                            $flag =0;    
                                }
                            else { ?>
                            <td class="p-4 w-1/6 overflow-hidden"><a href="assignhod.php"><button class="text-red-400" type="submit"  name="<?php echo "$user_id"; ?>">De-assign</button></a></td>  
                            <?php 
                                $flag=1;
                        } 
                        ?>
                    </tr>  
                        </form>
                    <?php
                        if(isset($_POST[$user_id]))
                        {
                            if($flag == 1){
                                $user_type="faculty";
                                $query = "update faculty set user_type='$user_type' where username='$user_id' ";
                                $query_run = mysqli_query($con,$query);
                                    if($query_run)
                                    {
                                    echo '<script type="text/javascript">alert("Successfully de-assigned HOD ")</script>';
                                        echo "<script>window.location.href='homepage.php';</script>";
                                    }
                                    else
                                    {
                                        echo '<script type="text/javascript">alert("cannot de-assign HOD!!")</script>';
                                    }
                            }
                            else{
                            $query="select * from faculty where dept='$dept' and user_type='HOD'";
                            $query_run = mysqli_query($con,$query);
                            if($query_run)
                            {
                                if(mysqli_num_rows($query_run)<2)
                                {
                                    $query = "update faculty set user_type='HOD',batch=0 where username='$user_id' ";
                                    $query_run = mysqli_query($con,$query);
                                    if($query_run)
                                    {
                                    echo '<script type="text/javascript">alert("Successfully assigned hod ")</script>';
                                    echo "<script>window.location.href='homepage.php';</script>";
                                    }
                                    else
                                    {
                                    echo '<script type="text/javascript">alert("DB error")</script>';
                                    }
                                }
                                else
                                {
                                    echo '<script type="text/javascript">alert("Already 2 HODs assigned for the department!")</script>';
                                }
                            }
                            else
                            {
                                echo '<script type="text/javascript">alert("DB error")</script>';
                            }
                        }
                    }
                    ?>
                        <?php }
                        } ?> 
                </tbody> 
            </table> 
        </div>
    </div>
</body>  
  
</html> 