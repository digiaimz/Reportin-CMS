<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".ZONES." SET   id_prov		  	  			= '".cleanvars($_POST['id_prov'])."'
															, zone_shown		= '".cleanvars($_POST['zone_shown'])."'
															, zone_ordering		= '".cleanvars($_POST['zone_ordering'])."'
															, zone_name			= '".cleanvars($_POST['zone_name'])."'
															, zone_name_ur		= '".cleanvars($_POST['zone_name_ur'])."'
														 
														 
															WHERE id_zone		= '".cleanvars($_GET['Zid'])."'");


//----------------------------------------------------------
if(!empty($_FILES['zone_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['zone_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Zones/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['zone_name'])).'_'.$_GET['Zid'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['zone_name'])).'_'.$_GET['Zid'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".ZONES."
														SET zone_photo   = '".$img_fileName."'
												 WHERE  id_zone		  = '".cleanvars($_GET['Zid'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['zone_photo']['tmp_name'],$originalImage);
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
	$sqllmszones	= $dblms->querylms("SELECT * FROM ".ZONES." WHERE id_zone = '".cleanvars($_GET['Zid'])."' LIMIT 1");
	$valuezones	 = mysqli_fetch_array($sqllmszones);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Zones.php?view=modify&Zid='.$_GET['Zid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit Zone Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="zone_ordering" name="zone_ordering" tabindex="1" value="'.$valuezones['zone_ordering'].'" placeholder="Enter Ordering" autocomplete="off"> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="zone_name" name="zone_name" tabindex="2" value="'.$valuezones['zone_name'].'" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="zone_name_ur" name="zone_name_ur" tabindex="3" value="'.$valuezones['zone_name_ur'].'" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">


<div class="col-md-4" style="display:none;" >
	<div class="form-group">
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
				if($itemadmstatus['status_id'] == $valuezones['zone_shown']) { 
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
		<a href="Zones.php" class="btn btn-default" tabindex="8">Cancel</a>
		<button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes" tabindex="7"> <i class="fa fa-check"></i> Save Changes</button>
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
