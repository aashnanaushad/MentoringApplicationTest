<?php

class Common
{
  public function uploadData($con,$username,$name,$email,$department,$address,$dateofbirth,$phone_no,$gender,$father,$focc,$mother,$mocc,
  $school10,$mark10,$perc10,$school12,$mark12,$perc12,$otherschool,$othermark,$otherperc,$C1,$A1,$C2,$A2,$C3,$A3,$C4,$A4,$C5,$A5,$C6,$A6, 
  $C7,$A7,$C8,$A8,$password,$start_yr,$end_yr,$edit,$reqcon,$mentor,$img)
  {
      $mainQuery = "INSERT INTO  student SET name='$name',username='$username',email='$email',dept='$department',address='$address',dateofbirth= '$dateofbirth',phone_no='$phone_no',gender='$gender',father='$father',focc='$focc',mother='$mother',mocc='$mocc',
      school10='$school10',mark10='$mark10',perc10='$perc10',school12='$school12',mark12='$mark12',perc12='$perc12',othername='$otherschool',othermark='$othermark',otherperc='$otherperc',
      C1='$C1',A1='$A1',C2='$C2',A2='$A2',C3='$C3',A3='$A3',C4='$C4',A4='$A4',C5='$C5',A5='$A5',C6='$C6',A6='$A6',C7='$C7',A7='$A7',C8='$C8',A8='$A8',password='$password',start_yr='$start_yr',end_yr='$end_yr',edit='$edit',rqstcon='$reqcon',mentorship='$mentor',img_destination='$img'";
      $result1 = $con->query($mainQuery) or die("Error in main Query".$con->error);
      return $result1;
  }
}
?>