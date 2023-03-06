<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Districts.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Districts Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsDistricts	= $dblms->querylms("SELECT id_dist FROM ".DISTRICTS." ORDER BY id_dist DESC LIMIT 1");
	$valueDistricts		= mysqli_fetch_array($sqllmsDistricts);
	$DistrictsOrdering  = ($valueDistricts['id_dist']+1); 
//------------------------------------------------------------------------------------------------------------
echo'

<hr>


<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="dist_ordering" name="dist_ordering" value="'.$DistrictsOrdering.'" tabindex="1" placeholder="Enter Ordering" autocomplete="off" readonly> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="dist_name" name="dist_name" tabindex="2" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="dist_name_ur" name="dist_name_ur" tabindex="3" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<div style="clear:both;"></div><br>


<!--row-->
<div class="row">




</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">
<div class="col-md-6">
	<div class="form-group">
		<label class="req" select2> Zone</label>
		<select class="form-control  " id="id_zone " name="id_zone" style="width:100%" tabindex="4" autocomplete="off" required>
			<option value="">Select Zone</option>';
			  $sqllmsProvince	= $dblms->querylms("SELECT id_zone  , zone_name FROM ".ZONES." WHERE zone_shown = '1' ORDER BY zone_name ASC");
		while($valueProvince	= mysqli_fetch_array($sqllmsProvince)) { 
			echo '<option value="'.$valueProvince['id_zone'].'">'.$valueProvince['zone_name'].'</option>';
		}
echo'
		</select>
	</div>
</div>

 
<div class="col-md-3">
	<div class="form-group">
		<label style="color:red;">Logo size must be 300 * 300 </label>
		<input type="file" class="form-control" name="div_photo" id="div_photo" tabindex="6">
	</div>
</div>
	
	
<div class="col-md-3">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control select2" id="dist_shown" name="dist_shown" style="width:100%" tabindex="7" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				echo '<option value="'.$itemadmstatus['status_id'].'">'.$itemadmstatus['status_name'].'</option>';
			}
	echo'
			</select>
	</div>
</div>

</div>
<!--/row-->

<div style="clear:both;"></div><br>

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Districts.php" class="btn btn-default" tabindex="9">Cancel</a>
		<button type="submit" id="submit_zone" name="submit_zone" class="btn btn-success" tabindex="8">   Create Districts </button>
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
