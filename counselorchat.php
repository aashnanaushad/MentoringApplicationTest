<?php
	session_start();
    require_once('../dbconfig/config.php');
    $flag=1;
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../counselor/chome.php';</script>";
	}
	//phpinfo();
?>
<html>
<head>
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="stylesheet" href="../css/tailwind.min.css">
    <style>
         *{
             font-size:25px;
         }
        #left-col{
            position:relative;
            float:left;
            width:60%;
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
        }
        .req-elements{
            position:relative;
            padding-right:15px
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
        }
        #message-container{
            height:72%;
            padding-top:15px;
            overflow:auto;
        }

        .grey-messages,.white-messages{
            border:1px;
            width:96%;
            padding:5px;
            margin:0px auto;
            margin-top:2px;
            overflow:auto;
        }
        
        .grey-background{
            background:grey;
        }
        #new-messages{
            display:none;
            box-shadow:2px 10px 30px #000000;
            width:500px;
            position:fixed;
            top:20%;
            background:white;
            z-index:2;
            left:50%;
            transform:translate(-50%,0);
            overflow:hidden;
            border-radius:5px;
        }
        .m-header,.m-footer{
            background:blue;
            margin:0px;
            padding:5px;
            color:white;
            overflow:auto;
        }
        .m-header{
            font-size:20px;
            text-align:center;
        }
        .m-body{
            margin-left:3px;
            padding:5px;
        }
        .message-input{
            width:96%;
        }
        .textarea{
            border:1px #AEB6BF;
            position:fixed;
            color:black;
            width:75%;
            height:8%;
            bottom:8%;
            left:7.8%;
            padding:7px;
            
        }
        #textbox{
            color:white;
            background-color:green;
            border-radius:8px;
            width:8%;
            height:8%;
            position:absolute;
            bottom:8%;
            right:7.8%;
            margin-right:2px;
            
        }
        .chome{
            float:right;
            position:relative;
            right:8px;
            top:4px;
            width:75px;
            height:30px;
            border:2px solid white;
            border-sizing:border-box;
            background:blue;
            color:white;
        }
        .chome:hover{
            color:#39FF14;
            font-size:16px;
            border:2px solid #39FF14;
            }
        .msg{
            float:right;
            padding:5px 10px;
            border-radius:5px;
        }
        .msg1{
            float:left;
            padding:5px 10px;
            border-radius:5px;
        }
        .button{
            padding:4px;
            color:white;
            background-color:#3498DB;
             
            border-radius:50%;
        }
        #msg2{
            margin-top:4px;
            background-color:#AEB6BF;
            border-radius:7px;
        }

    </style>
    </head>
    <body>
    <div id ="container">
         <div id="menu">
             <?php 
             if(isset($_GET['user'])){
                $_GET['user']= $_GET['user'];
                echo $_GET['user'];
            }
            ?>
                    <a href="../counselor/home.php"><button class="chome" type="button">HOME</button></a>
         </div> 
         <div id="message-container">
                        <?php
                        $no_messages=false;
                        require '../dbconfig/config.php';
                        if(isset($_GET['user'])){
                            $_GET['user']= $_GET['user'];
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
                                        <a href="#" class="msg"><button class="button">me</button></a>
                                        <p class="msg" id="msg2"><?php echo $message; ?></p>
                                    </div>
                                    <?php
                                    
                                    }else{
                                    //white background
                                    ?>
                                    <div class="white-messages">
                                        <a href="#" class="msg1"><button class="button"><?php echo $sender_name; ?></button></a>
                                        <p class="msg1" id="msg2"><?php echo $message;?></p>
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
                        <form method="post" id="message-form" action="../include/send_txtbox.php">
                            <input type="hidden" name="flag" value="<?php echo "$flag";?>">
                            <input type="hidden" name="user" value="<?php echo $_GET['user']; ?>">
                            <textarea class="textarea" name="text" id="message_text" placeholder="Type a message"></textarea>
                        <input type="submit" value="SEND" name="textbox" id="textbox">
                        </form>
                    </div>
                </div>
        </div>
</body>
</html>