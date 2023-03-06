<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".PROFESSIONS." SET   profession_status			= '".cleanvars($_POST['profession_status'])."'
															, profession_name		= '".cleanvars($_POST['profession_name'])."'
															, profession_abbr		= '".cleanvars($_POST['profession_abbr'])."'
															, id_modify				= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify			= NOW()
															WHERE profession_id		= '".cleanvars($_GET['Pid'])."'");

//----------------------------------------------------------
if($sqllms) {
//----------------------------------------------------------
	echo'<div class="alert alert-success alert-dismissable" align="center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>success: </span>Record updated successfully.
		</div>';
	}
//----------------------------------------------------------
}
//------------------------------------------------------------------------------------------------------------
	$sqllmsProfession	= $dblms->querylms("SELECT * FROM ".PROFESSIONS." WHERE profession_id = '".cleanvars($_GET['Pid'])."' LIMIT 1");
	$valueProfession	 = mysqli_fetch_array($sqllmsProfession);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Profession.php?view=modify&Pid='.$_GET['Pid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit Profession Detail</h3>
<hr>
<!--row-->
<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Name</label>
			<input type="text" class="form-control" id="profession_name" name="profession_name" value="'.$valueProfession['profession_name'].'" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Code</label>
			<input type="text" class="form-control" id="profession_abbr" name="profession_abbr" value="'.$valueProfession['profession_abbr'].'" placeholder="Enter Code" required autocomplete="off"> 
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="profession_status" name="profession_status" style="width:100%" autocomplete="off" required>
				<option value="">Select Status</option>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valueProfession['profession_status']) { 
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
		<a href="Profession.php" class="btn btn-default">Cancel</a>
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
