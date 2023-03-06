<?php
//------------------------------------------------
if (!($Limit))   { $Limit = 10; }  
if ($page == "") { $page  = 1;  } 
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".ADMINS." 
										WHERE emply_id != '' $sql5 
										ORDER BY emply_id DESC");
//--------------------------------------------------
	$sql_print  = " SELECT *  
										FROM ".ADMINS." 
										WHERE emply_id != '' $sql5 
										ORDER BY emply_id DESC";
//--------------------------------------------------
	$count 		   = mysqli_num_rows($sqllms);
	$NumberOfPages = ceil($count/$Limit);
//------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *   
										FROM ".ADMINS." 
										WHERE emply_id != '' $sql5 
										ORDER BY emply_id DESC LIMIT ".($page-1)*$Limit .",$Limit");
//--------------------------------------------------
if (mysqli_num_rows($sqllms) > 0) {
//------------------------------------------------
echo '
<div class="navbar-form navbar-right form-small" style="font-weight:700; color:red; margin-right:10px;"> 
<form class="navbar-form navbar-left form-small" action="export.php" method="post" target="_blank">
	<input type="hidden" name="type" value="Admins">
	<input type="hidden" name="print_sql" value="'.$sql_print.'">
	<button type="submit" class="btn btn-info">Export</button>
	Total Records: ('.number_format($count).')
</form>	
</div>
<table class="color-table table-bordered primary-table table table-hover">
<thead>
<tr>
    <th>ID</th>
    <th> Full Name </th>
	<th> Phone </th>
	<th> Email </th>
	<th> Join Date </th>
	<th style="text-align:center;"> Photo </th>
	<th style="text-align:center;"> Status </th>
    <th style="text-align:center;"> Actions </th>
</tr>
</thead>
<tbody>';
//------------------------------------------------
while($rowstd = mysqli_fetch_array($sqllms)) {
//------------------------------------------------
	$ctystatus = get_admstatus($rowstd['emply_status']);
	$admtype = get_admtypes($rowstd['emply_type']);
//------------------------------------------------
if($rowstd['emply_photo']) { 
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Admin/'.$rowstd['emply_photo'].'" alt="'.$rowstd['emply_name'].'"/>';
} else {
	$stdphoto = '<img class="img-circle" height="50" width="50" src="photos/Admin/default.png" alt="'.$rowstd['emply_name'].'"/>';
}
//------------------------------------------------
echo '
<tr >  
	<td>'.$rowstd['emply_id'].'</td>
	<td>'.$rowstd['emply_fullname'].'</td>
	<td>'.$rowstd['emply_phone'].'</td>
	<td>'.$rowstd['emply_email'].'</td>
	<td>'.$rowstd['emply_joinsdate'].'</td>
	<td align="center">'.$stdphoto.'</td>
	<td align="center">'.$ctystatus.'</td>
 <td align="center">
	<a class="btn btn-xs btn-info" href="Admins.php?view=modify&Aid='.$rowstd['emply_id'].'"><i class="fa fa-pencil"></i></a>
	<!--a class="btn btn-danger btn-xs" href="Admins.php?Aid='.$rowstd['emply_id'].'&view=delete" data-popconfirm-yes="Yes" data-popconfirm-no="No" data-popconfirm-title="Are you sure want to delete?"> <i class="fa fa-trash-o" aria-hidden="true"></i></a-->
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
	$Nav .= '<li><a href="Admins.php?page='.($page-1).$sqlstring.'">Prev</a></li>'; 
} 
for($i = 1 ; $i <= $NumberOfPages ; $i++) { 
if($i == $page) { 
	$Nav .= '<li class="active"><a href="">'.$i.'</a></li>'; 
} else { 
	$Nav .= '<li><a href="Admins.php?page='.$i.$sqlstring.'">'.$i.'</a></li>';
} } 
if($page < $NumberOfPages) { 
	$Nav .= '<li><a href="Admins.php?page='.($page+1).$sqlstring.'">Next</a><li>'; 
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