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
		    $query="select * from student where dept='$dept' and start_yr='$batch'";
	        $query_run = mysqli_query($con,$query);
		    while($row=$query_run->fetch_assoc() )
		    {
		        if($flag==0)
		        {
		        @$username= $row["username"];
		        
		        if($row["edit"]==1 )
		        {
		            @$username= $row["username"];
		            $flag=1;
		            echo"<br>";
		            echo"<br>";
		            echo"<br>";
		            echo "Username: $username";
		            echo"<br>";
		            $query1="select * from temp_student where username='$username'";
		            $query_run1 = mysqli_query($con,$query1);
		            while($row1=$query_run1->fetch_assoc())
		            {
		                  if( $row["name"] != $row1["name"])
		                  {
		                      @$name=$row1["name"];
		                      echo "Edited name: $name";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["dateofbirth"]!=$row1["dob"])
		                  {
		                      @$dob=$row1["dob"];
		                      echo "Edited dob: $dob";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["address"]!=$row1["address"])
		                  {
		                      @$address=$row1["address"];
		                      echo "Edited address: $address";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  if( $row["email"]!=$row1["email"])
		                  {
		                      @$email=$row1["email"];
		                      echo "Edited email: $email";
		                      echo "<br>";
		                      echo "<br>";
		                  }
		                  @$name=$row1['name'];
		                  @$dateofbirth=$row1['dob'];
			           	  @$address=$row1['address'];
				          @$email=$row1['email'];
		            }
		        }
		        }
		    }
		  ?>
		      <form method="post">
			  <button name="confirm" class="sign_up_btn" type="submit">Confirm</button></a>
			    <a href="confirm_requests.php"><button type="button" class="back_btn"><< Back </button></a>	
			    </form>

		  
		  <?php
			if(isset($_POST['confirm']))
			{
				
				echo "$username";
	            $query = "update student set name='$name',dateofbirth='$dateofbirth',address='$address',email='$email',edit='0' where username='$username'";
				$query_run= mysqli_query($con,$query);
				if($query_run)
				{
				    $query = "delete from temp_student where username='$username'";
				    $query_run= mysqli_query($con,$query);
					echo '< type="text/javascript">alert("Update success for user")</script>';
				    echo "<script>window.location.href='advisor.php';</script>";
				}
				else
				{
					echo '<p class="bg-danger msg-block">Sorry, request could not be granted!</p>';
				}
			}
			else
			{
			}
		?>
		  
	</div>
</body>
</html>