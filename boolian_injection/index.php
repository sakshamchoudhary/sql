<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>"'Blind-Boolean-Based-Challange'"</title>
</head>

<body background="bg.png" >


<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Finger+Paint' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/animate.min.css">
        <script src="js/preloader.js"></script> 
        <link rel="stylesheet" href="css/style.css">

        <script type="text/javascript" src="js/css_browser_selector.js"></script>
        
        <script type="text/javascript" src="js/plax.js"></script>
        <script type="text/javascript" src="js/jquery.spritely-0.6.1.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body >
        <div id="indicator"></div>
      
 <div class="wrapper">
            <div class="grass  init"></div>
            <div class="stars init"> </div>
           
            <div class="moon init"></div>
            <div class="owl init">
                <img src="images/owl.png" />
                 <div class="balloon init">
                <div class="text">
                    <h2>Boolean Based</h2>
                    <h3>SQL Injection</h3>
                    <h4>Master Lab</h4>
                </div>
            </div>
            </div>
 </div>




<font size="5"  color="red"><span style="font-family: serif;">


<?php

include ("../start/4Query_Connection.php");
error_reporting(0);


if(isset($_GET['id']))
{

$ID_VAR=$_GET['id'];


$file=fopen('bookmark.txt','a');

fwrite($file,'ID:'.$ID_VAR."\n");

fclose($file);




$QUERY="SELECT * FROM users WHERE id='$ID_VAR' LIMIT 0,1";

$RESPONSE=mysql_query($QUERY);

$SHOWit = mysql_fetch_array($RESPONSE);





	if($SHOWit)
	{
  	echo '<font size="3" color="red">';	
  	
  	echo "Let's start rolling";
  	
  	echo "<br>";
    
    echo "</font>";
  	}
	else 
	{
	
	echo '<font size="3" color="red">';	
	
	echo "</br></font>";	
	
	echo '<font color= "red" font size= 3>';	
	
	}
}

	else { echo "Please input the ?id=Parameter[numeric value]";}

?>

</font>
</div>
</body>
</html>
