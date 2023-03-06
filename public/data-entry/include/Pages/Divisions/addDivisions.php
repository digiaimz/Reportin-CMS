<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Divisions.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Division Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsDivisions	= $dblms->querylms("SELECT id_div FROM ".DIVISIONS." ORDER BY id_div DESC LIMIT 1");
	$valueDivisions		= mysqli_fetch_array($sqllmsDivisions);
	$DivisionsOrdering  = ($valueDivisions['id_div']+1); 
//------------------------------------------------------------------------------------------------------------
echo'

<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="div_ordering" name="div_ordering" value="'.$DivisionsOrdering.'" placeholder="Enter Ordering" autocomplete="off" readonly> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="div_name" name="div_name" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="div_name_ur" name="div_name_ur" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<div style="clear:both;"></div><br>


<!--row-->
<div class="row">

<div class="col-md-6">
	<div class="form-group">
		<label class="req" select2> Province </label>
		<select class="form-control select2" id="id_prov" name="id_prov" style="width:100%" autocomplete="off" required>
			<option value="">Select Province</option>';
			  $sqllmsProvince	= $dblms->querylms("SELECT id_prov, prov_name FROM ".PROVINCES." WHERE prov_shown = '1' ORDER BY prov_name ASC");
		while($valueProvince	= mysqli_fetch_array($sqllmsProvince)) { 
			echo '<option value="'.$valueProvince['id_prov'].'">'.$valueProvince['prov_name'].'</option>';
		}
echo'
		</select>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label class="req" select2> Zone </label>
		<select class="form-control select2" id="id_zone" name="id_zone" style="width:100%" autocomplete="off" required>
			<option value="">Select Zone</option>';
			  $sqllmsZone	= $dblms->querylms("SELECT id_zone, zone_name FROM ".ZONES." WHERE zone_shown = '1' ORDER BY zone_name ASC");
		while($valueZone	= mysqli_fetch_array($sqllmsZone)) { 
			echo '<option value="'.$valueZone['id_zone'].'">'.$valueZone['zone_name'].'</option>';
		}
echo'
		</select>
	</div>
</div>


</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">

<div class="col-md-6">
	<div class="form-group">
		<label style="color:red;">Logo size must be 300 * 300 </label>
		<input type="file" class="form-control" name="div_photo" id="div_photo">
	</div>
</div>
	
	
<div class="col-md-6">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control select2" id="div_shown" name="div_shown" style="width:100%" autocomplete="off" required>';
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
		<a href="Divisions.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_zone" name="submit_zone" class="btn btn-success">   Create Division </button>
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
