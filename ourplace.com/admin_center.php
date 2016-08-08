<?php

/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'You must be logged in to access this page';
}
else{
	$message = 'Welcome admin.';
}
?>

<?php
  //include the header
   include('./header.php');
?>

<title>User Center</title>

<body>
<h2><?php echo $message; ?></h2>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column">
			<!--Sidebar content-->
			<ul class="nav nav-tabs nav-stacked" style="position: fixed;">
            <li><a href="#report">User report</a></li>
            <li><a href="#delete">Delete homepage</a></li>
            <li><a href="#add">Add advertisement</a></li>
			<li><a href="#remove">Remove advertisement</a></li>
			<li><a href="./sign_out.php">Sign out</a></li>
			</ul>
		</div>
		<div class="col-md-10 column">
		<!--Body content-->
			<div class="row clearfix">
				<div class="panel panel-primary" id="report">
					<div class="panel-heading">User report</div>
					<div class="panel-body">
						<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>User Name</th>
					</tr>
					<tr>
						<th>Content</th>
					</tr>
				</thead>
				<tbody>
				<?php
					
					try{
						//include the header
						include('./config/pdo_config.php');
						//$dgh is defined
					
						/*** prepare the select ***/
						$stmt = $dbh->prepare("SELECT title, user_name, content FROM reports");

						/*** execute the prepared statement ***/
						$stmt->execute();

						/*** check for a result ***/
						$result = $stmt->fetchALl();
						$count= 1;
						if(!empty($result)){
							foreach($result as $row){
								echo'<tr>';
								echo	'<td>'.$count. '</td>';								
								echo	'<td>Title: '.$row['title']. '</td>';								
								echo	'<td>User name: '.$row['user_name']. '</td>';									
								echo'</tr>';
								echo'<tr>';						
								echo	'<td>Content: '.$row['content']. '</td>';									
								echo'</tr>';
								$count++;																
							}
							
						}
					}
					catch (Exception $e)
					{
						print_r($e);
						/*** if we are here, something is wrong in the database ***/
						$message = 'We are unable to process your request. Please try again later"';
					}            
				?>
				</tbody>
			</table>
					</div>
				</div>
			</div>
			<div class="row clearfix">
				<div class="panel panel-primary" id="delete">
					<div class="panel-heading">Delete homepage</div>
					<div class="panel-body">
					
					<form class="form-horizontal" action="delete_submit.php" method="post">
						<fieldset>

						<!-- Form Name -->
						<legend>Delete home page from here</legend>
						
						<!-- Multiple Radios (inline) -->
						<div class="form-group">
							<div class="col-md-10"> 
								<?php
								try{
									//include the header
									include('./config/pdo_config.php');
									//$dgh is defined
									$sql = "SELECT page_id, place_name 
											FROM pages 
											ORDER BY place_name "
											;
									$stm = $dbh->prepare($sql);
									$stm->execute();
									$result= $stm->fetchAll();
									$count = 1;
									foreach($result as $row){
										if($count = 1){
											echo '<label class="radio-inline">';
											echo '<input type="radio" name="page_id" value= "'.$row['page_id'].'"checked="checked" >';
												echo	$row['place_name'];
											echo '</label> ';
											
										}
										else{
											echo '<label class="radio-inline">';
											echo '<input type="radio" name="page_id" value= "'.$row['page_id'].' >';
												echo	$row['place_name'];
											echo '</label> ';
										}
										$count++;
									}
								}
								catch(Exception $e){
										print_r($e);
								}
								?>
							</div>
						</div>	
						<div class="form-group">
						  <label class="col-md-2 control-label" for="reset">&nbsp;</label>
						  <div class="col-md-8">
							<button id="submit" name="submit" class="btn btn-primary">Submit</button>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="row clearfix">
				<div class="panel panel-primary" id ="add">
					<div class="panel-heading">Add advertisement</div>
					<div class="panel-body">
					
					</div>
				</div>
			</div>
			<div class="row clearfix">
				<div class="panel panel-primary" id="remove">
					<div class="panel-heading">Remove advertisement</div>
					<div class="panel-body">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<?php
  //include the header
   include('./footer.html');
?>