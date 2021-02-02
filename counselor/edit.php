<?php
    session_start();
    require_once('../dbconfig/config.php');
    	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
	}
    //phpinfo();
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
            <title>Counselor-edit</title>
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
		<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
			<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
			<form action="edit.php" method="post">
		<div class="-mx-3 md:flex mb-6">
				
			<div class=" px-3 mb-6 md:mb-0">
			
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" >
				Name
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" name="name" type="text" value="<?php echo $row['name']?>">
			</div>
		</div>
		<div class="-mx-3 md:flex mb-6">
			<div class="md:w-full px-3">
			<label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
				Email
			</label>
			<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="email" type="text" value="<?php echo $row["email"];?>">

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
		
		<div class="flex items-center justify-between ">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" name="edit" type="submit">
							Edit
						</button>
			</form>
						<form action="edit.php" method="post">
							<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit" name="back" >
								back
							</button>
						</form>
			</div>
		</div>
            <?php
			if(isset($_POST['back']))
			{
			     echo "<script>window.location.href='home.php';</script>";
			}
			if(isset($_POST['edit']))
			{
			    @$name=$_POST['name'];
				@$qualification=$_POST['qualification'];
				@$email=$_POST['email'];
			    $query = "update counselor set name='$name',qualification='$qualification',email='$email' where username='$username'";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
				 echo '<script type="text/javascript">alert("Updates saved!")</script>';
			     echo "<script>window.location.href='home.php';</script>";
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