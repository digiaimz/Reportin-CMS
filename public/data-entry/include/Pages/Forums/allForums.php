<?php
//------------------------------------------------
if (!($Limit))   { $Limit = 30; }  
if ($page == "") { $page  = 1;  } 
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".FORUMS." 
										WHERE id_frm != '' $sql2 
										ORDER BY id_frm DESC");
										
//------------------------------------------------
	$sql_print  = "SELECT *  
										FROM ".FORUMS." 
										WHERE id_frm != '' $sql2 
										ORDER BY id_frm DESC" ;
//--------------------------------------------------
	$count 		   = mysqli_num_rows($sqllms);
	$NumberOfPages = ceil($count/$Limit);
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *   
										FROM ".FORUMS." 
										WHERE id_frm != '' $sql2 
										ORDER BY id_frm DESC LIMIT ".($page-1)*$Limit .",$Limit");
//--------------------------------------------------
if (mysqli_num_rows($sqllms) > 0) {
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:blue; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="export.php" method="post" target="_blank">
	<input type="hidden" name="type" value="Forums">
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
    <th> Name </th>
	<th> Code </th>
	<th style="text-align:right;"> Name Ur </th>
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
	$ctystatus = get_admstatus($rowstd['frm_shown']);
//------------------------------------------------
if($rowstd['frm_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Forums/'.$rowstd['frm_photo'].'" alt="'.$rowstd['frm_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Forums/default.png" alt="'.$rowstd['frm_name'].'"/>';
}
//------------------------------------------------
	

echo '
<tr >  
	<td>'.$rowstd['id_frm'].'</td>
	<td>'.$rowstd['frm_name'].'</td>
	<td>'.$rowstd['frm_code'].'</td>
	<td style="direction:rtl; text-align:right; font-size:25px; line-height:30px; font-family:Jameel Noori Nastaleeq, NafeesWebNaskhRegular, sans-serif;">'.$rowstd['frm_name_ur'].'</td>
	<td align="center">'.$stdphoto.'</td>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'
<td align="center">'.$ctystatus.'</td>	
 <td align="center">
	<a class="btn btn-xs btn-info" href="Forums.php?view=modify&Fid='.$rowstd['id_frm'].'"><i class="fa fa-pencil"></i></a>
	<!--a class="btn btn-danger btn-xs" href="Forums.php?Fid='.$rowstd['id_frm'].'&view=delete" data-popconfirm-yes="Yes" data-popconfirm-no="No" data-popconfirm-title="Are you sure want to delete?"> <i class="fa fa-trash-o" aria-hidden="true"></i></a-->
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
	$Nav .= '<li><a href="Forums.php?page='.($page-1).$sqlstring.'">Prev</a></li>'; 
} 
for($i = 1 ; $i <= $NumberOfPages ; $i++) { 
if($i == $page) { 
	$Nav .= '<li class="active"><a href="">'.$i.'</a></li>'; 
} else { 
	$Nav .= '<li><a href="Forums.php?page='.$i.$sqlstring.'">'.$i.'</a></li>';
} } 
if($page < $NumberOfPages) { 
	$Nav .= '<li><a href="Forums.php?page='.($page+1).$sqlstring.'">Next</a><li>'; 
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