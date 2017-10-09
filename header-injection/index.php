<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<title>Sql-Master lab</title>




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
                            <button type="submit" class="btn btn-danger btn-block"><b>Login</b></button>
                           </div>
                           </div>

 </form>



</div>
</div>


<div style=" margin-top:10px;color:#FFF; font-size:23px; text-align:center">
<font size="3" color="red">

<div class="form-group"> 
<div class="col-sm-offset-2 col-lg-8">


<?php

include ("../start/4Query_Connection.php");
error_reporting(0);


	
function check_input($value)
	
	{
	if(!empty($value))
		{		
		$value = substr($value,0,20);
		}

		
		if (get_magic_quotes_gpc())
			{
			$value = stripslashes($value);
			}

		
		if (!ctype_digit($value))
			{
			$value = "'" . mysql_real_escape_string($value) . "'";
			}
		
	else
		{
		$value = intval($value);
		}

	return $value;

	}



	$USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
	$IP = $_SERVER['REMOTE_ADDR'];
	echo "<br>";
	echo 'IP ADDRESS: ' .$IP;
	echo "<br>";
	
	if(isset($_POST['LOGIN_NAME']) && isset($_POST['PASSWORD']))

	{
	$LOGIN_NAME = check_input($_POST['LOGIN_NAME']);
	$PASSWORD = check_input($_POST['PASSWORD']);
	
		
	$file=fopen('bookmark.txt','a');
	fwrite($file,'User Agent:'.$LOGIN_NAME."\n");
	
	fclose($file);
	
	
	$QUERY="SELECT  users.LOGIN_NAME, users.PASSWORD FROM users WHERE users.LOGIN_NAME=$LOGIN_NAME and users.PASSWORD=$PASSWORD ORDER BY users.id DESC LIMIT 0,1";

	$RESPONSE = mysql_query($QUERY);

	$SHOWit = mysql_fetch_array($RESPONSE);

		if($SHOWit)
			{

			echo '<font color= "#FFFF00" font size = 3 >';
			$QUERY="INSERT INTO `master`.`user_agent` (`USER_AGENT`, `IP`, `USER_NAME`) VALUES ('$USER_AGENT', '$IP','$USER_NAME')";
			mysql_query($QUERY);
			
			echo "</font>";
			
			echo '<font color= "red"  font size = 3 >';			
			echo 'User Agent: ' .$USER_AGENT;
			echo "</font>";
			echo "<br>";
			print_r(mysql_error());			
			
			echo 'Logged in Successfully';
			echo "<br>";
			
			}
		else
			{
			echo '<font color= "red" font size="3">';
			
			print_r(mysql_error());
			echo "</br>";			
			
			echo 'Failed Attempt';	
			echo "</font>";  
			}

	}

?>
</div>
</div>
</span>
</font></div></br>

</div>
</body>
</html>
