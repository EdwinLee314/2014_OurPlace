<?php
/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'You must be logged in to access this page';
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
		unset($stmt );
        /*** if we have no something is wrong ***/
        if($username == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welcome '.$username;
        }
    }
    catch (Exception $e)
    {
        /*** if we are here, something is wrong in the database ***/
        $message = 'We are unable to process your request. Please try again later';
    }
}
?>

<?php
  //include the header
   include('./header.php');
?>

<title>User Center</title>

<body style ="background:url(./img/BG.jpg) repeat;">
<h2><?php echo $message; ?></h2>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column">
			<!--Sidebar content-->
			<ul class="nav nav-tabs nav-stacked" style="position: fixed;">
            <li><a href="#overview">Overview</a></li>
            <li><a href="#create">Create</a></li>
            <li><a href="#modify">Modify</a></li>
			<li><a href="#report">Report</a></li>
			<li><a href="./sign_out.php">Sign out</a></li>
			</ul>
		</div>
		<div class="col-md-10 column">
		<!--Body content-->
			<div class="row clearfix">
				<div class="panel panel-primary" id="overview">
					<div class="panel-heading">Overview</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>	
										#</th>
									<th>
										Place Name</th>
									<th>
										Web Link</th>
								</tr>
							</thead>
							<tbody>
								<?php
								try{
									//include the header
									include('./config/pdo_config.php');
									//$dgh is defined
									$sql = "SELECT page_id, place_name 
											FROM pages 
											WHERE user_id = :user_id
											ORDER BY place_name "
											;
									$stm = $dbh->prepare($sql);
									$stm->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
									$stm->execute();
									$result= $stm->fetchAll();
									$count = 1;
									foreach($result as $row){
											echo'<tr>';
											echo	'<td>'.$count. '</td>';
											echo	'<td>'.$row['place_name']. '</td>';
											echo	'<td><a href="./user_template/temp_config.php?page_id=' .$row['page_id']. '">Link</a></td>';
											echo'</tr>';
											$count++;
									}
								}
								catch(Exception $e){
										print_r($e);
								}
								?>	
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row clearfix">
				<div class="panel panel-primary" id="create">
					<div class="panel-heading">Create</div>
					<div class="panel-body">
						<form class="form-horizontal" action="create_submit.php" method="post">
						<fieldset>

						<!-- Form Name -->
						<legend>Create home page from here</legend>
						
						<!-- Multiple Radios (inline) -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="page_type">Page Type</label>
							<div class="col-md-4"> 
							<label class="radio-inline" for="page_type-0">
							  <input type="radio" name="page_type" id="page_type-0" value="1" checked="checked">
							  Public
							</label> 
							<label class="radio-inline" for="page_type-1">
							  <input type="radio" name="page_type" id="page_type-1" value="2">
							  Business
							</label> 
							<label class="radio-inline" for="page_type-2">
							  <input type="radio" name="page_type" id="page_type-2" value="3">
							  Education
							</label> 
						  </div>
						</div>
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="place_name">Place name</label>  
						  <div class="col-md-8">
						  <input id="place_name" name="place_name" 
							type="text" placeholder="Type place name..." class="form-control input-md" maxlength="50" required="">
						  <span class="help-block">&nbsp;</span>  
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="place_location">Place location</label>  
						  <div class="col-md-8">
						  <input id="place_location" name="place_location" 
							type="text" placeholder="Type place location" class="form-control input-md" maxlength="100" required="">
						  <span class="help-block">&nbsp;</span>  
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="catch_phrase">Catch phrase</label>  
						  <div class="col-md-8">
						  <input id="catch_phrase" name="catch_phrase" 
							type="text" placeholder="Type catch phrase" class="form-control input-md" maxlength="255" required="">
						  <span class="help-block">&nbsp;</span>  
						  </div>
						</div>

						<!-- Textarea -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="place_desc">Place description</label>
						  <div class="col-md-8">                     
							<textarea class="form-control input-md" id="place_desc" name="place_desc">Type your place description</textarea>
						  </div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="bg_color">Select Background color</label>
						  <div class="col-md-4">
							<select id="bg_color" name="bg_color" class="form-control input-md">
							  <option value="white">white(default)</option>
							  <option value="black">black</option>
							   <option value="lightslategray">lightslategray</option>
							  <option value="dimgray">dimgray</option>
							</select>
						  </div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cp_font">Select Catch phrase font</label>
						  <div class="col-md-4">
							<select id="cp_font" name="cp_font" class="form-control input-md">
							  <option value="Arial" style="font family=Arial">Arial(default)</option>
							  <option value="Times New Roman" style="font family=Times New Roman">Times New Roman</option>
							   <option value="Verdana" style="font family= Verdana"> Verdana</option>
							  <option value="Tahoma" style="font family= Tahoma">Tahoma</option>
							</select>
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
			<div class="row clearfix">
				<div class="panel panel-primary" id ="modify">
					<div class="panel-heading">Modify</div>
					<div class="panel-body">
					<form class="form-horizontal" action="modify_submit.php" method="post">
						<fieldset>

						<!-- Form Name -->
						<legend>Modify your home page from here</legend>
					
						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="place_name">Choose your Place name</label>  
						  <div class="col-md-8">
						  <input id="place_name" name="place_name" 
							type="text" placeholder="Type place name..." class="form-control input-md" maxlength="50" required="">
						  <span class="help-block">&nbsp;</span>  
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="place_location">Change Place location</label>  
						  <div class="col-md-8">
						  <input id="place_location" name="place_location" 
							type="text" placeholder="change place location" class="form-control input-md" maxlength="100">
						  <span class="help-block">&nbsp;</span>  
						  </div>
						</div>

						<!-- Text input-->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="catch_phrase">Change Catch phrase</label>  
						  <div class="col-md-8">
						  <input id="catch_phrase" name="catch_phrase" 
							type="text" placeholder="change catch phrase" class="form-control input-md" maxlength="255">
						  <span class="help-block">&nbsp;</span>  
						  </div>
						</div>

						<!-- Textarea -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="place_desc">Change Place description</label>
						  <div class="col-md-8">                     
							<textarea class="form-control input-md" id="place_desc" name="place_desc" placeholder="change place description"></textarea>
						  </div>
						</div>

						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="bg_color">Select Background color</label>
						  <div class="col-md-4">
							<select id="bg_color" name="bg_color" class="form-control input-md">
							  <option value="white">white(default)</option>
							  <option value="black">black</option>
							  <option value="lightslategray">lightslategray</option>
							  <option value="dimgray">dimgray</option>
							</select>
						  </div>
						</div>
						
						<!-- Select Basic -->
						<div class="form-group">
						  <label class="col-md-4 control-label" for="cp_font">Select Catch phrase font</label>
						  <div class="col-md-4">
							<select id="cp_font" name="cp_font" class="form-control input-md">
							  <option value="Arial" style="font family=Arial">Arial(default)</option>
							  <option value="Times New Roman" style="font family=Times New Roman">Times New Roman</option>
							   <option value="Verdana" style="font family= Verdana"> Verdana</option>
							  <option value="Tahoma" style="font family= Tahoma">Tahoma</option>
							</select>
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
			<div class="row clearfix">
				<div class="panel panel-primary" id="report">
					<div class="panel-heading">Report</div>
					<div class="panel-body">
						<?php echo'<form class="form-horizontal"  action="report_submit.php?username='.$username.'" method="post">';?>
						<fieldset>
							<!-- Form Name -->
							<legend>Report your problem</legend>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="title">Report title</label>  
							  <div class="col-md-8">
							  <input id="title" name="title" type="text" placeholder="Type title..." class="form-control input-md" required="">
							  <span class="help-block">&nbsp;</span>  
							  </div>
							</div>

							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="content">Report content</label>
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
</div>
</body>

<?php
  //include the header
   include('./footer.html');
?>