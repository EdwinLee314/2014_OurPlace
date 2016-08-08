<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the place_name, password have been submitted ***/
if(!isset( $_POST['place_name']))
{
    $message = 'Please enter a valid place name';
}
/*** check the place_name has only alpha numeric characters ***/
else{
	$place_name= filter_var($_POST['place_name'], FILTER_SANITIZE_STRING);
	
	$user_id= $_SESSION['user_id'];
	try
    {
        //include the header
		include('./config/pdo_config.php');
		//$dgh is defined
		if(!empty( $_POST['place_location'])){
		$place_location= filter_var($_POST['place_location'], FILTER_SANITIZE_STRING);
        /*** prepare the insert ***/
        $stmt = $dbh->prepare("UPDATE pages SET place_location = :place_location
								WHERE place_name = :place_name AND user_id = :user_id");

        /*** bind the parameters ***/
        $stmt->bindParam(':place_name', $place_name, PDO::PARAM_STR);
        $stmt->bindParam(':place_location', $place_location, PDO::PARAM_STR);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();
		$stmt->closeCursor();
		}
		if(!empty( $_POST['catch_phrase'])){
			$catch_phrase= filter_var($_POST['catch_phrase'], FILTER_SANITIZE_STRING);
			$stmt = $dbh->prepare("UPDATE pages SET catch_phrase = :catch_phrase 
								WHERE place_name = :place_name AND user_id = :user_id");
			$stmt->bindParam(':place_name', $place_name, PDO::PARAM_STR);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$stmt->bindParam(':catch_phrase', $catch_phrase, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
		}
		if(!empty( $_POST['place_desc'])){
			$place_desc= filter_var($_POST['place_desc'], FILTER_SANITIZE_STRING);
			$stmt = $dbh->prepare("UPDATE pages SET place_desc = :place_desc 
									WHERE place_name = :place_name AND user_id = :user_id");
			$stmt->bindParam(':place_desc', $place_desc, PDO::PARAM_STR);
			$stmt->bindParam(':place_name', $place_name, PDO::PARAM_STR);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}
		
			$bg_color= $_POST['bg_color'];
			$stmt = $dbh->prepare("UPDATE pages SET bg_color = :bg_color
								WHERE place_name = :place_name AND user_id = :user_id");
			$stmt->bindParam(':bg_color', $bg_color, PDO::PARAM_STR);
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$stmt->bindParam(':place_name', $place_name, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
			
			$cp_font = $_POST['cp_font'];
			$stmt = $dbh->prepare("UPDATE pages SET cp_font = :cp_font 
									WHERE place_name = :place_name AND user_id = :user_id");
			$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$stmt->bindParam(':place_name', $place_name, PDO::PARAM_STR);
			$stmt->bindParam(':cp_font', $cp_font, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
		
        /*** unset the form token session variable ***/
        unset( $_POST['place_name'] );
		unset( $_POST['place_desc'] );
		unset( $_POST['place_location'] );
		unset( $_POST['catch_phrase'] );
		  
        /*** if all is done, say thanks ***/
        $message = 'Modify success';
    }
    catch(Exception $e)
    {
		print_r($e);
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>


<?php
  //include the header <span class="label label-warning"
   include('./header.php');
?>
<title>Modify Processing</title>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
				<h1>
				<?php 	
					echo $message; 
					echo '<meta http-equiv=REFRESH CONTENT=3;url=user_center.php>';
				?>
				</h1>
			</div>
		</div>
	</div>
</div>
</body>
<?php
  //include the footer
  include('./footer.html');
?>