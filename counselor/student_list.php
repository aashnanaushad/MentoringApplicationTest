<?php
    session_start();
	require_once('../dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
	}
    $username=$_SESSION['username'];
    $query="select * from counselor where username='$username'";
	$query_run = mysqli_query($con,$query);
	if($query_run)
	{
	    $row=$query_run->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Counselor</title>
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
                    <a href="home.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
                        Profile
                    </a>
                    <a href="../include/rqststudents.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
                        Requested Students
                    </a>
                    <a href="student_list.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
                        Student List
                    </a>
                    <a href="ChangePassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
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
                    <form class="form" action="student_list.php" method="post">
                        <label class="text-gray-700 text-md font-bold mb-2" for="department">
                            Department:
                        </label>
                        <select id="department" class="border border-gray-lighter" name="department" required>
                            <option value="CSE">CSE</option>
                            <option value="CE">CE</option>
                            <option value="EC">EC</option>
                            <option value="EEE">EE</option>
                            <option value="ME">ME</option>
                        </select>
                        <label class=" text-gray-700 text-md font-bold mb-2" for="batch">
                            Batch:
                        </label>
                        <select id="batch" class="border border-gray-lighter" name="batch" required>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                        <!-- <div class="flex items-center justify-between"> -->
                            <button class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-400 hover:bg-blue-700 mt-4 lg:mt-0" type="submit" name="survey">
                                    Submit
                            </button>
                        <!-- </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class=" px-1 py-2 bg-blue-400 flex justify-center shadow-md rounded">
                                <div class="w-3/4 lg:flex bg-white shadow-md rounded px-4 py-4 mb-4 " >
                                    <div class="w-full  py-2 ">
                                    <table class="text-left w-full ">
		<thead class="bg-blue-400 flex text-white w-full"> 
  
        <tr class="flex w-full mb-2">
            <th class="p-2 w-1/4">Name</th>
            <th class="p-2 w-1/4">Department</th>  
            <th class="p-2 w-1/4">Batch</th>  
            <th class="p-2 w-1/4">Concern Form</th> 
        </tr>  
        </thead>
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
    <?php
        if(isset($_POST['survey'])){
            $department = $_POST['department'];
            $batch = $_POST['batch'];

            // retrieve all students corresponding to department & batch 
            $query = 'select * from `form` where branch = "'.$department.'" AND batch = "'.$batch.'" ;';
            $query_run = mysqli_query($con,$query);
            if($query_run)
            {
                if(mysqli_num_rows($query_run)>0){
                    ?>
                        

                    <?php                          
                                        //looping through all students
                                        while($row=mysqli_fetch_assoc($query_run)){
                                            $name       = $row['name'];
                                            //$dob        = $row['dob'];
                                            //$gender     = $row['gender'];
                                            //$cause      = $row['cause'];
                                            //$expstress  = $row['expstress'];
                                            //$factors    = $row['factors'];
                                            //$cognitive  = $row['cognitive'];
                                            //$emotional  = $row['emotional'];
                                            //$socialeff  = $row['socialeff'];
                                            //$regno      = $row['regno'];

                                            //printing 
                                            ?>
                                                <tr class="flex w-full mb-2">
                                                        <td class="p-1 w-1/4 overflow-hidden"><?php echo $name; ?></td>
                                                        <td class="p-1 w-1/4 overflow-hidden"><?php echo $department; ?></td>
                                                        <td class="p-1 w-1/4 overflow-hidden"><?php echo $batch; ?></td>
                                                    </div> 
                                                    <td class="p-1 w-1/4 overflow-hidden"><?php echo'<a href="student_view.php?user='.$name.'" class="inline-block text-sm px-4 py-1 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-400 hover:bg-blue-700 mt-4 lg:mt-0">View</a>'; ?></td>
                                                    </tr>  
                                            <?php
                                        }
                    ?>  
                                    </div>
                                </div>
                            </div>
                    <?php
                }else{
                    echo '<script type="text/javascript">alert("Student Details Not available!")</script>';
                }
            }
        }else{
            //homepage
        }
    ?>


</body>
</html>