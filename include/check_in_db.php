<?php
    require_once('../dbconfig/config.php');
    if(isset($_POST['user'])){
        $sql='SELECT * FROM request where username="'.$_POST['user'].'";';
        $r=mysqli_query($con,$sql);
        if($r){
            if(mysqli_num_rows($r) > 0){
                while($row=mysqli_fetch_assoc($r)){
                    if($row['approve']==2){
                        $user_name=$row['username'];
                        echo'<option value="'.$user_name.'">';
                
                    }else{
                         echo '<option value="no_user">';
                    } 
                }   
            }
            else{
                echo '<option value="no_user">';
            }
            
        }
        else{
            echo $sql;
        }
    }
?>