<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//------------------------------------------------------
echo'
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" sizes="16x16" href="photos/favicon.png">
<title> '.TITLE_HEADER.' - پر خوش آمدید </title>
<style type="text/css">
body {overflow: -moz-scrollbars-vertical; margin:0; font-family: Arial, Helvetica, sans-serif, Calibri, "Calibri Light"; }
/* All margins set to 2cm */
@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}

@page :first {  margin-top: 0cm    /* Top margin on first page 10cm */ }
h1 { text-align:center;margin:0; margin-top:0; margin-bottom:5px; font-size:42px; font-weight:bold; text-transform:uppercase; }
h3 { text-align:center; margin:0; margin-top:0; margin-bottom:0px; font-size:20px; font-weight:bold; text-transform:uppercase; }
h4 { text-align:center; margin:0; margin-bottom:5px; margin-top:5px; font-weight:700; font-size:16px; text-decoration:underline;  }
.payable { border:2px solid #000; padding:2px; text-align:center; font-size:13px; }
</style>
<script language="JavaScript1.2">
function openwindow() {
	window.open("admissionprint", "feechallan","toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no,width=800,height=700");
}
</script>
</head>
<body>
<br>
<div style="margin:0 auto; width:800px;">
<h2 style="text-align:center;"> DAWAT BY MQI </h2>
<p style="text-align:center;margin-top:3px;margin-bottom:2px;"> Developed by Minhaj Internet Bureau (MIB)</p>
<div style="border:1px solid #333; width:800px;"></div>
<h2 style="margin-top:20px; text-align:left;">
	Divisions --> Districts
	<span style="float:right; font-size:16px;">Administrative Units '.date("Y").'<span>
</h2>
<br>';
//-----------------------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".DIVISIONS." 
										WHERE div_shown = '1' 
										ORDER BY div_name ASC");
//-----------------------------------------------------------------------
	$count = mysqli_num_rows($sqllms);
//-----------------------------------------------------------------------
$pno = 0;
//-----------------------------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//-----------------------------------------------------------------------
$pno++;
//-----------------------------------------------------------------------
echo'<h1 style="text-align:left;margin-top:50px;margin-bottom:30px;">'.$pno.' - '.$rowstd['div_name'].' </h1>';
//-----------------------------------------------------------------------
if($rowstd['id_div']){
//-----------------------------------------------------------------------
	$sqllmsDivisions  = $dblms->querylms("SELECT *  
										FROM ".DISTRICTS."  
										WHERE id_div = '".$rowstd['id_div']."' 
										ORDER BY dist_name ASC");
//-----------------------------------------------------------------------
$dno = 0 ;
//-----------------------------------------------------------------------
while($rowDivisions = mysqli_fetch_array($sqllmsDivisions)) {
//-----------------------------------------------------------------------
$dno++;
//-----------------------------------------------------------------------
echo'<h1 style="text-align:left;margin-left:50px;color:red;">'.$dno.' - '.$rowDivisions['dist_name'].' </h1>';
//-----------------------------------------------------------------------
}
echo'
<br> 
<a href="Districts.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e" target="_blank"> <i class="fa fa-plus"></i> Add Districts </a>';
//-----------------------------------------------------------------------
}// end while loop Zones
//-----------------------------------------------------------------------

//-----------------------------------------------------------------------
} // end while loop Provinces
//-----------------------------------------------------------------------
echo'
<p align="center">Report generated on: '.date("d F, Y h:i:s A").'.</p>
</body>
</html>';

?>