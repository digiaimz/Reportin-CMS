<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".TEHSILS." SET   id_dist		  	  		= '".cleanvars($_POST['id_dist'])."'
															, tsl_shown			= '".cleanvars($_POST['tsl_shown'])."'
															, tsl_ordering		= '".cleanvars($_POST['tsl_ordering'])."'
															, tsl_name			= '".cleanvars($_POST['tsl_name'])."'
															, tsl_name_ur		= '".cleanvars($_POST['tsl_name_ur'])."'
														 
														 
															WHERE id_tsl		= '".cleanvars($_GET['Tid'])."'");


//----------------------------------------------------------
if(!empty($_FILES['tsl_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['tsl_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Tehsils/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['tsl_name'])).'_'.$_GET['Tid'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['tsl_name'])).'_'.$_GET['Tid'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".TEHSILS."
														SET tsl_photo   = '".$img_fileName."'
												 WHERE  id_tsl		  = '".cleanvars($_GET['Tid'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['tsl_photo']['tmp_name'],$originalImage);
		chmod ($originalImage, octdec($mode));
//----------------------------------------------------------
	}
//----------------------------------------------------------
}
//----------------------------------------------------------
	if($sqllms) {
//----------------------------------------------------------
		echo '<div id="infoupdated" class="alert-box notice"><span>success: </span>Record updated successfully.</div>';
//--------------------------------------
	}
}
//------------------------------------------------------------------------------------------------------------
	$sqllmsTehsils	= $dblms->querylms("SELECT * FROM ".TEHSILS." WHERE id_tsl = '".cleanvars($_GET['Tid'])."' LIMIT 1");
	$valueTehsils	 = mysqli_fetch_array($sqllmsTehsils);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Tehsils.php?view=modify&Tid='.$_GET['Tid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit Tehsil Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="tsl_ordering" name="tsl_ordering" value="'.$valueTehsils['tsl_ordering'].'" placeholder="Enter Ordering" autocomplete="off"> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="tsl_name" name="tsl_name" value="'.$valueTehsils['tsl_name'].'" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="tsl_name_ur" name="tsl_name_ur" value="'.$valueTehsils['tsl_name_ur'].'" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<!--row-->
<div class="row">


<div class="col-md-4">
	<div class="form-group">
		<label class="req" select2> District </label>
		<select class="form-control select2" id="id_dist" name="id_dist" style="width:100%" autocomplete="off" required>
			<option value="">Select District</option>';
			  $sqllmsDistrict	= $dblms->querylms("SELECT id_dist, dist_name FROM ".DISTRICTS." WHERE dist_shown = '1' ORDER BY dist_name ASC");
		while($valueDistrict	= mysqli_fetch_array($sqllmsDistrict)) { 
			if($valueDistrict['id_dist'] == $valueTehsils['id_dist']) { 
					echo '<option value="'.$valueDistrict['id_dist'].'" selected>'.$valueDistrict['dist_name'].'</option>';
				} else {
					echo '<option value="'.$valueDistrict['id_dist'].'">'.$valueDistrict['dist_name'].'</option>';
				}
			
			
		}
echo'
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label style="color:red;">Logo size must be 300 * 300 </label>
		<input type="file" class="form-control" name="tsl_photo" id="tsl_photo">
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control select2" id="tsl_shown" name="tsl_shown" style="width:100%" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valueTehsils['tsl_shown']) { 
					echo '<option value="'.$itemadmstatus['status_id'].'" selected>'.$itemadmstatus['status_name'].'</option>';
				} else { 
					echo '<option value="'.$itemadmstatus['status_id'].'">'.$itemadmstatus['status_name'].'</option>';	
				}
			}
	echo'
			</select>
	</div>
</div>
</div>
<!--/row-->

</div>


</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Tehsils.php" class="btn btn-default">Cancel</a>
		<button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes"> <i class="fa fa-check"></i> Save Changes</button>
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
