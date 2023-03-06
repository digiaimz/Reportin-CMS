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
		$sqllms  = $dblms->querylms("DELETE FROM ".CURRENCY." WHERE currency_id = '".cleanvars($_GET['Cid'])."'");
		header('location: Currency.php?del=1');
	}
}
//-------------------------------------------------------
	include_once("include/header.php");
//*-------------------------------------------------------
	$sql2  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql2 		.= " AND ( currency_code LIKE '%".$_GET['srch']."%' OR 	currency_name LIKE '%".$_GET['srch']."%'	)";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
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
<form class="form-group" style="margin-top:10px;" action="Currency.php" method="get">

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
<a class="box-title m-b-0"> <a href="Currency.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Currency List </a>
<a href="Currency.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Currency </a>
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>';
//--------------------------------------
if(isset($_POST['submit_Currency'])) { 
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".CURRENCY."(
														currency_status										, 
														currency_ordering									, 
														currency_code										, 
														currency_name										, 
														currency_symbol										
														
													  )	VALUES (
														'".cleanvars($_POST['currency_status'])."'			, 
														'".cleanvars($_POST['currency_ordering'])."'	  	,
														'".cleanvars($_POST['currency_code'])."'	  		,
														'".cleanvars($_POST['currency_name'])."'	  		,
														'".cleanvars($_POST['currency_symbol'])."'		  
														
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
	include("include/Pages/Currency/allCurrency.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Currency/addCurrency.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Currency/modifyCurrency.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>