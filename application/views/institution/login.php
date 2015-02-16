<div class="container">

	<div class="login-box-container inner-all">
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
							<a href="">Sign up</a>
						</span>
					</div>
					<div class="form-row">
						<a href="" class="forgot">Forgot your password?</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>