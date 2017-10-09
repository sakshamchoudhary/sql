<html>

<head>

<title>SETUP</title>

</head>


<?php



include("../start/1Server_Connection.php");




$DB_CON = mysqli_connect($HOSTER,$USER,$PASSWORD);


	

	$QUERY="DROP DATABASE IF EXISTS master";

	mysqli_query($DB_CON,$QUERY);




	$QUERY="CREATE database `master` CHARACTER SET `gbk` ";

	mysqli_query($DB_CON,$QUERY);


$QUERY="CREATE TABLE master.users 
   (
   id int(4) NOT NULL AUTO_INCREMENT,
   EMAIL varchar(30) NOT NULL,
   PHONE_NO varchar(30) NOT NULL,
   CITY varchar(20) NOT NULL,
   LOGIN_NAME varchar(40) NOT NULL, 
   PASSWORD varchar(40) NOT NULL,
    PRIMARY KEY (id))";

	mysqli_query($DB_CON,$QUERY);




$QUERY="CREATE TABLE master.contact_id
		(
		id int(4)NOT NULL AUTO_INCREMENT,
		CONTACT_ID varchar(40) NOT NULL,
		PRIMARY KEY (id)
		)";
	
	mysqli_query($DB_CON,$QUERY);



$QUERY="CREATE TABLE master.user_agent
		(
		id int(4)NOT NULL AUTO_INCREMENT,
		USER_AGENT varchar(256) NOT NULL,
		IP varchar(35) NOT NULL,
		USER_NAME varchar(20) NOT NULL,
		PRIMARY KEY (id)
		)";

	mysqli_query($DB_CON,$QUERY);








$QUERY="CREATE TABLE master.referers
		(
		id int(4)NOT NULL AUTO_INCREMENT,
		REFERER varchar(256) NOT NULL,
		IP varchar(35) NOT NULL,
		PRIMARY KEY (id)
		)";

	mysqli_query($DB_CON,$QUERY);





$QUERY="INSERT INTO `master`.`users` (id,EMAIL,PHONE_NO,CITY,LOGIN_NAME,PASSWORD) VALUES ('1','abcgmail.com','9898989898','JAIPUR', 'Saksham', 'Choudhary'), ('2','pqrgmail.com','6589632554','DELHI', 'Salman', 'Khan'), ('3','beargmail.com','5632455696','BANGLORE', 'Angelina', 'Jolie'), ('4','abcgmail.com','555555555','Newyork', 'Brad', 'pitt')"; 


	mysqli_query($DB_CON,$QUERY);
	






$QUERY="INSERT INTO `master`.`contact_id` (id,CONTACT_ID) VALUES ('1', 'saksham@techdefence.com'), ('2', 'salman@katrina.com'), ('3', 'angelina@sundar.com'), ('4', 'brad@pitt.com'), ('5', 'charlie@chaplin.com'), ('6', 'bill@gates.com'), ('7', 'steve@jobs.com'), ('8', 'admin@admin.com')";

	mysqli_query($DB_CON,$QUERY);
	







include("3Advance_Level_Db.php");


header("location:../union-based/index.php");

?>


</font>
</div>
</body>
</html>
