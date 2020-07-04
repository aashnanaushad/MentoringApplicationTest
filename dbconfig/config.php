<?php
$dbname=getenv('DATABASE_NAME');
$dbpass=getenv('DATABASE_PASSWORD');
$con=mysqli_connect ("remotemysql.com",$dbname,$dbpass,$dbname) or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,$dbname);
?>


