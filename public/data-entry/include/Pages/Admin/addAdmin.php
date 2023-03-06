<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Admins.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="text-align:center;"> Admin Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsAdmins	= $dblms->querylms("SELECT emply_id FROM ".ADMINS." ORDER BY emply_id DESC LIMIT 1");
	$valueAdmins	= mysqli_fetch_array($sqllmsAdmins);
	$EmployeeNumber = "Dawat-100".($valueAdmins['emply_id']+1); 
//------------------------------------------------------------------------------------------------------------
echo'
<hr>

<!--row-->
<div class="row">

	<div class="col-md-2">
		<div class="form-group">
			<label>Employee #</label>
			<input type="text" class="form-control" id="emply_no" name="emply_no" value="'.$EmployeeNumber.'" readonly required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
			<label class="req"> Employee Type </label>
			<select class="form-control" id="emply_type" name="emply_type" style="width:100%" autocomplete="off" required>';
			foreach($admtypes as $itemadmtypes) {
				echo '<option value="'.$itemadmtypes['id'].'">'.$itemadmtypes['name'].'</option>';
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
			<label class="req">Employee Accesee</label>
			<select class="form-control" id="emply_access" name="emply_access" style="width:100%" autocomplete="off" required>';
			foreach($statusyesno as $itemstatusyesno) {
				echo '<option value="'.$itemstatusyesno['id'].'">'.$itemstatusyesno['name'].'</option>';
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label class="req"> Username </label>
			<input type="text" class="form-control" id="emply_username" name="emply_username" placeholder="Enter Username" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label class="req"> Password </label>
			<input type="password" class="form-control" id="emply_userpass" name="emply_userpass" placeholder="Enter Password" required autocomplete="off">
		</div>
	</div>
	

</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">

	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Employee Full Name </label>
			<input type="text" class="form-control" id="emply_fullname" name="emply_fullname" placeholder="Enter Full Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Father Name </label>
			<input type="text" class="form-control" id="emply_fathername" name="emply_fathername" placeholder="Enter Father Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Phone # </label>
			<input type="text" class="form-control" id="emply_phone" name="emply_phone" placeholder="Enter Phone #" autocomplete="off">
		</div>
	</div>
	
</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">
	
	<div class="col-md-4">
		<div class="form-group">
			<label> District </label>
			<select class="form-control select2" id="id_district" name="id_district" autocomplete="off">
				<option value="">Select District</option>';
				  $sqllmsDistrict	= $dblms->querylms("SELECT id_dist, dist_name FROM ".DISTRICTS." WHERE dist_shown = '1' ORDER BY dist_name ASC");
			while($valueDistrict	= mysqli_fetch_array($sqllmsDistrict)) { 
				echo '<option value="'.$valueDistrict['id_dist'].'">'.$valueDistrict['dist_name'].'</option>';
			}
	echo'
			</select>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label> Forum </label>
			<select class="form-control select2" id="id_forum" name="id_forum" autocomplete="off">
				<option value="">Select Forum</option>';
				  $sqllmsForum	= $dblms->querylms("SELECT id_frm, frm_name FROM ".FORUMS." WHERE frm_shown = '1' ORDER BY frm_ordering ASC");
			while($valueForum	= mysqli_fetch_array($sqllmsForum)) { 
				echo '<option value="'.$valueForum['id_frm'].'">'.$valueForum['frm_name'].'</option>';
			}
	echo'
			</select>
		</div>
	</div>
	
</div>
<!--/row-->


<div style="clear:both;"></div>

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Admins.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_Admin" name="submit_Admin" class="btn btn-success">   Create Admin </button>
	</div>
	
</form>
<!-----------------Form End--------------->
</div>
</div>
</div>
</div>
</div>
<!--./row-->

</div>
</div>
<!-- Page Content -->';
?>
