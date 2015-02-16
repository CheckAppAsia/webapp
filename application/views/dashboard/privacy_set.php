<div class="settings_box">
	<div class="inner-all">
		<br>
		<h2 class="form_heading">Privacy Settings</h2>
		<span class="form_label">Who can see my Profile?</span>
		<select id="profile_pset" var="1" class="form_select">
			<option value="0" <?php if($settings[1]==0){ echo "selected='selected'"; } ?> >Everyone</option>
			<option value="2" <?php if($settings[1]==2){ echo "selected='selected'"; } ?> >My Doctors</option>
			<option value="3" <?php if($settings[1]==3){ echo "selected='selected'"; } ?> >My Friends</option>
			<option value="1" <?php if($settings[1]==1){ echo "selected='selected'"; } ?> >Only Me</option>
		</select>
		
		<span class="form_label">Who can look me up?</span>
		<select id="lookup_pset" var="2" class="form_select">
			<option value="0" <?php if($settings[2]==0){ echo "selected='selected'"; } ?> >Everyone</option>
			<option value="2" <?php if($settings[2]==2){ echo "selected='selected'"; } ?> >Just Doctors</option>
			<option value="1" <?php if($settings[2]==1){ echo "selected='selected'"; } ?> >Only Me</option>
		</select>
		<span style="font-size:9px;color:#666">*values are saved but can still be not in effect until the module is fully implemented</span>
		
		<br><br><br>
		<h2 class="form_heading">Security Settings</h2>
	</div>
</div>


