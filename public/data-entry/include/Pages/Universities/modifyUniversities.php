<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".UNIVERSITIES." SET   uni_status				= '".cleanvars($_POST['uni_status'])."'
															, uni_name				= '".cleanvars($_POST['uni_name'])."'
															, uni_abbr				= '".cleanvars($_POST['uni_abbr'])."'
															, uni_Location			= '".cleanvars($_POST['uni_Location'])."'
															, uni_Established		= '".cleanvars($_POST['uni_Established'])."'
															, uni_Campuses			= '".cleanvars($_POST['uni_Campuses'])."'
															, uni_Specialization	= '".cleanvars($_POST['uni_Specialization'])."'
															, uni_Type				= '".cleanvars($_POST['uni_Type'])."'
															, id_modify				= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify			= NOW()
															WHERE uni_id			= '".cleanvars($_GET['Uid'])."'");

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
	$sqllmsUniversities	= $dblms->querylms("SELECT * FROM ".UNIVERSITIES." WHERE uni_id = '".cleanvars($_GET['Uid'])."' LIMIT 1");
	$valueUniversities	 = mysqli_fetch_array($sqllmsUniversities);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Universities.php?view=modify&Uid='.$_GET['Uid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit University Detail</h3>
<hr>
<!--row-->
<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Name</label>
			<input type="text" class="form-control" id="uni_name" name="uni_name" value="'.$valueUniversities['uni_name'].'" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Code</label>
			<input type="text" class="form-control" id="uni_abbr" name="uni_abbr" value="'.$valueUniversities['uni_abbr'].'" placeholder="Enter Code" required autocomplete="off"> 
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Location </label>
			<input type="text" class="form-control" id="uni_Location" name="uni_Location" value="'.$valueUniversities['uni_Location'].'" placeholder="Enter Location" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Established </label>
			<input type="text" class="form-control" id="uni_Established" name="uni_Established" value="'.$valueUniversities['uni_Established'].'" placeholder="Enter Established" autocomplete="off"> 
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Campuses </label>
			<input type="text" class="form-control" id="uni_Campuses" name="uni_Campuses" value="'.$valueUniversities['uni_Campuses'].'" placeholder="Enter Campuses" autocomplete="off"> 
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label class="req"> Specialization </label>
			<input type="text" class="form-control" id="uni_Specialization" name="uni_Specialization" value="'.$valueUniversities['uni_Specialization'].'" placeholder="Enter Location" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req"> Type </label>
			<input type="text" class="form-control" id="uni_Type" name="uni_Type" value="'.$valueUniversities['uni_Type'].'" placeholder="Enter Type" autocomplete="off"> 
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
			<select class="form-control" id="uni_status" name="uni_status" style="width:100%" autocomplete="off" required>
				<option value="">Select Status</option>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valueUniversities['uni_status']) { 
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
		<a href="Universities.php" class="btn btn-default">Cancel</a>
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
