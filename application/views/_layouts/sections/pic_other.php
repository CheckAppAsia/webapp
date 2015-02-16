<div class="user-pic-name">
	<div class="user-pic">
		<div class="profile-avatar">
			<img class="img-responsive" src="<?php echo CA_Media::userpic($target->profile_pic,'150'); ?>" />
		</div>
	</div>
	<div class="user-name">
		<div class="inner-all">
			<h5>
				<!--
				<i class="fa fa-circle text-success pull-right"></i>
				<?php echo $target->title; ?>
				<?php echo $target->first_name; ?>
				<?php echo $target->last_name; ?>
				-->
				<?php if($target->type==2){ ?>
					<button class="btn red book-btn lightbox-mode" data-target="book" style="margin-top:10px;">Book Me</button>
				<?php } ?>
				
				<?php
					//if($this->session->userdata('user_data')['type'] == 1){
					if(isset($relation)){
						switch($relation['form_type']){
							case 1:
								echo '<div style="margin-top:10px;">';
								echo '<button class="btn blue book-btn">';
								echo $relation['user_action'];
								echo '</button>';
								echo '</div>';
								break;
							case 2:
								echo '<div style="margin-top:10px;">';
								echo '<form action="'.$this->config->base_url().$relation['controller'].'/'.$relation['form_action'].'" method="post">';
								echo '<input type="hidden" name="user_id_1" value="'.$relation['user_id_1'].'" />';
								echo '<input type="hidden" name="user_id_2" value="'.$relation['user_id_2'].'" />';
								echo '<input type="hidden" name="target" value="'.$target->user_id.'" />';
								echo '<input type="hidden" name="username" value="'.$target->username.'" />';
								
								
								if($relation['form_action'] == "delete"){
									echo '<button class="btn red book-btn">';
								}else{
									echo '<button class="btn blue book-btn">';
								}
								
								echo $relation['user_action'];
								echo '</button>';
								echo '</form>';
								echo '</div>';
								break;
							case 3:
								/* ACCEPT */
								echo '<div style="margin-top:10px;">';
								echo '<form action="'.$this->config->base_url().$relation['controller'].'/'.$relation['form_action_1'].'" method="post">';
								echo '<input type="hidden" name="user_id_1" value="'.$relation['user_id_1'].'" />';
								echo '<input type="hidden" name="user_id_2" value="'.$relation['user_id_2'].'" />';
								echo '<input type="hidden" name="username" value="'.$target->username.'" />';
								echo '<button class="btn blue book-btn">';
								echo $relation['user_action_1'];
								echo '</button>';
								echo '</form>';
								echo '</div>';
								
								/* REJECT */
								echo '<div style="margin-top:10px;">';
								echo '<form action="'.$this->config->base_url().$relation['controller'].'/'.$relation['form_action_2'].'" method="post">';
								echo '<input type="hidden" name="user_id_1" value="'.$relation['user_id_1'].'" />';
								echo '<input type="hidden" name="user_id_2" value="'.$relation['user_id_2'].'" />';
								echo '<input type="hidden" name="username" value="'.$target->username.'" />';
								echo '<button class="btn red book-btn">';
								echo $relation['user_action_2'];
								echo '</button>';
								echo '</form>';
								echo '</div>';
								break;
							case 4:
								echo '<div style="margin-top:10px;">';
								echo '<form action="'.$this->config->base_url().'physician/'.$relation['form_action'].'" method="post">';
								
								echo '<input type="hidden" name="user_id" value="'.$relation['user_id'].'" />';
								echo '<input type="hidden" name="physician_id" value="'.$relation['physician_id'].'" />';
								echo '<input type="hidden" name="username" value="'.$target->username.'" />';
								
								
								if($relation['form_action'] == "unsubscribe"){
									echo '<button class="btn red book-btn">';
								}else{
									echo '<button class="btn blue book-btn">';
								}
								
								echo $relation['user_action'];
								echo '</button>';
								echo '</form>';
								echo '</div>';
								break;
							default:
								break;
						}
					}
				?>

				<div class="clearfix"></div>
			</h5>
		</div>
	</div>
</div>

<?php
	$show_booking = ($target->type==2) ? true : false;
	if($show_booking){
?>
<div class="lightbox book" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Booking Details</h2>
	</div>
	<?php if($this->session->userdata('user_logged')) { ?>
	<div class="success result inner-all">
		<p>You have successfully scheduled an appointment.</p>
	</div>
	<div class="fail result inner-all">
		<p>Something went wrong upon booking. Please try again.</p>
	</div>
	<div class="form inner-all" >
		<div class="form-group">
			<input type="hidden" value="<?=$this->session->userdata('user_data')['id']?>" class="pateint-id">
			<input type="hidden" value="<?=$target->id?>" class="physician">
			<label class="col-sm-3">Date:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control datepicker date" placeholder="Date" name="date">
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="separator bottom"></div>
		<div class="form-group">
			<label class="col-sm-3">Time:</label>
			<div class="col-sm-9">
				<div class="col-sm-4">
					<select name="hour" class="form-control hour">
						<?php for($i=0;$i<12;$i++){ ?>
						<option value="<?php echo $i+1 ?>" <?php echo (($i+1)==8)?"selected":"" ?>><?php echo $i+1 ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="minutes" class="form-control minutes">
						<option value="0">00</option>
						<option value="30">30</option>
					</select>
				</div>
				<div class="col-sm-4">
					<select name="ampm" class="form-control ampm">
						<option value="am">AM</option>
						<option vale="pm">PM</option>
					</select>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="separator bottom"></div>
		<div class="form-group">
			<label class="col-sm-3">Notes:</label>
			<div class="col-sm-9">
				<textarea class="form-control notes" name="notes"></textarea>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="separator bottom"></div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-9">
				<button type="sumbit" class="btn blue submit">Submit</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php }else{ ?>
	<div class="fail result inner-all" style="display:block">
		<p>You have to login for you to do the booking.</p>
		
		<form class="lightbox-login" method="post" action="<?=$this->config->base_url()?>account/login">
			<div class="form-group">
				<input type="text" placeholder="Username or Email" class="input-tx" name="userlogin" required>
			</div>
			<div class="form-group">
				<input type="password" placeholder="Password" class="input-tx" name="password" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn blue">Log In</button>
				<span>
					or
					<a href="">Sign up</a>
				</span>
			</div>
		</form>
	</div>
	<?php } ?>
</div>
<?php } ?>