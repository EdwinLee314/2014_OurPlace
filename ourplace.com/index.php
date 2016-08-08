<?php
  //include the header
   include('./header.php');
?>
	
<title>OurPlace.com</title>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="carousel slide" id="carousel-229419">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-229419">
					</li>
					<li data-slide-to="1" data-target="#carousel-229419">
					</li>
					<li data-slide-to="2" data-target="#carousel-229419">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="" src="./img/education.jpg">
						<div class="carousel-caption">
							<h2>
								For Education
							</h2>
							<p>
								Multi-funcition website available for creating for schools!
							</p>
							<p>
								<a class="btn btn-lg btn-primary" href= "./sign_up.php" role="button">
									Sign up now
								</a>
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="./img/business.jpg">
						<div class="carousel-caption">
							<h2>
								For Business
							</h2>
							<p>
								One step to build your own business website, just this easy!
							</p>
							<p>
								<a class="btn btn-lg btn-primary" href= "./sign_up.php" role="button">
									Sign up now
								</a>
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="./img/government.jpg">
						<div class="carousel-caption">
							<h2>
								For Public
							</h2>
							<p>
								Formal format for your public facility website. Let citizens trust you!
							</p>
							<p>
								<a class="btn btn-lg btn-primary" href= "./sign_up.php" role="button">
									Sign up now
								</a>
							</p>
						</div>
					</div>
				</div> 
				<a class="left carousel-control" href="#carousel-229419" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span></a> 
				<a class="right carousel-control" href="#carousel-229419" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
	<br>
	<div class="row clearfix"id = "about" >
		<div class="col-md-12 column" >
			<div class="page-header">
				<h1>
					Junqi Li <small>Chef Full Stack developer</small>
				</h1>
			</div>
			<p style="font-size: 3.5em;">
				<Strong>"We highly appreciate the enthusiasm and creative talent of the people of Team J at OurPlace!" </Strong>
			</p>
		</div>
	</div>
	<br>
	<div class="row clearfix" >
	
		<div class="col-md-4 column">
			<div class="panel panel-success">
				<div class="panel-heading">
					Our Functions
				</div>
				<div class="panel-body">
					<img src="http://lorempixel.com/64/64/" alt="">
					 The primary function of the OurPlace website is a tool to make it easy to set up a website that is a counterpart to a physical place, i.e. to support interactions between people within a particular physical place.
				</div>
			</div>	
		</div>
		
		<div class="col-md-4 column">
			<div class="panel panel-info">
				<div class="panel-heading">
					Our History
				</div>
				<div class="panel-body">
					<img src="http://lorempixel.com/64/64/" alt="">
					More than 20 years experiences in data base and website development and won over 20 expert rewards establish the great honor of our company.
				</div>
			</div>
		</div>
		
		<div class="col-md-4 column">
			<div class="panel panel-warning">
				<div class="panel-heading">
					Our Goals
				</div>
				<div class="panel-body">
					<p>
					<img src="http://lorempixel.com/64/64/" alt="">
					Our goal is to have more than 1 millions of audiences and to build all suburbs website around the Australia in our data base.
					</p>
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="row clearfix" >
		<div class="col-md-12 column">
			<div class="jumbotron" id ="contact">
				<h3>
					OurPlace Contact Details
				</h3>
				<p>
					<address> <strong>OurPlace Pty Ltd.</strong><br /> 
					La Trobe University Bundoora Campus, VIC 3086 <br /> 
					Developers: Jiaqi Chen, Junqi Li, Hui Ye <br /> 
					<abbr title="Phone">P:</abbr> 
					(+61 3) 9479 1111<br/>
					<abbr title="Fax">F:</abbr>
					(+61 3) 9479 3660<br/>
					<abbr title="Email">E:</abbr>
					enquiry_ourplace@gmail.com<br/>
					</address>
				</p>
			</div>
		</div>
	</div>
</div>
</body>

<?php
  //include the footer
  include('./footer.html');
?>
