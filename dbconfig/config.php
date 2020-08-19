<?php
$dbname="akNXZPFe1p";
$dbpass="mN1Eq25YRw";
$con=mysqli_connect ("remotemysql.com",$dbname,$dbpass,$dbname) or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,$dbname);
?>


