<?php
   if(isset($_POST["pwd"])){
       $table=$_POST["pageinfo"];
      }
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">
 <!-- <main>
     <div id="main-wrapper">
         <section class="1">
             <h1>RESET PASSWORD</h1>
             <p>An E-mail will be sent to you with instructions to reset the password.<p>
                 <form action="include/reset.php" method="post">
                     <div class="inner_container">
                     <input type="hidden" name="table" value=""> 
                     <input type="text" name="email" placeholder="ENTER YOUR EMAIL">
                     <button type="submit" name="reset-request">SEND MAIL</button>
                     </div>
                 </form>

                 
         </section>
     </div>
 </main> -->
 <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
					
				
				
					<form action="include/reset.php" method="post"  >
					<div class="mb-4">
						<label class="block text-gray-700 text-sm font-bold mb-4" >
                        An E-mail will be sent to you with instructions to reset the password.
						</label>
                        <input type="hidden" name="table" value="<?php echo $table; ?>">
						<input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="user@example.com" required>
					</div>
					<div class="flex items-center justify-between">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="reset-request" type="submit">
							Send Mail
						</button>
						</form>
                        <?php
                  if(isset($_GET["reset"])){
                      if($_GET["reset"]=="success"){
                          echo '<p class="signupsucess">CHECK YOUR MAIL</p>';
                          if($table=="a"){
                            echo"<script>window.location.href='slogin.php';</script>";  
                          }elseif($table=="b"){
                              echo"<script>window.location.href='flogin.php';</script>";
                          }elseif($table=="c"){
                              echo"<script>window.location.href='clogin.php';</script>";
                          }else{
                               echo"<script>window.location.href='login.php';</script>";
                          }
                      }
                  }
                 ?>
					</div>
					
				</div>
 </body>
 </html>