<div class="container">
	<div class="login-box-container inner-all">
		<?php if($errorMessage!==FALSE){ ?>
		<div class="error_box">
			<i class="fa fa-exclamation-circle"></i> <?php echo $errorMessage; ?>
		</div>
		<?php } ?>
		
		<div class="login-box">
			<div class="col-xs-12">
				<form action="<?php echo base_url(); ?>account/login" method="post">
					<div class="form-row">
						<span class="pull-left">Email / Username</span>
						<input type="text" name="userlogin" class="input-tx" />
					</div>
					<div class="form-row">
						<span class="pull-left">Password</span>
						<input type="password" name="password" class="input-tx" />
					</div>
					<div class="form-row">
						<button type="submit" class="btn blue">Log In</button>
						<span>
							or <a href="<?php echo base_url(); ?>">Sign up</a>
						</span>
					</div>
					<div class="form-row">
						<a href="<?php echo base_url(); ?>account/forgot" class="forgot">Forgot your password?</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>