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
</head>
<body style="background-color:#bdc3c7">
 <main>
     <div id="main-wrapper">
         <section class="1">
             <h1>RESET PASSWORD</h1>
             <p>An E-mail will be sent to you with instructions to reset the password.<p>
                 <form action="include/reset.php" method="post">
                     <div class="inner_container">
                     <input type="hidden" name="table" value="<?php echo $table; ?>"> 
                     <input type="text" name="email" placeholder="ENTER YOUR EMAIL">
                     <button type="submit" name="reset-request">SEND MAIL</button>
                     </div>
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
         </section>
     </div>
 </main>
 </body>
 </html>