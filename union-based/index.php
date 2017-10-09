<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>'"Union Based- String"'</title>
</head>

<body>

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
                    <h2>Union Based</h2>
                    <h3>SQL Injection</h3>
                    <h4>Master Lab</h4>
                </div>
            </div>
            </div>
 </div>

<font size="5"  color="white"><span style="font-family: serif;">

<?php


include ("../start/4Query_Connection.php");
error_reporting(0);




if(isset($_GET['id']))
{
      $id=$_GET['id'];

     $file=fopen('bookmark.txt','a');
     fwrite($file,'ID:'.$id."\n");
     fclose($file);






$QUERY="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
$RESPONSE=mysql_query($QUERY);
$SHOWit = mysql_fetch_array($RESPONSE);

	if($SHOWit)
	{
  	echo "<font size='5' color= '#99FF00'>";
  	echo 'Your Login name : ' .$SHOWit['LOGIN_NAME'];
  	echo "<br>";
  	echo 'Your Password : '  .$SHOWit['PASSWORD'];
  	echo "</font>";
   	}
	else 
	{
	echo '<font color= "red" size="4em">';
	print_r(mysql_error());
	echo "</font>";  
	}
}
	else { echo "Please input the ?id=Parameter[numeric value]";}





?>
</font> </div></br></br></br><center>


</center>
</body>
</html>





 
