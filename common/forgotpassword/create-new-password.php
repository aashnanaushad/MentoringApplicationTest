<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/tailwind.min.css">
</head>
<body class=" bg-blue-400 ">
     <div class=" px-3 py-10 pt-20 bg-blue-400 flex justify-center">
				<div class="lg:flex bg-white shadow-md rounded px-8 pt-8 pb-10 mb-8 " >
         
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
                 <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="pwd" placeholder="enter new password">
                 <input  class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="pwd-repeat" placeholder="confirm the password">
                 <div class="flex items-center justify-between">
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" name="reset-password-submit" type="submit">
						RESET PASSWORD	
						</button>
                  
                 </div>
             </form>
             <?php
                 }
                 
             }
                 ?>
          
     </div>
    </div>
 
 </body>
</html>
  