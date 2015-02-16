<div class="col-md-3 inner-LR5 pull-left padding-none">   
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
<div class="user-action pull-right dropdown-toggle" data-toggle-show="50" data-toggle-hide="30">
	<div class="menu-action">
		<i class="fa fa-user"><sup><i class="fa fa-gear"></i></sup></i>
		
	</div>
	<ul class="menu dropdown-menu" style="display:none">
		<li>
			<a href="<?=base_url();?>account/logout"><i class="fa fa-sign-out"></i></a>
		</li>
	</ul>
</div>
<div class="notifications pull-right">
	<li class="noti-item dropdown-toggle" data-toggle-show="66" data-toggle-hide="60">
		<a href="" class="noti-action alerts">
			<i class="fa fa-bell-o">
				<sup>
					<span class="noti-counts" id="ajax_notif_count" style="display:none">
						0
					</span>
				</sup>
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
</div>