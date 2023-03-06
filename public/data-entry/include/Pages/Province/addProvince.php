<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Provinces.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Province Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsProvinces	= $dblms->querylms("SELECT id_prov FROM ".PROVINCES." ORDER BY id_prov DESC LIMIT 1");
	$valueProvinces		= mysqli_fetch_array($sqllmsProvinces);
	$ProvincesOrdering  = ($valueProvinces['id_prov']+1); 
//------------------------------------------------------------------------------------------------------------
echo'
<hr>


<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="prov_ordering" name="prov_ordering" value="'.$ProvincesOrdering.'" placeholder="Enter Ordering" autocomplete="off" readonly> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="prov_name" name="prov_name" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="prov_urdu" name="prov_urdu" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<!--row-->
<div class="row">

<div class="input-group m-b-30 col-md-12">
	<span class="input-group-addon">Tags</span>
	<input type="text" data-role="tagsinput" id="prov_tags" name="prov_tags" placeholder="add tags"> 
</div>

</div>
<!--/row-->


<!--row-->
<div class="row">

<div class="col-md-6">
	<div class="form-group">
		<label style="color:red;">Logo size must be 300 * 300 </label>
		<input type="file" class="form-control" name="prov_photo" id="prov_photo">
	</div>
</div>
	
	
<div class="col-md-6">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="prov_shown" name="prov_shown" style="width:100%" autocomplete="off" required>';
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
		<a href="Provinces.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_provinces" name="submit_provinces" class="btn btn-success">   Create Province </button>
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
