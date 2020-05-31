<?php
	//session_start();
	require_once('dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
	//phpinfo();
?>
<div id="new-messages">
    <p class="m-header">NEW MESSAGE</p>
    <p class="m-body">
        <form align="center" method="post" action="include/send.php">
           <input type="hidden" name="session" value="<?php echo $_SESSION['username']; ?>">
            <input type="text" list="user" onkeyup="check_in_db()" class="message-input" placeholder="user_name" name="user_name" id="user_name"><br><br>
            <datalist id="user"></datalist>
            <textarea class="message-input" name="message" placeholder="type here"></textarea><br><br>
            <input type="submit" value="send" name="send" id="send">
            <a href="active_chats.php"><button>Cancel</button></a>
        </form></p>
   
    <p class="m-footer"></p>
</div>

<script src="include/jquery-3.5.0.min.js"></script>
<script>
    document.getElementById("send").disabled=true;
    function check_in_db(){
     var user_name=document.getElementById("user_name").value;
     //username to check_in_db.php
     $.post("include/check_in_db.php",
     {
         user: user_name
     },
     function(data,status){
         //alert(data);
         if(data =='<option value="no_user">'){
             document.getElementById("send").disabled=true;
         }else{
             document.getElementById("send").disabled=false;
         }
         document.getElementById('user').innerHTML=data ;
     }
     );
    }
</script>