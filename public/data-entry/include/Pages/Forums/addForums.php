<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Forums.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Add Forum Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsForums	= $dblms->querylms("SELECT id_frm FROM ".FORUMS." ORDER BY id_frm DESC LIMIT 1");
	$valueForums		= mysqli_fetch_array($sqllmsForums);
	$ForumsOrdering  = ($valueForums['id_frm']+1); 
//------------------------------------------------------------------------------------------------------------
echo'
<hr>

<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="frm_ordering" name="frm_ordering" value="'.$ForumsOrdering.'" tabindex="3" placeholder="Enter Ordering" autocomplete="off" readonly>
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="frm_name" name="frm_name" tabindex="2" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="frm_name_ur" name="frm_name_ur" tabindex="1" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->


<!--row-->
<div class="row">

<div class="col-md-6">
	<div class="form-group">
		<label style="color:red;">Logo size must be 300 * 300 </label>
		<input type="file" class="form-control" name="frm_photo" id="frm_photo" tabindex="4">
	</div>
</div>
	
	
<div class="col-md-6">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="frm_shown" name="frm_shown" style="width:100%" tabindex="5" autocomplete="off" required>';
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
		<a href="Forums.php" class="btn btn-default" tabindex="7">Cancel</a>
		<button type="submit" id="submit_forum" name="submit_forum" class="btn btn-success" tabindex="6">   Create Forum </button>
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
