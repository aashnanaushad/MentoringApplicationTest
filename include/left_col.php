<?php
    //session_start();
    require 'dbconfig/config.php';
?>
    <div id="left-col-container">
    <?php
    $sql='SELECT username FROM `counselor`;';
    $r=mysqli_query($con,$sql);
    if($r){
        $counselor=array();
        $count=0;
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $user=$row['username'];
                $counselor[]= $user;
               // $count++;
        }

     }
    }else{
        echo "database error";
    }

    if(in_array($_SESSION['username'],$counselor)){
    ?>
    <!--<div onclick="document.getElementById('new-messages').style.display='block'" class="white">-->
    <div class="white">
        <p align="center">REQUESTED STUDENTS</p>
    </div>
    <?php
    }else{
        ?>
    <div  class="white">
        <p align="center">CHATS</p>
    </div>
    <?php
    }

    if(in_array($_SESSION['username'],$counselor)){
        $sql='SELECT `username` FROM `request` WHERE approve=2;';
        $r=mysqli_query($con,$sql);
        if($r){
        $added_user=array();
        $counter=0;
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $receiver_name=$row['username'];
                if(in_array($receiver_name,$added_user)){
                        //not added
                    }else{
                        //sender  added
                        ?>
                            <div class="back">
                               <?php echo'<a href="?user='.$receiver_name.'">'.$receiver_name.'</a>';?>
                            </div>
                        <?php
                        //receiver name to array
                        $added_user[]=$receiver_name;
                        //$counter++;
                        
                    }
            }
                
        
    }
    }else{
        echo "error";
    }
    
   }else{//here
    $sql=' SELECT DISTINCT `username` FROM `counselor`';

    $r=mysqli_query($con,$sql);
    if($r){
        $added_user=array();
        $counter=0;
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_assoc($r)){
                $receiver_name=$row['username'];
                if(in_array($receiver_name,$added_user)){
                        //not added
                    }else{
                        //sender  added
                        ?>
                            <div class="back">
                               <?php echo'<a href="?user='.$receiver_name.'">'.$receiver_name.'</a>';?>
                            </div>
                        <?php
                        //receiver name to array
                        $added_user[]= $receiver_name;
                       // $counter++;
            }
        
        }
    }
  
    }else{
        echo"error!!";
    }
       
   }

   
?>



</div>