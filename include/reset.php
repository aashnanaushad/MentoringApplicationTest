<?php


 if(isset($_POST["reset-request"])){
     $table=$_POST['table'];
     $selector=bin2hex(random_bytes(8));
     $token=random_bytes(32);
     
     $url="https://mentoringapp.000webhostapp.com/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
     
     $expires=date("U")+900;
     
     require '../dbconfig/config.php';
     
     $userEmail = $_POST["email"];
     
     $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
     $stmt = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error";
         exit();
     }
     else{
         mysqli_stmt_bind_param($stmt,"s",$userEmail);
         mysqli_stmt_execute($stmt);
     }
     $sql ="INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires,pwdTable) VALUES (?,?,?,?,?);";
     $stmt = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error";
         exit();
     }
     else{
         $hashedToken=password_hash($token,PASSWORD_DEFAULT);
         mysqli_stmt_bind_param($stmt,"sssss",$userEmail,$selector,$hashedToken,$expires,$table);
         mysqli_stmt_execute($stmt); 
     } 
     mysqli_stmt_close($stmt);
     mysqli_close($con);
     
     $to=$userEmail;
     
     $subject ='Reset your password for the  mentoring app';
     
     $message ='<p>We received a password reset request.The link to reset your password is below.if you did not make this request ,please ignore this email.</p>';
     $mesaage .='<p>Here is your password reset link:</br>';
     $message .='<a href="'.$url.'">'.$url.'</a></p>';
     
     $headers="From:Memtoring app<mentoringapp.com>\r\n";
     $headers="Content-type:text/html\r\n";
     
     mail($to,$subject,$message,$headers);
     echo"<script>window.location.href='../reset-password.php?reset=success&table=".$table."';</script>";
      
     
 }
 else{
     header("Location:../index.php");
 }

?>