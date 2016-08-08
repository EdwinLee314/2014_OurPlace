<?php
$page_id= $_GET['page_id'];
if(!isset( $_POST['title'], $_POST['name']))
{
    $message = 'Please enter a valid title or name';
}
/*** check the place_name has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['title']) != true)
{
    /*** if there is no match ***/
    $message = "Title and Name must be alpha numeric";
}
elseif (ctype_alnum($_POST['name']) != true)
{
    /*** if there is no match ***/
    $message = "Title and Name must be alpha numeric";
}
else{
	$title= filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	$name= filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$content= filter_var($_POST['content'], FILTER_SANITIZE_STRING);
	
	try
    {
        //include the header
		include('../config/pdo_config.php');
		//$dgh is defined

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO blogs (page_id, title, content, name ) 
								VALUES (:page_id, :title, :content, :name)");

        /*** bind the parameters ***/
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':page_id', $page_id, PDO::PARAM_INT);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** if all is done, say thanks ***/
        $message = 'BLOG had been submmit';
    }
	 catch(Exception $e)
    {  
		print_r($e);
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';     
    }
}



echo '<title>Report Processing</title>';
echo '<body><p>';

	
	echo $message; 
	echo '<meta http-equiv=REFRESH CONTENT=10;url=temp_config.php?page_id='.$page_id.'>';

echo'</p></body>';

  //include the header
   include('../footer.html');
?>