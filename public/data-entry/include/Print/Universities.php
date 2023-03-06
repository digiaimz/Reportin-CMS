<?php
//------------------------------------------------
$printsql 	= stripslashes($_POST['print_sql']);
//------------------------------------------------
$sqllms  = $dblms->querylms($printsql);
//------------------------------------------------------
echo'
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" sizes="16x16" href="photos/book.png">
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
<h2 style="text-align:center;">Farid-e-Millat Research Institute</h2>
<p style="text-align:center;margin-top:3px;margin-bottom:2px;"> Developed by Minhaj Internet Bureau (MIB)</p>
<div style="border:1px solid #333; width:800px;"></div>
<h2 style="margin-top:20px; text-align:left;">
	Countries Print Report
	<span style="float:right; font-size:16px;">LMS '.date("Y").'<span>
</h2>
<br>';
//-----------------------------------------------------------------------
$count = mysqli_num_rows($sqllms);
//-----------------------------------------------------------------------
echo'
<h1 style="text-align:center;margin-top:50px;margin-bottom:30px;"> Universities List </h1>
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:red; margin-right:10px;"> 
	Total Records: ('.number_format($count).')
</div>
<table width="800" style="border-collapse:collapse;font-family:Jameel Noori Nastaleeq; border:1px solid #ccc;" border="1" width="1100px" cellpadding="2" cellspacing="2" align="center">
<thead>
<tr>
	<th style="text-align:center;">ID</th>
	<th style="text-align:left;"> Name </th>
	<th style="text-align:left;"> Code </th>	
</tr>
</thead>
<tbody>';
//------------------------------------------------
$srno		   = 0;
//------------------------------------------------
$TotalGrandbooks = 0;
//------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//------------------------------------------------
	$ctystatus = get_admstatus($rowstd['uni_status']);
//------------------------------------------------
$srno++;
//-------------------------------------------------------------------
echo'
<tr>
	<td style="text-align:center;">'.$srno.'</td>
	<td style="text-align:left;">'.$rowstd['uni_name'].'</td>
	<td style="text-align:left;">'.$rowstd['uni_abbr'].'</td>
</tr>';
//------------------------------------------------
} // end while loop
//------------------------------------------------
echo'
</tbody>
</table>';
//------------------------------------------------
echo'
<p align="center">Report generated on: '.date("d F, Y h:i:s A").'.</p>
</body>
<script type="text/javascript" language="javascript1.2">
<!--
 //Do print the page
if (typeof(window.print) != "undefined") {
    window.print();
}
-->
</script>
</html>';

?>