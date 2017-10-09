<?php

include("../start/1Server_Connection.php");

error_reporting(0);
$con= mysql_connect($HOSTER,$USER,$PASSWORD);

mysql_select_db($DATABASE_NAME,$con);




$sql_connect = "SQL Connect included";

$form_title_in="Please Login to Continue";
$form_title_ns="New User";
$feedback_title_ns="New User";
$form_title_ns= "Less-24";


?>




 
