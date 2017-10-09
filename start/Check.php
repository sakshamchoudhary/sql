<?php
	include '1Server_Connection.php';
	include '5Query_Connection-2.php';
	include '2Methods.php';
	
$TABLE_NAME = table_name();
$COLUMN_NAME = column_name(2);
$INFO = data($TABLE_NAME,$COLUMN_NAME);
echo $INFO;

?>
