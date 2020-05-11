<?php
/*For My LocalPC*/
$con=mysqli_connect ("remotemysql.com", DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME) or die ('I cannot connect to the database because: ' . mysql_error());
mysqli_select_db ($con,DATABASE_NAME);
?>



