<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the place_name have been submitted ***/
if(!isset( $_POST['place_name']))
{
    $message = 'Please enter a valid place name';
}
else{
	$place_name= filter_var($_POST['place_name'], FILTER_SANITIZE_STRING);
	$page_type=	filter_var($_POST['page_type'], FILTER_VALIDATE_INT);
	$place_location= filter_var($_POST['place_location'], FILTER_SANITIZE_STRING);
	$catch_phrase= filter_var($_POST['catch_phrase'], FILTER_SANITIZE_STRING);
	$place_desc= filter_var($_POST['place_desc'], FILTER_SANITIZE_STRING);
	$bg_color= filter_var($_POST['bg_color'], FILTER_SANITIZE_STRING);
	$cp_font= filter_var($_POST['cp_font'], FILTER_SANITIZE_STRING);
	$user_id= $_SESSION['user_id'];

	try
    {
        //include the header
		include('./config/pdo_config.php');
		//$dgh is defined

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO pages (user_id, page_type, place_name, place_location, catch_phrase, place_desc, bg_color, cp_font ) 
								VALUES (:user_id, :page_type, :place_name, :place_location, :catch_phrase, :place_desc, :bg_color, :cp_font  )");

        /*** bind the parameters ***/
        $stmt->bindParam(':place_name', $place_name, PDO::PARAM_STR);
        $stmt->bindParam(':place_location', $place_location, PDO::PARAM_STR);
		$stmt->bindParam(':catch_phrase', $catch_phrase, PDO::PARAM_STR);
        $stmt->bindParam(':place_desc', $place_desc, PDO::PARAM_STR);
		$stmt->bindParam(':bg_color', $bg_color, PDO::PARAM_STR);
		$stmt->bindParam(':page_type', $page_type, PDO::PARAM_INT);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->bindParam(':cp_font', $cp_font, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** if all is done, say thanks ***/
        $message = 'New page create';
    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>


<?php
  //include the header <span class="label label-warning"
   include('./header.php');
?>
<title>Create Processing</title>
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