<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".DISTRICTS." SET   id_zone		  	  		= '".cleanvars($_POST['id_zone'])."'
															 
															, dist_shown		= '".cleanvars($_POST['dist_shown'])."'
															, dist_ordering		= '".cleanvars($_POST['dist_ordering'])."'
															, dist_name			= '".cleanvars($_POST['dist_name'])."'
															, dist_name_ur		= '".cleanvars($_POST['dist_name_ur'])."'
															, id_modify			= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify		= NOW()
															WHERE id_dist		= '".cleanvars($_GET['Did'])."'");


//----------------------------------------------------------
if(!empty($_FILES['div_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['div_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Divisions/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['dist_name'])).'_'.$_GET['Did'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['dist_name'])).'_'.$_GET['Did'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".DISTRICTS."
														SET div_photo   = '".$img_fileName."'
												 WHERE  id_dist		  = '".cleanvars($_GET['Did'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['div_photo']['tmp_name'],$originalImage);
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
	$sqllmsDistricts	= $dblms->querylms("SELECT * FROM ".DISTRICTS." WHERE id_dist = '".cleanvars($_GET['Did'])."' LIMIT 1");
	$valueDistricts	 = mysqli_fetch_array($sqllmsDistricts);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Districts.php?view=modify&Did='.$_GET['Did'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Districts Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="dist_ordering" name="dist_ordering" tabindex="1" value="'.$valueDistricts['dist_ordering'].'" placeholder="Enter Ordering" autocomplete="off"> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="dist_name" name="dist_name" tabindex="2" value="'.$valueDistricts['dist_name'].'" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="dist_name_ur" name="dist_name_ur" tabindex="3" value="'.$valueDistricts['dist_name_ur'].'" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
 
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">
<div class="col-md-6">
	<div class="form-group">
		<label class="req" select2> Zone </label>
		<select class="form-control select2" id="id_zone" name="id_zone" style="width:100%" tabindex="4" autocomplete="off" required>
			<option value="">Select Zone</option>';
			  $sqllmsProvince	= $dblms->querylms("SELECT id_zone, zone_name FROM ".ZONES." WHERE zone_shown = '1' ORDER BY zone_name ASC");
		while($valueProvince	= mysqli_fetch_array($sqllmsProvince)) { 
			if($valueProvince['id_zone'] == $valueDistricts['id_zone']) { 
					echo '<option value="'.$valueProvince['id_zone'].'" selected>'.$valueProvince['zone_name'].'</option>';
				} else {
					echo '<option value="'.$valueProvince['id_zone'].'">'.$valueProvince['zone_name'].'</option>';
				}
			
			
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
				if($itemadmstatus['status_id'] == $valueDistricts['dist_shown']) { 
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

<div style="clear:both;"></div><br>

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Districts.php" class="btn btn-default" tabindex="9">Cancel</a>
		<button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes" tabindex="8"> <i class="fa fa-check"></i> Save Changes</button>
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
