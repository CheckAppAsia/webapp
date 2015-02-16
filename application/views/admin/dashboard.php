<div class="admin container">

	<?php $this->load->view('admin/links', $active);?>
	
	<div class="col-sm-9 admin-content">
		<div class="mid_content inner-all">
			<?php if(count($patients) > 0) { ?>
			<!-- temporary shitness for patients -->
			<table class="simple_table">
				<thead>
					<tr>
						<td>Name</td>
						<td>Date Registered</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($patients as $pat) : ?>
						<tr>
							<td><span class="txt"><?php debug($pat);echo $pat->first_name.' '.$pat->last_name;?></span></td>
							<td><span class="txt"><?php echo $pat->created;?></span></td>
							<td><span class="txt"><?php echo $phy->status;?></span></td>
							<td>
								<span class="txt">
									<a href="">View</a>
									|
									<a href="">Verify</a>
								</span>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<?php } ?>


			<!-- temporary shitness for physicians -->
			<?php if(count($physicians) > 0) { ?>
			<table class="simple_table">
				<thead>
					<tr>
						<td>Name</td>
						<td>Specialization</td>
						<td>Date Registered</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($physicians as $phy) : 
						$phyStat = $status[(int)$phy->status];
					?>
						<tr>
							<td><span class="txt"><?php echo $phy->first_name.' '.$phy->last_name;?></span></td>
							<td><span class="txt"><?php echo $phy->specialization_1;?></span></td>
							<td><span class="txt"><?php echo $phy->created;?></span></td>
							<td><span class="txt"><?php echo $phyStat;?></span></td>
							<td>
								<span class="txt">
									<a href="">View</a>
									<?php if((int)$phy->status == 2) :?>
									|
									<a href="/admin/physician/verify/<?php echo $phy->id?>">Verify</a>
									<?php endif;?>
								</span>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
	
</div>