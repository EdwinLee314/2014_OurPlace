<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<header>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button> 
					<a class="navbar-brand" href="./index.php" style="padding:5px;">
						<img 	class="img-circle" src="./img/logo.jpg">
						<span	style="	font-family: Axure Handwriting;color: #fff;">
						OurPlace
						</span>
					</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="./home_selector.php">Home</a>
						</li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
							 <a href="./our_place.php" class="dropdown-toggle" data-toggle="dropdown">Our place<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="./our_place.php#p1">Public</a>
								</li>
								<li>
									<a href="./our_place.php#p2">Business</a>
								</li>
								<li>
									<a href="./our_place.php#p3">Education</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="./user_template/my_place/temp_my_place.htm">My place</a>
						</li>
						<li class="divider-vertical"></li>
						<li>
							<a href="./index.php#about">About</a>
						</li>
						<li>
							<a href="./index.php#contact">Contact</a>
						</li>
					</ul>
					<?php
					if(!isset($_SESSION['user_id'])){
					echo '<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="./sign_up.php">Sign up</a>
						</li>
						<li class="active">
							<a href="./sign_in.php">Sign in</a>
						</li>
					</ul>';
					}
					else{
					echo '<ul class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="./sign_out.php">Sign out</a>
						</li>
					</ul>';
					}
					?>
				</div>
			</nav>
		</div>
	</div>
</div>
</header>
