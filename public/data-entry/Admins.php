<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------------
if($view == 'delete') {
	if(isset($_GET['Aid'])) {
		$sqllms  = $dblms->querylms("DELETE FROM ".ADMINS." WHERE emply_id = '".cleanvars($_GET['Aid'])."'");
		header('location: Admins.php?del=1');
	}
}
//-------------------------------------------------------
	include_once("include/header.php");
//-------------------------------------------------------
	$sql5  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql5 		.= " AND ( emply_fullname LIKE '%".$_GET['srch']."%' 
					OR emply_fathername LIKE '%".$_GET['srch']."%'	
					OR 	emply_cnic = '".$_GET['srch']."'	
					OR 	emply_phone	= '".$_GET['srch']."' 
					OR 	emply_email	LIKE '%".$_GET['srch']."%' 
					OR 	emply_skypdid	LIKE '%".$_GET['srch']."%' 
					OR emply_postaladdress LIKE '%".$_GET['srch']."%' 
					OR emply_remarks LIKE '%".$_GET['srch']."%' 
					OR emply_city LIKE '%".$_GET['srch']."%' 
					OR emply_joinsdate = '".$_GET['srch']."' )";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------
if(($_GET['gender'])) { 
	$sql5 		.= " AND emply_gender = '".$_GET['gender']."' ";
	$sqlstring	.= "&gender=".$_GET['gender']."";
}
//--------------------------------------------------------
if(($_GET['blood'])) { 
	$sql5 		.= " AND emply_blood = '".$_GET['blood']."' ";
	$sqlstring	.= "&blood=".$_GET['blood']."";
}
//-------------------------------------------------------
echo'
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-------- ./Search Area row--------------->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<form class="form-group" style="margin-top:10px;" action="Admins.php" method="get">

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
<a class="box-title m-b-0"> <a href="Admins.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Admin List </a>
<a href="Admins.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Admin </a>
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard </a><br><br>';
//------------------------------------------------
if(isset($_POST['submit_Admin'])) { 
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
														emply_phone										, 
														id_district										, 
														id_forum										, 
														id_added										,
														date_added	
														
													  )
	   											VALUES(
														'1'		   										, 
														'".cleanvars($_POST['emply_no'])."'	  		    ,
														'".cleanvars($_POST['emply_type'])."'	  		,
														'".cleanvars($_POST['emply_username'])."'	  	,
														'".$emply_passmdf."'	 						,
														'".cleanvars($_POST['emply_access'])."'	 	    ,
														'".cleanvars($_POST['emply_fullname'])."'	 	,
														'".cleanvars($_POST['emply_fathername'])."'	    ,
														'".cleanvars($_POST['emply_cnic'])."'	 	   	,
														'".cleanvars($_POST['emply_phone'])."'	 	   	,
														'".cleanvars($_POST['id_district'])."'	 	   	,
														'".cleanvars($_POST['id_forum'])."'	 	   		,
														'".$_SESSION['LOGINIDA_SSS']."'				   	,
														NOW()	
														
													  )"
							);

//-------------------------------------------------------
$officeid = $dblms->lastestid();
//-------------------------------------------------------
if(!empty($_FILES['emply_photo']['name'])) { 
//--------------------------------------
	$img 			= explode('.', $_FILES['emply_photo']['name']);
	$extension 	  = strtolower($img[1]);
//-------------------------------------------------------
	$img_dir		= "photos/Admin/";
	$originalImage  = $img_dir.to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$officeid.".".strtolower($img[1]);
	$img_fileName   = to_seo_url(cleanvars($_POST['emply_fullname'])).'_'.$officeid.".".strtolower($img[1]);
//-------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//-------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".ADMINS."
														SET emply_photo = '".$img_fileName."'
												 WHERE  emply_id		= '".cleanvars($officeid)."'");
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
	include("include/Pages/Admin/allAdmin.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Admin/addAdmin.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Admin/modifyAdmin.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>