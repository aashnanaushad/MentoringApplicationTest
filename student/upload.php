<?php
    session_start();
	require_once('../dbconfig/config.php');
	
    
 if(isset($_POST['submit'])){
     $file=$_FILES['file'];

     $fileName=$_FILES['file']['name'];
     $fileTmpName=$_FILES['file']['tmp_name'];
     $fileSize=$_FILES['file']['size'];
     $fileError=$_FILES['file']['error'];
     $fileType=$_FILES['file']['type'];

     $fileExt = explode('.',$fileName);
     $fileActualExt = strtolower(end($fileExt));

     $allowed=array('jpg','jpeg','png');
     if(in_array($fileActualExt,$allowed)){
         if($fileError===0){
             if($fileSize<5000000){
                 $fileNameNew=uniqid('',true).".".$fileActualExt;
                 $fileDestinaion='upload-images/'.$fileNameNew;
                 move_uploaded_file($fileTmpName,$fileDestinaion);
                 $image_extention=strval($fileNameNew);
                 $sql='UPDATE student set img_destination="'.$image_extention.'" where username="'.$_SESSION['username'].'";';
                 $query_run = mysqli_query($con,$sql);
                 echo "<script>window.location.href='edit.php?uploadsuccess';</script>";
                 

             }else{
                echo "File size exceeded the limit!";
                echo "<script>window.location.href='edit.php'?imgsizeerror;</script>";
             }

         }else{
             echo "There was an error  uploading the file!";
             echo "<script>window.location.href='edit.php?error';</script>";
         }

     }else{
         echo "Incorrect Image Format!";
         echo "<script>window.location.href='edit.php?incorrectformat';</script>";
     }
 }else{
    echo "<script>window.location.href='edit.php';</script>";
}
?>