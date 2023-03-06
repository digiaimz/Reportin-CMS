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
		$sqllms  = $dblms->querylms("DELETE FROM ".PROVINCES." WHERE id_prov = '".cleanvars($_GET['id'])."'");
		header('location: Provinces.php?del=1');
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
<form class="form-group" style="margin-top:10px;" action="Provinces.php" method="get">

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
<a class="box-title m-b-0"> <a href="Provinces.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Province List </a>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
<a href="Provinces.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Province</a>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>';
//--------------------------------------
if(isset($_POST['submit_provinces'])) { 
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".PROVINCES."(
														prov_shown										, 
														prov_ordering									, 
														prov_name										, 
														prov_urdu										, 
														prov_tags										,
														id_added										,
														date_added									 
																					 
														
													  )
	   											VALUES(
														'".cleanvars($_POST['prov_shown'])."'		   	, 
														'".cleanvars($_POST['prov_ordering'])."'	  	,
														'".cleanvars($_POST['prov_name'])."'	  		,
														'".cleanvars($_POST['prov_urdu'])."'	  		,
														'".cleanvars($_POST['prov_tags'])."'			,
														'".$_SESSION['LOGINIDA_SSS']."'				   ,
														NOW()  		
														
													  )"
							);

//-------------------------------------------------------
$officeid = $dblms->lastestid();
//-------------------------------------------------------
if(!empty($_FILES['prov_photo']['name'])) { 
//--------------------------------------
	$img 			= explode('.', $_FILES['prov_photo']['name']);
	$extension 	  = strtolower($img[1]);
//-------------------------------------------------------
	$img_dir		= "photos/Provinces/";
	$originalImage  = $img_dir.to_seo_url(cleanvars($_POST['prov_name'])).'_'.$officeid.".".strtolower($img[1]);
	$img_fileName   = to_seo_url(cleanvars($_POST['prov_name'])).'_'.$of.".".strtolower($img[1]);
//-------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//-------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".PROVINCES."
														SET prov_photo = '".$img_fileName."'
												 WHERE  id_prov		= '".cleanvars($officeid)."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//-------------------------------------------------------	
		move_uploaded_file($_FILES['prov_photo']['tmp_name'],$originalImage);
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
	include("include/Pages/Province/allProvince.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Province/addProvince.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Province/modifyProvince.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>