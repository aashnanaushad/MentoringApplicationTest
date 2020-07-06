<?php
	//session_start();
	require_once('../dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../counselor/chome.php';</script>";
	}
	//phpinfo();
?>
<div id="right-col-container">
     <div id="message-container">
         
         <?php
         $no_messages=false;
         require '../dbconfig/config.php';
         if(isset($_GET['user'])){
             $_GET['user']= $_GET['user'];
         }else{
             //message from last user
             
             $sql='SELECT `sender_name`,`receiver_name` FROM `message`
             WHERE `sender_name`="'.$_SESSION['username'].'"
             or `receiver_name`="'.$_SESSION['username'].'"
             ORDER BY `date_time` DESC LIMIT 1;';
             
             $r=mysqli_query($con,$sql);
             if($r){
                 if(mysqli_num_rows($r)>0){
                        while($row=mysqli_fetch_assoc($r)){
                            $sender_name=$row['sender_name'];
                            $receiver_name=$row['receiver_name'];
                            
                            if($_SESSION['username']==$sender_name){
                                $_GET['user']=$receiver_name;
                            }else{
                                 $_GET['user']=$sender_name;
                            }
                        }
                     }else{
                     //no messages from this user
                     echo "NO MESSAGES";
                     $no_messages=true;
                    }
                 }else{
                echo "error";
             }
         }
         if($no_messages==false){
         $sql='SELECT * FROM `message` WHERE `sender_name`="'.$_SESSION['username'].'"
         AND `receiver_name`="'.$_GET['user'].'" 
         OR 
         `sender_name`="'.$_GET['user'].'" 
         AND `receiver_name`="'.$_SESSION['username'].'";';
         $r=mysqli_query($con,$sql);
         
         if($r){
             while($row=mysqli_fetch_assoc($r)){
                 $sender_name=$row['sender_name'];
                 $receiver_name=$row['receiver_name'];
                 $message=$row['message_text'];
                 if($sender_name==$_SESSION['username']){
                     //grey background
                     ?>
                    <div class="grey-messages">
                        <a href="#">me</a>
                        <p><?php echo $message; ?></p>
                    </div>
                     <?php
                    
                     }else{
                     //white background
                      ?>
                    <div class="white-messages">
                         <a href="#"><?php echo $sender_name; ?></a>
                         <p><?php echo $message;?></p>
                    </div>
                      <?php
                 }
                 
             }
         }
         else{
             echo $sql;
         }
         }
         ?>
 
     </div>
     <div id="txtbox">
         <form method="post" id="message-form" action="send_txtbox.php">
            <input type="hidden" name="user" value="<?php echo $_GET['user']; ?>">
            <textarea class="textarea" name="text" id="message_text" placeholder="type here"></textarea>
         <input type="submit" value="SEND" name="textbox" id="textbox">
         </form>
     </div>
</div>
<script>
  /*  $("document").ready(function(event){
        //submitted
        $("#right-col-container").on('submit','#message-form',funnction(){
           //taking data from txtbox
           var message_text=$("#message_text").val();
           //sending message
           $.post("include/send_txtbox.php?user=<?php echo $_GET['user'];?>",
           {
               text:message_text,
           },
           //return
           funtion(data,status){
               alert(data);
               //remove text
               $("#message_text").val("");
               //data inside msg contnr
               document.getElementById("message-container").innerHTML+=data;
           }
           
           );
        });
        
        //button click
        
        $("#right-col-container").keypress(function(e){
           //submit with enter
           if(e.keyCode==13 && !e.shiftKey){
               //enter without shift
               #("#message-form").submit();
           }
        });
    });*/
    
    
 </script>