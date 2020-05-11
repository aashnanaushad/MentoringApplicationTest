 <?php
    require '../dbconfig/config.php';
    if(isset($_POST['send'])){
     $sender_name=$_POST['session'];
     $receiver_name=$_POST['user_name'];
     $message=$_POST['message'];
     $date=date("yy-m-d h:m:s");
     
     $sql='INSERT INTO message (sender_name,receiver_name,message_text,date_time) VALUES ("'.$sender_name.'","'.$receiver_name.'","'.$message.'","'.$date.'");';
     $r=mysqli_query($con,$sql);
     if($r){
         echo "<script>window.location.href='../active_chats.php?user=$receiver_name';</script>";
     }
     else{
         echo $sql;
     }
     
      
 }
?>