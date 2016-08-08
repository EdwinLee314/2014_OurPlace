<?php
	session_start();
	$form_token = md5(uniqid('auth',true));
	$_SESSION['form_token'] = $form_token;

?>
<?php
  //include the header
   include('./header.php');
?>
<style type="text/css">
		body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
		}
		
		#signin {
		max-width: 550px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
		}
</style>

<script type="text/javascript">
		
		function checkUsername(input,helpText){  
			if(input.value.length < 4) {
				helpText.innerHTML = "The username must be more than 4 character.";
				return false;
			}
			else if( input.value > 20) {
				helpText.innerHTML = "The username must be less than 20 character.";
				return false;
			}
			else{
				return true;
			}
		}
		
		function checkPassword(input,helpText){  
			if(input.value.length <6) {
				helpText.innerHTML = "The password must be more than 6 character.";
				return false;
			}
			else if( input.value > 20) {
				helpText.innerHTML = "The password must be less than 20 character.";
				return false;
			}
			else{
				return true;
			}
		}
</script> 

<body style ="background:url(./img/BG.jpg) repeat;">
<div class="container">
	<form 	id="signin" class="form-horizontal" action="signin_submit.php" method="post" 
					onsubmit="return checkUsername(username,help_text1);checkPassword(password,help_text2);">
			<fieldset>

				<!-- Form Name -->
				<legend>Sign in</legend>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="textinput">User name Input</label>
					<div class="col-md-8">
						<input 	id="textinput" name="username" 
								type="text" placeholder="User name..." class="form-control input-md" onblur= "checkUsername(this,help_text1)" required>
						<span class="help-block" id = "help_text1">&nbsp;</span>
					</div>
				</div>

				<!-- Password input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="passwordinput">Password Input</label>
					<div class="col-md-8">
						<input 	id="passwordinput" name="password" 
								type="password" placeholder="Password..." class="form-control input-md" onblur= "checkPassword(this,help_text2)" required>
						<span class="help-block" id = "help_text2">&nbsp;</span>
					</div>
				</div>
				
				<input type="hidden" name="form_token" value="<?php echo $form_token;?>"/>
				
				<!-- Button (Double) -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="reset">&nbsp;</label>
					<div class="col-md-8">
						<button  type="reset" class="btn ">Reset</button>
						<button type="submit" class="btn btn-primary">Sign in</button>
					</div>
				</div>
	</fieldset>
	</form>						
</div>
</body>

<?php
  //include the footer
  include('./footer.html');
?>