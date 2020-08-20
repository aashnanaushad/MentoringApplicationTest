<?php
	session_start();
	require_once('../dbconfig/config.php');
    //phpinfo();
    $username;
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
    //header('location:index.php');
     }
	$username=$_SESSION['username'];
	$query="select * from faculty where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$dept1=$row1['dept'];
	$type=$row1['user_type'];
?>

<html>  
<head lang="en">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="..\css\tailwind.min.css"> 
    <title>View students</title>  
</head>   
  
<body>  
  
<div class="container ">
	<h1 class="mb-8 text-center text-2xl text-teal-400">
    Student list  
  </h1> 
  <table class="text-left w-full ml-8">
		<thead class="bg-teal-400 flex text-white w-full"> 
  
        <tr class="flex w-full mb-4">
  
            <th class="p-4 w-1/6">User Name</th>  
            <th class="p-4 w-1/6">Dept</th>  
            <th class="p-4 w-1/6">Year of Join</th>  
            <th class="p-4 w-1/6">Year of Passout</th>  
            <th class="p-4 w-1/6">Email</th>
            <th class="p-4 w-1/6"></th>  
        </tr>  
        </thead>  
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
        <?php  
         
        $view_users_query="select * from student where mentorship='$username'";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {  
            $user_id=$row['username'];  
            $department=$row['dept'];  
            $sy=$row['start_yr'];  
            $ey=$row['end_yr'];
            $user_email=$row['email']; 
  
        ?>  
        <form action="../faculty/mentorview.php" method="post">
        
			<tr class="flex w-full mb-1">
<!--here showing results in the table -->  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $user_id;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $department;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $sy;  ?></td>  
            <td class="p-4 w-1/6 overflow-hidden"><?php echo $ey;  ?></td>
            <td class="p-4 w-1/6 overflow-hidden "><?php echo $user_email; ?></td>
            <td class="p-4 w-1/6 overflow-hidden"> <input type="hidden" name="text" value="<?php echo $user_id; ?>">
                   <button type="submit" class="text-blue-600">More Details</button></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
        
        </form>
        <?php
			if(isset($_POST[$user_id]))
			{
			    
            }
		?>
        <?php } ?>
        </tbody>  
       
  
    </table> 
    </br>
    <form action="home.php" method="post">
    <a href="home.php"><button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right" type="submit" name="back">
								back
		</button> </a>
        </form>
        <?php
			if(isset($_POST['back']))
			{
				if($type=='HOD')
				 {
			     echo "<script>window.location.href='hod/hod.php';</script>";
				 }
				 if($type=='advisor')
				 {
			     echo "<script>window.location.href='advisor/advisor.php';</script>";
				 }
				 if($type=='faculty')
				 {
			     echo "<script>window.location.href='home.php';</script>";
				 }
			}?>
        </div>  

  
</body>  
  
</html> 