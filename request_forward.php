<?php
	session_start();
	require_once('dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
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
<title>Student</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<?php
		    $flag=0;
		    $query="select * from request where dept='$dept' and start_yr='$batch'";
	        $query_run = mysqli_query($con,$query);
		    while($row=$query_run->fetch_assoc() )
		    {
		        if($flag==0)
		        {
		        @$username= $row["username"];
		        
		        if($row["approve"]==0 )
		        {
		            @$username= $row["username"];
		            $reason=$row["reason"];
		            $flag=1;
		            echo"<br>";
		            echo"<br>";
		            echo"<br>";
		            echo "Username: $username";
		            echo"<br>";
		            echo "REASON: $reason";
		            echo"<br>";
		            echo"<br>";

		        }
		        }
		    }
		  ?>
		      <form method="post" action="request_forward.php">
		      <input type="hidden" name=user value="<?php echo $username ?>">
			  <button name="forward" class="sign_up_btn" type="submit">Forward</button></a>
			    <a href="request_counselor.php"><button type="button" class="back_btn"><< Back to Home</button></a>	
			    </form>

		  
		  <?php
			if(isset($_POST['forward']))
			{
				
				$username=$_POST['user'];
	            $query = "update request set approve='1' where username='$username'";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
					echo '<script type="text/javascript">alert(" Successfully Forwarded to HOD")</script>';
				    echo "<script>window.location.href='advisor.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}

		?>
		  
	</div>
</body>
</html>