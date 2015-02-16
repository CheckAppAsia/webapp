<div class="basic_info">
	<div class="inner-all">
		<div class="profile_pic pull-right">
			<img src="<?php echo CA_Media::userpic($target->profile_pic,'150'); ?>" />
		</div>
		<div class="status">
			<i class="online"></i>
			<span class="time"><?php echo date("H:m a", strtotime($target->activity)); ?></span>
		</div>
		<div class="info">
			<span class="fullname block_text"><?php echo $target->first_name. " " .$target->middle_name. " " .$target->last_name ?></span>
			<span class="address block_text"><?php echo $target->about; ?></span>
			<span class="address block_text"><?php echo $target->specializations; ?></span>
			<span class="address block_text"><?php echo $target->license_no; ?></span>
		</div>
			
		<div class="clearfix"></div>
	</div>
</div>
<?php
	$cut_ruri = explode("/",$ruri);
	$cut_ruri[4] = (isset($cut_ruri[4]))? $cut_ruri[4] : "";
?>
<div class="widget-head">
	<ul>
		<!-- TAB: Timeline -->
		<li class="<?php echo ($cut_ruri[2]=="index" && $cut_ruri[4]=="")? "active":"" ?>">
			<a class="glyphicons list tab-open" href="<?php echo base_url('user/'.$target->username); ?>">
				<i></i>
				<span>Timeline</span>
			</a>
		</li>
		
		<!-- TAB: Profile -->
		<li class="<?php echo ($cut_ruri[2]=="profile")? "active":"" ?>">
			<a class="glyphicons user tab-open" href="<?php echo base_url('user/'.$target->username.'/profile'); ?>">
				<i></i>
				<span>Profile</span>
			</a>
		</li>
		
		<!-- TAB: Professional Experience -->
		<li class="<?php echo ($cut_ruri[2]=="index" && $cut_ruri[4]=="medical")? "active":"" ?>">
			<a class="glyphicons hospital tab-open" href="<?php echo base_url('user/'.$target->username.'/medical'); ?>">
				<i></i>
				<span>Professional<br>Experience</span>
			</a>
		</li>
		
		<!-- BUTTON: Colleagues -->
		<?php if($currentUser['type']==2){ ?>
		<li class="<?php echo ($cut_ruri[1]=="physician" && $cut_ruri[2]=="colleagues")? "active":"" ?>">
			<a class="glyphicons group tab-open" href="<?php echo base_url('user/'.$target->username.'/colleagues'); ?>">
				<i></i>
				<span>Colleagues</span>
			</a>
		</li>
		<?php } ?>
		
		<!-- BUTTON: Messaging -->
		<?php if($currentUser['id']!=$target->user_id){ ?>
		<li class="actions">
			<?php echo form_open('dashboard/messages/compose', array('class'=>'')); ?>
				<input type="hidden" name="compose_id" value="<?php echo $target->user_id; ?>" />
				<input type="hidden" name="compose_name" value="<?php echo $target->first_name. " " .$target->last_name ?>" />
				<input type="hidden" name="compose_username" value="<?php echo $target->username; ?>" />
				<button><i class="fa fa-envelope"></i> Message</button>
			<?php echo form_close(); ?>
		</li>
		<?php } ?>
		
		<!-- BUTTON: Subscribe -->
		<?php if($currentUser['type']==1 && $currentUser['id']!=$target->user_id && @$currentUser['isSubscribed']==false){ ?>
		<li class="actions">
			<button>
				<i class="fa fa-lock"></i> Subscribe
			</button>
		</li>
		<?php } ?>
		
		<!-- BUTTON: Book an appointment -->
		<?php if($currentUser['type']==1){ ?>
		<li class="actions">
			<button class="lightbox-mode pull-left" data-target="book">
				<i class="fa fa-calendar"></i> Book
			</button>
		</li>
		<?php } ?>
		
	</ul>
</div>


<!-- BOOKING LIGHTBOX -->
<div class="lightbox book" style="display:none">
	<div class="heading">
		<span class="close">x</span>
		<h2 class="margin-none">Booking Details</h2>
	</div>
	<?php if($this->session->userdata('user_logged')) { ?>
		
		<!-- Success message -->
		<div class="success result inner-all">
			<p>You have successfully scheduled an appointment.</p>
		</div>
		
		<!-- Error Alert -->
		<div class="fail result inner-all">
			<p>Something went wrong upon booking. Please try again.</p>
		</div>
		
		<!-- Booking form -->
		<div class="form inner-all">
			
			<!-- FieldRow: Clinic -->
			<div class="form-group">
				<input type="hidden" value="<?php echo $target->id; ?>" class="provider_id">
				<label class="col-sm-3">Clinic:</label>
				<div class="col-sm-9">
					<select name="hour" class="form-control hour" DISABLED>
						<option value="0">Unspecified</option>
					</select>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="separator bottom"></div>
			
			<!-- FieldRow: Date -->
			<div class="form-group">
				<input type="hidden" value="<?php echo $target->id; ?>" class="provider_id">
				<label class="col-sm-3">Date:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control datepicker date" placeholder="Date" name="date">
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="separator bottom"></div>
			
			<!-- FieldRow: Time -->
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
			
			<!-- FieldRow: Reason -->
			<div class="form-group">
				<label class="col-sm-3">Reason for appointment:</label>
				<div class="col-sm-9">
					<textarea class="form-control notes" name="notes"></textarea>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="separator bottom"></div>
			
			<!-- FieldRow: Submit -->
			<div class="form-group">
				<div class="col-sm-3"></div>
				<div class="col-sm-9">
					<button type="sumbit" class="btn blue submit">Submit</button>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		
	<?php }else{ ?>
		
		<!-- Notice: Login required -->
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
					<span>or <a href="">Sign up</a></span>
				</div>
			</form>
		</div>
		
	<?php } ?>
</div>