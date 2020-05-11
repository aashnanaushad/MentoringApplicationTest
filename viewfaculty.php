<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
    //header('location:index.php');
     }
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$dept1=$row1['dept'];
?>

<html>  
<head lang="en">    
    <link type="text/css" rel="stylesheet" href="css\bootstrap.css"> 
    <title>View faculty</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
  
    }  
  
</style>  
  
<body>  
  
<div class="table-scrol">  
    <h1 align="center">All Faculties</h1>  
  
<div class="table-responsive"> 
  
  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
  
            <th>User Name</th>  
            <th>Designation</th>  
            <th>User E-mail</th>  
            <th>Type</th>  
            <th>Batch</th>
            <th>Edit User</th>  
        </tr>  
        </thead>  
  
        <?php  
         
        $view_users_query="select * from faculty where dept='$dept1' ";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row['username'];  
            $designation=$row['designation'];  
            $user_email=$row['email'];  
            $user_type=$row['user_type'];  
            $batch=$row['batch'];
  
  
        ?>  
        <form action="viewfaculty.php" method="post">
  
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $user_id;  ?></td>  
            <td><?php echo $designation;  ?></td>  
            <td><?php echo $user_email;  ?></td>  
            <td><?php echo $user_type;  ?></td>
            <td><?php if($batch!=0) echo $batch; ?></td>
            <td><a href="viefaculty.php"><button class="btn btn-danger" type="submit" name="<?php echo $user_id;?>">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger -->  
        </tr>  
        </form>
        <?php
			if(isset($_POST[$user_id]))
			{
				$batch=$_POST['batch'];
				$query="delete from faculty where username='$user_id'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
					      echo '<script type="text/javascript">alert("Faculty deleted successfully ")</script>';
					        echo "<script>window.location.href='hod.php';</script>";
				}
			    else
			    {
			        echo '<script type="text/javascript">alert("DB error")</script>';
			    }
			}
		?>
        <?php } ?>  
  
    </table>  
        </div>  
</div>  
  
  
</body>  
  
</html> 