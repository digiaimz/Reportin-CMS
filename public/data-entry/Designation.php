<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------------
if($view == 'delete') {
	if(isset($_GET['Did'])) {
		$sqllms  = $dblms->querylms("DELETE FROM ".DESIGNATION." WHERE designation_id = '".cleanvars($_GET['Did'])."'");
		header('location: Designation.php?del=1');
	}
}
//-------------------------------------------------------
	include_once("include/header.php");
//*-------------------------------------------------------
	$sql2  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql2 		.= " AND ( designation_name LIKE '%".$_GET['srch']."%' OR 	designation_code LIKE '%".$_GET['srch']."%'	)";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------

//-------------------------------------------------------
echo'
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">';
//-------------------------------------------------------
if(isset($_GET['del']) == 1) {
//-------------------------------------------------------
	echo '<div id="infoupdated" class="alert-box sucess" align="center"><span>Warning: </span>Record deleted successfully.</div>';
}
//-------------------------------------------------------
echo'

<!-------- ./Search Area row--------------->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<form class="form-group" style="margin-top:10px;" action="Designation.php" method="get">

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

<div style="clear:both;"></div><br>

</div>
</form>

</div>
</div>
</div>

<!-------- ./Search Area row--------------->


<!-- .row -->
<div class="row">
<div class="col-lg-12">
<div class="white-box">
<a class="box-title m-b-0"> <a href="Designation.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Designation List </a>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
<a href="Designation.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Designation</a>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>';
//---------------------------------------------------------------------------------
if(isset($_POST['submit_designation'])) { 
//---------------------------------------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".DESIGNATION."(
														designation_status								, 
														designation_name								, 
														urdu_name								, 
														designation_code								,
														id_added										,
														date_added		
														
													  )
	   											VALUES(
														'".cleanvars($_POST['designation_status'])."'	, 
														'".cleanvars($_POST['designation_name'])."'	  	,
															'".cleanvars($_POST['urdu_name'])."'	  	,
														'".cleanvars($_POST['designation_code'])."'		,
														'".$_SESSION['LOGINIDA_SSS']."'				    ,
														NOW()	  
														
													  )"
							);
//----------------------------------------------------------
if($sqllms) {
//----------------------------------------------------------
	echo'<div class="alert alert-info alert-dismissable" align="center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>success: </span>Record added successfully.
		</div>';
	}
//-------------------------------------------------------
}
//-------------------------------------------------------
if(!LMS_VIEW || LMS_VIEW == 'list') { 
	include("include/Pages/Designation/allDesignation.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Designation/addDesignation.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Designation/modifyDesignation.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>