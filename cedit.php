<?php
    session_start();
    require_once('dbconfig/config.php');
    	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
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
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body style="background_colour:#bdc3c7">
            <div id="main-wrapper"
            <centre><h2>Edit Details:</h2></centre>
            <div class="imgcontainer">
			<img src="imgs/avatar.png" alt="Avatar" class="avatar">
		    </div>
            <form action="cedit.php" method="post">
                <div class="inner_container">
                    <label><b>Name</b></label>
                    <input type="text" name="name"  value="<?php echo $row['name']?>"/>
                    <label><b>Qualification</b></label>
                    <input type="text" name="qualification"  value="<?php echo $row['qualification']?>"/>
                    <label><b>Email</b></label>
                    <input type="text" name="email"  value="<?php echo $row['email']?>"/>
                    <a href="cedit.php"><button name="cedit" class="sign_up_btn" type="submit">Submit</button></a>
                    <a href="cview.php"><button type="button" class="back_btn"><< Back</button></a>
                </div> 
            </form>
            <?php
			if(isset($_POST['cedit']))
			{
			    @$name=$_POST['name'];
				@$qualification=$_POST['qualification'];
				@$email=$_POST['email'];
			    $query = "update counselor set name='$name',qualification='$qualification',email='$email' where username='$username'";
				$query_run = mysqli_query($con,$query);
				if($query_run)
				{
				 echo '<script type="text/javascript">alert("Updates saved!")</script>';
			     echo "<script>window.location.href='chome.php';</script>";
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