<?php
<<<<<<< HEAD

//$name = getenv('DATABASE_NAME');
//$dbpass = getenv('DATABASE_PASSWORD');
$con=mysqli_connect ("remotemysql.com",'akNXZPFe1p', 'mN1Eq25YRw','akNXZPFe1p') or die ('I cannot connect to the database because: ' . mysql_error());
//mysqli_select_db ($con,$name);
=======
$dbname=getenv('DATABASE_NAME');
$dbpass=getenv('DATABASE_PASSWORD');
$con=mysqli_connect ("remotemysql.com",$dbname,$dbpass,$dbname) or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,$dbname);
>>>>>>> 79a493a62ccb679c14cd8dfe897d12f9aa901d82
?>


