<?php

include("../start/1Server_Connection.php");
include("../start/5Query_Connection-2.php");



function num_gen($string_length, $characters)
{
	$string = '';
 	for ($i = 0; $i < $string_length; $i++) 
	{
      		$string .= $characters[rand(0, strlen($characters) - 1)];
 	}
	return $string;
}

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';  


$table = num_gen(10, $characters) ;


$secret_key = "secret_".num_gen(4, $characters);




function table_name()
{
	include '../start/1Server_Connection.php';
	include '../start/5Query_Connection-2.php';
	$QUERY="SELECT table_name FROM information_schema.tables WHERE table_schema='$DATABASE_NAME1'";

	$result=mysql_query($QUERY) or die("error in function table_name()".mysql_error());
	$SHOW_R = mysql_fetch_array($result);
	if(!$SHOW_R)
	die("error in function table_name() output". mysql_error());
	else
	return $SHOW_R[0];
}






function column_name($idee)
{
	include '../start/1Server_Connection.php';
	include '../start/5Query_Connection-2.php';

	$table = table_name();

	$QUERY="SELECT column_name FROM information_schema.columns WHERE table_name='$table' LIMIT $idee,1";

	$result=mysql_query($QUERY) or die("error in function column_name()".mysql_error());
	$SHOW_R = mysql_fetch_array($result);
	if(!$SHOW_R)
	die("error in function column_name() result". mysql_error());
	else
	return $SHOW_R[0];
}



function data($tab,$col)
{
	include '../start/1Server_Connection.php';
	include '../start/5Query_Connection-2.php';
	$QUERY="SELECT $col FROM $tab WHERE id=1";

	$result=mysql_query($QUERY) or die("error in function column_name()".mysql_error());
	$SHOW_R = mysql_fetch_array($result);
	if(!$SHOW_R)
	die("error in function column_name() result". mysql_error());
	else
	return $SHOW_R[0];
}


function next_tryy()
{
	$table = table_name();
	
	include '../start/1Server_Connection.php';
	include '../start/5Query_Connection-2.php';
	$QUERY = "UPDATE $table SET tryy=tryy+1 WHERE id=1";
	
	mysqli_query($QUERY) or die("error in function next_tryy()". mysql_error());
}

function view_attempts()
{
	include("../start/5Query_Connection-2.php");
	$table = table_name();
	$QUERY="SELECT tryy FROM $table WHERE id=1";
	
	$result=mysqli_query($QUERY) ;
	$SHOW_R = mysqli_fetch_array($result);
	if(!$SHOW_R)
	die("error in function view_attempts()". mysql_error());
	else
	return $SHOW_R[0];	
}

?>
