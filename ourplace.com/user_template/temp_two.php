
<?php
  //include the header
   include('./temp_header.php');
?>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
				<h1 id ="he">
					<?php echo $catch_phrase;?>
				</h1>
				<p>
					<?php echo $place_desc;?>
				</p>
				<p>
					<?php echo $place_location;?><span class="label label-success">Business</span> 
				</p>
			</div>
		</div>
	</div>
	
	<div class="row">
        <div class="col-md-8">
        	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=2-50 Murray Rd, Preston VIC 3072&aq=t&sll=52.8382,-2.327815&sspn=8.047465,13.666992&ie=UTF8&hq=&hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&t=m&z=14&ll=51.077429,1.121722&output=embed"></iframe>
    	</div>
    	
      	<div class="col-md-4">
    		<h2>Address</h2>
    		<address>
    			<?php echo $place_location;?>
    		</address>
    	</div>
    </div>
			<div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/people">
						<div class="caption">
							<h3>
								<?php echo $place_name;?>
							</h3>
							
							<address>
								<?php echo $place_name;?>
							</address>
							<p>
								<a class="btn btn-primary" href="#">More</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/city">
						<div class="caption">
							<h3>
								<?php echo $place_name;?>
							</h3>
							<p>
								<?php echo $place_name;?>
							</p>
							<p>
								<a class="btn btn-primary" href="#">More</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/sports">
						<div class="caption">
							<h3>
								<?php echo $place_name;?>
							</h3>
							<p>
								<?php echo $place_name;?>
							</p>
							<p>
								<a class="btn btn-primary" href="#">More</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

<?php
  //include the footer
  include('../footer.html');
?>