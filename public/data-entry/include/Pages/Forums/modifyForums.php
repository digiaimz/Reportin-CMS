<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".FORUMS." SET   frm_shown		  	  		= '".cleanvars($_POST['frm_shown'])."'
															, frm_ordering		= '".cleanvars($_POST['frm_ordering'])."'
															, frm_name			= '".cleanvars($_POST['frm_name'])."'
															, frm_name_ur		= '".cleanvars($_POST['frm_name_ur'])."'
															, frm_code			= '".cleanvars($_POST['frm_code'])."'
															, id_modify			= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify		= NOW()
															WHERE id_frm		= '".cleanvars($_GET['Fid'])."'");


//----------------------------------------------------------
if(!empty($_FILES['frm_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['frm_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Forums/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['frm_name'])).'_'.$_GET['Fid'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['frm_name'])).'_'.$_GET['Fid'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".FORUMS."
														SET frm_photo   = '".$img_fileName."'
												 WHERE  id_frm		  = '".cleanvars($_GET['Fid'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['frm_photo']['tmp_name'],$originalImage);
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
	$sqllmsForums	= $dblms->querylms("SELECT * FROM ".FORUMS." WHERE id_frm = '".cleanvars($_GET['Fid'])."' LIMIT 1");
	$valueForums	 = mysqli_fetch_array($sqllmsForums);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Forums.php?view=modify&Fid='.$_GET['Fid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit Forum Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Ordering </label>
			<input type="text" class="form-control" id="frm_ordering" name="frm_ordering" tabindex="3" value="'.$valueForums['frm_ordering'].'" placeholder="Enter Ordering" autocomplete="off"> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> EN Name</label>
			<input type="text" class="form-control" id="frm_name" name="frm_name" tabindex="2" value="'.$valueForums['frm_name'].'" placeholder="Enter EN Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> UR Name</label>
			<input type="text" class="form-control" id="frm_name_ur" name="frm_name_ur" tabindex="1" value="'.$valueForums['frm_name_ur'].'" placeholder="Enter UR Name" required autocomplete="off">
		</div>
	</div>
	


</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Short Code </label>
			<input type="text" class="form-control" id="frm_code" name="frm_code" value="'.$valueForums['frm_code'].'" placeholder="Enter Short Code" autocomplete="off">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label style="color:red;">Logo size must be 300 * 300 </label>
			<input type="file" class="form-control" name="frm_photo" id="frm_photo" tabindex="4">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label>Status</label>
				<select class="form-control" id="frm_shown" name="frm_shown" style="width:100%" tabindex="5" autocomplete="off" required>';
				foreach($ad_status as $itemadmstatus) {
					if($itemadmstatus['status_id'] == $valueForums['frm_shown']) { 
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
		<a href="Forums.php" class="btn btn-default" tabindex="7">Cancel</a>
		<button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes" tabindex="6"> <i class="fa fa-check"></i> Save Changes</button>
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
