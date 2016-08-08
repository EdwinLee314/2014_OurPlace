<?php
	$page_id = $_GET['page_id'];
	try{
		//include the header
		include('../config/pdo_config.php');
		//$dgh is defined
	
		/*** prepare the select ***/
		$stmt = $dbh->prepare("SELECT * FROM pages 
        WHERE page_id = :page_id");
		
        /*** bind the parameters ***/
        $stmt->bindParam(':page_id', $page_id, PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $result = $stmt->fetch();
	}
	catch (Exception $e)
	{
		print_r($e);
		/*** if we are here, something is wrong in the database ***/
		$message = 'We are unable to process your request. Please try again later"';
	}
	$page_type = $result[2]; 
	$place_name = $result[3];
	$place_location = $result[4];
	$catch_phrase = $result[5];
	$place_desc = $result[6];
	$bg_color = $result[7];
	$cp_font = $result[8];
	if($page_type == 1){
	include('./temp_one.php');
	}
	else if($page_type == 2){
	include('./temp_two.php');
	}
	else if($page_type == 3){
	include('./temp_three.php');
	}




?>