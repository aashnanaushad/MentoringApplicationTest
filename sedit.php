<?php
    session_start();
    require_once('dbconfig/config.php');
    	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
    //phpinfo();
	$username=$_SESSION['username'];
	$query="select * from student where username='$username'";
	$query_run = mysqli_query($con,$query);
	if($query_run)
	{
		$row=$query_run->fetch_assoc();
	}
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Student</title>
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body style="background_colour:#bdc3c7">
            <div id="main-wrapper"
            <centre><h2>Edit Details:</h2></centre>
            <div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		    </div>
            <form action="sedit.php" method="post">
                <div class="inner_container">
                    <label><b>Name</b></label>
                    <input type="text" name="name" required value="<?php echo $row['name']?>"/>
                    <label><b>DateOfBirth</b></label>
                    <input type="date" name="dateofbirth" required value="<?php echo $row['dateofbirth']?>"/>
                    <label><b>Address</b></label>
                    <input type="text" placeholder="<?php echo $row["address"];?>" name="address" required value="<?php echo $row['address']?>"/>
                    <label><b>Email</b></label>
                    <input type="text" name="email" required value="<?php echo $row['email']?>"/>
                    <a href="sedit.php"><button name="sedit" class="sign_up_btn" type="submit">Submit</button></a>
                    <a href="sview.php"><button type="button" class="back_btn"><< Back</button></a>
                </div> 
            </form>
            <?php
			if(isset($_POST['sedit']))
			{
			    $query = "update student set edit=1 where username='$username'";
				$query_run = mysqli_query($con,$query);
				@$name=$_POST['name'];
				@$dateofbirth=$_POST['dateofbirth'];
				@$address=$_POST['address'];
				@$email=$_POST['email'];
				
						    $query = "insert into temp_student values('$name','$username','$dateofbirth','$address','$email')";
						    $query_run = mysqli_query($con,$query);
						    if($query_run)
							{
							    echo '<script type="text/javascript">alert("Updates saved and Request send to faculty!")</script>';
							    echo "<script>window.location.href='shome.php';</script>";
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
			
        </body>
    </html>