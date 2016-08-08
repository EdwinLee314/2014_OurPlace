<?php
  //include the header
   include('./header.php');
?>

<body style="margin-top: 60px; background:url(./img/BG.jpg) repeat;">
<div class="container">
	<div class="row clearfix">
		<div class="col-md-1 column">
			<div class="bs-sidebar" style="position: fixed;">
			<ul class="nav nav-pills nav-stacked">
				<li class="active">
					<a href="#p1">Public</a>
				</li>
				<li>
					<a href="#p2">Business</a>
				</li>
				<li>
					<a href="#p3">Education</a>
				</li>
			</ul>
			</div>
		</div>
		<div class="col-md-11 column">
			<div class="panel panel-primary" >
				<div class="panel-heading" id="p1">
					<h3 class="panel-title">
						Public
					</h3>
				</div>
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
								//$dbh is defined
								$sql="SELECT page_id, place_name, page_type FROM pages ORDER BY place_name"; 
								$result= $dbh->query($sql); 
								$count = 1;
								foreach($result as $row){
									if($row['page_type'] == 1){
										echo'<tr>';
										echo	'<td>'.$count. '</td>';
										echo	'<td>'.$row['place_name']. '</td>';
										echo	'<td><a href="./user_template/temp_config.php?page_id=' .$row['page_id']. '">Link</a></td>';
										echo'</tr>';
										$count++;
									}
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
			<div class="panel panel-warning" >
				<div class="panel-heading" id="p2">
					<h3 class="panel-title">
						Business
					</h3>
				</div>
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
								//$dbh is defined
								
								$sql="SELECT page_id, place_name, page_type FROM pages ORDER BY place_name"; 
								$result= $dbh->query($sql); 
								$count = 1;
								foreach($result as $row){
									if($row['page_type'] == 2){
										echo'<tr>';
										echo	'<td>'.$count. '</td>';
										echo	'<td>'.$row['place_name']. '</td>';
										echo	'<td><a href="./user_template/temp_config.php?page_id=' .$row['page_id']. '">Link</a></td>';
										echo'</tr>';
										$count++;
									}
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
			<div class="panel panel-success" >
				<div class="panel-heading" id="p3">
					<h3 class="panel-title">
						Education
					</h3>
				</div>
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
								//$dbh is defined
								
								$sql="SELECT page_id, place_name, page_type FROM pages ORDER BY place_name"; 
								$result= $dbh->query($sql); 
								$count = 1;
								foreach($result as $row){
									if($row['page_type'] == 3){
										echo'<tr>';
										echo	'<td>'.$count. '</td>';
										echo	'<td>'.$row['place_name']. '</td>';
										echo	'<td><a href="./user_template/temp_config.php?page_id=' .$row['page_id']. '">Link</a></td>';
										echo'</tr>';
										$count++;
									}
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
	</div>
</div>
</body>

<?php
  //include the footer
  include('./footer.html');
?>