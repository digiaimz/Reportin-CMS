<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".COUNTRIES." SET   country_status			= '".cleanvars($_POST['country_status'])."'
															, country_name		= '".cleanvars($_POST['country_name'])."'
															, country_code		= '".cleanvars($_POST['country_code'])."'
															, id_modify			= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify		= NOW()
															WHERE country_id	= '".cleanvars($_GET['Cid'])."'");

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
	$sqllmsdesignation	= $dblms->querylms("SELECT * FROM ".COUNTRIES." WHERE country_id = '".cleanvars($_GET['Cid'])."' LIMIT 1");
	$valuedesignation	 = mysqli_fetch_array($sqllmsdesignation);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Countries.php?view=modify&Cid='.$_GET['Cid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">
<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit Country Detail</h3>
<hr>
<!--row-->
<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Name</label>
			<input type="text" class="form-control" id="country_name" name="country_name" value="'.$valuedesignation['country_name'].'" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Code</label>
			<input type="text" class="form-control" id="country_code" name="country_code" value="'.$valuedesignation['country_code'].'" placeholder="Enter Code" required autocomplete="off"> 
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
			<select class="form-control" id="country_status" name="country_status" style="width:100%" autocomplete="off" required>
				<option value="">Select Status</option>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valuedesignation['country_status']) { 
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
		<a href="Countries.php" class="btn btn-default">Cancel</a>
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
