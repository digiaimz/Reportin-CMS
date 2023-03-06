<?php
//-------------------------------------------------------
	$sql5  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql5 		.= " AND ( worker_fullname LIKE '%".$_GET['srch']."%' 
					OR worker_fathername LIKE '%".$_GET['srch']."%'	
					OR worker_guardian LIKE '%".$_GET['srch']."%'
					OR worker_email LIKE '%".$_GET['srch']."%'
					OR worker_cellno LIKE '%".$_GET['srch']."%' 
					OR worker_whatsapp LIKE '%".$_GET['srch']."%' 
					OR worker_postaladdress = '%".$_GET['srch']."%' )";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------
if(($_GET['gender'])) { 
	$sql5 		.= " AND worker_gender = '".$_GET['gender']."' ";
	$sqlmsstring	.= "&gender=".$_GET['gender']."";
}
//--------------------------------------------------------
if(($_GET['blood'])) { 
	$sql5 		.= " AND worker_blood = '".$_GET['blood']."' ";
	$sqlmsstring	.= "&blood=".$_GET['blood']."";
}
//--------------------------------------------------------
if(($_GET['Sid'])) { 
	$sql5 		.= " AND worker_id = '".$_GET['Sid']."' ";
	$sqlmsstring	.= "&Sid=".$_GET['Sid']."";
}
//--------------------------------------------------------
if(($_GET['DesignationLevels'])) { 
	$sql5 		.= " AND designation_level = '".$_GET['DesignationLevels']."' ";
	$sqlmsstring	.= "&DesignationLevels=".$_GET['DesignationLevels']."";
}
//--------------------------------------------------------
if(($_GET['Degrees'])) { 
	$sql5 		.= " AND worker_education = '".$_GET['Degrees']."' ";
	$sqlmsstring	.= "&Degrees=".$_GET['Degrees']."";
}
//--------------------------------------------------------
if(($_GET['Degrees'])) { 
	$sql5 		.= " AND worker_education = '".$_GET['Degrees']."' ";
	$sqlmsstring	.= "&Degrees=".$_GET['Degrees']."";
}
//--------------------------------------------------------
if(($_GET['ReligiousDegrees'])) { 
	$sql5 		.= " AND id_religious_degree = '".$_GET['ReligiousDegrees']."' ";
	$sqlmsstring	.= "&ReligiousDegrees=".$_GET['ReligiousDegrees']."";
}
//--------------------------------------------------------
if(($_GET['Tehsil'])) { 
	$sql5 			.= " AND id_mtsl = '".$_GET['Tehsil']."' ";
	$sqlmsstring	.= "&Tehsil=".$_GET['Tehsil']."";
}
//--------------------------------------------------------
if(($_GET['District'])) { 
	$sql5 			.= " AND id_dist = '".$_GET['District']."' ";
	$sqlmsstring	.= "&District=".$_GET['District']."";
}
//--------------------------------------------------------
if($_SESSION['LOGINDISTRICT_SSS']) { 
	$sql5 			.= " AND id_dist = '".$_SESSION['LOGINDISTRICT_SSS']."' ";
} else {
	$sql5 			.= " AND id_dist = '".$_GET['District']."' ";
}
//------------------------------------------------
if (!($Limit))   { $Limit = 10; }  
if ($page == "") { $page  = 1;  } 
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".WORKERS." 
										WHERE worker_id != '' $sql5 
										ORDER BY worker_id DESC");
//--------------------------------------------------
	$sql_print  = " SELECT *  
										FROM ".WORKERS." 
										WHERE worker_id != '' $sql5 
										ORDER BY worker_id DESC";
//--------------------------------------------------
	$count 		   = mysqli_num_rows($sqllms);
	$NumberOfPages = ceil($count/$Limit);
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *   
										FROM ".WORKERS." 
										WHERE worker_id != '' $sql5 
										ORDER BY worker_id DESC LIMIT ".($page-1)*$Limit .",$Limit");
