<?php
	$place_name = $_GET['place_name'];
	$page_id = $_GET['page_id'];
  //include the header
   include('./temp_header.php');
?>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
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
						include('../config/pdo_config.php');
						//$dgh is defined
					
						/*** prepare the select ***/
						$stmt = $dbh->prepare("SELECT * FROM blogs 
						WHERE page_id = :page_id");
						
						/*** bind the parameters ***/
						$stmt->bindParam(':page_id', $page_id, PDO::PARAM_INT);

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
								echo	'<td>User name: '.$row['name']. '</td>';									
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
	<div class="row clearfix">
		<div class="col-md-12 column">
				<div class="panel panel-primary">
					<div class="panel-heading">Leave a message</div>
					<div class="panel-body">
						<?php echo'<form class="form-horizontal" action="blog_submit.php?page_id=' .$page_id. '" method="post">'; ?>
						<fieldset>
							<!-- Form Name -->
							<legend>Leave a message</legend>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="title">Title</label>  
							  <div class="col-md-8">
							  <input id="title" name="title" type="text" placeholder="Type title..." class="form-control input-md" required="">
							  <span class="help-block">&nbsp;</span>  
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="name">Name</label>  
							  <div class="col-md-8">
							  <input id="name" name="name" type="text" placeholder="Type name..." class="form-control input-md" required="">
							  <span class="help-block">&nbsp;</span>  
							  </div>
							</div>

							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="content">Content</label>
							  <div class="col-md-8">                     
								<textarea class="form-control input-md" id="content" name="content"></textarea>
							  </div>
							</div>

							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="reset">&nbsp;</label>
							  <div class="col-md-8">
								<button id="reset" name="reset" class="btn btn-default">Reset</button>
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
							  </div>
							</div>

						</fieldset>
						</form>
					</div>
				</div>
		</div>
	</div>
</div>
</body>
<?php
  //include the header
   include('../footer.html');
?>