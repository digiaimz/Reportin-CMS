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
<body>';
//-------------------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *
										FROM ".ISSUEBOOK." rep
										INNER JOIN ".MEMBERSHIP." m ON m.ms_id = rep.MS_Id    
										INNER JOIN ".BOOKRECORD." b ON b.Book_Id = rep.Book_Id    
										WHERE rep.MS_Id = '".$_GET['mid']."'
										ORDER BY rep.IssueBook_Id ASC");
//------------------------------------------------
echo '
<h1 style="text-align:center;margin-top:50px;margin-bottom:30px;"> Member Detail </h1>
<table style="border-collapse:collapse;font-family:Jameel Noori Nastaleeq; border:1px solid #ccc;" border="1" width="1100px" cellpadding="2" cellspacing="2" align="center">
<thead>
<tr>
	<th> تعارف کنندہ </th>
	<th>تاریخ ممبر شپ</th>
	<th> پتہ </th>
	<th style="text-align:right;"> نام ممبر </th>
	<th style="text-align:right;"> رکنیت نمبر </th>
	<th> ID </th>
</tr>
</thead>
<tbody>';
//------------------------------------------------
$srno		   = 0;
//------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//------------------------------------------------
$srno++;
//------------------------------------------------
if($rowstd['customer_phone'] == ''){
 $phone = '';
} else {
 $phone = '<br> '.$rowstd['customer_phone'].' <br> ';
}
//------------------------------------------------

echo '
<tr>
	<td style="text-align:right;font-family:Jameel Noori Nastaleeq;">'.$_SESSION['LOGINFNAMEA_SSS'].'</td>
	<td style="text-align:center;">'.$IsReturn.'</td>
	<td style="text-align:center;">'.$rowstd['Issue_Date'].'</td>
	<td style="text-align:right;">'.$rowstd['Title'].'</td>
	<td style="text-align:center;">'.$rowstd['Ac_ACCNO'].'</td>
	<td style="text-align:right;font-family:Jameel Noori Nastaleeq;"><a href="membershipsdetail.php?mid='.$rowstd['ms_id'].'"> '.$rowstd['ms_name'].'</a></td>
	<td style="text-align:center;">'.$srno.'</td>
</tr>';
//------------------------------------------------
} // end while loop
//------------------------------------------------
echo '
</tbody>
</table>';
//------------------------------------------------
echo'
<!--------------------/ Footer Start------------------------------>
<div class="footerbar clearfix" align="center" style="margin-top:50px;">
	<div class="pull-right">&copy; '.date("Y").' <a href="'.COPY_RIGHTS_URL.'" target="_blank">'.COPY_RIGHTS.'</a>. All Rights Reserved.</div>
</div>
<!--------------------/ Footer End  ------------------------------>
</body>
</html>';
?>