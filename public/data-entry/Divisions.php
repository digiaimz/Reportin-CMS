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
		$sqllms  = $dblms->querylms("DELETE FROM ".DIVISIONS." WHERE id_div = '".cleanvars($_GET['id'])."'");
		header('location: Divisions.php?del=1');
	}
}
//-------------------------------------------------------
	include_once("include/header.php");
//--------------------------------------------------------

//-------------------------------------------------------
echo'
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!-------- ./Search Area row--------------->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<form class="form-group" style="margin-top:10px;" action="Divisions.php" method="get">

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
        <select class="form-control select2" id="Province" name="Province" style="width:100%" autocomplete="off">
		<option value="">Select Province </option>';
		 $sqllmsProvince	= $dblms->querylms("SELECT id_prov, prov_name FROM ".PROVINCES." WHERE prov_shown = '1' ORDER BY prov_name ASC");
		while($valueProvince	= mysqli_fetch_array($sqllmsProvince)) { 
			echo '<option value="'.$valueProvince['id_prov'].'">'.$valueProvince['prov_name'].'</option>';
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
        <select class="form-control select2" id="Zones" name="Zones" style="width:100%" autocomplete="off">
		<option value="">Select Zone </option>';
		 $sqllmsZone	= $dblms->querylms("SELECT id_zone, zone_name FROM ".ZONES." WHERE zone_shown = '1' ORDER BY zone_name ASC");
		while($valueZone	= mysqli_fetch_array($sqllmsZone)) { 
			echo '<option value="'.$valueZone['id_zone'].'">'.$valueZone['zone_name'].'</option>';
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

<div style="clear:both;"></div><br>

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
<a class="box-title m-b-0"> <a href="Divisions.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Divisions List </a>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
<a href="Divisions.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Division</a>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>';
//--------------------------------------
if(isset($_POST['submit_zone'])) { 
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".DIVISIONS."(
														id_prov											, 
														id_zone											, 
														div_shown										, 
														div_ordering									, 
														div_name										, 
														div_name_ur										,
														id_added										,
														date_added										 
																					 
														
													  )
	   											VALUES(
														'".cleanvars($_POST['id_prov'])."'		   		, 
														'".cleanvars($_POST['id_zone'])."'		   		, 
														'".cleanvars($_POST['div_shown'])."'		   	, 
														'".cleanvars($_POST['div_ordering'])."'	  		,
														'".cleanvars($_POST['div_name'])."'	  			,
														'".cleanvars($_POST['div_name_ur'])."'			,
														'".$_SESSION['LOGINIDA_SSS']."'				   ,
														NOW()		  		
														
													  )"
							);

//-------------------------------------------------------
$officeid = $dblms->lastestid();
//-------------------------------------------------------
if(!empty($_FILES['div_photo']['name'])) { 
//--------------------------------------
	$img 			= explode('.', $_FILES['div_photo']['name']);
	$extension 	  = strtolower($img[1]);
//-------------------------------------------------------
	$img_dir		= "photos/Divisions/";
	$originalImage  = $img_dir.to_seo_url(cleanvars($_POST['div_name'])).'_'.$officeid.".".strtolower($img[1]);
	$img_fileName   = to_seo_url(cleanvars($_POST['div_name'])).'_'.$officeid.".".strtolower($img[1]);
//-------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//-------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".DIVISIONS."
														SET div_photo = '".$img_fileName."'
												 WHERE  id_div		= '".cleanvars($officeid)."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//-------------------------------------------------------	
		move_uploaded_file($_FILES['div_photo']['tmp_name'],$originalImage);
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
	include("include/Pages/Divisions/allDivisions.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Divisions/addDivisions.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Divisions/modifyDivisions.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>