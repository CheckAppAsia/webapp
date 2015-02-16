<div class="settings_box">
	<div class="inner-all">
		<div class="form_div">
			<span class="form_label">Username</span>
			<input type="text" class="form_text disabled" disabled="disabled" value="<?php echo $currentUser['username'] ?>" />
			
			<span class="form_label">Email</span>
			<input type="text" class="form_text disabled" disabled="disabled" value="<?php echo $currentUser['email'] ?>" />
			
			<span class="form_label">Old Password</span>
			<input id="old_pass" type="password" class="form_text" />

			<span class="form_label">New Password</span>
			<input id="new_pass" type="password" class="form_text" />
			
			<span class="form_label mini">Confirm Password</span>
			<input id="con_pass" type="password" class="form_text" />
			
			<button id="save_btn" type="submit" class="btn blue">Save</button>
		</div>
	</div>
</div>
