<?php
$dbname=getenv($dbname);
$dbpass=getenv($dbpass);
$con=mysqli_connect ("remotemysql.com",$dbname,$dbpass,$dbname) or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,$dbname);
?>
