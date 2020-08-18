<?php
    session_start();
    require_once('../dbconfig/config.php');
    if(isset($_POST['textbox'])){
        
        if(isset($_POST['text'])){
            //empty message
            if($_POST['text']!=''){
                //insert
                $flag=$_POST['flag'];
                $sender_name=$_SESSION['username'];
                $receiver_name=$_POST['user'];
                $message=$_POST['text'];
                $date=date("yy-m-d h:m:s");
                $sql='INSERT INTO message (sender_name,receiver_name,message_text,date_time) VALUES ("'.$sender_name.'","'.$receiver_name.'","'.$message.'","'.$date.'");';
                 $r=mysqli_query($con,$sql);
                 if($r){
                     if($flag==0){
                        echo "<script>window.location.href='../chat/active_chats.php?user=$receiver_name';</script>";
                     }else{
                        echo "<script>window.location.href='counselorchat.php?user=$receiver_name';</script>";
                     }
                 }
                 else{
                    echo "error";
                }
                
            }else{
                echo "Please enter your message";
            }
            
            
        }else{
            echo "Could not send message";
        }
        
        
    }else{
        echo "Please login or select a user!!!";
    }
?>