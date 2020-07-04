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
<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
			<form action="fedit.php" method="post">
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
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" name="fedit" type="submit">
							Edit
						</button>
			</form>
						<form href="fedit.php" method="post">
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

			if(isset($_POST['fedit']))
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