<form class="login-form" method="post" action="<?=$this->config->base_url()?>account/login">
	<div class="form-group">
		<input type="text" placeholder="Username or Email" class="input-tx" name="userlogin" required>
	</div>
	<div class="form-group">
		<input type="password" placeholder="Password" class="input-tx" name="password" required>
	</div>
	<div class="form-group">
		<button type="submit" class="btn blue">Log In</button>
	</div>
</form>