<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="box-slide">
				<span style="color:#bbb;">Aug 4, 11:42am JST</span>
			</div>
		</div>
		
		<div class="col-md-6 sign-up-form">
			<h1>Sign Up</h1>
			<h4>It's free</h4>
			<p class="error-box inner-all" style="display:none">testing</p>
			<div class="sign-up-form">
				<form method="POST" action="<?=$this->config->base_url()?>account/signup">
					<div class="controls">
						<input class="input-tx col-sm-6" type="text"  value="" placeholder="First Name" id="firstname" name="first_name" />
						<input class="input-tx col-sm-6" type="text"  value="" placeholder="Last Name" id="lastname" name="last_name" />
						<div class="clearfix"></div>
					</div>
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
						<div class="radio">
							<label>
								<input type="radio" required="" checked="" value="1" name="user_type">
								I'm a User / Patient 
							</label>
						</div>
						<div class="radio">
							<label>
								<input id="doctor" type="radio" value="2" name="user_type">
								I'm a Physician / Healthcare Provider 
							</label>
						</div>
					</div>
					<div class="controls">
						<span class="small">By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
					</div>
					<div class="controls">
						<button class="btn blue" type="submit">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 search">
            <form role="form" method="POST" action="<?php echo base_url('search/results'); ?>">
                <div class="input-group">
                    <input class="form-control input-tx ui-autocomplete-input" type="text" placeholder="Search here" name="searchuru" id="searchuru" autocomplete="off" />
                    <span class="input-group-btn">
                        <button class="btn blue">Search</button>
                    </span>
                </div>
                
                <input type="hidden" id="searchLat" name="searchLat" value="14.6090537"></input>
                <input type="hidden" id="searchLng" name="searchLng" value="121.02225650000003"></input>
                <input type="hidden" id="searchRad" name="searchRad" value="99999999999"></input>
            </form> 
		</div>
	</div>
</div>