<?php
    session_start();
    require_once('dbconfig/config.php');
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
	}
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Faculty-edit</title>
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body style="background_colour:#bdc3c7">
            <div id="main-wrapper"
            <centre><h2>Edit Details:</h2></centre>
            <div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		    </div>
            <form action="fedit.php" method="post">
                <div class="inner_container">
                    <label><b>Name</b></label>
                    <input type="text" name="name"  value="<?php echo $row['name']?>"/>
                    <label><b>Qualification</b></label>
                    <input type="text" name="qualification"  value="<?php echo $row['qualification']?>"/>
                    <label><b>Designation</b></label>
                    <input type="text" placeholder="<?php echo $row["address"];?>" name="designation" value="<?php echo $row['designation']?>"/>
                    <label><b>Email</b></label>
                    <input type="text" name="email"  value="<?php echo $row['email']?>"/>
                    <a href="fedit.php"><button name="fedit" class="sign_up_btn" type="submit">Submit</button></a>
                    <a href="fview.php"><button type="button" class="back_btn"><< Back </button></a>
                </div> 
            </form>
            <?php
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
			     echo "<script>window.location.href='hod.php';</script>";
				 }
				 if($type=='advisor')
				 {
			     echo "<script>window.location.href='advisor.php';</script>";
				 }
				 if($type=='faculty')
				 {
			     echo "<script>window.location.href='fhome.php';</script>";
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
			
        </body>
    </html>