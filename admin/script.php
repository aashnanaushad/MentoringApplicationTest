<?php
include  "../dbconfig/config.php";
include_once  "Common.php";

if($_FILES['excelDoc']['name']) {
    $arrFileName = explode('.', $_FILES['excelDoc']['name']);
    if ($arrFileName[1] == 'csv') {
        $handle = fopen($_FILES['excelDoc']['tmp_name'], "r");
        $count = 0;
        while (($data = fgetcsv($handle, 3000, ",")) !== FALSE) {
            $count++;
            if ($count == 1) {
                continue;
            }
                $username = $con->real_escape_string($data[0]);
                $name = $con->real_escape_string($data[1]);
                $email = $con->real_escape_string($data[4]);
                $dateofbirth=$con->real_escape_string($data[3]);
                $department=$con->real_escape_string($data[37]);
				$join_date=$con->real_escape_string($data[34]);
                $password=password_hash($username,PASSWORD_DEFAULT);
				$end=4;
				$yr=explode('-', $join_date);
				$start_yr=$yr[2];
				$end_yr=$start_yr+$end;
				$edit=0;
				$reqcon=0;
                $mentor=NULL;
                $img="alt.jpg";
                $common = new Common();
                if (empty($name)){
				    $name=" ";
				}
				if (empty($dateofbirth)){
				    $dateofbirth='00-00-0000';
				}
				if (empty($address)){
				    $address=" ";
				}
				if (empty($email)){
				    $email=" ";
				}
				if (empty($phone_no)){
				    $phone_no=" ";
				}
				if (empty($gender)){
				    $gender=" ";
				}
				if (empty($father)){
				    $father=" ";
				}
				if (empty($focc)){
				    $focc=" ";
				}
				if (empty($mother)){
				    $mother=" ";
				}
				if (empty($mocc)){
				    $mocc=" ";
				}
				if (empty($school10)){
				    $school10= " ";
				}
				if (empty($mark10)){
				    $mark10=0.0;
				}
				if (empty($perc10)){
					$perc10=0.0;
				}
				if (empty($school12)){
				    $school12 = " ";
				}
				if (empty($mark12)){
				    $mark12=0.0;
				}
				if (empty($perc12)){
				    $perc12=0.0;
				}
				if (empty($otherschool)){
				    $otherschool=" ";
				}
				if (empty($othermark)){
				    $othermark=0.0;
				}
				if (empty($otherperc)){
				    $otherperc=0.0;
				}
				if (empty($C1)){
				    $C1=0.0;
				}
				if (empty($A1)){
				    $A1=0;
				}
				if (empty($C2)){
				    $C2=0.0;
				}
				if (empty($A2)){
				    $A2=0;
				}
				if (empty($C3)){
				    $C3=0.0;
				}
				if (empty($A3)){
				    $A3=0;
				}
				if (empty($C4)){
				    $C4=0.0;
				}
				if (empty($A4)){
				    $A4=0;
				}
				if (empty($C5)){
				    $C5=0.0;
				}
				if (empty($A5)){
				    $A5=0;
				}
				if (empty($C6)){
				    $C6=0.0;
				}
				if (empty($A6)){
				    $A6=0;
				}
				if (empty($C7)){
				    $C7=0.0;
				}
				if (empty($A7)){
				    $A7=0;
				}
				if (empty($C8)){
				    $C8=0.0;
				}
				if (empty($A8)){
				    $A8=0;
				}

                $SheetUpload = $common->uploadData($con,$username,$name,$email,$department,$address,$dateofbirth,$phone_no,$gender,$father,$focc,$mother,$mocc,
                $school10,$mark10,$perc10,$school12,$mark12,$perc12,$otherschool,$othermark,$otherperc,$C1,$A1,$C2,$A2,$C3,$A3,$C4,$A4,$C5,$A5,$C6,$A6, 
                $C7,$A7,$C8,$A8,$password,$start_yr,$end_yr,$edit,$reqcon,$mentor,$img);
        }
        if ($SheetUpload){
            echo "<script>alert('Sheet has been uploaded successfull !');window.location.href='sadd.php';</script>";
        }
    }
}
?>