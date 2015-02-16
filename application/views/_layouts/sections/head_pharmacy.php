<!--
<div class="col-md-3 pull-left padding-none">   
	<form method="POST" class="top-search" action="<?php echo $this->config->base_url()?>search/results">
		<input type="hidden" id="searchLat" name="searchLat" value="<?= (isset($data['sLat'])) ? $data['sLat'] : 0 ?>"></input>
        <input type="hidden" id="searchLng" name="searchLng" value="<?= (isset($data['sLng'])) ? $data['sLng'] : 0 ?>"></input>
        <input type="hidden" id="searchRad" name="searchRad" value="99999999999"></input>
		<div class="input-group">
			<input type="text" class="form-control input-tx" name="searchuru" id="searchuru" placeholder="Search anything ..." value="">
			<span class="input-group-btn">
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
	//$_SESSION['username'] = $currentUser['username'];
?>
<input type="hidden" id="user_fullname" value="<?php //echo $currentUser['first_name']." ".$currentUser['last_name']; ?>" />
<div class="user-action pull-right dropdown-toggle screen_hidder screen_show_md" data-toggle-show="40" data-toggle-hide="30">
	<div class="menu-action">
		<i class="fa fa-user"><sup><i class="fa fa-gear"></i></sup></i>
	</div>
	<ul class="menu dropdown-menu" style="display:none">
		<li>
			<a href="<?php echo base_url('dashboard/settings'); ?>"><i class="fa fa-gears"></i></a>
		</li>
		<li>
			<a href="javascript:void(0)" onclick="javascript:closeChatBoxAll()"><i class="fa fa-sign-out"></i></a>
		</li>
	</ul>
</div>
<div class="notifications pull-right screen_hidder screen_show_md">
	<li class="noti-item dropdown-toggle" data-toggle-show="59" data-toggle-hide="50">
		<a href="" class="noti-action messages">
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
		<a href="" class="noti-action alerts">
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
				
				<a href="<?=$this->config->base_url().'dashboard/physician/profile'?>" class="pull-right">
					Edit profile
					<i class="fa fa-arrow-circle-right"></i>
				</a>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</li>
</div>

