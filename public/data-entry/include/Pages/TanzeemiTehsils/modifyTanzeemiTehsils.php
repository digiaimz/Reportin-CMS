<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".TANZEEMI_TEHSILS." SET   id_mdist		  	= '".cleanvars($_POST['id_mdist'])."'
															, mtsl_shown		= '".cleanvars($_POST['mtsl_shown'])."'
															, mtsl_ordering		= '".cleanvars($_POST['mtsl_ordering'])."'
															, mtsl_name			= '".cleanvars($_POST['mtsl_name'])."'
															, mtsl_name_ur		= '".cleanvars($_POST['mtsl_name_ur'])."'
															, id_modify			= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify		= NOW()
															WHERE id_mtsl		= '".cleanvars($_GET['id'])."'");


//----------------------------------------------------------
if(!empty($_FILES['mtsl_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['mtsl_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/TanzeemiTehsils/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['mtsl_name'])).'_'.$_GET['id'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['mtsl_name'])).'_'.$_GET['id'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".TANZEEMI_TEHSILS."
														SET mtsl_photo   = '".$img_fileName."'
												 WHERE  id_mtsl		  = '".cleanvars($_GET['id'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['mtsl_photo']['tmp_name'],$originalImage);
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
	$sqllmsTanzeemiTehsils	= $dblms->querylms("SELECT * FROM ".TANZEEMI_TEHSILS." WHERE id_mtsl = '".cleanvars($_GET['id'])."' LIMIT 1");
	$valueTanzeemiTehsils	 = mysqli_fetch_array($sqllmsTanzeemiTehsils);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="TanzimeTehsils.php?view=modify&id='.$_GET['id'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Tanzeemi Tehsils Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="mtsl_ordering" name="mtsl_ordering" value="'.$valueTanzeemiTehsils['mtsl_ordering'].'" placeholder="Enter Ordering" autocomplete="off"> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="mtsl_name" name="mtsl_name" value="'.$valueTanzeemiTehsils['mtsl_name'].'" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> UR Name</label>
			<input type="text" class="form-control" id="mtsl_name_ur" name="mtsl_name_ur" value="'.$valueTanzeemiTehsils['mtsl_name_ur'].'" placeholder="Enter UR Name" autocomplete="off">
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
			if($valueDistrict['id_dist'] == $valueTanzeemiTehsils['id_mdist']) { 
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
		<input type="file" class="form-control" name="mtsl_photo" id="mtsl_photo">
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control select2" id="mtsl_shown" name="mtsl_shown" style="width:100%" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valueTanzeemiTehsils['mtsl_shown']) { 
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
		<a href="TanzimeTehsils.php" class="btn btn-default">Cancel</a>
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
