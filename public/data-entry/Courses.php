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
		$sqllms  = $dblms->querylms("DELETE FROM ".COURSES." WHERE curs_id = '".cleanvars($_GET['id'])."'");
		header('location: Courses.php?del=1');
	}
}
//-------------------------------------------------------
	include_once("include/header.php");
//*-------------------------------------------------------
	$sql2  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql2 		.= " AND ( curs_code LIKE '%".$_GET['srch']."%' 
					OR 	curs_name LIKE '%".$_GET['srch']."%'	
					OR 	curs_durationA LIKE '%".$_GET['srch']."%'	
					OR 	curs_durationB LIKE '%".$_GET['srch']."%'	
					OR 	curs_lectures LIKE '%".$_GET['srch']."%'	
					OR 	curs_start_date LIKE '%".$_GET['srch']."%'	
					OR 	curs_introduction LIKE '%".$_GET['srch']."%'	
					OR 	curs_outline LIKE '%".$_GET['srch']."%'	
					)";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------------------
if(($_GET['Level'])) { 
	$sql2 			.= " AND curs_level = '".$_GET['Level']."' ";
	$sqlmsstring	.= "&Level=".$_GET['Level']."";
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
<form class="form-group" style="margin-top:10px;" action="Courses.php" method="get">

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
             <select class="form-control" id="Level" name="Level" style="width:100%" autocomplete="off">
				<option value="">Select Level</option>';
			foreach($curslevel as $itemcurslevel) {
					echo '<option value="'.$itemcurslevel.'">'.$itemcurslevel.'</option>';
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
<a class="box-title m-b-0"> <a href="Courses.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Courses List </a>
<a href="Courses.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Courses</a>
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard </a><br><br>';
//--------------------------------------
if(isset($_POST['submit_Courses'])) { 
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".COURSES."(
														curs_status										, 
														curs_ordering									, 
														curs_code										, 
														curs_name										, 
														curs_durationA									, 
														curs_durationB									, 
														curs_lectures									, 
														curs_start_date									, 
														curs_level										,
														curs_introduction								,
														curs_outline									,
														id_added 										,
														date_added										
														
													  )	VALUES (
														'".cleanvars($_POST['curs_status'])."'			, 
														'".cleanvars($_POST['curs_ordering'])."'	  	,
														'".cleanvars($_POST['curs_code'])."'	  		,
														'".cleanvars($_POST['curs_name'])."'	  		,
														'".cleanvars($_POST['curs_durationA'])."'	  	,
														'".cleanvars($_POST['curs_durationB'])."'	  	,
														'".cleanvars($_POST['curs_lectures'])."'	  	,
														'".cleanvars($_POST['curs_start_date'])."'	  	,
														'".cleanvars($_POST['curs_level'])."'	  		,
														'".cleanvars($_POST['curs_introduction'])."'	,
														'".cleanvars($_POST['curs_outline'])."'	  		,
														'".cleanvars($_POST['curs_code'])."'			,
														'".cleanvars($_SESSION['LOGINIDA_SSS'])."'		,
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
	include("include/Pages/Courses/allCourses.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Courses/addCourses.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Courses/modifyCourses.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>
