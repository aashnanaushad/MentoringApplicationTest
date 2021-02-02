<?php
    session_start();
    require_once('../dbconfig/config.php');
    	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
    //phpinfo();
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$query_run = mysqli_query($con,$query);
	if($query_run)
	{
		$row=$query_run->fetch_assoc();
		$type=$row['user_type'];
		if($type == "HOD"){
			$flag = 1;
		}
		else if($type == "advisor"){
			$flag = 2;
		}
		else{
			$flag = 0;
		}
	}
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Faculty-edit</title>
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
				Qualification
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="qualification" type="text" value="<?php echo $row["qualification"];?>">

			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Designation
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="designation" type="text" value="<?php echo $row["designation"];?>">

			</div>
		</div>
		
		<div class="flex items-center justify-between ">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" name="edit" type="submit">
							Edit
						</button>
			</form>
						<form href="edit.php" method="post">
							<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit" name="back">
								back
							</button>
						</form>
			</div>
		</div>
            <?php
			if(isset($_POST['back']))
			{
				if($type=='HOD')
				 {
			     echo "<script>window.location.href='hod/hod.php';</script>";
				 }
				 if($type=='advisor')
				 {
			     echo "<script>window.location.href='advisor/advisor.php';</script>";
				 }
				 if($type=='faculty')
				 {
			     echo "<script>window.location.href='home.php';</script>";
				 }
			}

			if(isset($_POST['edit']))
			{
			    @$name=$_POST['name'];
				@$qualification=$_POST['qualification'];
				@$designation=$_POST['designation'];
				@$email=$_POST['email'];
				$query1="select * from faculty where username='$username'";
				$query_run1 = mysqli_query($con,$query1);
				$row=$query_run1->fetch_assoc();
				$type=$row['user_type'];
				
		
			    $query = "update faculty set name='$name',qualification='$qualification',designation='$designation',email='$email' where username='$username'";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
				 echo '<script type="text/javascript">alert("Updates saved!")</script>';
				 if($type=='HOD')
				 {
			     echo "<script>window.location.href='hod/hod.php';</script>";
				 }
				 if($type=='advisor')
				 {
			     echo "<script>window.location.href='advisor/advisor.php';</script>";
				 }
				 if($type=='faculty')
				 {
			     echo "<script>window.location.href='home.php';</script>";
				 }
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