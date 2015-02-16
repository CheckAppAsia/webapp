<div class="col-separator-h"></div>

<div class="col-sm-12">
	<div class="messages-box">
		
		<div class="col-sm-4">
			<div class="widget message-list">
				<!--
				<div class="inner-all">
					<div class="label label-default">INBOX</div>
					<span class="top-notify">You have <b>5 new</b> emails</span>
				</div>
				-->
				<div class="widget-body">
					<div class="list-group">
						
						<?php
							$counter=0;
							$tid;
							foreach($data['threads']['message'] as $thread){
								if(isset($_GET['mid'])){echo '<input type="hidden" id="initialtid" value="'.$_GET['mid'].'">';}
								else if($counter==0){echo '<input type="hidden" id="initialtid" value="'.$thread->tid.'">';}
						?>
								<div id="conversation-<?=$thread->tid?>" class="list-group-item inner-all <?php if($counter==0){echo "active";$counter=1;}else if($thread->seen==0){echo "unseen";}?>" onclick="selectThread(<?=$thread->tid?>);">
									<span class="timestamp pull-right">
									<?php
										$timestamp=strtotime($thread->created);
										$today = strtotime(date("M d")); // get date today and convert to timestamp
										$today = gmdate("M d", $today); // adjust timezone to patern with db data
										$today = strtotime($today); // convert again to timestamp

										if($today == strtotime(gmdate("M d", $timestamp))){
											echo gmdate("h:ia", $timestamp);
										}else{
											echo gmdate("M d, Y", $timestamp);
										}
									?>
									</span>
									<div class="avatar-box pull-left">
										<img src="<?=CA_Media::userpic($thread->filename,'50')?>" width="40px" height="40px"/>
									</div>
									<span class="username"><?php echo $thread->username?></span>
									<span class="subject"><?php echo $thread->subject?></span>
									<div class="clearfix"></div>
								</div>
						<?php
							}
							if(count($data['threads']['message'])==0){
								?>
								<div class="inner-all">
									<div class="label label-default"></div>
									<span class="top-notify">You have no messages.</span>
								</div>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-8">
			<div class="inner-all message-content">
				<div class="email-heading" >
					<?php if(count($data['threads']['message'])>0){ ?>
					<div class="reply">
						<textarea class="form-control" placeholder="enter message" id="replyMessage"></textarea>
						<button class="btn blue submit pull-right" id="messageReplyBtn">reply</button>
						<img src="<?=$this->config->base_url()?>assets2/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Sending"/>
						<div class="clearfix"></div>
					</div>
					<?php } ?>
					<div id="conversation-contents">
					</div>
					
					
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
	


<div class="clone thread" style="display:none">
	<div class='msgcontainer'>
		<span class='timestamp pull-right'></span>
		<img src="" class='avatar pull-left'/>
		<span class='username'></span>
		<p></p>
		<div class='clearfix'></div>
	</div>
</div>

<script>
    var sender = <?=$this->session->userdata['user_data']['id']?>;
    var sendername = "<?=$this->session->userdata['user_data']['username']?>";
</script>