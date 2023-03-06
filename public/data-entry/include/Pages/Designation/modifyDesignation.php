<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".DESIGNATION." SET   designation_status		= '".cleanvars($_POST['designation_status'])."'
															, designation_name		= '".cleanvars($_POST['designation_name'])."'
																, urdu_name		= '".cleanvars($_POST['urdu_name'])."'
															, designation_code		= '".cleanvars($_POST['designation_code'])."'
															, id_modify				= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify			= NOW()
															WHERE designation_id	= '".cleanvars($_GET['Did'])."'");

//----------------------------------------------------------
	if($sqllms) {
//----------------------------------------------------------
		echo '<div id="infoupdated" class="alert-box notice"><span>success: </span>Record updated successfully.</div>';
//--------------------------------------
	}
}
//------------------------------------------------------------------------------------------------------------
	$sqllmsDesignation	= $dblms->querylms("SELECT * FROM ".DESIGNATION." WHERE designation_id = '".cleanvars($_GET['Did'])."' LIMIT 1");
	$valueDesignation	 = mysqli_fetch_array($sqllmsDesignation);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Designation.php?view=modify&Did='.$_GET['Did'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit Designation Detail</h3>
<hr>
<!--row-->
<div class="row">

	<div class="col-md-3">
		<div class="form-group">
			<label class="req">Name</label>
			<input type="text" class="form-control" id="designation_name" name="designation_name" value="'.$valueDesignation['designation_name'].'" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
		<div class="col-md-3">
		<div class="form-group">
			<label class="req">Urdu Name</label>
			<input type="text" class="form-control" id="designation_name" name="urdu_name" value="'.$valueDesignation['urdu_name'].'" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Code</label>
			<input type="text" class="form-control" id="designation_code" name="designation_code" value="'.$valueDesignation['designation_code'].'" placeholder="Enter Code" required autocomplete="off"> 
		</div>
	</div>

</div>
<!--/row-->

<!--row-->
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="designation_status" name="designation_status" style="width:100%" autocomplete="off" required>
				<option value="">Select Status</option>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valueDesignation['designation_status']) { 
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

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Designation.php" class="btn btn-default">Cancel</a>
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
