<?php
//-------------------------------------------------------
	$sql2  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql2 		.= " AND ( mtsl_ordering LIKE '%".$_GET['srch']."%' 
					OR mtsl_name LIKE '%".$_GET['srch']."%' 
					OR mtsl_name_ur LIKE '%".$_GET['srch']."%')";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------

//--------------------------------------------------------
if(($_GET['District'])) { 
	$sql2 		.= " AND id_mdist = '".$_GET['District']."' ";
	$sqlmsstring	.= "&District=".$_GET['District']."";
}
//--------------------------------------------------------
if($_SESSION['LOGINDISTRICT_SSS']) { 
	$sql2 			.= " AND id_mdist = '".$_SESSION['LOGINDISTRICT_SSS']."' AND mtsl_shown = '1' ";
} else {
	$sql2 			.= "";
}
//------------------------------------------------
if (!($Limit))   { $Limit = 100; }  
if ($page == "") { $page  = 1;  } 
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".TANZEEMI_TEHSILS."  
										WHERE id_mtsl != '' $sql2 
										ORDER BY id_mtsl DESC");
//------------------------------------------------
	$sql_print  = "SELECT *  
										FROM ".TANZEEMI_TEHSILS."  
										WHERE id_mtsl != '' $sql2 
										ORDER BY id_mtsl DESC";
//--------------------------------------------------
	$count 		   = mysqli_num_rows($sqllms);
	$NumberOfPages = ceil($count/$Limit);
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *   
										FROM ".TANZEEMI_TEHSILS."  
										WHERE id_mtsl != '' $sql2 
										ORDER BY id_mtsl DESC LIMIT ".($page-1)*$Limit .",$Limit");
//--------------------------------------------------
if (mysqli_num_rows($sqllms) > 0) {
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:blue; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="export.php" method="post" target="_blank">
	<input type="hidden" name="type" value="TTehsils">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-info">Export</button>
	Total Records: ('.number_format($count).')
</form>	
</div>';
//---------------------------------------------------------------------------------	
} else {
//---------------------------------------------------------------------------------
echo'
<div class="navbar-form navbar-left form-small" style="font-weight:700; color:red; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="Print.php" method="post" target="_blank">
	<input type="hidden" name="type" value="TTehsils">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-success"> Print Tanzime Tehsils </button>
</form>	
</div>
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:blue; margin-right:10px;"> 
	Total Records: ('.number_format($count).')
</div>';
//---------------------------------------------------------------------------------	
}
//---------------------------------------------------------------------------------	
echo'
<table class="color-table table-bordered primary-table table table-hover">
<thead>
<tr>
    <th> ID </th>
	<th> Ordering </th>
    <th> Tehsil EN Name </th>
	<th style="text-align:right;"> Tehsil UR Name </th>
	<th> District EN Name </th>
	<th style="text-align:center;"> Photo </th>';
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
	$ctystatus = get_admstatus($rowstd['mtsl_shown']);
//------------------------------------------------
if($rowstd['mtsl_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/TanzeemiTehsils/'.$rowstd['mtsl_photo'].'" alt="'.$rowstd['mtsl_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/TanzeemiTehsils/default.png" alt="'.$rowstd['mtsl_name'].'"/>';
}
//------------------------------------------------
if($rowstd['id_mdist']) { 
	$sqllmsDistrict = $dblms->querylms("SELECT * FROM ".DISTRICTS." WHERE id_dist = '".$rowstd['id_mdist']."'");
	$valueDistrict  = mysqli_fetch_array($sqllmsDistrict);
	$DistrictName 	 = $valueDistrict['dist_name'];
} else { 
	$DistrictName   = '';
}
//------------------------------------------------
	

echo '
<tr>  
	<td>'.$rowstd['id_mtsl'].'</td>
	<td>'.$rowstd['mtsl_ordering'].'</td>
	<td>'.$rowstd['mtsl_name'].'</td>
	<td style="direction:rtl; text-align:right; font-size:25px; line-height:30px; font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;">'.$rowstd['mtsl_name_ur'].'</td>
	<td>'.$DistrictName.'</td>
	<td align="center">'.$stdphoto.'</td>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'
<td align="center">'.$ctystatus.'</td>	
<td align="center">
	<a class="btn btn-xs btn-info" href="TanzimeTehsils.php?view=modify&id='.$rowstd['id_mtsl'].'"><i class="fa fa-pencil"></i></a>
	<!--a class="btn btn-danger btn-xs" href="TanzimeTehsils.php?id='.$rowstd['id_mtsl'].'&view=delete" data-popconfirm-yes="Yes" data-popconfirm-no="No" data-popconfirm-title="Are you sure want to delete?"> <i class="fa fa-trash-o" aria-hidden="true"></i></a-->
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
	$Nav .= '<li><a href="TanzimeTehsils.php?page='.($page-1).$sqlstring.'">Prev</a></li>'; 
} 
for($i = 1 ; $i <= $NumberOfPages ; $i++) { 
if($i == $page) { 
	$Nav .= '<li class="active"><a href="">'.$i.'</a></li>'; 
} else { 
	$Nav .= '<li><a href="TanzimeTehsils.php?page='.$i.$sqlstring.'">'.$i.'</a></li>';
} } 
if($page < $NumberOfPages) { 
	$Nav .= '<li><a href="TanzimeTehsils.php?page='.($page+1).$sqlstring.'">Next</a><li>'; 
} 
	echo $Nav;
echo '
</ul>
<!--WI_PAGINATION-->
	<div class="clearfix"></div>
</div>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
} else { 
//---------------------------------------------------------------------------------
echo '
<div class="col-lg-12">
	<div style="font-size:28px;text-align:center;color:red;"> No Result Found </div>
</div>
<br><br><br><br>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
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