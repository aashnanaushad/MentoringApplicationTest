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
        #new{
            padding:4px;
            border-radius:50%;
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
                                ?>
                            <div class="back">
                                <?php echo'<a href="#">'.$sender_name.'</a>'?>
                                <div class="req">
                                <?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="req-elements" name="profile">PROFILE</button></a>';?>                  
                                <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="req-elements" name="chat">CHAT</button></a>';?>
                                <button class="req-elements" id="new" name="chat" style="background-color:#00FF00;">new</button>
                                </div>
                             </div>   
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
                        ?>
                            <div class="back">
                               <?php echo'<a href="#">'.$sender_name.'</a>'?>
                               <div class="req">
                               <?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="req-elements" name="profile">PROFILE</button></a>';?>                  
                               <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="req-elements" name="chat">CHAT</button></a>';?>
                               <button class="req-elements" id="new" name="chat" style="background-color:#0000FF;">msg</button>
                               </div>
                            </div>
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
                    ?>
                        <div class="back">
                               <?php echo'<a href="#">'.$sender_name.'</a>'?>
                               <div class="req">
                               <?php echo'<a href="../student/view.php?user='.$sender_name.'"> <button class="req-elements" name="profile">PROFILE</button></a>';?>                  
                               <?php echo'<a href="counselorchat.php?user='.$sender_name.'"> <button class="req-elements" name="chat">CHAT</button></a>';?>
                               </div>
                            </div>
                        <?php
                    
                }
            }
    }

?>
</div>
</div>
</body>
</html>