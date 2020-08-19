<?php
    session_start();
    require_once('../dbconfig/config.php');
    if(isset($_POST['send'])){
        $username=$_POST['username'];
        $feedback=$_POST['message'];
        $a=3;

        $sql='UPDATE request
        SET  feedback ="'.$feedback.'",approve="'.$a.'"
        WHERE username="'.$username.'";';
        $result=mysqli_query($con,$sql);
        if($result){
            $sql='DELETE FROM message WHERE `sender_name`="'.$_SESSION['username'].'"
            AND `receiver_name`="'.$username.'" 
            OR 
            `sender_name`="'.$username.'" 
            AND `receiver_name`="'.$_SESSION['username'].'";';
            $result=mysqli_query($con,$sql);
            if($result){
                echo "<script>window.location.href='rqststudents.php';</script>";
            }else{
                echo "database error!";
        }
    }else{
            echo "database error!!";
        }
    }else{
        echo "<script>window.location.href='counselorchat.php?user=$username';</script>";
    }
    ?>