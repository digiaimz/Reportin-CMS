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
		<h1> Welcome '.$_SESSION['LOGINFNAMEA_SSS'].' - '.get_admtypes($_SESSION['LOGINTYPE_SSS']).'</h1>
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
<!-- ===== Total Provinces ===== -->	
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"><a href="Provinces.php">'.number_format($valuetotalprovinces['totalprovinces']).'</a> <i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"> <a href="Provinces.php"> Provinces </a>  </p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-info text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Provinces ===== -->
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
<!-- ===== Total Division ===== -->		
<div class="col-md-3">
	<div class="white-box ecom-stat-widget">
		<div class="row">
			<div class="col-xs-6">
				<span class="text-blue font-light"> <a href="Divisions.php"> '.number_format($valuetotaldivision['totaldivision']).'</a> <i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"> <a href="Divisions.php"> Division </a></p>
			</div>
			<div class="col-xs-6">
				<span class="icoleaf bg-success text-white"><i class="mdi mdi-comment-text-outline"></i></span>
			</div>
		</div>
	</div>
</div>
<!-- ===== Total Division ===== -->
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
</div>
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
				<span class="text-blue font-light"><a href="Workers.php"> '.number_format($valuetotalMembers['totalMembers']).'</a> </span>
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
				<span class="text-blue font-light"><a href="Admins.php"> '.number_format($valuetotalAdmins['totalAdmins']).'</a> <i class="icon-arrow-up-circle text-success"></i></span>
				<p class="font-12"> <a href="Admins.php"> Total Admins </a></p>
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
	<td><a href="Workers.php?view=modify&Wid='.$rowstd['worker_id'].'">'.$rowstd['worker_fullname'].' </a></td>
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

<div class="row">
<div class="col-lg-3 col-md-3 col-sm-3 mt-5 student-data-table-mobile">
<h4> Latest Register Workers </h4>
<div class="accordion custom-accordion" id="accordionExample">';
//---------------------------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".WORKERS." 
										WHERE worker_id != '' 
										ORDER BY worker_id DESC LIMIT 3");
//---------------------------------------------------------------------------
$collapseOne = 0 ;
//---------------------------------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//---------------------------------------------------------------------------
$collapseOne++;
//---------------------------------------------------------------------------
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
//---------------------------------------------------------------------------
echo'
<div class="card shadow-none my-card">
	<a data-toggle="collapse" href="#'.$collapseOne.'" class="faq" aria-expanded="true" aria-controls="'.$collapseOne.'">
		<div class="card-header" id="headingOne">
			<h6 class="mb-0 faq-question">
				<i class="text-primary h5 mr-3"></i>'.$rowstd['worker_fullname'].'
				<i class="mdi mdi-minus-box float-right accor-plus-icon"></i>
			</h6>
		</div>
	</a>

<div id="'.$collapseOne.'" class="collapse show" aria-labelledby="'.$collapseOne.'" data-parent="#accordionExample">
<div class="card-body">
<p class="text-muted mb-0 faq-ans">
<table class="table table-bordered my-table">
<tbody>
	<tr>
	  <th scope="row"> ID </th>
	  <td><a href="Workers.php?view=modify&Wid='.$rowstd['worker_id'].'">'.$rowstd['worker_fullname'].' </a></td>
	</tr>
	<tr>
	  <th scope="row"> Father Name </th>
	  <td> '.$rowstd['worker_fathername'].' </td>
	</tr>
	<tr>
	  <th scope="row"> Whatsapp # </th>
	  <td> '.$rowstd['worker_whatsapp'].' </td>
	</tr>
	<tr>
	  <th scope="row">Forum Name</th>
	  <td> '.$ForumName.' </td>
	</tr>

</tbody>
</table>
</p>
</div>
</div>
</div>
<!-- collapse one end -->';
//---------------------------------------------------------------------------
}
//---------------------------------------------------------------------------
echo'
</div>
</div>
</div>

</div>
<!-- ===== Row- END ===== -->
</div>
<!-- ===== Page-Container-End ===== -->';
?>