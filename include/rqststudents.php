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
    
?>  
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="stylesheet" href="../css/tailwind.min.css">
    <style>
         *{
             font-size:20px;
         }
          
        #left-col{
            position:relative;
            float:left;
            width:100%;
        }
        #left-col-container{
            width:60%;
            height:80%;
            top:30px;
            left:45px;
            border:border-box;
            border-color:black;
            margin:0px auto;
            overflow:auto;
        }
        .req{
            position:relative;
            float:right;
            padding-right:8px;
        }
        .req-elements{
            background-color:#BDC3C7;
            position:relative;
            padding-right:8px;
            padding-left:8px;
        }
        .notify-elements{
            background-color:#32CD32;
            position:relative;
            padding-right:8px;
            padding-left:8px;
        }
        a,.req{
            padding-left:12px;
        }
        .back{
            font-weight:250;
            width:94%;
            height:50px;
            border:1px solid grey;
            padding:5px;
            margin-left:1px;
            margin-top:2px;
            overflow:auto;
            
        }
        .white{
            font-weight:250;
            width:94%;
            height:50px;
            border:1px solid grey;
            padding:5px;
            margin-left:1px;
            margin-top:2px;
            overflow:auto;
            background-color:#1F2335;
            color:white;
        }
        .white:hover{
            background-color:#1C1C1C;
            color:white;
            
            color:white;
        }
    </style>
    </head>
    <body>
    <div id="left">
    <div id="left-col-container">
    <div class="white">
        <p align="center">REQUESTED STUDENTS</p>
    </div>
    <?php

        //echo $user;
        $sql='SELECT `this_session` FROM `notification` where username="'.$user.'";';
        //echo $sql;
        $result=mysqli_query($con,$sql) or die(mysqli_error($con));
        if($result){
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $last_session=$row['this_session'];
                    $sql='UPDATE notification
                    SET  this_session ="'.$this_session.'"
                    WHERE username="'.$_SESSION['username'].'";';
                    $r=mysqli_query($con,$sql);
                    if (!$r){
                        echo 'database error !!';
                    }
                }
            }else{
                //echo $_SESSION['username'];
                $sql='INSERT into notification VALUES ("'.$_SESSION['username'].'","'.$this_session.'");';
                $last_session="2010-01-01 00:00:00";
                $r=mysqli_query($con,$sql);
                if(!$r){
                    echo "database error !!!";
                }
        }
        
        }
        $sql='SELECT distinct `sender_name` FROM `message` WHERE `receiver_name`="'.$_SESSION['username'].'" 
        AND date_time BETWEEN "'.$last_session.'" AND "'.$this_session.'";';
        //
        $r=mysqli_query($con,$sql);
        if($r){
        $added_user=array();
        $counter=0;
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $receiver_name=$row['sender_name'];
                if(in_array($receiver_name,$added_user)){
                        //not added
                    }else{
                        //sender  added
                        ?>
                            <div class="back">
                                <?php 
                                    $flag =0;
                                    $query1 = 'SELECT `sender_name` from `message` where date_time=( select max(date_time) from `message` where `sender_name`="'.$sender_name.'")';
                                    $query_run1 = mysqli_query($con,$query1);
                                    // $row1=$query_run1->fetch_assoc();
                                    if($query_run1 == $sender_name){
                                        $flag=1;
                                    }
                                
                                ?>
                               <?php echo'<a href="#">'.$sender_name.'</a>'?>
                               <div class="req">
                               <?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="req-elements" name="profile">PROFILE</button></a>';?>
                                <?php if ($flag == 0) {?>                  
                               <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="req-elements" name="chat">CHAT</button></a>';?>
                                <?php }
                                    else { ?>
                                    <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="notify-elements" name="chat">CHAT</button></a>';?>
                                    <?php } ?>
                               </div>
                            </div>
                        <?php
                        //receiver name to array
                        $added_user[]=$receiver_name;
                        //$counter++;
                        
                    }
            }
                
       }
    }
    else{
        echo "error";
    }
    $sql='SELECT distinct  `sender_name` FROM `message` WHERE `receiver_name`="'.$_SESSION['username'].'" ;'; 
    $r=mysqli_query($con,$sql);
    if($r){
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $sender_name=$row['sender_name'];
                if(in_array($sender_name,$added_user)){
                        //not added
                    }else{
                        //sender  added
                    ?>
                        <div class="back">
                               <?php echo'<a href="#">'.$sender_name.'</a>'?>
                               <div class="req">
                               <?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="req-elements" name="profile">PROFILE</button></a>';?>                  
                               <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="req-elements" name="chat">CHAT</button></a>';?>
                               </div>
                            </div>
                        <?php
                        $added_user[]=$sender_name;
                    }
                }
            }
    }

?>
</div>
</div>
</body>
</html>