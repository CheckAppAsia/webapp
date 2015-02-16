<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="content-language" content="en">
		<title><?php echo $title; ?></title>
		<?php
		$this->carabiner->css('_theme/css/_min.css');
		$this->carabiner->css('_theme/css/style.css');
		$this->carabiner->css('_theme/css/admin.css');
		$this->carabiner->display('css');
		?>
	</head>
	<body>
		<div class="header">
			<div class="navbar">
				<div class="container">
					<div class="navbar-left">
						<a class="navbar-brand" href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url('assets2/img/system/logo.png'); ?>" />
							<span>Administrator Site</span>
						</a>
					</div>
					<div class="navbar-right collapse">
						<?php
						if($this->session->userdata('admin_logged')){
							$this->load->view('_layouts/sections/admin/head_logged', $data);
						}else{
							$this->load->view('_layouts/sections/admin/head_login', $data);
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view($view, $data); ?>
		
		<div class="lightbox-bg" style="display:none"></div>
        
		<script>
			var baseUrl = "<?php echo base_url(); ?>";
			var mediaUrl = "<?php echo CA_Media::base(); ?>";
			var loggedIn = <?php echo ($this->session->userdata('user_logged'))? 1 : 0 ?>;
			var base_s3 = "<?php echo CA_Media::base()?>";
		</script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_theme/js/_min.js"></script>
		<?php
		$this->carabiner->js('_theme/js/global.js');
		$this->carabiner->display('js');
		$this->carabiner->empty_cache('both', 'yesterday');
		?>
	</body>
</html>