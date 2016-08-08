<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
	$page_id = $_POST['page_id'];
	$user_id= $_SESSION['user_id'];
	try
    {
        //include the header
		include('./config/pdo_config.php');
		//$dgh is defined

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("DELETE FROM pages 
								WHERE page_id = :page_id");

        /*** bind the parameters ***/
        $stmt->bindParam(':page_id', $page_id, PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** if all is done, say thanks ***/
        $message = 'Delete success';
    }
    catch(Exception $e)
    {
		print_r($e);
		/*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }

?>


<?php
  //include the header <span class="label label-warning"
   include('./header.php');
?>
<title>Delete Processing</title>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
				<h1>
				<?php 	
					echo $message; 
					echo '<meta http-equiv=REFRESH CONTENT=2;url=admin_center.php>';
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