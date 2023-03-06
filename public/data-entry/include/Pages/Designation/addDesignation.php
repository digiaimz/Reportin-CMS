<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Designation.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Add Designation Detail</h3>

<hr>

<!--row-->
<div class="row">

	<div class="col-md-3">
		<div class="form-group">
			<label class="req">Name</label>
			<input type="text" class="form-control" id="designation_name" name="designation_name" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
		<div class="col-md-3">
		<div class="form-group">
			<label class="req">Urdu Name</label>
			<input type="text" class="form-control" id="designation_name" name="urdu_name" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Code</label>
			<input type="text" class="form-control" id="designation_code" name="designation_code" placeholder="Enter Code" required autocomplete="off"> 
		</div>
	</div>

</div>
<!--/row-->

<!--row-->
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="designation_status" name="designation_status" style="width:100%" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				echo '<option value="'.$itemadmstatus['status_id'].'">'.$itemadmstatus['status_name'].'</option>';
			}
	echo'
			</select>
	</div>
</div>
</div>
<!--/row-->

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Designation.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_designation" name="submit_designation" class="btn btn-success">   Create Designation </button>
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
