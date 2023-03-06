<?php
//*-------------------------------------------------------
	$sql2  			= '';	
	$sqlmsstring	 = "";	
//--------------------------------------------------------
if(($_GET['srch'])) {
	$sql2 		.= " AND ( profession_abbr LIKE '%".$_GET['srch']."%' OR profession_name LIKE '%".$_GET['srch']."%'	)";
	$sqlmsstring .= "&srch=".$_GET['srch']."";
}
//--------------------------------------------------------

//------------------------------------------------
if (!($Limit))   { $Limit = 100; }  
if ($page == "") { $page  = 1;  } 
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".PROFESSIONS." 
										WHERE profession_id != '' $sql2 
										ORDER BY profession_name ASC");
//--------------------------------------------------
	$sql_print  = " SELECT *  
										FROM ".PROFESSIONS." 
										WHERE profession_id != '' $sql2 
										ORDER BY profession_name ASC ";
//--------------------------------------------------
	$count 		   = mysqli_num_rows($sqllms);
	$NumberOfPages = ceil($count/$Limit);
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *   
										FROM ".PROFESSIONS." 
										WHERE profession_id != '' $sql2 
										ORDER BY profession_name ASC LIMIT ".($page-1)*$Limit .",$Limit");
//--------------------------------------------------
if (mysqli_num_rows($sqllms) > 0) {
//------------------------------------------------
echo '

<div class="navbar-form navbar-right form-small" style="font-weight:700; color:red; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="export.php" method="post" target="_blank">
	<input type="hidden" name="type" value="Profession">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-info">Export</button>
	Total Records: ('.number_format($count).')
</form>	
</div>
<table class="color-table table-bordered primary-table table table-hover">
<thead>
<tr>
    <th> ID </th>
    <th> Name </th>
    <th> Code </th>
	<th style="text-align:center;"> Status </th>
    <th style="text-align:center;"> Actions </th>
</tr>
</thead>
<tbody>';
//------------------------------------------------
if($page == 1) {  
	$srno = 0;
} else {
	$srno = ($Limit * ($page-1));
}
//------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//------------------------------------------------
$srno++;
//------------------------------------------------
	$ctystatus = get_admstatus($rowstd['profession_status']);
//------------------------------------------------
	

echo '
<tr>  
	<td>'.$srno.'</td>
	<td>'.$rowstd['profession_name'].'</td>
	<td>'.$rowstd['profession_abbr'].'</td>
	<td align="center">'.$ctystatus.'</td>
 <td align="center">
	<a class="btn btn-xs btn-info" href="Profession.php?view=modify&Pid='.$rowstd['profession_id'].'"><i class="fa fa-pencil"></i></a>
	<!--a class="btn btn-danger btn-xs" href="Profession.php?Pid='.$rowstd['profession_id'].'&view=delete" data-popconfirm-yes="Yes" data-popconfirm-no="No" data-popconfirm-title="Are you sure want to delete?"> <i class="fa fa-trash-o" aria-hidden="true"></i></a-->
</td>
</tr>';
//------------------------------------------------
} // end while loop
//------------------------------------------------
echo '
</tbody>
</table>';
//-----------------------------------------
if($count>$Limit) {
echo '
<div class="widget-foot">
<!--WI_PAGINATION-->
<ul class="pagination pull-right">';
	$Nav= ""; 
if($page > 1) { 
	$Nav .= '<li><a href="Profession.php?page='.($page-1).$sqlstring.'">Prev</a></li>'; 
} 
for($i = 1 ; $i <= $NumberOfPages ; $i++) { 
if($i == $page) { 
	$Nav .= '<li class="active"><a href="">'.$i.'</a></li>'; 
} else { 
	$Nav .= '<li><a href="Profession.php?page='.$i.$sqlstring.'">'.$i.'</a></li>';
} } 
if($page < $NumberOfPages) { 
	$Nav .= '<li><a href="Profession.php?page='.($page+1).$sqlstring.'">Next</a><li>'; 
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