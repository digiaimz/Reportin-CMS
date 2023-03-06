<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
	include_once("include/header.php");
//-------------------------------------------------------
$sql2 		= '';
$sqlstring	= "";
//----------------------------------------
if(($_GET['log']) && (($_SESSION['LOGINIDA_SSS'] == '1') || ($_SESSION['LOGINIDA_SSS'] == '2') || ($_SESSION['LOGINIDA_SSS'] == '3'))  ) { 
	$sql2 		.= " AND e.id_emply = '".$_GET['log']."'"; 
}  else {
	
	$sql2 		.= " AND e.id_emply = '".$_SESSION['LOGINIDA_SSS']."' ";

}
//-------------------------------------------------------
echo '
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">

<div style="clear:both;"></div><br>

<!-------- ./Search Area row--------------->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<form action="account_activity.php" method="get">

<div class="row">

<div style="clear:both;margin-top:30px;"></div><br>

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
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>

<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//-----------------------------------------------------------------
$sqllmsAdmins = $dblms->querylms("SELECT *  
										FROM ".ADMINS."  
										WHERE emply_id != ''
										ORDER BY emply_id DESC ");
//-----------------------------------------------------------------
while($rowAdmins = mysqli_fetch_array($sqllmsAdmins)) {	
//-----------------------------------------------------------------
$sqllmsactivity  = $dblms->querylms("SELECT *  
										FROM ".ADMINS_HISTORY."  
										WHERE id != '' 
										AND id_emply = '".$rowAdmins['emply_id']."'
										ORDER BY id DESC ");
//-----------------------------------------------------------------
echo'
<h1 style="text-align:center;color:blue;"> '.$rowAdmins['emply_fullname'].' </h1>

<table class="color-table table-bordered primary-table table table-hover">
<tr>
	<th> Sr# </th>
	<th> IP address </th>
    <th> Browser </th>
    <th> Dated </th>
	<th> Remarks </th>
</tr>';
//-----------------------------------------------------------------
$srno = 0;
//-----------------------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllmsactivity)) {
//-----------------------------------------------------------------
$srno++;
//-----------------------------------------------------------------
$origDate 	= $rowstd['dated']; 
$newDate 	= date("h:i a", strtotime($origDate));
$timeago 	= get_timeago(strtotime($rowstd['dated']));
//-----------------------------------------------------------------
echo '
<tr>  
	<td align="center">'.$srno.'</td>
	<td>'.$rowstd['ip_address'].'</td>
	<td>'.$rowstd['computer_browser'].'</td>
	<td>'.$newDate.' ('.$timeago.') '.$rowstd['dated'].'</td>
	<td>'.$rowstd['remarks'].'</td>
</tr>';
//------------------------------------------------
} // end while loop
//------------------------------------------------
echo '
</tbody>
</table>';
//------------------------------------------------
}
//------------------------------------------------
echo '
<!-----------------Form End--------------->
</div>
</div>
</div>
</div>
</div>
<!--./row-->

</div>
</div>
<!-- Page Content -->';
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>
