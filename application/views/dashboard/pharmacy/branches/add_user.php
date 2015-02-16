<?php $cut_ruri = explode("/",$ruri); ?>
<div class="content_box">
	<div class="inner-all">
		<?php if($errorMessage!==FALSE){ ?>
		<div class="error_box">
			<i class="fa fa-exclamation-circle"></i> <?php echo $errorMessage; ?>
		</div>
		<?php } ?>
		<form method="post" action="">
			<h3>Branch User Information</h3>
			<table>
				<tr>
					<td><h4>First Name : </h4></td>
					<td><input type="text" name="fname" placeholder="First Name"></td>
				</tr>
				<tr>
					<td><h4>Last Name : </h4></td>
					<td><input type="text" name="lname" placeholder="Last Name"></td>
				</tr>
				<tr>
					<td><h4>Email Address : </h4></td>
					<td><input type="text" name="bemail_address" placeholder="User Email Address"></td>
				</tr>
				<tr>
					<td><h4>Username : </h4></td>
					<td><input type="text" name="username" placeholder="Username"></td>
				</tr>
				<tr>
					<td><h4>Password : </h4></td>
					<td><input type="password" name="password" placeholder="Password"></td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Create Branch User" class="btn blue">
						<input type="button" onclick="window.location=('/dashboard/pharmacy/branches/view/<?php echo $branch->branch_id?>/users');" value="Back to User List" class="btn blue">
					</td>
				</tr>
			</table>
			<input type="hidden" name="user_type" value="1">
			<input type="hidden" name="pharma_id" value="<?php echo $branch->pharma_id?>">
			<input type="hidden" name="branch_id" value="<?php echo $branch->branch_id?>">
			
			
		</form>
	</div>
</div>