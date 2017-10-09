<html>
<head>
</head>
<body bgcolor="#000000">
<?php

include("../start/1Server_Connection.php");

@error_reporting(0);

if(isset($_GET['id']))
$id = $_GET['id'];



@$DB_CON= mysql_connect($HOSTER,$USER,$PASSWORD);



	
	$QUERY="DROP DATABASE IF EXISTS $DATABASE_NAME1";
	mysql_query($QUERY);




	$QUERY="CREATE database $DATABASE_NAME1 CHARACTER SET `gbk` ";
	mysql_query($QUERY);
	

include '../start/2Methods.php';



 
$QUERY="CREATE TABLE IF NOT EXISTS $DATABASE_NAME1.$table
		(
                id INT(4) UNSIGNED NOT NULL DEFAULT 1,
		SESSION_ID CHAR(32) PRIMARY KEY NOT NULL,
		SECRET_KEY CHAR(32) NOT NULL,
		tryy INT(11) UNSIGNED NOT NULL DEFAULT 0 
		)";
	
	mysql_query($QUERY);
		



$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

$sec_key = num_gen(24, $characters);
$hash = md5(rand(0,100000));



$QUERY="INSERT INTO $DATABASE_NAME1.$table VALUES (1, '$hash', '$sec_key', 0)";
        mysql_query($QUERY);

if(isset($id))
header( "refresh:0;url=$id" );

?>
</body>
</html>
