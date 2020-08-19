<?php
	session_start();
	require_once('../dbconfig/config.php');
	//phpinfo();
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../index.php';</script>";
    //header('location:index.php');
     }
	$username=$_SESSION['username'];
	$query="select * from student where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$dept1=$row1['dept'];
	// $batch=$row1['batch'];
    $start_yr=$row1['start_yr'];
?>
<html>
    <head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/tailwind.min.css">

    <title>request counselor</title>
    <style>
        .chat_button{
                background-color: #81aac2;
                color: white;
            	margin-top:10px;
            	margin-bottom:15px;
            	margin-left:100px;
            	padding:10px;
                width: 250px;
                height:50px;
            	font-size:16px;
            	font-weight: bold;
        }
    </style>
    </head>
    <body class=" bg-blue-400 ">
	<nav class="flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $row1['name'];?>)</span>
			</div>
			<div class="sm:hide w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="view.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="request_counselor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Request Counselor
				</a>
				<a href="changepass.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
					Change Password
				</a>
				</div>
				<div>
				<a href="../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>
    <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
					<form action="request_counselor.php" method="post"  >
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
				    <input type="hidden" name="dept" value="<?php echo $dept1; ?>">
					<div class="mb-4">
						<label class="block text-gray-700 text-sm font-bold mb-4" >
							Would you like to request for Counselor?
						</label>
						<input class="shadow appearance-none border rounded w-full py-12 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="reason" type="text" placeholder="Please specify a reason for request here..." class="reason" required>
					</div>
					<div class="flex items-center justify-between">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="request_counselor" type="submit">
							Request
						</button>
					
                    </form>
				
				<?php
				    $sql = "SELECT * FROM request WHERE username='$username';";
				    $r=mysqli_query($con,$sql);
				    if($r){
				        if(mysqli_num_rows($r)==1){
                        while($row=mysqli_fetch_assoc($r)){
                             $approve=$row['approve'];
 
                             if($approve==2){
                                 //chat active
                                 ?>
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="../chat/active_chats.php">
                                     <form action="../include/right_col.php" method="post">
                                         </br>
                                         <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-bottom" id="chat" name="request_counselor" type="submit">CHAT!</button>
                                     </form>
                                    </a>
                                    </div>
                                 <?php
                                
                                 }
                             
                         }
                     }
				    }
                     ?>
 

				</div>
    </div>
</body>
</html>
<?php
  if(isset($_POST["request_counselor"])){
     $query = "update student set rqstcon=1 where username='$username';";
	 $query_run = mysqli_query($con,$query);
     $username=$_POST['username'];
     $reason=$_POST['reason'];
     $dept=$_POST['dept'];
     $approve=0;
     
     $sql = "DELETE FROM request WHERE username='$username';";
     $stmt = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error";
         exit();
     }
     else{
        //  mysqli_stmt_bind_param($stmt,"s",$userEmail);
       
         mysqli_stmt_execute($stmt);
     }
     
     $sql = "INSERT INTO request (username,reason,dept,start_yr,approve) values (?,?,?,?,$approve);";
     $stmt = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error";
         exit();
     }
     else{
         mysqli_stmt_bind_param($stmt,"ssss",$username,$reason,$dept,$start_yr);
         mysqli_stmt_execute($stmt);
         echo '<script type="text/javascript">alert("Request Successful")</script>';
         echo "<script>window.location.href='view.php';</script>";
     }
  }
?>