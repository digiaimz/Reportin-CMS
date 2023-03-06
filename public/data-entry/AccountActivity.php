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
if(($_GET['empid']) && (($_SESSION['LOGINIDA_SSS'] == '1'))  ) { 
	$sql2 		.= " AND e.id_emply = '".$_GET['empid']."'"; 
}  else {
	$sql2 		.= " AND e.id_emply = '".$_SESSION['LOGINIDA_SSS']."' ";

}
//-------------------------------------------------------
echo '
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">

<div style="clear:both;"></div><br>';
//-------------------------------------------------------
if($_SESSION['LOGINIDA_SSS'] == 1){
//-------------------------------------------------------
echo'
<!-------- ./Search Area row--------------->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<form action="AccountActivity.php" method="get">

<div class="row">

<div class="col-sm-4 col-xs-12">
    <div class="dataTables_length">
        <div class="input-group custom-search-form">
             <select class="form-control select2" id="empid" name="empid" style="width:100%" autocomplete="off">
				<option value="">Select Employee</option>';
				  $sqllmsemply	= $dblms->querylms("SELECT emply_id, emply_no , emply_fullname FROM ".ADMINS." 
				  												WHERE emply_status = '1' 
																AND emply_id IN (SELECT id_emply FROM ".ADMINS_HISTORY." WHERE id != '' )  
																ORDER BY emply_id ASC");
			while($valueemply 	= mysqli_fetch_array($sqllmsemply)) { 
					echo '<option value="'.$valueemply['emply_id'].'">'.$valueemply['emply_fullname'].'</option>';
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

<div style="clear:both;margin-top:30px;"></div><br>

</div>
</form>

</div>
</div>
</div>


<!-------- ./Search Area row--------------->';
//-------------------------------------------------------
}
//-------------------------------------------------------
echo'
<!-- .row -->
<div class="row">
<div class="col-lg-12">
<div class="white-box">
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard</a><br><br>

<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">';
//-------------------------------------------------------
$sqllmsactivity  = $dblms->querylms("SELECT *  
										FROM ".ADMINS." rep 
										INNER JOIN ".ADMINS_HISTORY." e ON e.id_emply = rep.emply_id 
										WHERE e.id_emply != '' $sql2
										ORDER BY e.id DESC ");
$rowstd = mysqli_fetch_array($sqllmsactivity);
//-----------------------------------------------------------------
$count 		   = mysqli_num_rows($sqllmsactivity);
//------------------------------------------------
echo'
<div class="navbar-form navbar-left form-small" style="font-weight:700; color:red;"> 
	Total Records: ('.number_format($count).')
</div>
<div style="clear:both;"></div>
<h1 style="text-align:center;color:blue;">Welcome '.$rowstd['emply_fullname'].' <br> (To Your Account Activity) </h1>
<table class="color-table table-bordered primary-table table table-hover">
<tr>
	<th> Sr# </th>
	<th> IP address </th>
    <th> Browser </th>
    <th> Dated </th>
	<th> Remarks </th>
</tr>';
//------------------------------------------------
$srno = 0;
//-------------------------------------------------------
$sqllmsactivity  = $dblms->querylms("SELECT *  
										FROM ".ADMINS." rep 
										INNER JOIN ".ADMINS_HISTORY." e ON e.id_emply = rep.emply_id 
										WHERE e.id_emply != '' $sql2
										ORDER BY e.id DESC ");
//-----------------------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllmsactivity)) {
//-----------------------------------------------------------------
$srno++;
//-----------------------------------------------------------------
$origDate 	= $rowstd['dated']; 
$newDate 	= date("h:i a", strtotime($origDate));
$timeago 	= get_timeago(strtotime($rowstd['dated']));
//------------------------------------------------
echo '
<tr >  
	<td align="center">'.$srno.'</td>
	<td>'.$rowstd['ip_address'].'</td>
	<td>'.$rowstd['computer_browser'].'</td>
	<td>'.$newDate.' ('.$timeago.')</td>
	<td>'.$rowstd['remarks'].'</td>
</tr>';
//------------------------------------------------
} // end while loop
//------------------------------------------------
echo '
</tbody>
</table>';
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
