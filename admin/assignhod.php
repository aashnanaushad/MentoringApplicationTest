<?php
	session_start();
	require_once('../dbconfig/config.php');
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
     }
?>

<html>  
<head lang="en">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="..\css\tailwind.min.css">
    <title>Assign hod</title>  
</head>  
<div class="container ">
	<h1 class="mb-8 text-center text-2xl text-teal-400">
    Faculty list
  </h1> 
  <table class="text-left w-full ml-8">
		<thead class="bg-teal-400 flex text-white w-full"> 
  
        <tr class="flex w-full mb-4">
  
            <th class="p-4 w-1/6">User Name</th>  
            <th class="p-4 w-1/6">Department</th>
            <th class="p-4 w-1/6">Designation</th>  
            <th class="p-4 w-1/6">User E-mail</th>  
            <th class="p-4 w-1/6">Type</th>  
            <th class="p-4 w-1/6">Assign HOD</th>  
        </tr>  
        </thead>  
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
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
        
        <tr class="flex w-full mb-1"> 
<!--here showing results in the table -->  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $dept; ?></td>
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $designation;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_email;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_type;  ?></td>  
            <?php  if ($user_type != "HOD") { ?>
            <td class="p-4 w-1/6 overflow-hidden"><a href="assignhod.php"><button class="text-green-400" type="submit"  name="<?php echo "$user_id"; ?>">Assign</button></a></td>  
            <?php 
                $flag =0;    
                    }
                else { ?>
                <td class="p-4 w-1/6 overflow-hidden"><a href="assignhod.php"><button class="text-red-400" type="submit"  name="<?php echo "$user_id"; ?>">De-assign</button></a></td>  
                <?php 
                    $flag=1;
            } ?>
        </tr>  
            </form>
        <?php
			if(isset($_POST[$user_id]))
			{
                if($flag == 1){
                    $user_type="faculty";
                    $query = "update faculty set user_type='$user_type' where username='$user_id' ";
                    $query_run = mysqli_query($con,$query);
			        	if($query_run)
				    	{
					      echo '<script type="text/javascript">alert("Successfully de-assigned HOD ")</script>';
					        echo "<script>window.location.href='homepage.php';</script>";
				    	}
				    	else
				    	{
					        echo '<script type="text/javascript">alert("cannot de-assign HOD!!")</script>';
				    	}
                }
                else{
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
        }
		?>
       	 <?php } ?> 
            </tbody> 
    </table>  
    </br>
        <form href="assignhod.php" method="post">
    <a href="assignhod.php"><button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit" name="back">
								back
		</button> </a>
        </form>
        <?php
			if(isset($_POST['back']))
			{
			     echo "<script>window.location.href='homepage.php';</script>";
            }
            ?>
</div>  
</body>  
  
</html> 