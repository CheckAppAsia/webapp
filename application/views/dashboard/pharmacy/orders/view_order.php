<div class="content_box">
	<div class="inner-all">
		<h2>Order Status: <?=$txnWords[$order->status]?></h2><br />
		<h4>Order Reference Number: <?=$order->order_ref_no?></h4>
		<h4>Date of Transaction: <?=date('Y-m-d', $order->date_created)?></h4>
		
		<br />
		<table class="simple_table">
			<thead>
				<tr>
					<td></td>
					<td align="center"><span>Physician Information</span></td>
					<td align="center"><span>Patient Information</span></td>
				</tr>
			</thead>
			<tr>
				<td>Full Name</td>
				<td><?php echo $order->provider->first_name.' '.$order->provider->last_name.', '.$order->provider->title?></td>
				<td><?php echo $order->member->first_name.' '.$order->member->last_name?></td>
			</tr>
			<tr>
				<td>Contact Number</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>License Number</td>
				<td></td>
				<td align="center">-</td>
			</tr>
		</table>
		
		<br />
		Order Details - Medicines (Edit List)
		<table class="simple_table">
			<thead>
				<tr>
					<td>Generic Name</td>
					<td>Brand Name</td>
					<td>Quantity</td>
					<td>Amount</td>
					<td>Sub Total</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Ibuprofen</td>
					<td>Alaxan</td>
					<td>199</td>
					<td>10</td>
					<td>1990</td>
				</tr>
				<tr>
					<td>Ibuprofen</td>
					<td>Alaxan</td>
					<td>199</td>
					<td>10</td>
					<td>1990</td>
				</tr>
				<tr>
					<td>Ibuprofen</td>
					<td>Alaxan</td>
					<td>199</td>
					<td>10</td>
					<td>1990</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="right">Total:</td>
					<td>1000.00</td>
				</tr>
			</tfoot>
		</table>
		
		<br />
		Order Details - Others (Edit List)
		<table class="simple_table">
			<thead>
				<tr>
					<td>SKU Code</td>
					<td>Product Name</td>
					<td>Quantity</td>
					<td>Amount</td>
					<td>Sub Total</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Ibuprofen</td>
					<td>Alaxan</td>
					<td>199</td>
					<td>10</td>
					<td>1990</td>
				</tr>
				<tr>
					<td>Ibuprofen</td>
					<td>Alaxan</td>
					<td>199</td>
					<td>10</td>
					<td>1990</td>
				</tr>
				<tr>
					<td>Ibuprofen</td>
					<td>Alaxan</td>
					<td>199</td>
					<td>10</td>
					<td>1990</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="right">Total:</td>
					<td>1000.00</td>
				</tr>
				<tr>
					<td colspan="5">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4" align="right">Grand Total:</td>
					<td>1000.00</td>
				</tr>
				<tr>
					<td colspan="5">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" align="center">
						<a href="/dashboard/pharmacy/orders/process/<?=$order->order_ref_no?>"><span>Process Order</span></a>
						<a href="/dashboard/pharmacy/orders/cancel/<?=$order->order_ref_no?>"><span>Cancel Order</span></a>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>