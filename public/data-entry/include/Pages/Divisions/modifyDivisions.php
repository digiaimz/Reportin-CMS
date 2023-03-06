<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".DIVISIONS." SET   id_prov		  	  		= '".cleanvars($_POST['id_prov'])."'
															, id_zone			= '".cleanvars($_POST['id_zone'])."'
															, div_shown			= '".cleanvars($_POST['div_shown'])."'
															, div_ordering		= '".cleanvars($_POST['div_ordering'])."'
															, div_name			= '".cleanvars($_POST['div_name'])."'
															, div_name_ur		= '".cleanvars($_POST['div_name_ur'])."'
															, id_modify			= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify		= NOW()
															WHERE id_div		= '".cleanvars($_GET['id'])."'");


//----------------------------------------------------------
if(!empty($_FILES['div_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['div_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Divisions/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['div_name'])).'_'.$_GET['id'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['div_name'])).'_'.$_GET['id'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".DIVISIONS."
														SET div_photo   = '".$img_fileName."'
												 WHERE  id_div		  = '".cleanvars($_GET['id'])."'");
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
	$sqllmsDivision	= $dblms->querylms("SELECT * FROM ".DIVISIONS." WHERE id_div = '".cleanvars($_GET['id'])."' LIMIT 1");
	$valueDivision	 = mysqli_fetch_array($sqllmsDivision);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Divisions.php?view=modify&id='.$_GET['id'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;">Division Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="div_ordering" name="div_ordering" value="'.$valueDivision['div_ordering'].'" placeholder="Enter Ordering" autocomplete="off"> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="div_name" name="div_name" value="'.$valueDivision['div_name'].'" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="div_name_ur" name="div_name_ur" value="'.$valueDivision['div_name_ur'].'" placeholder="Enter UR Name" required autocomplete="off">
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
			if($valueProvince['id_prov'] == $valueDivision['id_prov']) { 
					echo '<option value="'.$valueProvince['id_prov'].'" selected>'.$valueProvince['prov_name'].'</option>';
				} else {
					echo '<option value="'.$valueProvince['id_prov'].'">'.$valueProvince['prov_name'].'</option>';
				}
			
			
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
			if($valueZone['id_zone'] == $valueDivision['id_zone']) { 
					echo '<option value="'.$valueZone['id_zone'].'" selected>'.$valueZone['zone_name'].'</option>';
				} else {
					echo '<option value="'.$valueZone['id_zone'].'">'.$valueZone['zone_name'].'</option>';
				}
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
				if($itemadmstatus['status_id'] == $valueDivision['div_shown']) { 
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
		<a href="Divisions.php" class="btn btn-default">Cancel</a>
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
