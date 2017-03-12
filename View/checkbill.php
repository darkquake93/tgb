<?php
require_once "../Model/Billing.php";
include_once "../Controller/updateProfile.php";
//session_start();
if(isset($_SESSION['billObj'])){
?>
		<h1 style="display:inline"><a href="javascript:showhide('billTable')">Billing</a></h1>
<br />
		<div id="billTable" style="display:none;">
		<table width="50px">
				<tr>
					<td>
						<label for="l1">Address Line 1</label>
						<input type="text" id="l1" name="line1" form="update_info" value="<?= $billSess->Addressln1; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="l2">Address Line 2</label>
						<input type="text" id="l2" name="line2" form="update_info" value="<?= $billSess->Addressln2; ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="pc">PostCode</label>
						<input type="text" id="pc" name="postcode" form="update_info" value="<?= $billSess->Postcode; ?>">
					</td>
				</tr>
		</table>	
<button onclick="updateBill();<?php $sql->execute() ?>"><input type="submit" value="Update Billing" /></button>
		</div>
<?php } else { ?>

		<h1 style="display:inline"><a href="javascript:showhide('billTable')">Billing</a></h1>
<br />
		<div id="billTable" style="display:none;">
		<table width="50px">
				<tr>
					<td>
						<label for="l1">Address Line 1</label>
						<input type="text" id="l1" name="line1" form="update_info">
					</td>
				</tr>
				<tr>
					<td>
						<label for="l2">Address Line 2</label>
						<input type="text" id="l2" name="line2" form="update_info">
					</td>
				</tr>
				<tr>
					<td>
						<label for="pc">PostCode</label>
						<input type="text" id="pc" name="postcode" form="update_info">
					</td>
				</tr>
		</table>	
		<button onclick="createBill();<?php $sql->execute() ?>"><input type="submit" value="Create Billing" /></button>
		</div>
<?php } ?>

