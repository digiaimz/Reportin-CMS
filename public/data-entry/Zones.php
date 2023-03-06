<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------------
if($view == 'delete') {
	if(isset($_GET['Zid'])) {
		$sqllms  = $dblms->querylms("DELETE FROM ".ZONES." WHERE id_zone = '".cleanvars($_GET['Zid'])."'");
		header('location: Zones.php?del=1');
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
<form class="form-group" style="margin-top:10px;" action="Zones.php" method="get">

<div class="row">

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
             <input type="search" name="srch" placeholder="Zone Name" class="form-control">
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
<a class="box-title m-b-0"> <a href="Zones.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Zones List </a>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
<a href="Zones.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Zone</a>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>';
//--------------------------------------
if(isset($_POST['submit_zone'])) { 
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".ZONES."(
														id_prov											, 
														zone_shown										, 
														zone_ordering									, 
														zone_name										, 
														zone_name_ur									 										 
																					 
														
													  )
	   											VALUES(
														'".cleanvars($_POST['id_prov'])."'		   		, 
														'".cleanvars($_POST['zone_shown'])."'		   	, 
														'".cleanvars($_POST['zone_ordering'])."'	  	,
														'".cleanvars($_POST['zone_name'])."'	  		,
														'".cleanvars($_POST['zone_name_ur'])."'			 	  		
														
													  )"
							);
							
					 
//-------------------------------------------------------
$officeid = $dblms->lastestid();
//-------------------------------------------------------
if(!empty($_FILES['zone_photo']['name'])) { 
//--------------------------------------
	$img 			= explode('.', $_FILES['zone_photo']['name']);
	$extension 	  = strtolower($img[1]);
//-------------------------------------------------------
	$img_dir		= "photos/Zones/";
	$originalImage  = $img_dir.to_seo_url(cleanvars($_POST['zone_name'])).'_'.$officeid.".".strtolower($img[1]);
	$img_fileName   = to_seo_url(cleanvars($_POST['zone_name'])).'_'.$officeid.".".strtolower($img[1]);
//-------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//-------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".ZONES."
														SET zone_photo = '".$img_fileName."'
												 WHERE  id_zone		= '".cleanvars($officeid)."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//-------------------------------------------------------	
		move_uploaded_file($_FILES['zone_photo']['tmp_name'],$originalImage);
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
	include("include/Pages/Zones/allZones.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Zones/addZones.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Zones/modifyZones.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>