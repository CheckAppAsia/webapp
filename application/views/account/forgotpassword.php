<div class="container">

	
	<?php if($data['success']){?>
	<div class="login-box-container inner-all welcome">
		<b>Password has been reset!</b>
		<br/>
		Please check your email to get your new password.
	</div>
	<?php }else{ ?>
	<div class="login-box-container inner-all">
		
		
		<?php if($data['error']){ ?>
		<div class="error-box inner-all col-xs-12">
			<label>Invalid Email: <?=$data['invalid_email']?></label>
			<p>The email you provided does not exist! Please try again.</p>
		</div>
		<?php } ?>
		
		<div class="login-box">
			<div class="col-xs-12">
				
				<div class="forgotpassword-form">
					<form action="<?=$this->config->base_url()?>account/forgot" method="post">
						<div class="form-row">
							<h5>Forgot Password:</h5>
							<br/>
							<span class="pull-left">Note: Your password will be reset and sent to the email below.</span><br />
						</div>
						
						<br/>
						<br/>
						<div class="form-row">
							<span class="pull-left">Enter your email address:</span><br />
							<input type="text" name="email" class="input-tx" />
						</div>
						<div class="form-row">
							<button type="submit" class="btn blue">RESET PASSWORD</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
	<?php } ?>

</div>