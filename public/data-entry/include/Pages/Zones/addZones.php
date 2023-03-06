<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Zones.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Add Zone Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsZones	= $dblms->querylms("SELECT id_zone FROM ".ZONES." ORDER BY id_zone DESC LIMIT 1");
	$valueZones		= mysqli_fetch_array($sqllmsZones);
	$ZonesOrdering  = ($valueZones['id_zone']+1); 
//------------------------------------------------------------------------------------------------------------
echo'
<hr>


<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="zone_ordering" name="zone_ordering" tabindex="1" value="'.$ZonesOrdering.'" placeholder="Enter Ordering" autocomplete="off" readonly> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="zone_name" name="zone_name" tabindex="2" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="zone_name_ur" name="zone_name_ur" tabindex="3" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<div style="clear:both;"></div><br>


<!--row-->
<div class="row">

<div class="col-md-4" style="display:none;">
	<div class="form-group" >
		<label class="req" select2> Province </label>
		<select class="form-control select2" id="id_prov" name="id_prov" style="width:100%" tabindex="4" autocomplete="off"  >
			<option value="0">Select Province</option>';
	 
echo'
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label style="color:red;">Logo size must be 300 * 300 </label>
		<input type="file" class="form-control" name="zone_photo" id="zone_photo" tabindex="5">
	</div>
</div>
	
	
<div class="col-md-4">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control select2" id="zone_shown" name="zone_shown" style="width:100%" tabindex="6" autocomplete="off" required>';
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
		<a href="Zones.php" class="btn btn-default" tabindex="8">Cancel</a>
		<button type="submit" id="submit_zone" name="submit_zone" class="btn btn-success" tabindex="7">   Create Zone </button>
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
