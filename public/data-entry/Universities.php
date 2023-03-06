<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------------
if($view == 'delete') {
	if(isset($_GET['Cid'])) {
		$sqllms  = $dblms->querylms("DELETE FROM ".UNIVERSITIES." WHERE uni_id = '".cleanvars($_GET['Cid'])."'");
		header('location: Universities.php?del=1');
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
<form class="form-group" style="margin-top:10px;" action="Universities.php" method="get">

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
<a class="box-title m-b-0"> <a href="Universities.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Universities List </a>
<a href="Universities.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Universities</a>
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>';
//--------------------------------------
if(isset($_POST['submit_University'])) { 
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".UNIVERSITIES."(
														uni_status								, 
														uni_name								, 
														uni_abbr								,
														id_added								,
														date_added			
														
													  )	VALUES (
														'".cleanvars($_POST['uni_status'])."'	, 
														'".cleanvars($_POST['uni_name'])."'	  	,
														'".cleanvars($_POST['uni_abbr'])."'		,
														'".$_SESSION['LOGINIDA_SSS']."'			,
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
	include("include/Pages/Universities/allUniversities.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Universities/addUniversities.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Universities/modifyUniversities.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>