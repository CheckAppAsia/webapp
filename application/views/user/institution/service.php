<div class="heading-box">
	<h4 class=" inner-all">Services </h4>
</div>
<div class="services">
	<ul>
		<?php foreach($allLabs as $lab){ if(in_array($lab->id, $yesLabs)){ ?>
		<li>
			<a class="btn blue pull-right action" href="">
				<i class="fa fa-pencil-square-o"></i> Book
			</a>
			<h4><?php echo $lab->name; ?></h4>
		</li>
		<?php }} ?>
	</ul>
</div>
<div class="separator bottom"></div>
<div class="separator bottom"></div>

<?php if(count($services)>0){ ?>
	<div class="heading-box">
		<h4 class=" inner-all">Other</h4>
	</div>
	<div class="services">
		<ul>
			<?php foreach($services as $service){ ?>
			<li>
				<h4><?php echo $service->name; ?></h4>
			</li>
			<?php } ?>
		</ul>
	</div>
<?php } ?>