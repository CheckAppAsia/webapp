<?php $cut_ruri = explode("/",$ruri); ?>
<div class="content_box">
	<div class="inner-all">
		<?php if($errorMessage!==FALSE){ ?>
		<div class="error_box">
			<i class="fa fa-exclamation-circle"></i> <?php echo $errorMessage; ?>
		</div>
		<?php } ?>
		<form method="post" action="">
			<h3>Branch Information</h3>
			<table>
				<tr>
					<td><h4>Branch Code : </h4></td>
					<td><input type="text" name="code" placeholder="Branch Code"></td>
				</tr>
				<tr>
					<td><h4>Branch Name : </h4></td>
					<td><input type="text" name="name" placeholder="Branch Name"></td>
				</tr>
				<tr>
					<td><h4>Address : </h4></td>
					<td><input type="text" name="address" placeholder="Address"></td>
				</tr>
				<tr>
					<td><h4>Contact Number : </h4></td>
					<td><input type="text" name="phone_number" placeholder="Contact Number"></td>
				</tr>
				<tr>
					<td><h4>Email Address : </h4></td>
					<td><input type="text" name="email_address" placeholder="Email Address"></td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
					<td colspan="2" align="left"><h3>Initial Branch User</h3></td>
				</tr>
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
						<input type="submit" name="submit" value="Create Branch" class="btn blue">
						<input type="button" onclick="window.location=('/dashboard/pharmacy/branches');" value="Back to List" class="btn blue">
					</td>
				</tr>
			</table>
			<input type="hidden" name="user_type" value="1">
			
			
		</form>
	</div>
</div>