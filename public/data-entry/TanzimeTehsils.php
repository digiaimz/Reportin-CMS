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
		$sqllms  = $dblms->querylms("DELETE FROM ".TANZEEMI_TEHSILS." WHERE id_mtsl = '".cleanvars($_GET['id'])."'");
		header('location: TanzimeTehsils.php?del=1');
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
<form class="form-group" style="margin-top:10px;" action="TanzimeTehsils.php" method="get">

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
        <select class="form-control select2" id="District" name="District" style="width:100%" autocomplete="off">
		<option value="">Select District </option>';
		$sqllmsDistrict	= $dblms->querylms("SELECT id_dist, dist_name FROM ".DISTRICTS." WHERE dist_shown = '1' ORDER BY dist_name ASC");
		while($valueDistrict	= mysqli_fetch_array($sqllmsDistrict)) { 
			echo '<option value="'.$valueDistrict['id_dist'].'">'.$valueDistrict['dist_name'].'</option>';
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

<!-------- ./Search Area row--------------->';
//-------------------------------------------------------
if(isset($_GET['del']) == 1) {
//-------------------------------------------------------
	echo '<div id="infoupdated" class="alert-box sucess" align="center"><span>Warning: </span>Record deleted successfully.</div>';
}
//-------------------------------------------------------
echo'


<!-- .row -->
<div class="row">
<div class="col-lg-12">
<div class="white-box">
<a class="box-title m-b-0"> <a href="TanzimeTehsils.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Tanzeemi Tehsils List </a>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
<a href="TanzimeTehsils.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Tanzeemi Tehsil</a>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard </a><br><br>';
//--------------------------------------
if(isset($_POST['submit_TanzeemiTehsils'])) { 
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".TANZEEMI_TEHSILS."(
														id_mdist										, 
														mtsl_shown										, 
														mtsl_ordering									, 
														mtsl_name										, 
														mtsl_name_ur									,
														id_added										,
														date_added									 
																					 
														
													  )
	   											VALUES(
														'".cleanvars($_POST['id_mdist'])."'		   		, 
														'".cleanvars($_POST['mtsl_shown'])."'		   	, 
														'".cleanvars($_POST['mtsl_ordering'])."'	  	,
														'".cleanvars($_POST['mtsl_name'])."'	  		,
														'".cleanvars($_POST['mtsl_name_ur'])."'			,
														'".$_SESSION['LOGINIDA_SSS']."'				    ,
														NOW()  		
														
													  )"
							);

//-------------------------------------------------------
$officeid = $dblms->lastestid();
//-------------------------------------------------------
if(!empty($_FILES['mtsl_photo']['name'])) { 
//--------------------------------------
	$img 			= explode('.', $_FILES['mtsl_photo']['name']);
	$extension 	  = strtolower($img[1]);
//-------------------------------------------------------
	$img_dir		= "photos/TanzeemiTehsils/";
	$originalImage  = $img_dir.to_seo_url(cleanvars($_POST['mtsl_name'])).'_'.$officeid.".".strtolower($img[1]);
	$img_fileName   = to_seo_url(cleanvars($_POST['mtsl_name'])).'_'.$officeid.".".strtolower($img[1]);
//-------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//-------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".TANZEEMI_TEHSILS."
														SET mtsl_photo = '".$img_fileName."'
												 WHERE  id_mtsl		= '".cleanvars($officeid)."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//-------------------------------------------------------	
		move_uploaded_file($_FILES['mtsl_photo']['tmp_name'],$originalImage);
		chmod ($originalImage, octdec($mode));
//-------------------------------------------------------
	}
//-------------------------------------------------------
}
//-------------------------------------------------------
	if($sqllms) {
		echo '<div id="infoupdated" class="alert-box success" align="center"><span>success: </span>Record added successfully.</div>';
	}
//-------------------------------------------------------
}
//-------------------------------------------------------
if(!LMS_VIEW || LMS_VIEW == 'list') { 
	include("include/Pages/TanzeemiTehsils/allTanzeemiTehsils.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/TanzeemiTehsils/addTanzeemiTehsils.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/TanzeemiTehsils/modifyTanzeemiTehsils.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>