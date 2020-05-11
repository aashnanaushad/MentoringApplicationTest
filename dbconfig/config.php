<?php
/*For My LocalPC*/
$con=mysqli_connect ("remotemysql.com", process.env.DATABASE_NAME, process.env.DATABASE_PASSWORD,process.env.DATABASE_NAME) or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,process.env.DATABASE_NAME);
?>



