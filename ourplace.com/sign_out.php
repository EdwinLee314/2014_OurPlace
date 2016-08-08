<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  //include the header 
   include('./header.php');
?>
<title>Processing Sign Out</title>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
				<h1>
					<?php
					unset($_SESSION['user_id']);
					echo 'Sign out processing......';
					echo '<meta http-equiv=REFRESH CONTENT=3;url=index.php>';
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