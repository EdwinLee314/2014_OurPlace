<?php
/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that the title have been submitted ***/
if(!isset( $_POST['title']))
{
    $message = 'Please enter a valid title';
}
else{
	$title= filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	$content= filter_var($_POST['content'], FILTER_SANITIZE_STRING);
	$user_id= $_SESSION['user_id'];
	$user_name = filter_var($_GET['username'], FILTER_SANITIZE_STRING);
	try
    {
        //include the header
		include('./config/pdo_config.php');
		//$dgh is defined

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO reports (title, content, user_id, user_name ) 
								VALUES (:title, :content, :user_id, :user_name )");

        /*** bind the parameters ***/
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
		$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** if all is done, say thanks ***/
        $message = 'Report had been submit, thanks for your suggestion';
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
   include('./header.php');
?>

<title>Report Processing</title>
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