<?php 
//-------------------------Total Tehsils-----------------------
	$sqllmstotalTehsils  = $dblms->querylms("SELECT COUNT(id_tsl) AS totalTehsils FROM ".TEHSILS."
										WHERE id_dist = '".$_SESSION['LOGINDISTRICT_SSS']."' ");
	$valuetotalTehsils   = mysqli_fetch_array($sqllmstotalTehsils);
//-------------------------Total TanzeemiTehsils-----------------------
	$sqllmstotalTanzeemiTehsils  = $dblms->querylms("SELECT COUNT(id_mtsl) AS totalTanzeemiTehsils FROM ".TANZEEMI_TEHSILS."
										WHERE id_mdist = '".$_SESSION['LOGINDISTRICT_SSS']."' AND mtsl_shown = '1' ");
	$valuetotalTanzeemiTehsils   = mysqli_fetch_array($sqllmstotalTanzeemiTehsils);
//-------------------------Total Members-----------------------
	$sqllmstotalWorkers  = $dblms->querylms("SELECT COUNT(worker_id) AS totalWorkers FROM ".WORKERS." WHERE id_dist = '".$_SESSION['LOGINDISTRICT_SSS']."' ");
	$valuetotalWorkers   = mysqli_fetch_array($sqllmstotalWorkers);
//-------------------------Total Forums-----------------------
	$sqllmsTotalForums  = $dblms->querylms("SELECT COUNT(id_frm) AS TotalForums FROM ".FORUMS." WHERE id_frm != '' ");
	$valueTotalForums   = mysqli_fetch_array($sqllmsTotalForums);
//-------------------------Total Admins-----------------------
	$sqllmstotalAdmins  = $dblms->querylms("SELECT COUNT(admin_id) AS totalAdmins FROM ".ADMINS." 
											WHERE admin_status = '1' ");
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
//-------------------------Total Tehsils-----------------------
	$sqllmsTehsils  = $dblms->querylms("SELECT * FROM ".TEHSILS."
										WHERE id_dist = '".$_SESSION['LOGINDISTRICT_SSS']."' ");
	$valueTehsils   = mysqli_fetch_array($sqllmsTehsils);
//------------------------------------------------------
echo'
<!-- ===== Page-Content ===== -->
<div class="page-wrapper">
<!-- ===== Page-Container ===== -->
<div class="container-fluid">


<!-- ===== Row- Start ===== -->
<div class="row">
	<div class="col-md-6">
		<h1> '.$_SESSION['LOGINFNAMEA_SSS'].' ( Coordinator : '.$valueTehsils['tsl_name'].' ) </h1>
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
<!-- ===== Total Tanzeemi Tehsils ===== -->		
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"><a href="TanzimeTehsils.php"> '.number_format($valuetotalTanzeemiTehsils['totalTanzeemiTehsils']).' </a><i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"><a href="TanzimeTehsils.php"> Tanzeemi Tehsils </a></p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-primary text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Tanzeemi Tehsils ===== -->
<!-- ===== Total Members ===== -->		
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"><a href="Workers.php"> '.number_format($valuetotalWorkers['totalWorkers']).'</a> </span>
				<p class="font-12"> <a href="Workers.php"> Workers </a></p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-success text-white"><i class="mdi mdi-comment-text-outline"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Members ===== -->
<!-- ===== Total Admins ===== -->		
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"><a href="#"> '.number_format($valueTotalForums1['TotalForums']).'</a> <i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"> <a href="#"> Wabastgan </a></p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-danger text-white"><i class="mdi mdi-coin"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Admins ===== -->
</div>
<!-- ===== Row- End ===== -->


<!-- ===== Row- Start ===== -->
<div class="row">
<div class="col-md-12">
<div class="white-box user-table">

<div class="row">
	<div class="col-sm-6">
		<h4 class="box-title"> Latest Register Workers </h4>
	</div>
</div>';
//------------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".WORKERS." 
										WHERE worker_id != '' 
										AND id_dist = '".$_SESSION['LOGINDISTRICT_SSS']."'
										ORDER BY worker_id DESC LIMIT 10");
//------------------------------------------------------------
echo'
<div class="table-responsive">
<table class="color-table table-bordered primary-table table table-hover">
<thead>
<tr>
	<th> Full Name </th>
	<th> Father Name </th>
	<th> WhatsApp </th>
	<th> Forum </th>
	<th> Tehseel </th>
	<th> Photo </th>
	<th> Join Date </th>
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
$ForumName = $rowForum['frm_code'];
//-----------------------------------------------------
}
//----------------------------------------------------
if($rowstd['id_mtsl']){
//-----------------------------------------------------
$sqlorgTehseel  = $dblms->querylms("SELECT * FROM ".TANZEEMI_TEHSILS." 
									WHERE mtsl_shown = '1' 
									AND id_mtsl = '".$rowstd['id_mtsl']."' ");
$rowTehseel = mysqli_fetch_array($sqlorgTehseel);
//-----------------------------------------------------
$TehseelName = $rowTehseel['mtsl_name'];
//-----------------------------------------------------
}
//------------------------------------------------
if($rowstd['worker_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Workers/'.$rowstd['worker_photo'].'" alt="'.$rowstd['worker_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Workers/default.png" alt="'.$rowstd['worker_name'].'"/>';
}
//-----------------------------------------------------
echo'
<tr>
	<td style="text-align:left;">'.$rowstd['worker_fullname'].'</td>
	<td style="text-align:left;">'.$rowstd['worker_fathername'].'</td>
	<td style="text-align:left;">'.$rowstd['worker_whatsapp'].'</td>
	<td style="text-align:left;">'.$ForumName.'</td>
	<td style="text-align:left;">'.$TehseelName.'</td>
	<td style="text-align:left;">'.$stdphoto.'</td>
	<td style="text-align:left;">'.$rowstd['worker_regdate'].'</td>
</tr>';
//-----------------------------------------------------
}
//-----------------------------------------------------
echo'
</tbody>
</table>
</div>

</div>
</div>
</div>
<!-- ===== Row- END ===== -->
</div>
<!-- ===== Page-Container-End ===== -->';
?>