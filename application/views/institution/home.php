<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="box-slide">
			
			</div>
		</div>
		
		<div class="col-md-6 sign-up-form">
			<h1>Institution Sign Up</h1>
			<h4>It's free</h4>
			<p class="error-box inner-all" style="display:none">
			testing
			</p>
			<div class="sign-up-form">
				<form method="POST" action="<?php echo base_url(); ?>institution/signup">
					<div class="controls">
						<input class="input-tx" type="text"  value="" placeholder="Institution name" id="instname" name="instname" />
						<span class="form-warning" style="display:none">This username is already taken.</span>
					</div>
					<div class="controls">
						<textarea name="description" class="input-tx" placeholder="Description..."></textarea>
					</div>
					<div class="controls">
						<input class="input-tx" type="text"  value="" placeholder="Address" id="address" name="address" />
					</div>
					<div class="controls">
						<input class="input-tx" type="text"  value="" placeholder="Contact number" id="landline" name="landline1" />
					</div>
					<div class="col-separator-h"></div>
					<div class="controls">
						<input class="input-tx" type="text"  value="" placeholder="Username" id="username" name="username" />
						<span class="form-warning" style="display:none">This username is already taken.</span>
					</div>
					<div class="controls">
						<input class="input-tx" type="email"  value="" placeholder="Your Email" id="email" name="email" />
						<span class="form-warning" style="display:none">This email is already taken.</span>
					</div>
					<div class="controls">
						<input type="password"  placeholder="New Password" name="password" class="input-tx password" />
					</div>
					<div class="controls">
						<span class="small">By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
					</div>
					<div class="controls">
						<button class="btn blue" type="submit">Sign Up</button>
					</div>
					<input type="hidden" value="3" name="user_type">
				</form>
			</div>
		</div>
	</div>
</div>