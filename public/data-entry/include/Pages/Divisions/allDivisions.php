<?php
//*-------------------------------------------------------
	$sql2  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql2 		.= " AND ( div_ordering LIKE '%".$_GET['srch']."%' 
					OR div_name LIKE '%".$_GET['srch']."%' 
					OR div_name_ur LIKE '%".$_GET['srch']."%')";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------
if(($_GET['Province'])) { 
	$sql2 		.= " AND id_prov = '".$_GET['Province']."' ";
	$sqlmsstring	.= "&Province=".$_GET['Province']."";
}
//--------------------------------------------------------
if(($_GET['Zones'])) { 
	$sql2 		.= " AND id_zone = '".$_GET['Zones']."' ";
	$sqlmsstring	.= "&Zones=".$_GET['Zones']."";
}
//------------------------------------------------
if (!($Limit))   { $Limit = 50; }  
if ($page == "") { $page  = 1;  } 
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".DIVISIONS."  
										WHERE id_div != '' $sql2 
										ORDER BY id_div DESC");
//------------------------------------------------
	$sql_print  = "SELECT *  
										FROM ".DIVISIONS."  
										WHERE id_div != '' $sql2 
										ORDER BY id_div DESC";
//--------------------------------------------------
	$count 		   = mysqli_num_rows($sqllms);
	$NumberOfPages = ceil($count/$Limit);
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *   
										FROM ".DIVISIONS."  
										WHERE id_div != '' $sql2 
										ORDER BY id_div DESC LIMIT ".($page-1)*$Limit .",$Limit");
//--------------------------------------------------
if (mysqli_num_rows($sqllms) > 0) {
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:blue; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="export.php" method="post" target="_blank">
	<input type="hidden" name="type" value="Division">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-info">Export</button>
	Total Records: ('.number_format($count).')
</form>	
</div>';
//---------------------------------------------------------------------------------	
} else {
//---------------------------------------------------------------------------------
echo'
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
    <th> EN Name </th>
	<th style="text-align:right;"> UR Name </th>
	<th style="text-align:right;"> Province EN Name </th>
	<th style="text-align:center;"> Photo </th>
	<th style="text-align:center;"> Status </th>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
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
	$ctystatus = get_admstatus($rowstd['div_shown']);
//------------------------------------------------
if($rowstd['div_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Divisions/'.$rowstd['div_photo'].'" alt="'.$rowstd['div_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Divisions/default.png" alt="'.$rowstd['div_name'].'"/>';
}
//------------------------------------------------
if($rowstd['id_prov']) { 
	$sqllmsProvinces = $dblms->querylms("SELECT * FROM ".PROVINCES." WHERE id_prov = '".$rowstd['id_prov']."'");
	$valueProvinces  = mysqli_fetch_array($sqllmsProvinces);
	$ProvinceName 	 = $valueProvinces['prov_name'];
} else { 
	$ProvinceName   = '';
}
//------------------------------------------------
	

echo '
<tr >  
	<td>'.$rowstd['id_div'].'</td>
	<td>'.$rowstd['div_ordering'].'</td>
	<td>'.$rowstd['div_name'].'</td>
	<td style="direction:rtl; text-align:right; font-size:25px; line-height:30px; font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;">'.$rowstd['div_name_ur'].'</td>
	<td>'.$ProvinceName.'</td>
	<td align="center">'.$stdphoto.'</td>
	<td align="center">'.$ctystatus.'</td>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
 <td align="center">
	<a class="btn btn-xs btn-info" href="Divisions.php?view=modify&Did='.$rowstd['id_div'].'"><i class="fa fa-pencil"></i></a>
	<!--a class="btn btn-danger btn-xs" href="Divisions.php?Did='.$rowstd['id_div'].'&view=delete" data-popconfirm-yes="Yes" data-popconfirm-no="No" data-popconfirm-title="Are you sure want to delete?"> <i class="fa fa-trash-o" aria-hidden="true"></i></a-->
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
	$Nav .= '<li><a href="Divisions.php?page='.($page-1).$sqlstring.'">Prev</a></li>'; 
} 
for($i = 1 ; $i <= $NumberOfPages ; $i++) { 
if($i == $page) { 
	$Nav .= '<li class="active"><a href="">'.$i.'</a></li>'; 
} else { 
	$Nav .= '<li><a href="Divisions.php?page='.$i.$sqlstring.'">'.$i.'</a></li>';
} } 
if($page < $NumberOfPages) { 
	$Nav .= '<li><a href="Divisions.php?page='.($page+1).$sqlstring.'">Next</a><li>'; 
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