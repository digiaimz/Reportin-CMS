<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//------------------------------------------------
if(!empty($_POST['worker_userpass'])) {
	$sqllms  = $dblms->querylms("UPDATE ".WORKERS." SET worker_userpass 	= '".md5(cleanvars($_POST['worker_userpass']))."' 
													WHERE worker_id 		= '".cleanvars($_GET['Wid'])."'");
unset($sqllms);
}
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".WORKERS." SET   worker_status		  		= '".cleanvars($_POST['worker_status'])."'
													, worker_regno				= '".cleanvars($_POST['worker_regno'])."'
													, worker_username			= '".cleanvars($_POST['worker_username'])."'
													, worker_access				= '".cleanvars($_POST['worker_access'])."'
													, worker_fullname			= '".cleanvars($_POST['worker_fullname'])."'
													, worker_fathername			= '".cleanvars($_POST['worker_fathername'])."'
													, worker_email				= '".cleanvars($_POST['worker_email'])."'
													, worker_whatsapp			= '".cleanvars($_POST['worker_whatsapp'])."'
													, worker_cnic				= '".cleanvars($_POST['worker_cnic'])."'
													, worker_gender				= '".cleanvars($_POST['worker_gender'])."'
													, worker_dob				= '".cleanvars($_POST['worker_dob'])."'
													, worker_city				= '".cleanvars($_POST['worker_city'])."'
													, id_country				= '".cleanvars($_POST['id_country'])."'
													, date_modify				= NOW()
													WHERE worker_id				= '".cleanvars($_GET['Wid'])."'");


//----------------------------------------------------------
if(!empty($_FILES['worker_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['worker_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Workers/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['worker_fullname'])).'_'.$_GET['Wid'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['worker_fullname'])).'_'.$_GET['Wid'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".WORKERS."
														SET worker_photo   = '".$img_fileName."'
												 WHERE  worker_id		  = '".cleanvars($_GET['Wid'])."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//----------------------------------------------------------	
		move_uploaded_file($_FILES['worker_photo']['tmp_name'],$originalImage);
		chmod ($originalImage, octdec($mode));
//----------------------------------------------------------
	}
//----------------------------------------------------------
}
//----------------------------------------------------------
if($sqllms) {
//------------------------------------------------------------------------------------
	$sqllmsdelte  = $dblms->querylms("DELETE FROM ".ZEREDAWAT." WHERE id_worker = '".$_GET['Wid']."'");
	$arraychecked = $_POST['zeredawat_fullname'];
	for($ichk=0; $ichk<sizeof($arraychecked); $ichk++){
			if(!empty($_POST['zeredawat_fullname'][$ichk])) {
				$sqllmsedu  = $dblms->querylms("INSERT INTO ".ZEREDAWAT." (
																id_worker													, 
																zeredawat_fullname											, 
																zeredawat_fathername										, 
																zeredawat_whatsapp											,
																zeredawat_gender											,
																zeredawat_withrelation																				
															  )
													VALUES	 (
																'".cleanvars($_GET['Wid'])."'								, 
																'".cleanvars($_POST['zeredawat_fullname'][$ichk])."'		,  
																'".cleanvars($_POST['zeredawat_fathername'][$ichk])."'		,  
																'".cleanvars($_POST['zeredawat_whatsapp'][$ichk])."'		, 
																'".cleanvars($_POST['zeredawat_gender'][$ichk])."'			,  
																'".cleanvars($_POST['zeredawat_withrelation'][$ichk])."'			
															  )
								 ");
		
				unset($sqllmsedu);	
			}
	}
//------------------------------------------------------------------------------------
	echo'<div class="alert alert-success alert-dismissable" align="center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>success: </span>Record updated successfully.
		</div>';
	}
//----------------------------------------------------------
}
//------------------------------------------------------------------------------------------------------------
	$sqllmsWorkers	= $dblms->querylms("SELECT * FROM ".WORKERS." WHERE worker_id = '".cleanvars($_GET['Wid'])."' LIMIT 1");
	$valueWorkers	 = mysqli_fetch_array($sqllmsWorkers);	
