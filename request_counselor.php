<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
    //header('location:index.php');
     }
	$username=$_SESSION['username'];
	$query="select * from student where username='$username'";
	$result=mysqli_query($con,$query);
	$row1=mysqli_fetch_array($result);
	$dept1=$row1['dept'];
	$batch=$row1['batch'];
	$start_yr=$row1['start_yr'];
?>
<html>
    <head> 
    <link rel="stylesheet" href="css/style.css">
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
   <body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<div class="inner_container">
		<form action="request_counselor.php" method="post">
				<input type="hidden" name="username" value="<?php echo $username; ?>">
				<input type="hidden" name="dept" value="<?php echo $dept1; ?>">
				<input type="text" name="reason" placeholder="reason" class="reason">
				<button class="login_button" name="request_counselor" type="submit">REQUEST</button>
				<a href="shome.php"><button type="button" class="back_btn"><< Back</button></a>
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
                                 <div class="inner_container">
                                     <form action="active_chats.php" method="post">
                                         <button class="chat_button" id="chat" name="request_counselor" type="submit">CHAT!</button>
                                     </form>
                                 </div>
 
                                 <?php
                                
                                 }
                             
                         }
                     }
				    }
                     ?>
 
	    </div>
	    </form>
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
         mysqli_stmt_bind_param($stmt,"s",$userEmail);
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
         echo"requested";
     }
  }
?>