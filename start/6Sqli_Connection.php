<?php

include("../start/1Server_Connection.php");

error_reporting(0);


$DB_CON= mysql_connect($HOSTER,$USER,$PASSWORD);

mysql_select_db($DATABASE_NAME,$con);

?>




 
