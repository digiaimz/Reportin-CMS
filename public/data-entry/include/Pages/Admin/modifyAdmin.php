<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//------------------------------------------------
if(!empty($_POST['emply_userpass'])) {
	$sqllms  = $dblms->querylms("UPDATE ".ADMINS." SET emply_userpass 	= '".md5(cleanvars($_POST['emply_userpass']))."' 
													WHERE emply_id 		= '".cleanvars($_GET['Aid'])."'");
unset($sqllms);
}
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".ADMINS." SET   emply_status		  	= '".cleanvars($_POST['emply_status'])."'
													, emply_no				= '".cleanvars($_POST['emply_no'])."'
													, emply_type			= '".cleanvars($_POST['emply_type'])."'
													, emply_username		= '".cleanvars($_POST['emply_username'])."'
													, emply_access			= '".cleanvars($_POST['emply_access'])."'
													, emply_fullname		= '".cleanvars($_POST['emply_fullname'])."'
													, emply_fathername		= '".cleanvars($_POST['emply_fathername'])."'
													, emply_cnic			= '".cleanvars($_POST['emply_cnic'])."'
													, emply_blood			= '".cleanvars($_POST['emply_blood'])."'
													, emply_gender			= '".cleanvars($_POST['emply_gender'])."'
													, emply_dob				= '".cleanvars($_POST['emply_dob'])."'
													, emply_phone			= '".cleanvars($_POST['emply_phone'])."'
													, emply_email			= '".cleanvars($_POST['emply_email'])."'
													, emply_postaladdress	= '".cleanvars($_POST['emply_postaladdress'])."'
													, emply_joinsdate		= '".cleanvars($_POST['emply_joinsdate'])."'
													, emply_remarks			= '".cleanvars($_POST['emply_remarks'])."'
													, emply_city			= '".cleanvars($_POST['emply_city'])."'
													, id_country			= '".cleanvars($_POST['id_country'])."'
													, id_district			= '".cleanvars($_POST['id_district'])."'
													, id_forum				= '".cleanvars($_POST['id_forum'])."'
													, id_modify				= '".$_SESSION['LOGINIDA_SSS']."'
													, date_modify			= NOW()
													WHERE emply_id			= '".cleanvars($_GET['Aid'])."'");


//----------------------------------------------------------
if(!empty($_FILES['emply_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['emply_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Admin/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$_GET['Aid'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$_GET['Aid'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".ADMINS."
														SET emply_photo   = '".$img_fileName."'
												 WHERE  emply_id		  = '".cleanvars($_GET['Aid'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['emply_photo']['tmp_name'],$originalImage);
		chmod ($originalImage, octdec($mode));
//----------------------------------------------------------
	}
//----------------------------------------------------------
}
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
	$sqllmsAdmins	= $dblms->querylms("SELECT * FROM ".ADMINS." WHERE emply_id = '".cleanvars($_GET['Aid'])."' LIMIT 1");
	$valueAdmins	 = mysqli_fetch_array($sqllmsAdmins);	
//------------------------------------------------
if($valueAdmins['emply_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Admin/'.$valueAdmins['emply_photo'].'" alt="'.$valueAdmins['emply_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Admin/default.png" alt="'.$valueAdmins['emply_name'].'"/>';
}
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Admins.php?view=modify&Aid='.$_GET['Aid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="text-align:center;"> Admin Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-3">
		<div class="form-group">
			<label class="req">Employee #</label>
			<input type="text" class="form-control" id="emply_no" name="emply_no" value="'.$valueAdmins['emply_no'].'" readonly required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label class="req"> Employee Type </label>
			<select class="form-control" id="emply_type" name="emply_type" style="width:100%" autocomplete="off" required>';
			foreach($admtypes as $itemadmtypes) {
				if($itemadmtypes['id'] == $valueAdmins['emply_type']) { 
					echo '<option value="'.$itemadmtypes['id'].'" selected>'.$itemadmtypes['name'].'</option>';
				} else {
					echo '<option value="'.$itemadmtypes['id'].'">'.$itemadmtypes['name'].'</option>';
				}
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label class="req"> Username </label>
			<input type="text" class="form-control" id="emply_username" name="emply_username" value="'.$valueAdmins['emply_username'].'" placeholder="Enter Username" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Password </label>
			<input type="password" class="form-control" id="emply_userpass" name="emply_userpass" placeholder="Enter Password" autocomplete="off">
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label class="req">Employee Accesee</label>
			<select class="form-control" id="emply_access" name="emply_access" style="width:100%" autocomplete="off" required>';
			foreach($statusyesno as $itemstatusyesno) {
				if($itemstatusyesno['id'] == $valueAdmins['emply_access']) { 
					echo '<option value="'.$itemstatusyesno['id'].'" selected>'.$itemstatusyesno['name'].'</option>';
				} else {
					echo '<option value="'.$itemstatusyesno['id'].'">'.$itemstatusyesno['name'].'</option>';
				}
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Employee Full Name </label>
			<input type="text" class="form-control" id="emply_fullname" name="emply_fullname" value="'.$valueAdmins['emply_fullname'].'" placeholder="Enter Full Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Father Name </label>
			<input type="text" class="form-control" id="emply_fathername" name="emply_fathername" value="'.$valueAdmins['emply_fathername'].'" placeholder="Enter Father Name" autocomplete="off">
		</div>
	</div>
	
</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">

	<div class="col-md-3">
		<div class="form-group">
			<label> CNIC </label>
			<input type="text" class="form-control" id="emply_cnic" name="emply_cnic" placeholder="Enter CNIC" value="'.$valueAdmins['emply_cnic'].'" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Blood Group </label>
			<select class="form-control" id="emply_blood" name="emply_blood" style="width:100%" autocomplete="off">';
			foreach($bloodgroup as $itembloodgroup) {
				if($itembloodgroup == $valueAdmins['emply_blood']) { 
					echo '<option value="'.$itembloodgroup.'" selected>'.$itembloodgroup.'</option>';
				} else {
					echo '<option value="'.$itembloodgroup.'">'.$itembloodgroup.'</option>';
					
				}
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Gender </label>
			<select class="form-control" id="emply_gender" name="emply_gender" style="width:100%" autocomplete="off">';
			foreach($gender as $itemgender) {
				if($itemgender == $valueAdmins['emply_gender']) { 
					echo '<option value="'.$itemgender.'" selected>'.$itemgender.'</option>';
				} else {
					echo '<option value="'.$itemgender.'">'.$itemgender.'</option>';
				}
			}
	echo'
			</select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label> Date of Birth </label>
			<input type="date" class="form-control" id="emply_dob" name="emply_dob" value="'.$valueAdmins['emply_dob'].'" placeholder="Enter Date of Birth" autocomplete="off">
		</div>
	</div>
	
</div>
<!--/row-->

<div style="clear:both;"></div>


<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Phone # </label>
			<input type="text" class="form-control" id="emply_phone" name="emply_phone" value="'.$valueAdmins['emply_phone'].'" placeholder="Enter Phone #" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Email </label>
			<input type="email" class="form-control" id="emply_email" name="emply_email" value="'.$valueAdmins['emply_email'].'" placeholder="Enter Email" autocomplete="off">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label style="font-weight:700;"> Photo  </label>
			<input type="file" class="form-control" id="emply_photo" name="emply_photo" autocomplete="off">
			'.$stdphoto.'
		</div>
	</div>
	

</div>
<!--/row-->

<div style="clear:both;"></div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Admins.php" class="btn btn-default">Cancel</a>
		<button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes"> <i class="fa fa-check"></i> Save Changes</button>
	</div>
	
<div style="clear:both;"></div>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Join Date </label>
			<input type="date" class="form-control" id="emply_joinsdate" name="emply_joinsdate" value="'.$valueAdmins['emply_joinsdate'].'" placeholder="Enter Join Date" autocomplete="off">
		</div>
	</div>
	

	<div class="col-md-4">
		<div class="form-group">
			<label> City </label>
			<input type="text" class="form-control" id="emply_city" name="emply_city" placeholder="Enter City" value="'.$valueAdmins['emply_city'].'" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Country </label>
			<select class="form-control select2" id="id_country" name="id_country" autocomplete="off">
				<option value="">Select Country</option>';
				  $sqllmscountry	= $dblms->querylms("SELECT country_id, country_name FROM ".COUNTRIES." WHERE country_status = '1' ORDER BY country_name ASC");
			while($valuecountry	= mysqli_fetch_array($sqllmscountry)) { 
				if($valuecountry['country_id'] == $valueAdmins['id_country']) { 
					echo '<option value="'.$valuecountry['country_id'].'" selected>'.$valuecountry['country_name'].'</option>';
				} else {
					echo '<option value="'.$valuecountry['country_id'].'">'.$valuecountry['country_name'].'</option>';
				}
			}
	echo'
			</select>
		</div>
	</div>


</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> District </label>
			<select class="form-control select2" id="id_district" name="id_district" autocomplete="off">
				<option value="">Select District</option>';
				  $sqllmsDistrict	= $dblms->querylms("SELECT id_dist, dist_name FROM ".DISTRICTS." WHERE dist_shown = '1' ORDER BY dist_name ASC");
			while($valueDistrict	= mysqli_fetch_array($sqllmsDistrict)) { 
				if($valueDistrict['id_dist'] == $valueAdmins['id_district']) { 
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
			<label> Forum </label>
			<select class="form-control select2" id="id_forum" name="id_forum" autocomplete="off">
				<option value="">Select Forum</option>';
				  $sqllmsForum	= $dblms->querylms("SELECT id_frm, frm_name FROM ".FORUMS." WHERE frm_shown = '1' ORDER BY frm_ordering ASC");
			while($valueForum	= mysqli_fetch_array($sqllmsForum)) { 
				if($valueForum['id_frm'] == $valueAdmins['id_forum']) { 
					echo '<option value="'.$valueForum['id_frm'].'" selected>'.$valueForum['frm_name'].'</option>';
				} else {
					echo '<option value="'.$valueForum['id_frm'].'">'.$valueForum['frm_name'].'</option>';
				}
			}
	echo'
			</select>
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div>


<!-- .row-->
<div class="row" style="margin-top:20px;">
	<div class="form-group">
		<label class="col-md-12 control-label"> Postal Address </label>
		<div class="col-md-12">
			<textarea class="form-control" id="emply_postaladdress" name="emply_postaladdress" rows="6" >'.$valueAdmins['emply_postaladdress'].'</textarea>
			
			 <script>
				document.addEventListener("DOMContentLoaded", function(){
				 CKEDITOR.replace( "emply_postaladdress", {
						  toolbar: "Advanced",
						  uiColor: "#ffffff",
						  height: "150px"
						  });
				  });


			</script>
			
		</div>
	</div>
</div>
<!--/row-->

<div style="clear:both;"></div>

<!-- .row-->
<div class="row" style="margin-top:20px;">
	<div class="form-group">
		<label class="col-md-12 control-label"> Remarks </label>
		<div class="col-md-12">
			<textarea class="form-control" id="emply_remarks" name="emply_remarks" rows="6" >'.$valueAdmins['emply_remarks'].'</textarea>
			
			 <script>
				document.addEventListener("DOMContentLoaded", function(){
				 CKEDITOR.replace( "emply_remarks", {
						  toolbar: "Advanced",
						  uiColor: "#ffffff",
						  height: "150px"
						  });
				  });


			</script>
			
		</div>
	</div>
</div>
<!--/row-->

<div style="clear:both;"></div>

			
<!--row-->
<div class="row" style="margin-top:20px;">
<div class="col-md-12">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="emply_status" name="emply_status" style="width:100%" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valueAdmins['emply_status']) { 
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

<div style="clear:both;"></div>

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Admins.php" class="btn btn-default">Cancel</a>
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
