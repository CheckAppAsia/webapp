<div class="notifs_box">
	<h4>Your Notifications</h4>
	<ul>
	<?php if(count($data['notifs'])>1){ ?>
		<?php
		$ncounter=0;
		foreach($data['notifs'] as $notification){
			$notif_data = 0;
			switch($notification['type']){
				case 1:
					@$notif_data = $notification['username'];
					$notif_text = "sent you a friend request";
				break;
				case 2:
					@$notif_data = $notification['username'];
					$notif_text = "accepted your friend request";
				break;
				case 3:
					@$notif_data = $notification['username'];
					$notif_text = "subscribed to you";
				break;
				case 4:
					@$notif_data = $notification['post_id'];
					$notif_text = "commented on your post";
				break;
				case 5:
					@$notif_data = $notification['post_id'];
					$notif_text = "posted on your wall";
				break;
				case 6:
					@$notif_data = $notification['actor'];
					$notif_text = "sent you a message";
				break;
				case 7:
					@$notif_data = $notification['username'];
					$notif_text = "requested a booking";
				break;
				case 8:
					@$notif_data = $notification['username'];
					$notif_text = "accepted your booking";
				break;
				default:
					$notif_text = "---";
				break;
			}
		?>
			<li class="media <?php echo ($notification['seen']==0)? "unseen" : "seen"?>" onclick="see_notification(<?=$notification['id']?>,<?=$notification['type']?>,'<?=$notif_data?>')">
				<a class="pull-left" href="">
					<img class="media-object thumb" src="<?=CA_Media::userpic($notification['filename'],'150');?>" width="40">
				</a>
				<div class="media-body">
					<p class="margin-none">
					<a href="<?=$this->config->base_url()?>user/<?=$notification['username']?>" class="username"><?=$notification['actor']?></a>
					<?=$notif_text?>
					</p>
					<span class="timestamp">
						<?php
						$timestamp=strtotime($notification['created']);
						echo gmdate("M d, y H:i", $timestamp);
						?>
					</span>
				</div>
			</li>
		<?php
			$ncounter++;
			if((count($data['notifs'])-1)<=$ncounter){
				break;
			}
		}
		?>
	<?php 
	}else{
		echo "<br/>You have 0 notifications.";
	}
	?>
	</ul>
</div>