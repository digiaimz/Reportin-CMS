<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".PROVINCES." SET   prov_shown		  	  	= '".cleanvars($_POST['prov_shown'])."'
															, prov_ordering		= '".cleanvars($_POST['prov_ordering'])."'
															, prov_name			= '".cleanvars($_POST['prov_name'])."'
															, prov_urdu			= '".cleanvars($_POST['prov_urdu'])."'
															, prov_tags			= '".cleanvars($_POST['prov_tags'])."'
															, id_modify			= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify		= NOW()
															WHERE id_prov		= '".cleanvars($_GET['id'])."'");


//----------------------------------------------------------
if(!empty($_FILES['prov_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['prov_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Provinces/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['prov_name'])).'_'.$_GET['id'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['prov_name'])).'_'.$_GET['id'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".PROVINCES."
														SET prov_photo   = '".$img_fileName."'
												 WHERE  id_prov		  = '".cleanvars($_GET['id'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['prov_photo']['tmp_name'],$originalImage);
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
	$sqllmsprovinces	= $dblms->querylms("SELECT * FROM ".PROVINCES." WHERE id_prov = '".cleanvars($_GET['id'])."' LIMIT 1");
	$valueprovinces	 = mysqli_fetch_array($sqllmsprovinces);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Provinces.php?view=modify&id='.$_GET['id'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Province Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="prov_ordering" name="prov_ordering" value="'.$valueprovinces['prov_ordering'].'" placeholder="Enter Ordering" autocomplete="off"> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="prov_name" name="prov_name" value="'.$valueprovinces['prov_name'].'" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="prov_urdu" name="prov_urdu" value="'.$valueprovinces['prov_urdu'].'" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<!--row-->
<div class="row">
<div class="input-group m-b-30 col-md-12 form-group">
	<span class="input-group-addon">Tags</span>
	<input type="text" data-role="tagsinput" id="prov_tags" name="prov_tags" value="'.$valueprovinces['prov_tags'].'" placeholder="add tags"> 
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
				if($itemadmstatus['status_id'] == $valueprovinces['prov_shown']) { 
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
		<a href="Provinces.php" class="btn btn-default">Cancel</a>
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
