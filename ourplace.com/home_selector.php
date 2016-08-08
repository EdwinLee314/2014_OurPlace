<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
	$url = './index.php';  
	header("Location: $url"); 
}
else
{
    try
    {
        //include the header
		include('./config/pdo_config.php');
		//$dgh is defined

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("SELECT username FROM users 
        WHERE user_id = :user_id");

        /*** bind the parameters ***/
        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $username = $stmt->fetchColumn();

        if($username == false)
        {
			$url = './index.php';  
			header("Location: $url"); 
        }
        else
        {
			if($username == 'admin'){
				$url = './admin_center.php';  
				header("Location: $url");
			}
			else{
				$url = './user_center.php';  
				header("Location: $url");
			}
        }
    }
    catch (Exception $e)
    {
        /*** if we are here, something is wrong in the database ***/
		$url = "./index.php";  
		echo "< script language='javascript' 
		type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "< /script>";  
    }	 
}
?>