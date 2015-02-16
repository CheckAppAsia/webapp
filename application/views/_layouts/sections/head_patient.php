<!--
<div class="col-md-3 inner-LR5 pull-left padding-none">   
	<form method="POST" class="top-search" action="<?php echo $this->config->base_url()?>search/results">
		<input type="hidden" id="searchLat" name="searchLat" value="<?= (isset($data['sLat'])) ? $data['sLat'] : 0 ?>"></input>
        <input type="hidden" id="searchLng" name="searchLng" value="<?= (isset($data['sLng'])) ? $data['sLng'] : 0 ?>"></input>
        <input type="hidden" id="searchRad" name="searchRad" value="99999999999"></input>
		<div class="input-group autocomplete-box">
			<input type="text" class="form-control input-tx" name="searchuru" id="searchuru" placeholder="Search anything ..." value="">
			<span class="input-group-btn" style="display:none">
				<button class="btn blue margin-none" type="submit">
				<i class="fa fa-search"></i>
				</button>
			</span>
		</div>
	</form>      
</div>
<div class="search_bar_top pull-left">
	<i class="cus_icon group"></i>
	<form method="POST" class="top-search" action="<?php echo $this->config->base_url()?>search/results">
		<input type="hidden" id="searchLat" name="searchLat" value="<?= (isset($data['sLat'])) ? $data['sLat'] : 0 ?>"></input>
        <input type="hidden" id="searchLng" name="searchLng" value="<?= (isset($data['sLng'])) ? $data['sLng'] : 0 ?>"></input>
        <input type="hidden" id="searchRad" name="searchRad" value="99999999999"></input>
		<div class="input-group autocomplete-box">
			<input type="text" class="search-txt" id="searchuru" name="searchuru"  placeholder="Search Doctors, Friends, Institution ..." />
		</div>
	</form>
</div>
-->
<?php
	session_start();
	$_SESSION['username'] = $currentUser['username'];
?>
<input type="hidden" id="user_fullname" value="<?php echo $currentUser['first_name']." ".$currentUser['last_name']; ?>" />
<div class="book-now-box pull-right screen_hidder screen_show_md">

	<div class="action">
		<i class="cus_icon doctor pull-left"></i>
		<span>BOOK A DOCTOR</span>
	</div>
	<form id="book_now_search" method="POST" class="top-search" action="<?php echo $this->config->base_url()?>search/results">
		<input type="hidden" id="searchLat" name="searchLat" value="<?= (isset($data['sLat'])) ? $data['sLat'] : 0 ?>"></input>
        <input type="hidden" id="searchLng" name="searchLng" value="<?= (isset($data['sLng'])) ? $data['sLng'] : 0 ?>"></input>
        <input type="hidden" id="searchRad" name="searchRad" value="99999999999"></input>
        <input type="hidden" id="searchType" name="searchType" value="2"></input>
		<input type="hidden" class="form-control input-tx" name="searchuru" id="searchuru" placeholder="Search anything ..." value=" ">
		<input type="text" id="book_now_date" />
	</form>  
</div>

<div class="user-action pull-right dropdown-toggle screen_hidder screen_show_md" data-toggle-show="40" data-toggle-hide="30">
	<div class="menu-action">
		<i class="fa fa-user"><sup><i class="fa fa-gear"></i></sup></i>
	</div>
	<ul class="menu dropdown-menu" style="display:none">
		<li>
			<a href="<?php echo base_url('dashboard/settings'); ?>"><i class="fa fa-gears"></i></a>
		</li>
		<li>
			<a href="javascript:void(0)"  onclick="javascript:closeChatBoxAll()"><i class="fa fa-sign-out"></i></a>
		</li>
	</ul>
