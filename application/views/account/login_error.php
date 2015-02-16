<div class="container">

	<div class="login-box-container inner-all">
		<div class="error-box inner-all col-xs-12">
			<label>Invalid Credentials</label>
			<p>The information you entered does not belong to any account. You can login using email and username associated with your account. Make sure that it is typed correctly. </p>
			<p>Forgot your password? <a href="<?=$this->config->base_url()?>account/forgotpassword">Request a new one</a>.</p>
		</div>
		
		<div class="login-box">
			<div class="col-xs-12">
				<form action="<?=$this->config->base_url()?>account/login" method="post">
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
							or
							<a href="<?=$this->config->base_url()?>frontpage">Sign up</a>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>