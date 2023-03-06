   <script src="https://login.minhaj.org/dawa_theme/assets/js/libs/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://login.minhaj.org/dawa_theme/plugins/table/datatable/datatables.css" >
    <link rel="stylesheet" type="text/css" href="https://login.minhaj.org/dawa_theme/plugins/table/datatable/custom_dt_html5.css" >
    <link rel="stylesheet" type="text/css" href="https://login.minhaj.org/dawa_theme/plugins/table/datatable/dt-global_style.css" >
<?php
//*-------------------------------------------------------
	$sql2  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql2 		.= " AND ( tsl_ordering LIKE '%".$_GET['srch']."%' 
					OR tsl_name LIKE '%".$_GET['srch']."%' 
					OR tsl_name_ur LIKE '%".$_GET['srch']."%')";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------
if(($_GET['District'])) { 
	$sql2 		.= " AND id_dist = '".$_GET['District']."' ";
	$sqlmsstring	.= "&District=".$_GET['District']."";
}
//--------------------------------------------------------
 
//------------------------------------------------
if (!($Limit))   { $Limit = 100; }  
if ($page == "") { $page  = 1;  } 
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".TEHSILS."   
										WHERE id_tsl != '' $sql2 
										ORDER BY id_tsl DESC");
										
//------------------------------------------------
	$sql_print  = "SELECT *  
										FROM ".TEHSILS."   
										WHERE id_tsl != '' $sql2 
										ORDER BY id_tsl DESC";
//--------------------------------------------------
	$count 		   = mysqli_num_rows($sqllms);
	$NumberOfPages = ceil($count/$Limit);
//------------------------------------------------
	$dblms->querylms("SELECT *   
										FROM ".TEHSILS."   
										WHERE id_tsl != '' $sql2 
										ORDER BY id_tsl DESC   ");
//--------------------------------------------------
if (mysqli_num_rows($sqllms) > 0) {
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:blue; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="export.php" method="post" target="_blank">
	<input type="hidden" name="type" value="Tehsils">
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
	<input type="hidden" name="type" value="Tehsils">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-success"> Print Tehsils </button>
</form>	
</div>
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:blue; margin-right:10px;"> 
	Total Records: ('.number_format($count).')
</div>';
//---------------------------------------------------------------------------------	
}
//---------------------------------------------------------------------------------	
echo'
 <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
<thead>
<tr>
    <th> ID </th>
	<th> Ordering </th>
    <th> Tehsil EN Name </th>
	<th style="text-align:right;"> Tehsil UR Name </th>
	<th style="text-align:left;"> District EN Name </th>
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
	$ctystatus = get_admstatus($rowstd['tsl_shown']);
//------------------------------------------------
if($rowstd['tsl_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Tehsils/'.$rowstd['tsl_photo'].'" alt="'.$rowstd['tsl_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Tehsils/default.png" alt="'.$rowstd['tsl_name'].'"/>';
}
//------------------------------------------------
if($rowstd['id_dist']) { 
	$sqllmsDistrict = $dblms->querylms("SELECT * FROM ".DISTRICTS." WHERE id_dist = '".$rowstd['id_dist']."'");
	$valueDistrict  = mysqli_fetch_array($sqllmsDistrict);
	$DistrictName 	 = $valueDistrict['dist_name'];
} else { 
	$DistrictName   = '';
}
//------------------------------------------------
	

echo '
<tr>  
	<td>'.$rowstd['id_tsl'].'</td>
	<td>'.$rowstd['tsl_ordering'].'</td>
	<td>'.$rowstd['tsl_name'].'</td>
	<td style="direction:rtl; text-align:right; font-size:25px; line-height:30px; font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;">'.$rowstd['tsl_name_ur'].'</td>
	<td>'.$DistrictName.'</td>
	<td align="center">'.$stdphoto.'</td>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
<td align="center">'.$ctystatus.'</td>
<td align="center">
	<a class="btn btn-xs btn-info" href="Tehsils.php?view=modify&Tid='.$rowstd['id_tsl'].'"><i class="fa fa-pencil"></i></a>
	<a class="btn btn-danger btn-xs" href="Tehsils.php?Tid='.$rowstd['id_tsl'].'&view=delete" data-popconfirm-yes="Yes" data-popconfirm-no="No" data-popconfirm-title="Are you sure want to delete?"> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
if($count>$Limit && false) {
echo '
<div class="widget-foot">
<!--WI_PAGINATION-->
<ul class="pagination pull-right">';
	$Nav= ""; 
if($page > 1) { 
	$Nav .= '<li><a href="Tehsils.php?page='.($page-1).$sqlstring.'">Prev</a></li>'; 
} 
for($i = 1 ; $i <= $NumberOfPages ; $i++) { 
if($i == $page) { 
	$Nav .= '<li class="active"><a href="">'.$i.'</a></li>'; 
} else { 
	$Nav .= '<li><a href="Tehsils.php?page='.$i.$sqlstring.'">'.$i.'</a></li>';
} } 
if($page < $NumberOfPages) { 
	$Nav .= '<li><a href="Tehsils.php?page='.($page+1).$sqlstring.'">Next</a><li>'; 
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

<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="https://login.minhaj.org/dawa_theme/plugins/table/datatable/datatables.js"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="https://login.minhaj.org/dawa_theme/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
<script src="https://login.minhaj.org/dawa_theme/plugins/table/datatable/button-ext/jszip.min.js"></script>
<script src="https://login.minhaj.org/dawa_theme/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
<script src="https://login.minhaj.org/dawa_theme/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
<script>
    $('#html5-extension').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 500
    } );
</script>