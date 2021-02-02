<?php
    session_start();
    require_once('../dbconfig/config.php');
        if(!isset($_SESSION['username'])){
     echo"<script>window.location.href='../index.php';</script>";        
        }
    $user=$_SESSION['username'];
    $this_session=date("yy-m-d h:m:s");
    $last_session=date("yy-m-d h:m:s");
    $added_user=array();
    $query="select * from counselor where username='$user'";
	$query_run = mysqli_query($con,$query);
	if($query_run)
	{
	    $row=$query_run->fetch_assoc();
    }
?> 

<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../css/tailwind.min.css">
    </head>
    <body class=" bg-blue-400 ">
    <nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		    <div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
			    	<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row['name'];?>)</span>
		    </div>
		    <div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
                    <a href="../counselor/home.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
                        Profile
                    </a>
                    <a href="../include/rqststudents.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
                        Requested Students
                    </a>
                    <a href="../counselor/student_list.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
                        Student List
                    </a>
                    <a href="../counselor/ChangePassword.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
                        Change Password
                    </a>
				</div> 
				<div>
				    <a href="../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
	</nav>
    <div class=" px-1 py-2 bg-blue-400 flex justify-center ">
        <div class="w-3/4 lg:flex bg-white shadow-md px-4 py-4 mb-4 " >
            <div class="w-full  py-2 px-2">
                <table class=" w-full px-4">
		            <thead class="bg-blue-400 flex text-white w-full rounded"> 
  
                            <tr class="flex w-full mb-2 ">
                                <th >REQUESTED STUDENTS</th> 
                            </tr> 
                    </thead>
                    <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full divide-y divide-grey-500" style="height: 50vh;">
    <?php

        //echo $user;
        $a1=2;
        $sql='SELECT distinct username FROM request where approve="'.$a1.'";';
        //echo $sql;
        $result=mysqli_query($con,$sql) or die(mysqli_error($con));
        if($result){
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $username=$row['username'];
                    $sql='SELECT username from reply where username="'.$username.'";';
                    $r=mysqli_query($con,$sql);
                    if ($r){
                        if(mysqli_num_rows($r)==0){
                            $sender_name=$username;
                                $query1='select name from student where username="'.$username.'";';
                                $query1_run = mysqli_query($con,$query1);
                                if($query1_run){
                                    if(mysqli_num_rows($query1_run)>0){
                                        $row1=mysqli_fetch_assoc($query1_run);
                                        $name=$row1['name'];
                                    }
                                }
                                ?>
                            <tr class="flex w-full mb-2">
                            <td class="p-1 w-1/2 overflow-hidden"><?php echo'<a href="#">'.$sender_name.'('.$name.')</a>'?></td>
                                <td class="p-1 w-1/2 overflow-hidden pl-40 ml-10"><?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 uppercase transition bg-transparent border-2 border-blue-700 rounded ripple hover:bg-blue-100 focus:outline-none" name="profile">PROFILE</button></a>';?>           
                                <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none" name="chat">CHAT</button></a>';?>
                                <button class="inline-block p-3 text-center text-white transition bg-green-400 rounded-full shadow ripple hover:shadow-lg hover:bg-green-500 focus:outline-none" id="new" name="chat"></button></td>
                             </tr>
                                <?php
                        
                         
                            } 
                        }
                }
        
            }
        }  
        $a2=1;
        $sql='SELECT distinct `username` FROM `reply` WHERE reply="'.$a2.'";';
        //
        $r=mysqli_query($con,$sql);
        if($r){
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $sender_name=$row['username'];
                $query1='select name from student where username="'.$username.'";';
                $query1_run = mysqli_query($con,$query1);
                if($query1_run){
                    if(mysqli_num_rows($query1_run)>0){
                        $row1=mysqli_fetch_assoc($query1_run);
                        $name=$row1['name'];
                    }
                }
                        ?>
                            <tr class="flex w-full mb-2 ">
                            <td class="p-1 w-1/2 overflow-hidden "><?php echo'<a href="#">'.$sender_name.'('.$name.')</a>'?></td>
                               <td class="p-1 w-1/2 overflow-hidden pl-40 ml-10"><?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 uppercase transition bg-transparent border-2 border-blue-700 rounded ripple hover:bg-blue-100 focus:outline-none" name="profile">PROFILE</button></a>';?>                 
                               <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none" name="chat">CHAT</button></a>';?>
                               <button class="inline-block p-3 text-center text-white transition bg-blue-700 rounded-full shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none" id="new" name="chat" ></button></td>
                            </tr>
                        <?php
                    
                }
                
            }
        }else{
        echo "error";
        }
    $a3=0;
    $sql='SELECT distinct  `username` FROM `reply` WHERE reply="'.$a3.'";'; 
    $r=mysqli_query($con,$sql);
    if($r){
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $sender_name=$row['username'];
                $query1='select name from student where username="'.$username.'";';
                $query1_run = mysqli_query($con,$query1);
                if($query1_run){
                    if(mysqli_num_rows($query1_run)>0){
                        $row1=mysqli_fetch_assoc($query1_run);
                        $name=$row1['name'];
                    }
                }
                    ?>
                        <tr class="flex w-full mb-2">
                            <td class="p-1 w-1/2 overflow-hidden"><?php echo'<a href="#">'.$sender_name.'('.$name.')</a>'?></td>
                               <td class="p-1 w-1/2 overflow-hidden pl-40 ml-10"><?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-700 uppercase transition bg-transparent border-2 border-blue-700 rounded ripple hover:bg-blue-100 focus:outline-none" name="profile">PROFILE</button></a>';?>          
                               <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded ripple hover:bg-green-100 focus:outline-none" name="chat">CHAT</button></a>';?></td>
                        <?php
                    
                }
            }
    }

?>
</tbody>
</table>
</div>
</body>
</html>