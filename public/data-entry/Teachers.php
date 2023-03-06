<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------------
if($view == 'delete') {
	if(isset($_GET['id'])) {
		$sqllms  = $dblms->querylms("DELETE FROM ".ADMINS." WHERE emply_id = '".cleanvars($_GET['id'])."'");
		header('location: Teachers.php?del=1');
	}
}
//-------------------------------------------------------
	include_once("include/header.php");
//-------------------------------------------------------
echo'
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-------- ./Search Area row--------------->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<form class="form-group" style="margin-top:10px;" action="Teachers.php" method="get">

<div class="row">

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
             <input type="search" name="srch" placeholder="Name" class="form-control">
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
             <select class="form-control" id="blood" name="blood" style="width:100%" autocomplete="off">
		<option value="">Select Blood Group </option>';
		foreach($bloodgroup as $itembloodgroup) {
			echo '<option value="'.$itembloodgroup.'">'.$itembloodgroup.'</option>';
		}
echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
        <select class="form-control" id="gender" name="gender" style="width:100%" autocomplete="off">
		<option value=""> Select Gender </option>';
		foreach($gender as $itemgender) {
			echo '<option value="'.$itemgender.'">'.$itemgender.'</option>';
		}
echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

</div>
</form>

</div>
</div>
</div>

<!-------- ./Search Area row--------------->


<!-- .row -->
<div class="row">
<div class="col-lg-12">
<div class="white-box">';
//-------------------------------------------------------
if(isset($_GET['del']) == 1) {
//-------------------------------------------------------
echo'<div class="alert alert-danger alert-dismissable" align="center">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>Warning: </span>Record deleted successfully.
	</div>';
}
//-------------------------------------------------------
echo'
<a class="box-title m-b-0"> <a href="Teachers.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Teachers List </a>
<a href="Teachers.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Teacher </a>
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard </a><br><br>';
//------------------------------------------------
if(isset($_POST['submit_Teachers'])) { 
//------------------------------------------------
	$sqllmscheck  = $dblms->querylms("SELECT *
										FROM ".ADMINS."  
										WHERE (emply_username = ".$_POST['emply_username']." OR emply_email = ".$_POST['emply_email'].")"
									);
//------------------------------------------------	
	if( mysqli_num_rows($sqllmscheck) > 0 ){
//------------------------------------------------		
		if(mysqli_num_rows($sqllmscheck) > 0) {
			echo '<div id="infoupdated" class="alert-box error"><span>error: </span>Sorry User Name Or Email Already Taken.</div>';	
		} else {
			echo '<div id="infoupdated" class="alert-box error"><span>error: </span>Password Can\'t Be Empty.</div>';
		}
	} else {
//------------------------------------------------
	$emply_pass  	 = cleanvars($_POST['emply_userpass']);
	$emply_passmdf  = md5($emply_pass);
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".ADMINS."(
														emply_status									, 
														emply_no										, 
														emply_type										, 
														emply_username									, 
														emply_userpass									, 
														emply_access									, 
														emply_fullname									, 
														emply_fathername								, 
														emply_cnic										, 
														emply_blood										, 
														emply_gender									, 
														emply_dob										, 
														emply_phone										, 
														emply_email										, 
														emply_postaladdress								, 
														emply_joinsdate									, 
														emply_remarks									, 
														emply_city										, 
														id_country										, 
														id_added										,
														date_added	
														
													  )
	   											VALUES(
														'".cleanvars($_POST['emply_status'])."'		    , 
														'".cleanvars($_POST['emply_no'])."'	  		    ,
														'5'	  		 									,
														'".cleanvars($_POST['emply_username'])."'	  	,
														'".$emply_passmdf."'	 						,
														'".cleanvars($_POST['emply_access'])."'	 	    ,
														'".cleanvars($_POST['emply_fullname'])."'	 	,
														'".cleanvars($_POST['emply_fathername'])."'	    ,
														'".cleanvars($_POST['emply_cnic'])."'	 	   	,
														'".cleanvars($_POST['emply_blood'])."'	 	   	,
														'".cleanvars($_POST['emply_gender'])."'	 	    ,
														'".cleanvars($_POST['emply_dob'])."'	 	   	,
														'".cleanvars($_POST['emply_phone'])."'	 	   	,
														'".cleanvars($_POST['emply_email'])."'	 	   	,
														'".cleanvars($_POST['emply_postaladdress'])."'	,
														'".cleanvars($_POST['emply_joinsdate'])."'	 	,
														'".cleanvars($_POST['emply_remarks'])."'	 	,
														'".cleanvars($_POST['emply_city'])."'	 	   	,
														'".cleanvars($_POST['id_country'])."'	 	   	,
														'".$_SESSION['LOGINIDA_SSS']."'				    ,
														NOW()	
														
													  )"
							);

//-------------------------------------------------------
$TeachersID = $dblms->lastestid();
//-------------------------------------------------------
if(!empty($_FILES['emply_photo']['name'])) { 
//--------------------------------------
	$img 			= explode('.', $_FILES['emply_photo']['name']);
	$extension 	  = strtolower($img[1]);
//-------------------------------------------------------
	$img_dir		= "photos/Teachers/";
	$originalImage  = $img_dir.to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$TeachersID.".".strtolower($img[1]);
	$img_fileName   = to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$TeachersID.".".strtolower($img[1]);
//-------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//-------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".ADMINS."
														SET emply_photo = '".$img_fileName."'
												 WHERE  emply_id		= '".cleanvars($TeachersID)."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//-------------------------------------------------------	
		move_uploaded_file($_FILES['emply_photo']['tmp_name'],$originalImage);
		chmod ($originalImage, octdec($mode));
//-------------------------------------------------------
	}
//-------------------------------------------------------
}
//----------------------------------------------------------
if($sqllms) {
//----------------------------------------------------------
	echo'<div class="alert alert-info alert-dismissable" align="center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>success: </span>Record added successfully.
		</div>';
	}
//----------------------------------------------------------
}
}
//-------------------------------------------------------
if(!LMS_VIEW || LMS_VIEW == 'list') { 
	include("include/Pages/Teachers/allTeachers.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Teachers/addTeachers.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Teachers/modifyTeachers.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>