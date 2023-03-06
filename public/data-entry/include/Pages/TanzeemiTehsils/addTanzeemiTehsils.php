<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="TanzimeTehsils.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Tanzeemi Tehsils Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsTanzimeTehsils	= $dblms->querylms("SELECT id_mtsl FROM ".TANZEEMI_TEHSILS." ORDER BY id_mtsl DESC LIMIT 1");
	$valueTanzimeTehsils	= mysqli_fetch_array($sqllmsTanzimeTehsils);
	$TanzimeTehsilsOrdering = ($valueTanzimeTehsils['id_mtsl']+1); 
//------------------------------------------------------------------------------------------------------------
echo'
<hr>


<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="mtsl_ordering" name="mtsl_ordering" placeholder="Enter Ordering" value="'.$TanzimeTehsilsOrdering.'" autocomplete="off" readonly> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="mtsl_name" name="mtsl_name" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="mtsl_name_ur" name="mtsl_name_ur" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->


<!--row-->
<div class="row">

<div class="col-md-4">
	<div class="form-group">
		<label class="req" select2> District </label>
		<select class="form-control select2" id="id_mdist" name="id_mdist" style="width:100%" autocomplete="off" required>
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
		<label style="color:red;">Logo size must be 300 * 300 </label>
		<input type="file" class="form-control" name="mtsl_photo" id="mtsl_photo">
	</div>
</div>
	
	
<div class="col-md-4">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control select2" id="mtsl_shown" name="mtsl_shown" style="width:100%" autocomplete="off" required>';
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
		<a href="TanzimeTehsils.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_TanzeemiTehsils" name="submit_TanzeemiTehsils" class="btn btn-success">   Create Tanzeemi Tehsils </button>
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