</div>
<div class="notifications pull-right screen_hidder screen_show_md">
	<li class="noti-item dropdown-toggle" data-toggle-show="59" data-toggle-hide="50">
		<a class="noti-action messages">
			<i class="cus_icon msgs">
				<span class="notif_counts" id="ajax_notif_msg_count" style="display:none">0</span>
			</i>
		</a>
		<ul class="noti-msg-list dropdown-menu" style="display:none">
			<span id="ajax_notif_msgs">
			
			</span>
			<li>
				<a href="<?=$this->config->base_url()?>dashboard/messages" class="btn blue">
					<i class="fa fa-list"></i>
					<span>View all messages</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="noti-item dropdown-toggle" data-toggle-show="59" data-toggle-hide="50">
		<a class="noti-action alerts">
			<i class="cus_icon notifs">
				<span class="notif_counts" id="ajax_notif_count" style="display:none">0</span>
			</i>
		</a>
		<ul class="noti-alert-list dropdown-menu" style="display:none">
			<span id="ajax_notifs">
			
			</span>
			<li>
				<a href="<?=$this->config->base_url()?>dashboard/notifications" class="btn blue">
					<i class="fa fa-list"></i>
					<span>View all notifications</span>
				</a>
				
			</li>
		</ul>
	</li>
	<li class="noti-item dropdown-toggle" data-toggle-show="59" data-toggle-hide="50">
		<a href="" class="noti-action profile">
			<i class="cus_icon profile_percentage">
				<div class="percentage">
					<i style="width:<?=ceil($data['profile_completion'])?>%"></i>
					<span><?=ceil($data['profile_completion'])?>%</span>
				</div>
			</i>
			<!--
			<i class="fa fa-star-o">
				<sup>
					<div class="percentage-bar"><span style="width:35%"></span></div>
				</sup>
			</i>
			-->
		</a>
		<div class="profile-status dropdown-menu" style="display:none;">
			<div class="percentage">
				<div class="pull-left amount"><?=ceil($data['profile_completion'])?>%</div>
				<span>Profile Complete</span>
				<div class="clearfix"></div>
			</div>
			<div class="inner-all desc">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi vitae sed vel quos quae earum dolores illo incidunt reprehenderit nihil.
				</p>
				<a href="<?=$this->config->base_url().'dashboard/patient/profile'?>" class="pull-right">
					Edit profile
					<i class="fa fa-arrow-circle-right"></i>
				</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</li>
</div>

<div class="sidebar_widget">
	<?php $cut_ruri = explode("/",$ruri); ?>
	<ul class="sidebar_left">
		<li class="<?php echo ($cut_ruri[1]=="overview")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/overview'); ?>">
			<i class="fa fa-dashboard"></i> Dashboard
		</a></li>
		
		<li class="<?php echo ($cut_ruri[1]=="health")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/health'); ?>">
			<i class="fa fa-heart-o"></i> My Health
		</a></li>
		
		<li class="<?php echo ($cut_ruri[1]=="medications")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/medications'); ?>">
			<i class="fa fa-plus-square"></i> Medications
		</a></li>

		<li class="<?php echo ($cut_ruri[1]=="doctors")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/doctors'); ?>">
			<i class="fa fa-user-md"></i> My Doctors
		</a></li>
		
		<li><a href="<?php echo base_url('#'); ?>">
			<i class="fa fa-file-text-o"></i> Medical Records
		</a></li>
		
		<li class="<?php echo ($cut_ruri[1]=="appointment")?"active":"" ?>"><a href="<?php echo base_url('dashboard/patient/appointment'); ?>">
			<i class="fa fa-check-square-o"></i> Appointments
		</a></li>
		
		<li><a href="<?php echo base_url('#'); ?>">
			<i class="fa fa-h-square"></i> Health Insurance
		</a></li>

		<li class="<?php echo ($cut_ruri[1]=="user")?"active":"" ?>"><a href="<?php echo base_url('user/'.$currentUser['username']); ?>">
			<i class="fa fa-th-list"></i> Social Timeline
		</a></li>
		
		<li class="<?php echo ($cut_ruri[1]=="friends")?"active":"" ?>"><a href="<?php echo base_url('dashboard/friends'); ?>">
			<i class="fa fa-group"></i> Friends
		</a></li>
		
		<li class="<?php echo ($cut_ruri[1]=="groups")?"active":"" ?>"><a href="<?php echo base_url('dashboard/groups'); ?>">
			<i class="fa fa-group"></i> Groups
		</a></li>
		
		<li class="<?php echo ($cut_ruri[1]=="messages")?"active":"" ?>"><a href="<?php echo base_url('dashboard/messages'); ?>">
			<i class="fa fa-envelope"></i> Messages
		</a></li>
		
		<li><a href="<?php echo base_url(); ?>">
			<i class="fa fa-shopping-cart"></i> Buy Medicines
		</a></li>
		
		<li><a href="<?php echo base_url(); ?>">
			<i class="fa fa-sort-alpha-asc"></i> Drugs References
		</a></li>
		
		<li><a href="<?php echo base_url(); ?>">
			<i class="fa fa-building-o"></i> Medical Directory
		</a></li>
	</ul>
</div>
