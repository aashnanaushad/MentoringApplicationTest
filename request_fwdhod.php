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
<title>hod</title>
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
		        
		        if($row["approve"]==1 )
		        {
		            $username= $row["username"];
		            $reason=$row["reason"];
		            $flag=1;
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
		      <form method="post" action="request_fwdhod.php">
		      <input type="hidden" name=user1 value="<?php echo $username; ?>">
			  <button name="forward" class="sign_up_btn" type="submit">Forward</button></a>
			    </form>

		  
		  <?php
			if(isset($_POST['forward']))
			{
				$date=date("yy-m-d h:m:s");
				$username1=$_POST['user1'];
	            $query = "UPDATE request SET approve='2' where username='$username1';";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
				   // $query = "UPDATE request SET date=$date where username='$username1';";
				   // $query_run= mysqli_query($con,$query);
				   //  if(!$query_run){
				    //        echo "error";
				       // }
					echo '<script type="text/javascript">alert("request forwarded to counselor")</script>';
					echo "<script>window.location.href='hod.php';</script>";
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