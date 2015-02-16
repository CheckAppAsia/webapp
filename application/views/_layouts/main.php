<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="content-language" content="en">
		<title><?php echo $title; ?></title>
		<?php
		$this->carabiner->css('_theme/css/_min.css');
		$this->carabiner->css('_theme/css/style.css');
		$this->carabiner->css('search.css');

		if($this->session->userdata('user_logged')) {
			$this->carabiner->css('../chat/css/chat.css');
			$this->carabiner->css('../chat/css/screen.css');
		}

		$this->carabiner->display('css');
		?>
	</head>
	<body>
		<?php $this->load->view($layout, array('view' => $view,'data' => $data)); ?>
		
		<div class="lightbox-bg" style="display:none"></div>

		<script>
			var baseUrl = "<?php echo base_url(); ?>";
			var mediaUrl = "<?php echo CA_Media::base(); ?>";
			var loggedIn = <?=($this->session->userdata('user_logged'))? 1 : 0 ?>;
			var base_s3 = "<?=CA_Media::base()?>";
			var ip_latitude=0;
			var ip_longitude=0;

			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition);
				} else { 
					x.innerHTML = "Geolocation is not supported by this browser.";
				}
			}

			function showPosition(position) {
				ip_latitude = position.coords.latitude;
				ip_longitude = position.coords.longitude;	
				$("#ip_latitude").val(position.coords.latitude);
				$("#ip_longitude").val(position.coords.longitude);
			}
			
		</script>
		<input type="hidden" id="ip_latitude" name="ip_latitude" value=0 />
		<input type="hidden" id="ip_longitude" name="ip_longitude" value=0 />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_theme/js/_min.js"></script>
		<?php
			$segs = $this->uri->segment_array();
			$segs1 = (isset($segs[1])) ? $segs[1] : "";
			$segs3 = (isset($segs[3])) ? $segs[3] : "";
			if($segs1=="dashboard" && $segs3=="overview"){
		?>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_util/highcharts.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_util/exporting.js"></script>
		<?php } ?>
		<?php
		$this->carabiner->js('_util/ajax.js');
		$this->carabiner->js('_util/alert_r.js');
		$this->carabiner->js('_theme/js/global.js');
		$this->carabiner->js('search.js');

		if($this->session->userdata('user_logged')) {
			$this->carabiner->js('../chat/js/chat.js');
		}

		$this->carabiner->display('js');
		$this->carabiner->empty_cache('both', 'yesterday');
		?>
	</body>
</html>
