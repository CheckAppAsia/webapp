<div class="content_box">
	<div class="inner-all">
		<h4>Order Lists</h4>
		<table class="simple_table">
			<thead>
				<tr>
					<td width="20%"><span>Date</span></td>
					<td width="20%"><span>Reference Number</span></td>
					<td width="15%"><span>Total Quantity</span></td>
					<td width="15%"><span>Total Amount</span></td>
					<td><span>Status</span></td>
					<td width="30%"><span>Action</span></td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$i = 0;
				foreach($orders as $order) : 
				$str = 'odd';
				if($i == 0) {
					$i = 1;
					$str = 'even';
				} else {
					$i = 0;
					$str = 'odd';
				}
				?>
				<tr class="<?php echo $str?>">
					<td>
						<span><?php echo date('Y-m-d', $order->date_created)?></span>
					</td>
					<td>
						<span><?php echo $order->order_ref_no?></span>
					</td>
					<td>
						<span><?php echo (isset($order->total_qty) ? $order->total_qty : '0');?></span>
					</td>
					<td>
						<span><?php echo (isset($order->total_amt) ? $order->total_amt : '0.00');?></span>
					</td>
					<td>
						<span><?php echo $txnWords[$order->status];?></span>
					</td>
					<td>
						<a href="/dashboard/pharmacy/orders/view/<?php echo $order->order_ref_no;?>"><span>Process Order</span></a>
						<a onclick="return window.confirm('Are you sure you want to cancel this order?');" href="/dashboard/pharmacy/orders/cancel/<?php echo $order->order_ref_no;?>"><span>Cancel Order</span></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>