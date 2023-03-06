<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//--------------------------------------------------------
include_once("include/header.php");
//-------------------------------------------------------
echo'
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">
<!-- .row -->';	
//------------------------------------------------
	$sqllmsrofile  = $dblms->querylms("SELECT *   
										FROM ".ADMINS." 
										WHERE emply_id = ".$_SESSION['LOGINIDA_SSS']."  ");
										
	$rowprofile = mysqli_fetch_array($sqllmsrofile);
//------------------------------------------------
if($rowprofile['emply_photo']) { 
	$stdphoto = '<img class="col-md-3 col-xs-12" src="Photos/Admin/'.$rowprofile['emply_photo'].'" alt="'.$rowprofile['emply_name'].'"/>';
} else {
	$stdphoto = '<img class="col-md-3 col-xs-12" src="Photos/Admin/default.png" alt="'.$rowprofile['emply_name'].'"/>';
}
//---------------------------------------------------------					
echo'
<div class="row">
<div class="col-md-12 col-xs-12">
<div class="white-box">
<ul class="nav nav-tabs tabs customtab">
<li class="active tab">
<a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
</li>

<li class="tab">
<a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Profile</span> </a>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="home">
<div class="m-l-40">'.$_SESSION['LOGINFNAMEA_SSS'].'
	<p>'.$_SESSION['LOGINEMAIL_SSS'].'</p>
	<div class="m-t-20 row">
		'.$stdphoto.'
	</div>
</div>
<hr>
';
//-------------------------------------------------------
$sqllmsactivity  = $dblms->querylms("SELECT *  
										FROM ".ADMINS." rep 
										INNER JOIN ".ADMINS_HISTORY." e ON e.id_emply = rep.emply_id 
										WHERE e.id_emply = '".$_SESSION['LOGINIDA_SSS']."' 
										ORDER BY e.id DESC LIMIT 20 ");
//------------------------------------------------
echo '
<table class="color-table table-bordered primary-table table table-hover">
<tr>
	<th> Sr# </th>
	<th> IP address </th>
    <th> Browser </th>
    <th> Dated </th>
</tr>';
//------------------------------------------------
$srno = 0;
//------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllmsactivity)) {
//------------------------------------------------
$srno++;
//-----------------------------------------------------------------
$origDate 	= $rowstd['dated']; 
$newDate 	= date("h:i a", strtotime($origDate));
$timeago 	= get_timeago(strtotime($rowstd['dated']));
//------------------------------------------------
echo '
<tr >  
	<td style="text-align:center;">'.$srno.'</td>
	<td style="text-align:left;">'.$rowstd['ip_address'].'</td>
	<td style="text-align:left;">'.$rowstd['computer_browser'].'</td>
	<td>'.$newDate.' ('.$timeago.')</td>
</tr>';
//------------------------------------------------
} // end while loop
//------------------------------------------------
echo '
</tbody>
</table>
</div>';
//----------------------------------------------------------
if(isset($_POST['submit_changes'])) { 
//------------------------------------------------
if(!empty($_POST['emply_userpass'])) {
	$sqllms  = $dblms->querylms("UPDATE ".ADMINS." SET emply_userpass = '".md5(cleanvars($_POST['emply_userpass']))."' 
													WHERE emply_id 	= '".$_SESSION['LOGINIDA_SSS']."'");
unset($sqllms);
}
//----------------------------------------------------------
$sqllms  = $dblms->querylms("UPDATE ".ADMINS." SET   emply_fullname		  	   	   = '".cleanvars($_POST['emply_fullname'])."'
															, emply_fathername		= '".cleanvars($_POST['emply_fathername'])."'
															, emply_cnic			= '".cleanvars($_POST['emply_cnic'])."'
															, emply_blood			= '".cleanvars($_POST['emply_blood'])."'
															, emply_gender			= '".cleanvars($_POST['emply_gender'])."'
															, emply_dob				= '".cleanvars($_POST['emply_dob'])."'
															, emply_phone			= '".cleanvars($_POST['emply_phone'])."'
															, emply_email			= '".cleanvars($_POST['emply_email'])."'
															, emply_skypdid			= '".cleanvars($_POST['emply_skypdid'])."'
															, emply_postaladdress	= '".cleanvars($_POST['emply_postaladdress'])."'
															, emply_joinsdate		= '".cleanvars($_POST['emply_joinsdate'])."'
															, emply_city			= '".cleanvars($_POST['emply_city'])."'
															, id_modify				= '".$_SESSION['LOGINIDA_SSS']."'
															, date_modify			= NOW()
															WHERE emply_id			= '".$_SESSION['LOGINIDA_SSS']."'");


//----------------------------------------------------------
if(!empty($_FILES['emply_photo']['name'])) { 
//----------------------------------------------------------
	$img 			= explode('.', $_FILES['emply_photo']['name']);
	$extension 		= strtolower($img[1]);
//----------------------------------------------------------
	$img_dir		= "photos/Admin/";
	$originalImage	= $img_dir.to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$_GET['id'].".".strtolower($img[1]);
	$img_fileName	= to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$_GET['id'].".".strtolower($img[1]);
//----------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//----------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".ADMINS."
														SET emply_photo   = '".$img_fileName."'
												 WHERE  emply_id		  = '".cleanvars($_GET['id'])."'");
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
	$sqllmsadmins	= $dblms->querylms("SELECT * FROM ".ADMINS." WHERE emply_id = '".$_SESSION['LOGINIDA_SSS']."' LIMIT 1");
	$valueadmins	 = mysqli_fetch_array($sqllmsadmins);	
//----------------------------------------------------------
echo'
<!-----------------Form Start--------------->				
<div class="tab-pane" id="settings">
	<form class="form-horizontal" action="profile.php?id='.$_SESSION['LOGINIDA_SSS'].'" method="post" id="addNewUsr" enctype="multipart/form-data">
		
		<div class="col-md-3">
			<div class="form-group">
				<label class="req">Employee #</label>
				<input type="text" class="form-control" id="emply_no" name="emply_no" value="'.$valueadmins['emply_no'].'" placeholder="Enter Number" required autocomplete="off" readonly>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="form-group">
				<label class="req"> Employee Type </label>
				<select class="form-control" id="emply_type" name="emply_type" style="width:100%" autocomplete="off" required readonly>';
				foreach($admtypes as $itemadmtypes) {
					if($itemadmtypes['id'] == $valueadmins['emply_type']) { 
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
				<input type="text" class="form-control" id="emply_username" name="emply_username" value="'.$valueadmins['emply_username'].'" placeholder="Enter Username" required autocomplete="off" readonly>
			</div>
		</div>
	
		<div class="col-md-3">
			<div class="form-group">
				<label> Password </label>
				<input type="password" class="form-control" id="emply_userpass" name="emply_userpass" placeholder="Enter Password" autocomplete="off">
			</div>
		</div>
		
<div style="clear:both;"></div>

	<div class="col-md-4">
		<div class="form-group">
			<label class="req">Employee Accesee</label>
			<select class="form-control" id="emply_access" name="emply_access" style="width:100%" autocomplete="off" required readonly>';
			foreach($statusyesno as $itemstatusyesno) {
				if($itemstatusyesno['id'] == $valueadmins['emply_access']) { 
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
			<input type="text" class="form-control" id="emply_fullname" name="emply_fullname" value="'.$valueadmins['emply_fullname'].'" placeholder="Enter Full Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Father Name </label>
			<input type="text" class="form-control" id="emply_fathername" name="emply_fathername" value="'.$valueadmins['emply_fathername'].'" placeholder="Enter Father Name" autocomplete="off">
		</div>
	</div>
	
<div style="clear:both;"></div>

<div class="col-md-3">
		<div class="form-group">
			<label> CNIC </label>
			<input type="text" class="form-control" id="emply_cnic" name="emply_cnic" placeholder="Enter CNIC" value="'.$valueadmins['emply_cnic'].'" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Blood Group </label>
			<select class="form-control" id="emply_blood" name="emply_blood" style="width:100%" autocomplete="off">';
			foreach($bloodgroup as $itembloodgroup) {
				if($itembloodgroup == $valueadmins['emply_blood']) { 
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
				if($itemgender == $valueadmins['emply_gender']) { 
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
			<input type="date" class="form-control" id="emply_dob" name="emply_dob" value="'.$valueadmins['emply_dob'].'" placeholder="Enter Date of Birth" autocomplete="off">
		</div>
	</div>
	
<div style="clear:both;"></div>


	<div class="col-md-3">
		<div class="form-group">
			<label> Phone # </label>
			<input type="text" class="form-control" id="emply_phone" name="emply_phone" value="'.$valueadmins['emply_phone'].'" placeholder="Enter Phone #" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Email </label>
			<input type="email" class="form-control" id="emply_email" name="emply_email" value="'.$valueadmins['emply_email'].'" placeholder="Enter Email" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Skype # </label>
			<input type="text" class="form-control" id="emply_skypdid" name="emply_skypdid" value="'.$valueadmins['emply_skypdid'].'" placeholder="Enter Skype #" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label style="font-weight:700;"> Photo  </label>
			<input type="file" class="form-control" id="emply_photo" name="emply_photo" autocomplete="off">
		</div>
	</div>
	
<div style="clear:both;"></div>		

	<div class="col-md-6">
		<div class="form-group">
			<label> Join Date </label>
			<input type="date" class="form-control" id="emply_joinsdate" name="emply_joinsdate" value="'.$valueadmins['emply_joinsdate'].'" autocomplete="off">
		</div>
	</div>
	

	<div class="col-md-6">
		<div class="form-group">
			<label> City </label>
			<input type="text" class="form-control" id="emply_city" name="emply_city" placeholder="Enter City" value="'.$valueadmins['emply_city'].'" autocomplete="off">
		</div>
	</div>

	
<div style="clear:both;"></div>		


	<div class="form-group">
		<label class="col-md-12 control-label" style="text-align:left;"> Postal Address </label>
		<div class="col-md-12">
			<textarea class="form-control" id="emply_postaladdress" name="emply_postaladdress" rows="6" >'.$valueadmins['emply_postaladdress'].'</textarea>
			
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
	
<div style="clear:both;"></div>	

	
	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="administrators.php" class="btn btn-default">Cancel</a>
		<button type="submit" class="btn btn-success" id="submit_changes" name="submit_changes"> <i class="fa fa-check"></i> Update Profile </button>
	</div>
	

		
	</form>
</div>
<!-----------------Form Start--------------->
</div>
</div>
</div>
</div>
<!-- /.row -->
</div>
</div>
</div>
<!-- /.container-fluid -->';
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------