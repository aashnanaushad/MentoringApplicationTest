<?php
	session_start();
	require_once('../../dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../../index.php';</script>";
	}
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$batch=$row1['batch'];
	
	$dept=$row1['dept'];
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>hod</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/tailwind.min.css">
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
			<div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 w-2/3" >
		<?php
			$flag=0;
			$flag1=0;
		    $query="select * from request where dept='$dept'";
			$query_run = mysqli_query($con,$query);
			
		    while($row=$query_run->fetch_assoc() )
		    {
				
		        if($flag==0)
		        {
		        @$username= $row["username"];
		        
		        if($row["approve"]==1 )
		        {
		            $username= $row["username"];
		            $reason=$row["reason"];
					$flag=1;
					$flag1=1;
		            echo"<br>";
		            echo"<br>";
		            echo"<br>";
		            echo "Username: $username";
		            echo"<br>";
		            echo "Reason: $reason";
		            echo"<br>";
		            echo"<br>";

		        }
				}
			}
		  ?>
		  		<?php if ($flag1 == 1) { ?>
		      <form method="post" action="request_fwdhod.php">
		      <input type="hidden" name="user1" value="<?php echo $username; ?>">
			  <button name="forward" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" type="submit">Approve</button></a>
			  <button name="reject" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left" type="submit">Reject</button></a>
			    </form>
				  <?php }
				  else {
					echo "NO REQUESTS AVAILABLE";
				} ?>

			<?php 
			if(isset($_POST['forward']))
			{
				$date=date("yy-m-d h:m:s");
				$username1=$_POST['user1'];
	            $query = "UPDATE request SET approve='2' where username='$username1';";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
					echo '<script type="text/javascript">alert("request approved successfully")</script>';
					echo "<script>window.location.href='hod.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}
			if(isset($_POST['reject']))
			{
				$username=$_POST['user1'];
				$query = "delete from request where username='$username'";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
					$query = "update student set rqstcon='0' where username='$username';";
					$query_run = mysqli_query($con,$query);
					if($query_run){
						echo '<script type="text/javascript"> alert("Rejection of request successfull.")</script>';
						echo "<script>window.location.href='hod.php';</script>";
					}
					else {
						echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
					}
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}
		?>
		  </div>
	</div>
</body>
</html>