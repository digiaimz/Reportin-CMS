<?php 
//-------------------------Total Provinces-----------------------
	$sqllmstotalprovinces  = $dblms->querylms("SELECT COUNT(id_prov) AS totalprovinces FROM ".PROVINCES."
										WHERE prov_shown = '1' ");
	$valuetotalprovinces   = mysqli_fetch_array($sqllmstotalprovinces);
//-------------------------Total Zones-----------------------
	$sqllmstotalzones  = $dblms->querylms("SELECT COUNT(id_zone) AS totalzones FROM ".ZONES."
										WHERE zone_shown = '1' ");
	$valuetotalzones   = mysqli_fetch_array($sqllmstotalzones);
//-------------------------Total Division-----------------------
	$sqllmstotaldivision  = $dblms->querylms("SELECT COUNT(id_div) AS totaldivision FROM ".DIVISIONS."
										WHERE div_shown = '1' ");
	$valuetotaldivision   = mysqli_fetch_array($sqllmstotaldivision);
//-------------------------Total Districts-----------------------
	$sqllmstotalDistricts  = $dblms->querylms("SELECT COUNT(id_dist) AS totalDistricts FROM ".DISTRICTS."
										WHERE dist_shown = '1' ");
	$valuetotalDistricts   = mysqli_fetch_array($sqllmstotalDistricts);
//-------------------------Total Tehsils-----------------------
	$sqllmstotalTehsils  = $dblms->querylms("SELECT COUNT(id_tsl) AS totalTehsils FROM ".TEHSILS."
										WHERE tsl_shown = '1' ");
	$valuetotalTehsils   = mysqli_fetch_array($sqllmstotalTehsils);
//-------------------------Total TanzeemiTehsils-----------------------
	$sqllmstotalTanzeemiTehsils  = $dblms->querylms("SELECT COUNT(id_mtsl) AS totalTanzeemiTehsils FROM ".TANZEEMI_TEHSILS."
										WHERE mtsl_shown = '1' ");
	$valuetotalTanzeemiTehsils   = mysqli_fetch_array($sqllmstotalTanzeemiTehsils);
//-------------------------Total Members-----------------------
	$sqllmstotalMembers  = $dblms->querylms("SELECT COUNT(worker_id) AS totalMembers FROM ".WORKERS." ");
	$valuetotalMembers   = mysqli_fetch_array($sqllmstotalMembers);
//-------------------------Total Admins-----------------------
	$sqllmstotalAdmins  = $dblms->querylms("SELECT COUNT(emply_id) AS totalAdmins FROM ".ADMINS." 
											WHERE emply_status = '1' ");
	$valuetotalAdmins   = mysqli_fetch_array($sqllmstotalAdmins);
//------------------------------------------------------
	$sqllmsactivity  = $dblms->querylms("SELECT dated FROM ".ADMINS_HISTORY."
								WHERE id_emply = '".$_SESSION['LOGINIDA_SSS']."'
								ORDER BY id DESC ");
	$valueactivity   = mysqli_fetch_array($sqllmsactivity);
//-----------------------------------------------------------------
$origDate 	= $valueactivity['dated']; 
$newDate 	= date("h:i a", strtotime($origDate));
$timeago 	= get_timeago(strtotime($valueactivity['dated']));
//------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".ADMINS." 
										WHERE emply_id = '".$_SESSION['LOGINIDA_SSS']."' LIMIT 1");
	$rowstd = mysqli_fetch_array($sqllms);
//------------------------------------------------
if($rowstd['emply_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Admin/'.$rowstd['emply_photo'].'" alt="'.$rowstd['emply_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Admin/default.png" alt="'.$rowstd['emply_name'].'"/>';
}
//------------------------------------------------------
echo'
<!-- ===== Page-Content ===== -->
<div class="page-wrapper">
<!-- ===== Page-Container ===== -->
<div class="container-fluid">

<!-- ===== Row- Start ===== -->
<div class="row">
	<div class="col-md-6">
		<h1> Welcome '.$_SESSION['LOGINFNAMEA_SSS'].' - <small><b>Data Entry Operator</b></small></h1>
		<span style="color:blue;text-align:left;"> Last account activity:  '.$newDate.' ('.$timeago.') - <a href="AccountActivity.php" > Details </a> </span><br><br>
		<span style="float:right;color:#FFF;" id="date_time"> </span>
		<script type="text/javascript">window.onload = date_time("date_time");</script>
		
	</div>
	<div class="col-md-6">
		<span style="float:right;margin-bottom:20px;">'.$stdphoto.'</span>
	</div>
	
</div>
<div style="clear:both;"></div>
<!-- ===== Row- End ===== -->

<!-- ===== Row- Start ===== -->
<div class="row">
 
<!-- ===== Total Zones ===== -->		
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"><a href="Zones.php"> '.number_format($valuetotalzones['totalzones']).'</a> <i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"> <a href="Zones.php"> Zones </a></p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-primary text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Zones ===== -->
 
<!-- ===== Total Districts ===== -->		
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"> <a href="Districts.php"> '.number_format($valuetotalDistricts['totalDistricts']).'</a> <i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"> <a href="Districts.php"> Districts </a></p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-danger text-white"><i class="mdi mdi-coin"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Districts ===== -->
<!-- ===== Total Tehsils ===== -->	
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"><a href="Tehsils.php"> '.number_format($valuetotalTehsils['totalTehsils']).' </a> <i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"><a href="Tehsils.php"> Tehsils </a></p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-info text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Tehsils ===== -->
</div>
<!-- ===== Row- End ===== -->

<!-- ===== Row- Start ===== -->
<div class="row">

 
  
</div>
<!-- ===== Row- End ===== -->


<!-- ===== Row- Start ===== -->
<div class="row">

<div class="row">
	<div class="col-sm-6">
		<h4 class="box-title"> Latest Register Workers </h4>
	</div>
</div>';
//------------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".WORKERS." 
										WHERE worker_id != '' 
										ORDER BY worker_id DESC LIMIT 10");
//------------------------------------------------------------
echo'
<table class="color-table table-bordered primary-table table table-hover">
<thead>
	<tr>
		<th> Full Name </th>
		<th> Father Name </th>
		<th> WhatsApp </th>
		<th> Forum </th>
	</tr>
</thead>
<tbody>';
//-----------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//----------------------------------------------------
if($rowstd['id_forum']){
//-----------------------------------------------------
$sqlorgForum  = $dblms->querylms("SELECT * FROM ".FORUMS." 
									WHERE frm_shown = '1' 
									AND id_frm = '".$rowstd['id_forum']."'
									ORDER BY frm_name ASC ");
$rowForum = mysqli_fetch_array($sqlorgForum);

//-----------------------------------------------------
$ForumName = $rowForum['frm_name'];
//-----------------------------------------------------
}
//-----------------------------------------------------
echo'
<tr>
	<td> '.$rowstd['worker_fullname'].' </td>
	<td> '.$rowstd['worker_fathername'].' </td>
	<td> '.$rowstd['worker_whatsapp'].' </td>
	<td> '.$ForumName.' </td>
</tr>';
//-----------------------------------------------------
}
//-----------------------------------------------------
echo'
</tbody>
</table>

</div>
<!-- ===== Row- END ===== -->
</div>
<!-- ===== Page-Container-End ===== -->';
?>