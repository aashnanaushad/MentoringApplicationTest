<?php
	session_start();
	require_once('dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
    //header('location:index.php');
     }
	//phpinfo();
?>

<html>  
<head lang="en">    
    <link type="text/css" rel="stylesheet" href="css\bootstrap.css" > 
    <title>Assign hod</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
  
    }  

</style>  
     <style type="text/css">      
       table {border-top: 1px solid #ff0000; border-left: 1px solid #ff0000;}
      table td {border-right: 1px solid #00ff00; border-bottom: 1px solid #00ff00;}
      input[type="text"] {width: 100%;} 
   </style> 
<body>  
  
<div class="table-scrol">  
    <h1 align="center"> Faculties</h1>  
  
<div class="table-responsive"> 
  
  
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
  
        <tr>  
  
            <th>User Name</th>  
            <th>Department</th>
            <th>Designation</th>  
            <th>User E-mail</th>  
            <th>Type</th>  
            <th>Assign advisor</th>  
        </tr>  
        </thead>  
  
        <?php  
         
        $view_users_query="select * from faculty order by dept ";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row['username'];  
            $designation=$row['designation'];  
            $user_email=$row['email'];  
            $user_type=$row['user_type'];  
            $dept=$row['dept'];
        ?>  
        <form action="assignhod.php" method="post">
        
        <tr>  
<!--here showing results in the table -->  
            <td><?php echo $user_id;  ?></td>  
            <td><?php echo $dept; ?></td>
            <td><?php echo $designation;  ?></td>  
            <td><?php echo $user_email;  ?></td>  
            <td><?php echo $user_type;  ?></td>  
            <td><a href="assignhod.php"><button class="btn btn-danger" type="submit"  name="<?php echo "$user_id"; ?>">Assign</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
            </form>
        <?php
			if(isset($_POST[$user_id]))
			{
			    $query="select * from faculty where dept='$dept' and user_type='HOD'";
			    $query_run = mysqli_query($con,$query);
			    if($query_run)
			    {
				    if(mysqli_num_rows($query_run)<2)
				    {
				        $query = "update faculty set user_type='HOD',batch=0 where username='$user_id' ";
				        $query_run = mysqli_query($con,$query);
			        	if($query_run)
				    	{
					     echo '<script type="text/javascript">alert("Successfully assigned hod ")</script>';
					     echo "<script>window.location.href='homepage.php';</script>";
				    	}
				    	else
					    {
					     echo '<script type="text/javascript">alert("DB error")</script>';
					    }
				    }
				    else
				    {
				        echo '<script type="text/javascript">alert("Already 2 HODs assigned for the department!")</script>';
				    }
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