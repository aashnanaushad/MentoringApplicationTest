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
             <?php
             $selector=$_GET["selector"];
             $validator=$_GET["validator"];
             if(empty($selector)||empty($validator)){
                 echo "Could not validate your request";
                }
             else{
                 if(ctype_xdigit($selector)!==false && ctype_xdigit($validator)!==false ){
             ?>
             
             <form action="include/reset-pwd.php" method="post">
                 <div class="inner_container">
                 <input type="hidden" name="selector" value="<?php echo $selector;?>">
                 <input type="hidden" name="validator" value="<?php echo $validator;?>">
                 <input type="password" name="pwd" placeholder="enter new password">
                 <input type="password" name="pwd-repeat" placeholder="confirm the password">
                 <button type="submit" name="reset-password-submit">RESET PASSWORD</button>
                 </div>
             </form>
             <?php
                 }
                 
             }
                 ?>
         </section>
     </div>
 </main>
 </body>
</html>
  