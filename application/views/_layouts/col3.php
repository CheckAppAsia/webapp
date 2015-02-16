<div class="header">
	<div class="navbar">
		<div class="container">
			<div class="navbar-left screen_hidder screen_show_md">
				<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets2/_theme/img/logo.png'); ?>" /></a>
			</div>
			<button class="sidebar_left navbar-toggle js-toggle pull-left">
				<span class="icon-bar"> </span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
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
			<button class="sidebar_right navbar-toggle js-toggle pull-right">
				<i class="fa fa-group"></i>
			</button>
			<div class="navbar-right collapse logged">
				<?php
				if($this->session->userdata('user_logged')){
					if($data['currentUser']['type']==1){
						$this->load->view('_layouts/sections/head_patient', $data);
					}else if($data['currentUser']['type']==2){
						$this->load->view('_layouts/sections/head_physician', $data);
					}else if($data['currentUser']['type']==3){
						$this->load->view('_layouts/sections/head_institution', $data);
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
	
	<div class="container layout-app">
		<div class="row row-app">
			
			<!-- COLUMN: LEFT -->
			<div class="col-md-2 screen_hidder screen_show_md">
				<!-- SECTION: PIC -->
				<?php $this->load->view('_layouts/sections/pic_self', $data); ?>
				
				<div class="col-separator-h"></div>
				
				<!-- SECTION: SIDE -->
				<?php if(isset($data['currentUser']['id'])){ ?>
					<?php $this->load->view('_layouts/sections/side_'.$data['currentUser']['utype'], $data); ?>
				<?php } ?>
			</div>
			
			<!-- COLUMN: MIDDLE -->
			<?php
				$segs = $this->uri->segment_array();
				$segs3 = (isset($segs[3])) ? $segs[3] : "";
			?>
			<div class="col-md-10 col-sm-12" style="display:inline-block;">
				<div class="col-separator" style="display:inline-block;">
				</div>
				<div class="mid_content">
			
					<!-- SECTION: ALERTS -->
					<div class="col-md-12 col-sm-12">
						<?php $this->load->view('_layouts/sections/top_flashmsg', $data); ?>
					</div>
				
					<!-- SECTION: TOP -->
					<?php if(isset($data['topnav'])){ ?>
					<div class="col-md-12 col-sm-12 topnav">
						<?php $this->load->view('_layouts/sections/'.$data['topnav'], $data); ?>
					</div>
					<?php } ?>
					
					<!-- SECTION: CONTENT -->
					<div class="col-md-12 col-sm-12">
						<?php $this->load->view($view, $data); ?>
					</div>

				</div> <!-- .mid_content -->
			</div> <!-- .col-md-10.col-sm-12 -->
			
			<!-- COLUMN: RIGHT -->
			
			<?php /* if($segs[1]=="dashboard" && $segs3=="overview"){}else{ ?>
			<div class="col-md-3 col-sm-12">
				<div class="col-separator">
					<!-- SECTION: CHAT -->
					<div class="col-md-12 col-sm-12">
						<?php //$this->load->view('_layouts/sections/right_chat', $data); ?>
					</div>
					
				</div>
			</div>
			<?php } */ ?>
			
		</div>
	</div>
	
</div>

<div class="footer screen_hidder screen_show_md">
	<div class="container">
		<hr/>
		<span class="copy">&copy; CheckApp.asia 2014</span>
	</div>
</div>

<div class="navbar_bottom">
	<div class="action">
		<i class="cus_icon msgs"></i>
	</div>
	<div class="action">
		<i class="cus_icon notifs"></i>
	</div>
	<div class="action">
		<i class="cus_icon profile_percentage"></i>
	</div>
</div>

<div class="friends_widget">
	friends list goes here...
</div>
