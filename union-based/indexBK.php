<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>**Union Based- String**</title>
</head>

<!--<body bgcolor="black">-->
<body>



<?php

include ("../start/4Query_Connection.php");


if(isset($_GET['ID']))
{
$id=$_GET['ID'];

$fp=fopen('result.txt','a');
fwrite($fp,'ID:'.$id."\n");
fclose($fp);






$sql="SELECT * FROM users WHERE ID='$id' LIMIT 0,1";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);

	if($row)
	{
  	echo "<font size='5' color= '#99FF00'>";
  	echo 'Your Login name:'. $row['LOGIN_NAME'];
  	echo "<br>";
  	echo 'Your Password:' .$row['PASSWORD'];
  	echo "</font>";
  	}
	else 
	{
	echo '<font color= "green">';
	print_r(mysql_error());
	echo "</font>";  
	}
}
	else { echo "Please input the ID as parameter with numeric value";}


error_reporting(0);


?>
</font> </div></br></br></br><center>


</center>
</body>
</html>





 
