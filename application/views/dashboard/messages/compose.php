<div class="col-separator-h"></div>
<div class="col-md-12 col-sm-12 margin-none" style="background:#fff;">
	<div class="margin-none">
		<div class="compose-box inner-all">
			<div class="form-group">
				<label class="col-md-2">To</label>
				<div class="col-md-10">
					<input value="<?=(isset($data['compose_to_name']) & isset($data['compose_to_id'])) ?  $data['compose_to_name'] :  "" ?>" class="form-control input-tx ui-autocomplete-input" type="text" placeholder="Recipient" id="to" name="to" autocomplete="off" />
					<input type="hidden" name="uid" id="uid" value="<?=$this->session->userdata['user_data']['id']?>" />
					<input type="hidden" name="to_uid" id="to_uid" value="<?=(isset($data['compose_to_id'])) ?  $data['compose_to_id'] :  "" ?>" />
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-separator-h"></div>
			<div class="form-group">
				<label class="col-md-2">Subject</label>
				<div class="col-md-10">
					<input type="text" id="subject" name="subject" placeholder="Subject" class="form-control" value="<?=(isset($data['compose_subject'])) ?  $data['compose_subject'] :  "" ?>">
				</div>
				<div class="clearfix"></div>
			</div>
				<div class="col-separator-h"></div>
			<div class="form-group">
				<label class="col-md-2">Body</label>
				<div class="col-md-10">
					<textarea type="text" name="message_body" id="message_body" placeholder="Message body" value="" class="form-control" required=""><?=(isset($data['compose_body'])) ?  $data['compose_body'] :  "" ?></textarea>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-separator-h"></div>
			<div class="adjust">
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<button type="submit" name="messageSendBtn" id="messageSendBtn" class="btn blue submit">
						<i class="fa fa-fw fa-check-square-o"></i>
						Send
					</button>
					<img src="<?=$this->config->base_url()?>assets2/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Sending"/>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
