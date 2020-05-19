<?php
	session_start();
	require_once('dbconfig/config.php');
		if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='index.php';</script>";
	}
	//phpinfo();
?>
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="css/chat.css">
    <style>
        #message-container{
            height:95%;
            overflow:auto;
        }
        .textarea{
            color:black;
            width:90%;
            height:10%;
            position:absolute;
            bottom:1%;
            margin-left:1px;
            
        }
        .grey-messages,.white-messages{
            border:1px solid black;
            width:96%
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
        #textbox{
            color:white;
            background-color:green;
            width:7%;
            height:11%;
            position:absolute;
            bottom:1%;
            right:1%;
            margin-right:2px;
            
        }
        }
    </style>
    </head>
    <body>
        
        <?php require_once("include/new_messages.php"); ?>
        
        <div id ="container">
         <div id="menu">
             <?php echo $_SESSION['username']; ?>
             <?php
                 $sql='SELECT DISTINCT `username` FROM `counselor`';
                 $y=mysqli_query($con,$sql);
                 if($y){
                    $counselor=array();
                    $count=0;
                    if(mysqli_num_rows($y)>0){
                         while($row=mysqli_fetch_assoc($y)){
                          $user=$row['username'];
                          if(in_array($user,$counselor)){
                          //not added
                          }else{
                          //added to array
                                $counselor=array($count=>$user);
                                $count++;
                
                            }
                        }
                    }
                }
                if(in_array($_SESSION['username'],$counselor)){
                    ?>
                     <a href="chome.php"><button class="chome" type="button">HOME</button></a>
                    <?php
                }else{
                    ?>
                     <a href="shome.php"><button class="chome" type="button">HOME</button></a>
                    <?php
                }
             ?>
         </div> 
         <div id="left-col">
             <?php require_once("include/left_col.php"); ?>
             
         </div>
         
         
         
         
         <div id="right-col">
             <?php require_once("include/right_col.php"); ?>
             </div>
         </div>
    </body>
</html>