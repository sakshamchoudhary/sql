<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sql-Master Lab</title>
</head>

<body >

<font size="5"  color="red"><span style="font-family: serif;">





<script src="js/classie.js" ></script>
    <script>
      (function() {
        // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
        if (!String.prototype.trim) {
          (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, '');
            };
          })();
        }

        [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            classie.add( inputEl.parentNode, 'input--filled' );
          }

          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );

        function onInputFocus( ev ) {
          classie.add( ev.target.parentNode, 'input--filled' );
        }

        function onInputBlur( ev ) {
          if( ev.target.value.trim() === '' ) {
            classie.remove( ev.target.parentNode, 'input--filled' );
          }
        }
      })();
    </script>
    


      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="bs/dist/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="bs/dist/js/bootstrap.min.js"></script>


      
   
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="css-1/normalize.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
   <link rel="stylesheet" type="text/css" href="css-1/demo.css" />
    <link rel="stylesheet" type="text/css" href="css-1/set1.css" />


 </div>




<font size="5"  color="red"><span style="font-family: serif;">
 



<form action="" name="form1" method="post">

  <section class="content">
        <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi"  type="text" name="LOGIN_NAME" id="input-4" />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="input-4">
            <span class="input__label-content input__label-content--hoshi">Login Name</span>
          </label>
        </span>
        </div>
        </div>
        <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
        <span class="input input--hoshi">
          <input class="input__field input__field--hoshi" type="password" name="PASSWORD" id="input-5" />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="input-5">
            <span class="input__label-content input__label-content--hoshi">Password</span>
          </label>
        </span>
        </div>
        </div>
</section>
 						 <div class="col-sm-offset-5 col-lg-7"></div>

 		 					<div class="form-group">                     
                           <div class="col-sm-offset-5 col-lg-1">
                            <button type="submit"  class="btn btn-danger btn-block"><b>Login</b></button>
                           </div>
                           </div>

 </form>



</div>
</div>
<div class="form-group"> 
<div class="col-sm-offset-2 col-lg-8">
	

<?php


include ("../start/4Query_Connection.php");
	error_reporting(0);


if(!isset($_COOKIE['LOGIN_NAME']))
	{
	


function check_input($value)
	{
	if(!empty($value))
		{
		$value = substr($value,0,20); // truncation (see comments)
		}
		if (get_magic_quotes_gpc())  // Stripslashes if magic quotes enabled
			{
			$value = stripslashes($value);
			}
		if (!ctype_digit($value))   	// Quote if not a number
			{
			$value = "'" . mysql_real_escape_string($value) . "'";
			}
	else
		{
		$value = intval($value);
		}
	return $value;
	}


	
	echo "<br>";
	echo "<br>";
	
	if(isset($_POST['LOGIN_NAME']) && isset($_POST['PASSWORD']))
		{
	
		$LOGIN_NAME = check_input($_POST['LOGIN_NAME']);
		$PASSWORD = check_input($_POST['PASSWORD']);
		
	

		
		$QUERY="SELECT  users.LOGIN_NAME, users.PASSWORD FROM users WHERE users.LOGIN_NAME=$LOGIN_NAME and users.PASSWORD=$PASSWORD ORDER BY users.id DESC LIMIT 0,1";
		$RESPONSE = mysql_query($QUERY);
		$SHOWit = mysql_fetch_array($RESPONSE);
		$COOKIE = $SHOWit['LOGIN_NAME'];
			if($SHOWit)
				{
				echo '<font color= "red" font size = 3 >';
				setcookie('LOGIN_NAME', $COOKIE, time()+3600);	
				header ('Location: index.php');
				echo "I LOVE YOU COOKIES";
				echo "</font>";
				echo '<font color= "red" font size = 3 >';			
				echo "</font>";
				echo "<br>";
				print_r(mysql_error());			
				echo "<br><br>";
				
				echo 'Loggedin SUCCESSFULLY';
				echo "<br>";
				}
			else
				{
				echo '<font color= "red" font size="3">';
				
				print_r(mysql_error());
				echo "</br>";			
				echo "</br>";
				
				echo 'ATTEMPT FAILED';	
				echo "</font>";  
				}
			}
		
			echo "</font>";  
	echo '</font>';
	echo '</div>';

}
else
{



	if(!isset($_POST['submit']))
		{
			
			$COOKIE = $_COOKIE['LOGIN_NAME'];
			$FORMATE = 'D d M Y - H:i:s';
			$TS = time() + 3600;
			echo "<center>";
			
			echo "<b>";
			echo '<br><font color= "red" font size="4">';	
			echo "YOUR USER AGENT : ".$_SERVER['HTTP_USER_AGENT'];
			echo "</font><br>";	
			echo '<font color= "red" font size="4">';	
			echo "IP ADDRESS : ".$_SERVER['REMOTE_ADDR'];			
			echo "</font><br>";			
			echo '<font color= "red" font size = 4 >';
			echo "REMOVE YOUR COOKIE OR WAIT FOR IT TO EXPIRE <br>";
			echo '<font color= "red" font size = 5 >';			
			echo "COOKIE : LOGIN_NAME = $COOKIE and expires: " . date($FORMATE, $TS);
			
			
			echo "<br></font>";
			$QUERY="SELECT * FROM users WHERE LOGIN_NAME='$COOKIE' LIMIT 0,1";
			$RESPONSE=mysql_query($QUERY);
			if (!$RESPONSE)
  				{
  				die('Issue with your mysql: ' . mysql_error());
  				}
			$SHOWit1 = mysql_fetch_array($RESPONSE);
			if($SHOWit1)
				{
			  	echo '<font clor= "red" font size="5">';	
			  	echo 'Your Login name:'. $SHOWit1['LOGIN_NAME'];
			  	echo "<br>";
				echo '<font color= "red" font size="5">';  	
				echo 'Your Password:' .$SHOWit1['PASSWORD'];
			  	echo "</font></b>";
				echo "<br>";
				echo 'Your ID:' .$SHOWit1['id'];
			  	}
			else	
				{
				echo "<center>";
				echo '<br><br><br>';
				
				echo 'Bug Off You Silly Dumb HACKER';
				echo "<br><br><b>";
				
				}
			echo '<center>';
			echo "<br>";			
			echo "<br>";
			echo '<form action="" method="post">';
			echo '<input  type="submit" name="submit" value="Delete All!" />';
			echo '</form>';
			echo '</center>';
		}	
	else
		{
		echo '<center>';
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo '<font color= "#FFFF00" font size = 6 >';
		echo "Cookie is Removed";
				setcookie('LOGIN_NAME', $SHOWit['LOGIN_NAME'], time()-3600);
				header ('Location: index.php');
		echo '</font></center></br>';
		
		}		


			echo "<br>";
			echo "<br>";
			//header ('Location: main.php');
			echo "<br>";
			echo "<br>";
			
			//echo '<img src="../images/slap.jpg" /></center>';
			//logging the connection parameters to a file for analysis.	
		$file=fopen('bookmark.txt','a');
		fwrite($file,'Cookie:'.$COOKIE."\n");
	
		fclose($file);
	
}
?>
</div>
</div>

</body>
</html>
