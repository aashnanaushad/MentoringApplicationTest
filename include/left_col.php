<?php
    session_start();
    require 'dbconfig/config.php';
?>
    <div id="left-col-container">
    <?php
    if($_SESSION['username']=='c1'){
    ?>
    <!--<div onclick="document.getElementById('new-messages').style.display='block'" class="white">-->
    <div class="white">
        <p align="center">REQUESTED STUDENTS LIST:</p>
    </div>
    <?php
    }else{
        ?>
    <div  class="white">
        <p align="center">CHATS</p>
    </div>
    <?php
    }
    if($_SESSION['username']!='c1'){
    $sql='SELECT DISTINCT `receiver_name`,`sender_name`
    FROM `message` WHERE
    `sender_name`="'.$_SESSION['username'].'" OR
    `receiver_name`="'.$_SESSION['username'].'"
    ORDER BY `date_time` DESC';

    $r=mysqli_query($con,$sql);
    if($r){
        $added_user=array();
        $counter=0;
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $sender_name=$row['sender_name'];
                $receiver_name=$row['receiver_name'];
                
                if($_SESSION['username']==$sender_name){
                    //receiver name only once
                    if(in_array($receiver_name,$added_user)){
                        //not added
                    }else{
                        //receiver added
                        ?>
                            <div class="back">
                               <?php echo'<a href="?user='.$receiver_name.'">'.$receiver_name.'</a>';?>
                            </div>
                        <?php
                        //receiver name to array
                        $added_user=array($counter=>$receiver_name);
                        $counnter++;
                        
                    }
                }elseif($_SESSION['username']==$receiver_name){
                    //receiver name only once
                    if(in_array($sender_name,$added_user)){
                        //not added
                    }else{
                        //sender  added
                        ?>
                            <div class="back">
                               <?php echo'<a href="?user='.$sender_name.'">'.$sender_name.'</a>';?>
                            </div>
                        <?php
                        //receiver name to array
                        $added_user=array($counter=>$sender_name);
                        $counter++;
                        
                    }
                }
            }
            
        }else{
            'no user';
        }
        
    }else{
        echo"error!!";
    }
   }else{
    $sql='SELECT DISTINCT `username` FROM `request` WHERE approve=2';
    $r=mysqli_query($con,$sql);
    if($r){
        $added_user=array();
        $counter=0;
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $receiver_name=$row['username'];
                ?>
                <div class="back">
                   <?php echo'<a href="?user='.$receiver_name.'">'.$receiver_name.'</a>';?>
                </div>
                <?php
            }
                
        
    }
    }else{
        echo "error";
    }
   }
?>



</div>