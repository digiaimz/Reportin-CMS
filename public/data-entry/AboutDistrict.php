<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------------
	include_once("include/header.php");
//--------------------------------------------------------

//-------------------------------------------------------
echo'
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">


<!-------- ./Search Area row--------------->';
//---------------------------------------------------------------------------
	$sqllms  = $dblms->querylms("SELECT *  
										FROM ".DISTRICTS."  
										WHERE id_dist = '".$_SESSION['LOGINDISTRICT_SSS']."' ");
//---------------------------------------------------------------------------
	$rowstd = mysqli_fetch_array($sqllms);		
//---------------------------------------------------------------------------
echo'

<!-------- ./Search Area row--------------->
<!-- .row -->
<div class="row">
<div class="col-lg-12">
<div class="white-box">
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<h3 class="box-title m-t-40" style="font-family:Jameel Noori Nastaleeq;font-size:30px;text-decoration:none;text-align:center;"> About District '.$rowstd['dist_name'].' </h3>

<hr>

<!-- ===== Row- Start ===== -->
<div class="row">
<div class="col-md-12">
<div class="white-box user-table">

<div class="row">
	
	<div class="col-sm-12">
	 <h3 class="box-title m-t-40"> History of the District '.$rowstd['dist_name'].'</h3>
      <h3 class="box-title m-t-40">Objective</h3>
      <p>To promote the economic and Social interests of its members and more particularly to lay out, establish and maintain a garden town. (Bye-Law 4)</p>
	</div>
</div>


</div>
</div>
</div>
<!-- ===== Row- End ===== -->



</div>


<!-----------------Form End--------------->
</div>
</div>
</div>
</div>
</div>
<!--./row-->

</div>
</div>
<!-- Page Content -->';


//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>