//------------------------------------------------
if($valueWorkers['worker_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Students/'.$valueWorkers['worker_photo'].'" alt="'.$valueWorkers['worker_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Students/default.png" alt="'.$valueWorkers['worker_name'].'"/>';
}
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->
<form class="col-sm-12" action="Workers.php?view=modify&Wid='.$_GET['Wid'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Edit Workers Detail</h3>
<hr>

<!--row-->
<div class="row">

	<div class="col-md-2">
		<div class="form-group">
			<label class="req">Registration #</label>
			<input type="text" class="form-control" id="worker_regno" name="worker_regno" value="'.$valueWorkers['worker_regno'].'" readonly required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
			<label class="req">Status</label>
			<select class="form-control" id="worker_status" name="worker_status" style="width:100%" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				if($itemadmstatus['status_id'] == $valueWorkers['worker_status']) { 
					echo '<option value="'.$itemadmstatus['status_id'].'" selected>'.$itemadmstatus['status_name'].'</option>';
				} else { 
					echo '<option value="'.$itemadmstatus['status_id'].'">'.$itemadmstatus['status_name'].'</option>';
				}
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
			<label class="req">Employee Accesee</label>
			<select class="form-control" id="worker_access" name="worker_access" style="width:100%" autocomplete="off" required>';
			foreach($statusyesno as $itemstatusyesno) {
				if($itemstatusyesno['id'] == $valueWorkers['worker_access']) { 
					echo '<option value="'.$itemstatusyesno['id'].'" selected>'.$itemstatusyesno['name'].'</option>';
				} else {
					echo '<option value="'.$itemstatusyesno['id'].'">'.$itemstatusyesno['name'].'</option>';
				}
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Username </label>
			<input type="text" class="form-control" id="worker_username" name="worker_username" value="'.$valueWorkers['worker_username'].'" placeholder="Enter Username" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Password </label>
			<input type="password" class="form-control" id="worker_userpass" name="worker_userpass" placeholder="Enter Password" autocomplete="off">
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req"> Employee Full Name </label>
			<input type="text" class="form-control" id="worker_fullname" name="worker_fullname" value="'.$valueWorkers['worker_fullname'].'" placeholder="Enter Full Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label> Father Name </label>
			<input type="text" class="form-control" id="worker_fathername" name="worker_fathername" value="'.$valueWorkers['worker_fathername'].'" placeholder="Enter Father Name" autocomplete="off">
		</div>
	</div>
	
</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">

	<div class="col-md-3">
		<div class="form-group">
			<label> CNIC </label>
			<input type="text" class="form-control" id="worker_cnic" name="worker_cnic" placeholder="Enter CNIC" value="'.$valueWorkers['worker_cnic'].'" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Blood Group </label>
			<select class="form-control" id="worker_blood" name="worker_blood" style="width:100%" autocomplete="off">';
			foreach($bloodgroup as $itembloodgroup) {
				if($itembloodgroup == $valueWorkers['worker_blood']) { 
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
			<select class="form-control" id="worker_gender" name="worker_gender" style="width:100%" autocomplete="off">';
			foreach($gender as $itemgender) {
				if($itemgender == $valueWorkers['worker_gender']) { 
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
			<input type="date" class="form-control" id="worker_dob" name="worker_dob" value="'.$valueWorkers['worker_dob'].'" placeholder="Enter Date of Birth" autocomplete="off">
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
			<input type="text" class="form-control" id="worker_phone" name="worker_phone" value="'.$valueWorkers['worker_phone'].'" placeholder="Enter Phone #" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Email </label>
			<input type="email" class="form-control" id="worker_email" name="worker_email" value="'.$valueWorkers['worker_email'].'" placeholder="Enter Email" autocomplete="off">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label style="font-weight:700;"> Photo  </label>
			<input type="file" class="form-control" id="worker_photo" name="worker_photo" autocomplete="off">
			'.$stdphoto.'
		</div>
	</div>
	

</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Join Date </label>
			<input type="date" class="form-control" id="worker_regdate" name="worker_regdate" value="'.$valueWorkers['worker_regdate'].'" autocomplete="off">
		</div>
	</div>
	

	<div class="col-md-4">
		<div class="form-group">
			<label> City </label>
			<input type="text" class="form-control" id="worker_city" name="worker_city" placeholder="Enter City" value="'.$valueWorkers['worker_city'].'" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Country </label>
			<select class="form-control select2" id="id_country" name="id_country" autocomplete="off">
				<option value="">Select Country</option>';
				  $sqllmscountry	= $dblms->querylms("SELECT country_id, country_name FROM ".COUNTRIES." WHERE country_status = '1' ORDER BY country_name ASC");
			while($valuecountry	= mysqli_fetch_array($sqllmscountry)) { 
				if($valuecountry['country_id'] == $valueWorkers['id_country']) { 
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


<!-- .row-->
<div class="row" style="margin-top:20px;">
	<div class="form-group">
		<label class="col-md-12 control-label"> Postal Address </label>
		<div class="col-md-12">
			<input type="text" class="form-control" id="worker_postaladdress" name="worker_postaladdress" placeholder="Enter Postal Address" value="'.$valueWorkers['worker_postaladdress'].'" autocomplete="off">
		</div>
	</div>
</div>
<!--/row-->

<div style="clear:both;"></div>	

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Workers.php" class="btn btn-default">Cancel</a>
		<button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes"> <i class="fa fa-check"></i> Save Changes</button>
	</div>

<div style="clear:both;"></div>

<!-- .row-->
<div class="row" style="margin-top:20px;">
	<div class="form-group">
		<label class="col-md-12 control-label"> Remarks </label>
		<div class="col-md-12">
			<textarea class="form-control" id="worker_remarks" name="worker_remarks" rows="6" >'.$valueWorkers['worker_remarks'].'</textarea>
			
			 <script>
				document.addEventListener("DOMContentLoaded", function(){
				 CKEDITOR.replace( "worker_remarks", {
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


<div class="col-lg-12 heading-modal" style="margin-top:10px; margin-bottom:5px;"><h1 align="center"> Wabastgan History</h1> </div><br>	
<div style="clear:both;"></div>	
<table class="footable table table-bordered  table-with-avatar invE_table">
<thead>
<tr>
	<th> </th>
	<th> Full Name </th>
	<th> Father Name </th>
	<th> Whatsapp </th>
	<th style="text-align:center;"> Gender</th>
	<th style="text-align:center;"> Relation</th>
</tr>
</thead>
<tbody>';
//-------------------------------------------------------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *    
										FROM ".ZEREDAWAT."  
										WHERE id_worker	= '".cleanvars($_GET['Wid'])."' ORDER BY zeredawat_id ASC");
	while($rowps = mysqli_fetch_array($sqllms)) {
//-------------------------------------------------------------------------------------------------------
echo'	
<tr>
	<td  style="text-align:center; vertical-align:middle;"></td>
	<td><input type="text" class="form-control" style="height:20px;" id="zeredawat_fullname[]" name="zeredawat_fullname[]" value="'.$rowps['zeredawat_fullname'].'"></td>
	<td style="width:450px; text-align:center;"><input type="text" class="form-control" style="height:20px;" id="zeredawat_fathername[]" name="zeredawat_fathername[]" value="'.$rowps['zeredawat_fathername'].'"></td>
	<td style="width:250px; text-align:center;"><input type="text" class="form-control" style="height:20px;" id="zeredawat_whatsapp[]" name="zeredawat_whatsapp[]" value="'.$rowps['zeredawat_whatsapp'].'"></td>
	<td style="width:150px;">
	<select name="zeredawat_gender[]" id="zeredawat_gender[]" style="height:25px; width:100%;">
	<option value="">Choose</option>';
	foreach($gender as $itemgender) { 
		if($rowps['zeredawat_gender'] == $itemgender) { 
			echo '<option value="'.$itemgender.'" selected>'.$itemgender.'</option>';
		} else { 
			echo '<option value="'.$itemgender.'">'.$itemgender.'</option>';
		}		
	}
echo '</select></td>
	<td> 
	<select name="zeredawat_withrelation[]" id="zeredawat_withrelation[]" style="height:25px; width:100%;">
	<option value="">Choose</option>';
	foreach($relations as $itemrels) { 
		if($rowps['zeredawat_withrelation'] == $itemrels) { 
			echo '<option value="'.$itemrels.'" selected>'.$itemrels.'</option>';
		} else { 
			echo '<option value="'.$itemrels.'">'.$itemrels.'</option>';
		}		
	}
echo '</select>
		</td>
</tr>';
//-------------------------------------------------------------------------------------------------------
} 
//-------------------------------------------------------------------------------------------------------
echo '	
<tr class="inv_row">
	<td class="inv_clone_row" style="text-align:center; vertical-align:middle;"><i class="icon-plus inv_clone_btn"></i></td>
	<td><input type="text" class="form-control" style="height:20px;" id="zeredawat_fullname[]" name="zeredawat_fullname[]"></td>
	<td style="width:450px; text-align:center;"><input type="text" class="form-control" style="height:20px;" id="zeredawat_fathername[]" name="zeredawat_fathername[]"></td>
	<td style="width:250px; text-align:center;"><input type="text" class="form-control" style="height:20px;" id="zeredawat_whatsapp[]" name="zeredawat_whatsapp[]"></td>
	<td style=" width:150px;">
	<select name="zeredawat_gender[]" id="zeredawat_gender[]" style="height:25px; width:100%;">
	<option value="">Choose</option>';
	foreach($gender as $itemgender) { 
		echo '<option value="'.$itemgender.'">'.$itemgender.'</option>';
	}
echo '</select></td>
	<td style="width:150px;">
	<select name="zeredawat_withrelation[]" id="zeredawat_withrelation[]" style="height:25px; width:100%;">
	<option value="">Choose</option>';
	foreach($relations as $itemrels) { 
		echo '<option value="'.$itemrels.'">'.$itemrels.'</option>';
	}
echo '</select>
	</td>
</tr>';	
//--------------------------------------

	
echo '
<tr class="last_row">
</tr>
</tbody>	
</table>

<div style="clear:both;"></div>	

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Workers.php" class="btn btn-default">Cancel</a>
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
