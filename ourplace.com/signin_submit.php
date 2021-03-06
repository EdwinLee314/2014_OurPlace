<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['username'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['username']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['password']) != true)
{
    /*** if there is no match ***/
    $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $password = sha1( $password );
    
    try
    {
        //include the header
		include('./config/pdo_config.php');
		//$dgh is defined

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT user_id, username, password FROM users 
                    WHERE username = :username AND password = :password");

        /*** bind the parameters ***/
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();
		
        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
            $message = 'Login Failed';
			$url = './index.php';  	
        }
        /*** if we do have a result, all is well ***/
        else
        {
            /*** set the session user_id variable ***/
            $_SESSION['user_id'] = $user_id;
			if($username == 'admin'){
				$message= 'Welcome admin';
				$url = './admin_center.php';  
			}
			else{
				$message= 'Login processing...';
				$url = './user_center.php';  
			}        
        }
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
  //include the header
   include('./header.php');
?>

<title>Processing Sign In</title>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
				<h1>
					<?php 
						echo $message; 
						echo '<meta http-equiv=REFRESH CONTENT=3;url='.$url.'>';
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