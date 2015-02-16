<div class="header">
	<div class="navbar">
		<div class="container">
			<div class="navbar-left">
				<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets2/_theme/img/logo.png'); ?>" /></a>
			</div>
			<button class="navbar-toggle js-toggle" data-target=".navbar-right">
				<span class="icon-bar"> </span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-right collapse">
				<?php
				if($this->session->userdata('user_logged')){
					if($data['currentUser']['type']==1){
						$this->load->view('_layouts/sections/head_patient', $data);
					}else if($data['currentUser']['type']==2){
						$this->load->view('_layouts/sections/head_physician', $data);
					}
				}else{
					$this->load->view('_layouts/sections/head_login', $data);
				}
				?>
			</div>
		</div>
	</div>
</div>
<div class="body">
	
	<?php $this->load->view($view, $data); ?>
	
</div>
<div class="footer">
	<div class="container">
		<hr/>
		<span class="copy">&copy; CheckApp.asia 2014</span>
	</div>
</div>