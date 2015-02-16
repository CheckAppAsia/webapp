<script>
	baseUrl = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_theme/js/_min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_theme/js/jquery.form.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_theme/js/cropper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/_util/photohandler.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets2/physician/verifications.js"></script>

<link href="<?=$this->config->base_url()?>assets2/_theme/css/pstyle.css" rel="stylesheet" type="text/css">
<link href="<?=$this->config->base_url()?>assets2/_theme/css/cropper.min.css" rel="stylesheet" type="text/css">

<body>
	<div>
		<div id="upload-wrapper">
			<button id="closeBtn" class="submit-btn" style="position:relative;left:540px;top:-65px" onclick="window.parent.document.getElementById('photo_handler_container').style.display = 'none'; ">X</button>
			<div align="center">
				<form action="<?=$this->config->base_url()?>photohandler/processupload" method="post" enctype="multipart/form-data" id="MyUploadForm">
					<input name="ImageFile" id="imageInput" type="file" />
					<input type="submit"  id="submit-btn" class="submit-btn" value="Upload" />
					<img src="<?=$this->config->base_url()?>assets2/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
				</form>
				<div id="output"></div>
				
			</div>
			<div style="clear:both"></div>
			<br/>
			<br/>
			<button id="cropBtn" class="submit-btn">Save</button><img src="<?=$this->config->base_url()?>assets2/img/ajax-loader.gif" id="loading-crop" style="display:none;" alt="Please Wait"/><button id="done" class="submit-btn">Done</button>
		</div>
		<div style="clear:both"></div>
	</div>
</body>