//--------------------------------------------------
if (mysqli_num_rows($sqllms) > 0) {
//------------------------------------------------
echo'
<div class="navbar-form navbar-left form-small" style="font-weight:700; color:red; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="Print.php" method="post" target="_blank">
	<input type="hidden" name="type" value="Workers">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-success"> Print Workers </button>
</form>	
</div>
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:red; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="export.php" method="post" target="_blank">
	<input type="hidden" name="type" value="Workers">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-info">Export</button>
	Total Records: ('.number_format($count).')
</form>	
</div>
<table class="color-table table-bordered primary-table table table-hover">
<thead>
<tr>
	<th> # </th>
	<th> Full Name </th>
	<th> Father Name </th>
	<th> WhatsApp </th>
	<th> Forum </th>
	<th> Tehseel </th>
	<th> Photo </th>
	<th> Join Date </th>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
	<th style="text-align:center;"> Status </th>
    <th style="text-align:center;"> Actions </th>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
</tr>
</thead>
<tbody>';
//------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//------------------------------------------------
	$ctystatus = get_admstatus($rowstd['worker_status']);
	$admtype = get_admtypes($rowstd['worker_type']);
//------------------------------------------------
if($rowstd['worker_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Workers/'.$rowstd['worker_photo'].'" alt="'.$rowstd['worker_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Workers/default.png" alt="'.$rowstd['worker_name'].'"/>';
}
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
echo'
<tr>  
	<td style="text-align:left;">'.$rowstd['worker_id'].'</td>
	<td style="text-align:left;">'.$rowstd['worker_fullname'].'</td>
	<td style="text-align:left;">'.$rowstd['worker_fathername'].'</td>
	<td style="text-align:left;">'.$rowstd['worker_whatsapp'].'</td>
	<td style="text-align:left;">'.$ForumName.'</td>
	<td style="text-align:left;">'.$TehseelName.'</td>
	<td style="text-align:left;">'.$stdphoto.'</td>
	<td style="text-align:left;">'.$rowstd['worker_regdate'].'</td>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
	<td align="center">'.$ctystatus.'</td>
 <td align="center">
	<a class="btn btn-xs btn-info" href="Workers.php?view=modify&Wid='.$rowstd['worker_id'].'"><i class="fa fa-pencil"></i></a>
	<!--a class="btn btn-danger btn-xs" href="Workers.php?Wid='.$rowstd['worker_id'].'&view=delete" data-popconfirm-yes="Yes" data-popconfirm-no="No" data-popconfirm-title="Are you sure want to delete?"> <i class="fa fa-trash-o" aria-hidden="true"></i></a-->
</td>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
</tr>';
//---------------------------------------------------------------------------------
} // end while loop
//---------------------------------------------------------------------------------
echo '
</tbody>
</table>';
//---------------------------------------------------------------------------------
if($count>$Limit) {
echo '
<div class="widget-foot">
<!--WI_PAGINATION-->
<ul class="pagination pull-right">';
	$Nav= ""; 
if($page > 1) { 
	$Nav .= '<li><a href="Workers.php?page='.($page-1).$sqlstring.'">Prev</a></li>'; 
} 
for($i = 1 ; $i <= $NumberOfPages ; $i++) { 
if($i == $page) { 
	$Nav .= '<li class="active"><a href="">'.$i.'</a></li>'; 
} else { 
	$Nav .= '<li><a href="Workers.php?page='.$i.$sqlstring.'">'.$i.'</a></li>';
} } 
if($page < $NumberOfPages) { 
	$Nav .= '<li><a href="Workers.php?page='.($page+1).$sqlstring.'">Next</a><li>'; 
} 
	echo $Nav;
echo '
</ul>
<!--WI_PAGINATION-->
	<div class="clearfix"></div>
</div>';
}
//------------------------------------------------
} else { 
//------------------------------------------------
echo '
<div class="col-lg-12">
	<div style="font-size:28px;text-align:center;color:red;"> No Result Found </div>
</div>
<br><br><br><br>';
//------------------------------------------------
}
//------------------------------------------------
echo '


</div>
</div>
</div>
</div>
<!-- /.row -->

</div>
</div>
<!-- Page Content -->';
?>