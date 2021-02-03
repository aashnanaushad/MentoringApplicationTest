<?php
	session_start();
    require_once('../dbconfig/config.php');
    $flag=0;
    $user;
	if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../student/view.php';</script>";
    }
    $username = $_SESSION['username'];
    $q = "select * from student where username='$username'";
	$q_run = mysqli_query($con,$q);
	if($q_run)
	{
		$r=$q_run->fetch_assoc();
    }
    $form_query='select * from form where username="'.$username.'";';
    $form_query_run = mysqli_query($con,$form_query);
    if($form_query_run){
        if(mysqli_num_rows($form_query_run)==0){
            $form = 1;
        }else{
            $form=0;
        }
    }
?>
<html>
<head>
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="stylesheet" href="../css/tailwind.min.css">
    <style>
        .scrollbar-w-2::-webkit-scrollbar {
        width: 0.25rem;
        height: 0.25rem;
        }

        .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
        --bg-opacity: 1;
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--bg-opacity));
        }

        .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
        --bg-opacity: 1;
        background-color: #edf2f7;
        background-color: rgba(237, 242, 247, var(--bg-opacity));
        }

        .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
        border-radius: 0.25rem;
        }
        </style>
        <script>
            const el = document.getElementById('messages')
            el.scrollTop = el.scrollHeight
        </script>
    </head>
    <body class="bg-blue-400">
    <nav class=" flex items-center justify-between flex-wrap bg-white p-6">
		<div class="flex items-center flex-shrink-0 text-blue-600 mr-6 ">
				<span class="font-semibold text-xl tracking-tight"><?php echo $_SESSION['username']; ?>(<?php echo $r['name'];?>)</span>
			</div>
			<div class=" w-full block flex-grow lg:flex lg:items-center lg:w-auto">
				<div class="text-sm lg:flex-grow">
				<a href="view.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Profile
				</a>
				<a href="request_counselor.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
					Request Counselor
				</a>
				<?php
                if($form==1){
					?>
					<a href="form.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200 mr-4">
						Student Form
					</a>
					<?php
				}
				?>
				<a href="changepass.php" class="block mt-4 lg:inline-block lg:mt-0 text-blue-600 hover:text-blue-200">
					Change Password
				</a>
				 </div> 
				<div>
				<a href="../logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-blue-600 border-blue-600 hover:border-transparent hover:text-blue-600 hover:bg-blue-200 mt-4 lg:mt-0">Logout</a>
				</div>
			</div>
			</nav>
            <?php 
               
               $sql='SELECT  distinct username FROM `counselor`;';
               $r=mysqli_query($con,$sql);
               if($r){
                 if(mysqli_num_rows($r)>0){
                     while($row=mysqli_fetch_assoc($r)){
                         $user=$row['username'];
                     // $count++;
                 }
             }
             $cname_query = "select * from counselor where username='$user'";
             $cname_run = mysqli_query($con,$cname_query);
             if($cname_run)
             {
                 $c_row=$cname_run->fetch_assoc();
             }
                 $cname= $c_row['name'];
         }
             // echo $cname;
             ?>
    <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col " style="height: 87vh;">
   <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
      <div class="flex items-center space-x-4">
                <div class="flex flex-col leading-tight">
                    <div class="text-2xl mt-1 flex items-center">
                    <span class="text-white mr-3"><?php echo $cname;?></span>
                    <span class="text-green-500">
                        <svg width="10" height="10">
                            <circle cx="5" cy="5" r="5" fill="currentColor"></circle>
                        </svg>
                    </span>
                    </div>
                    <span class="text-lg text-gray-600">Counselor</span>
                </div>
            </div>
        </div> 
         <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                        <?php
                        $no_messages=false;
                        require '../dbconfig/config.php';
                        if(isset($_GET['user'])){
                            $_GET['user']= $_GET['user'];
                            $user=$_GET['user'];
                        } 
                        if($no_messages==false){
                        $sql='SELECT * FROM `message` WHERE `sender_name`="'.$_SESSION['username'].'"
                        AND `receiver_name`="'.$user.'" 
                        OR 
                        `sender_name`="'.$user.'" 
                        AND `receiver_name`="'.$_SESSION['username'].'";';
                        $r=mysqli_query($con,$sql);
                        if($r){
                            while($row=mysqli_fetch_assoc($r)){
                                $sender_name=$row['sender_name'];
                                $receiver_name=$row['receiver_name'];
                                $message=$row['message_text'];
                                if($sender_name==$_SESSION['username']){
                                    ?>
                                    <div class="chat-message">
                                        <div class="flex items-end justify-end">
                                            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white "><?php echo $message; ?></span></div>
                                            </div>
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_FQpYkZxsDjl3p3GS63piVRHG-HKWMXQYBw&usqp=CAU&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-2">
                                        </div>
                                    </div>
                                    <?php
                                    
                                    }else{
                                    ?>
                                    <div class="chat-message">
                                        <div class="flex items-end">
                                            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600"><?php echo $message;?></span></div>
                                            </div>
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSs8B1aCQnDo-Llozf7YrX_K27EKG-wmahwXg&usqp=CAU&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-6 h-6 rounded-full order-1">
                                        </div>
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

                    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0 h-4/5">
                        <div class="relative flex">
                            <span class="absolute inset-y-0 flex items-center">
                                <button type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                                </svg>
                                </button>
                            </span>
                            <form method="post" id="message-form" action="../include/send_txtbox.php">
                                <input class="invisible" name="flag" value="<?php echo $flag;?>">
                                <input class="invisible" name="user" value="<?php echo $user; ?>">
                                <input type="text" placeholder="Write Something" name="text" id="message_text" class="absolute right-0 w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3">
                                <div class="absolute right-0 items-center inset-y-0 hidden sm:flex py-2">
                                    <button type="submit" name="textbox" id="textbox" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                    </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
</body>
</html>