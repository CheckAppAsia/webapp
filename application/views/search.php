<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiHQrdNPqPP6cuLr30YvY_rz7SfIqhtkQ&sensor=true"></script>

	
<form role="form" method="POST" action="<?php echo $this->config->base_url()?>search/results">
	<div class="top-option">
		<!--
		<div class="input-group">
			<span class="input-group-addon">Location</span>
			<input type="hidden" id="searchLat" name="searchLats" value="<?php if($data['sLat']!='14.6090537'){echo $data['sLat'];}else{echo '14.6090537';} ?>" />
			<input type="hidden" id="searchLng" name="searchLngs" value="<?php if($data['sLng']!='121.02225650000003'){echo $data['sLng'];}else{echo '121.02225650000003';} ?>" />
			<input class="form-control" type="text" name="searchLoc" id="searchLoc" autocomplete="off" placeholder="Location" value="<?php echo $data['sLoc']?>" />
		</div>
		-->
		<div class="input-group">
			<span class="input-group-addon">Radius</span>
			<select id="searchRad" name="searchRad" class="form-control">
				<option value="99999999999" selected> ~ KM </option>
				<option value="5"> 5 KM </option>
				<option value="10"> 10 KM </option>
				<option value="15"> 15 KM </option>
			</select>
		
			<?php if($this->session->userdata['user_logged']==1){ ?>
			<span class="input-group-addon">Type</span>
			<select id="searchType" name="searchType" class="form-control">
				<option value="0">All</option>
				<option value="1">Patient</option>
				<option value="2">Physician</option>
				<option value="3">Institution</option>
			</select>
			<?php } ?>
		</div>
	</div>
	<div class="input-group bottom-option">

		<input class="form-control" type="text" name="searchurus" id="searchurus" placeholder="Search here" value="<?php echo $data['sterm']?>">
			<span class="input-group-btn">
				<button class="btn blue margin-none" id="SearchuruBtn">Search</button>
			</span>
		</input>
	</div>

</form>
<br>
<div class="result-box inner-all">
	<?php if(count($data['sresults'])>0){ ?>

		<div class="row result-text inner-all">
			There are <?php echo count($data['sresults'])?> results for "<?php echo $data['sterm']?>".
		</div>
	<?php }else if(count($data['sresults'])==1){ ?>
		<div class="row result-text inner-all">
			There is 1 result for "<?php echo $data['sterm']?>".
		</div>
	<?php }else{ ?>
		<div class="row result-text inner-all">
			There are no results for "<?php echo $data['sterm']?>".
		</div>
	<?php } ?>
	
	<?php if(count($data['sresults'])>0){ ?>
		<?php foreach($data['sresults'] as $k=>$v){ ?>
			<?php
				if($v->profile_pic == null)
					$src_img = '//checkapp-sg.s3.amazonaws.com/userpic/150/default.jpg';
				else {
					$src_img = CA_Media::userpic($v->profile_pic,'150');//$this->photo->getPhoto("userpic",$row['filename']);
				}
				switch($row['user_type']){
					case 1: //patient
						$link = $this->config->base_url().'user/'.$v->username.'/profile';
					break;
					case 2: //physician
						$link = $this->config->base_url().'user/'.$v->username.'/profile';
					break;
					case 3: //institution
						$link = $this->config->base_url().'institution/'.$row['uid'];
					break;
				}
			?>
			<a href="<?php echo $link?>" >
				<div class="result-item">
					<div class="pull-left profile-pic">
						<img src="<?php echo $src_img?>">
					</div>
					<div class="result-item-info">
						<span class="full-name"><?php echo ($row['user_type']==2) ? '<i class="fa fa-user-md" ></i>' : "" ?><?php echo $v->title.' '.$v->first_name.' '.$v->last_name; ?></span>
						<br>
						<i class="fa fa-map-marker"></i>
						<?php echo $v->address.', '.$v->city.', '.$v->state; ?>
					</div>
					<div class="clear"></div>
				</div>
			</a>
		<?php } ?>
	<?php } ?>
</div>
