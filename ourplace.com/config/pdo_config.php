 <?php
		/*** connect to database ***/
		/*** mysql hostname ***/
		$mysql_hostname = 'latcs7.cs.latrobe.edu.au';
		/*** mysql username ***/
		$mysql_username = 'j70li';
		/*** mysql password ***/
		$mysql_password = 'txwwljq';
		/*** database name ***/
		$mysql_dbname = 'j70li';
		
		/*** select the users name from the database ***/
		$dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
		/*** $message = a message saying we have connected ***/
			
		/*** set the error mode to excptions ***/
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
?>