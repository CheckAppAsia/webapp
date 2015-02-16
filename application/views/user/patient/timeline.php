<?php foreach($posts as $post){ ?>
	<div style="margin:0px auto 10px; background:#eee; border:1px solid #ccc; width:500px; font-family:Arial;">
		<div class="name" style="font-size:12px; font-weight:bold; color:#47a; height:20px; line-height:20px; border-bottom:1px solid #ccc; padding:0px 10px;">
			<?php echo $target_info->title.' '.$target_info->first_name.' '.$target_info->last_name; ?>
		</div>
		<div class="message" style="background:#f5f5f5; padding:5px 10px; font-size:12px; min-height:50px;">
			<?php echo $post['message']; ?>
		</div>
		<div class="date" style="color:#555; font-size:10px; height:14px; line-height:14px; padding:0px 10px; margin:0px 0px 10px 0px;"><?php echo date('M j, Y - H:i', strtotime($post['created'])); ?></div>
		
		<?php if(isset($post['likes'])){ ?>
		<div class="likes" style="height:20px; line-hight:20px; font-size:12px; margin:0px 10px;">
			<?php echo $post['likes']; ?> likes
		</div>
		<?php } ?>
		
		<div class="comments">
			<?php foreach($post['comments'] as $comment){ ?>
				<div class="comment" style="font-size:12px; background:#fff; margin:0px 10px 5px 10px;">
					<strong><?php echo $comment['user_id']; ?></strong><br />
					<?php echo $comment['message']; ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>