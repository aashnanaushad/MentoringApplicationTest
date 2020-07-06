<?php
if(isset($_POST['reset-password-submit'])){
    $selector=$_POST["selector"];
    $validator=$_POST["validator"];
    $password=$_POST["pwd"];
    $passwordRepeat=$_POST["pwd-repeat"];
    if(empty($password) && empty($passwordRepeat)){
        header("../slogin.php");
        exit();
    }
    else if($password!=$passwordRepeat){
        header("../slogin.php");
        exit();
        
    }
    $currentDate=date("U");
    require '../dbconfig/config.php';
    
    $sql ="SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires>=?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
         echo "There was an error";
         exit();
     }
     else{
        
         mysqli_stmt_bind_param($stmt,"ss",$selector,$currentDate);
         $row=mysqli_fetch_row($stmt);
         mysqli_stmt_execute($stmt);
         $result=mysqli_stmt_get_result($stmt);
         if(!$row=mysqli_fetch_assoc($result)){
             echo "You need to re-submit the reset request";
             exit();
         }
         else{
             $n=$row["pwdTable"];
             $tokenBin = hex2bin($validator);
             $tokenCheck=password_verify($tokenBin,$row["pwdResetToken"]);
                 
             if($tokenCheck== false){
                 echo"You need to re-submit the reset request";
                 exit;
             }
             elseif($tokenCheck==true){
                 $tokenEmail=$row["pwdResetEmail"];
                 switch($n){
                             case "a": 
                             $sql="SELECT * FROM student WHERE email=?;";
                             $stmt = mysqli_stmt_init($con);
                             if(!mysqli_stmt_prepare($stmt,$sql)){
                                 echo "There was an error";
                                 exit();
                            } 
                             else{
                                   mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                   mysqli_stmt_execute($stmt);
                    
                                  $result=mysqli_stmt_get_result($stmt);
                                 if(!$row=mysqli_fetch_assoc($result)){
                                     echo "There was an error!";
                                     exit();
                                 }
                                else{ 
                                $sql="UPDATE student SET password=? WHERE email=?;";
                                $stmt = mysqli_stmt_init($con);
                                    if(!mysqli_stmt_prepare($stmt,$sql)){
                                        echo "There was an error";
                                        exit();
                                    }
                                    else{
                                         mysqli_stmt_bind_param($stmt,"ss",$password,$tokenEmail);
                                         mysqli_stmt_execute($stmt);
                            
                                         $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                                         $stmt = mysqli_stmt_init($con);
                                         if(!mysqli_stmt_prepare($stmt,$sql)){
                                            echo "There was an error";
                                            exit();
                                            }
                                        else{
                                             mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                             mysqli_stmt_execute($stmt);
                                             echo"<script>window.location.href='../student/login.php?newpwd=passwordupdated';</script>";
                                        }
                                    }
                                }
                                 
                             }
                             break;
                             case "b":
                                  $sql="SELECT * FROM faculty WHERE email=?;";
                                  $stmt = mysqli_stmt_init($con);
                                 if(!mysqli_stmt_prepare($stmt,$sql)){
                                     echo "There was an error";
                                     exit();
                                 } 
                                 else{
                                   mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                   mysqli_stmt_execute($stmt);
                    
                                  $result=mysqli_stmt_get_result($stmt);
                                 if(!$row=mysqli_fetch_assoc($result)){
                                     echo "There was an error!";
                                     exit();
                                 }
                                else{
                                  $sql="UPDATE faculty SET password=? WHERE email=?;";
                                  $stmt = mysqli_stmt_init($con);
                                  if(!mysqli_stmt_prepare($stmt,$sql)){
                                    echo "There was an error";
                                    exit();
                                 }
                                 else{
                                     mysqli_stmt_bind_param($stmt,"ss",$password,$tokenEmail);
                                     mysqli_stmt_execute($stmt);
                            
                                     $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                                     $stmt = mysqli_stmt_init($con);
                                     if(!mysqli_stmt_prepare($stmt,$sql)){
                                             echo "There was an error";
                                             exit();
                                        }
                                    else{
                                         mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                         mysqli_stmt_execute($stmt);
                                         echo"<script>window.location.href='../faculty/login.php?newpwd=passwordupdated';</script>";
                                    }
                                }
                                }
                            }
                            break;
                             case "c":
                                  $sql="SELECT * FROM counselor WHERE email=?;";
                                  $stmt = mysqli_stmt_init($con);
                                  if(!mysqli_stmt_prepare($stmt,$sql)){
                                     echo "There was an error";
                                     exit();
                                 } 
                                 else{
                                   mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                   mysqli_stmt_execute($stmt);
                    
                                  $result=mysqli_stmt_get_result($stmt);
                                 if(!$row=mysqli_fetch_assoc($result)){
                                     echo "There was an error!";
                                     exit();
                                 }
                                else{
                                  $sql="UPDATE counselor SET password=? WHERE email=?;";
                                  $stmt = mysqli_stmt_init($con);
                                  if(!mysqli_stmt_prepare($stmt,$sql)){
                                    echo "There was an error";
                                    exit();
                                 }
                                 else{
                                     mysqli_stmt_bind_param($stmt,"ss",$password,$tokenEmail);
                                     mysqli_stmt_execute($stmt);
                            
                                     $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                                     $stmt = mysqli_stmt_init($con);
                                     if(!mysqli_stmt_prepare($stmt,$sql)){
                                             echo "There was an error";
                                             exit();
                                        }
                                     else{
                                         mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                         mysqli_stmt_execute($stmt);
                                         echo"<script>window.location.href='../counselor/login.php?newpwd=passwordupdated';</script>";
                                     }
                                }
                                }
                             }
                            break;
                            case "d":
                                 $sql="SELECT *  FROM admin WHERE email=?;";
                                 $stmt = mysqli_stmt_init($con);
                                 if(!mysqli_stmt_prepare($stmt,$sql)){
                                 echo "There was an error";
                                 exit();
                                 } 
                                 else{
                                   mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                   mysqli_stmt_execute($stmt);
                    
                                  $result=mysqli_stmt_get_result($stmt);
                                 if(!$row=mysqli_fetch_assoc($result)){
                                     echo "There was an error!";
                                     exit();
                                 }
                                else{
                                  $sql="UPDATE admin SET password=? WHERE email=?;";
                                  $stmt = mysqli_stmt_init($con);
                                  if(!mysqli_stmt_prepare($stmt,$sql)){
                                    echo "There was an error";
                                    exit();
                                 }
                                 else{
                                     mysqli_stmt_bind_param($stmt,"ss",$password,$tokenEmail);
                                     mysqli_stmt_execute($stmt);
                            
                                     $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
                                     $stmt = mysqli_stmt_init($con);
                                     if(!mysqli_stmt_prepare($stmt,$sql)){
                                             echo "There was an error";
                                             exit();
                                        }
                                     else{
                                         mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                         mysqli_stmt_execute($stmt);
                                         echo"<script>window.location.href='../admin/login.php?newpwd=passwordupdated';</script>";
                                    }
                                 }
                                }
                            }
                            break;
                            default:
                                echo "database error!!!";
                            }
                        }
                     }
                    
                
                }
                 
             }
        
    else{
    header("Location:../fhome.php");
    }
?>