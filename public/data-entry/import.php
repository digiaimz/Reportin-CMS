<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/functions.php";
	include "functions/login_func.php";
//-----------------------------------------------
if(isset($_POST['view']) == 'import') { 
//--------------------------------------
if(!empty($_FILES['std_photo']['name'])) { 
//------------------------------------------------
if($_FILES["std_photo"]["size"] > 0) {
 
echo '
<h3 class="modal-title" style="font-weight:700; margin:10px;"> Import Halqas </h3>
<form class="form-horizontal" action="#" method="post" name="importdata" id="importdata" enctype="multipart/form-data">
<input type="hidden" value="importfile" name="view" id="view">
<table class="table table-bordered" border="1" style="border-collapse:collapse;">
<thead>
<tr>
	<th style="font-weight:700;"> Sr.#</th>
	<th style="font-weight:700;"> Status</th>
	<th style="font-weight:700;"> Halqa Name.</th>
	<th style="font-weight:700;"> Province </th>
</tr>
</thead>
<tbody>';
//--------------------------------------
	$file_name = $_FILES['std_photo']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    //Checking the file extension
     if($ext == "xlsx" || $ext == "csv" || $ext == "xls"){

            $file_name = $_FILES['std_photo']['tmp_name'];
            $inputFileName = $file_name;
  //Had to change this path to point to IOFactory.php.
  //Do not change the contents of the PHPExcel-1.8 folder at all.
  include('PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

  //Use whatever path to an Excel file you need.

  try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
  } catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . 
        $e->getMessage());
  }

  $sheet = $objPHPExcel->getSheet(0);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();
//--------------------------------------
$srno = 0;
$srno1 = 0;
 for ($rowcurs = 1; $rowcurs <= $highestRow; $rowcurs++) { 
    $rowcursData = $sheet->rangeToArray('A' . $rowcurs . ':' . $highestColumn . $rowcurs, 
                                    null, true, false);
//--------------------------------------
$srno++;
if($srno> 1) {

//--------------------------------------------
$acno 			= $rowcursData[0][0];
$status 		= $rowcursData[0][1];
$halqa 			= $rowcursData[0][2];
$province 		= $rowcursData[0][3];
//--------------------------------------------
$srno1++;
	
$dateString= $dated;
//$myDateTime = DateTime::createFromFormat('m/d/Y', $dateString);
//$newDateString = $myDateTime->format('Y-m-d');
echo '
<tr>
	<td style="width:50px;">'.$srno1.'</td>
	<td style="width:30px;">'.$acno.'</td>
	<td>'.$halqa.'</td>
	<td>'.$province .'</td>
</tr>';
//--------------------------------------
	$sqllms  = $dblms->querylms("INSERT INTO ".PROVINCE_HALQA."(
														halqa_status						, 
														halqa_name							,
														id_province							,
														id_added 							,
														date_added 						
													  )
	   											VALUES( 
														'1'												,
														'".cleanvars($halqa)."'							, 
														'".cleanvars($province)."'						,
														'".cleanvars($_SESSION['LOGINIDA_SSS'])."'		,
														NOW()
													  )"
							);
//---------------------------------------------------------------
}
//---------------------------------------------------------------
}
//---------------------------------------------------------------
}
//---------------------------------------------------------------
echo '<tr><td colspan="10" style="text-align:right;"><button class="btn btn-info" name="submit_import" id="submit_import" type="submit" style="padding:5px 13px; font-size:12px;"> Save </button></td></tr>';
echo '
</tbody>
</table>
</form>'; 
//fclose($file);
}
//--------------------------------------
//} else {
//    echo 'The file is not readable';
//}
} else {
	echo '<div  class="alert-box error"><span>Oop: </span>File extension not valid, only .csv valid</div>';
}
//--------------------------------------
}
//--------------------------------------


//--------------------------------------
if(!isset($_POST['view'])) { 
//--------------------------------------
echo '
<form class="form-horizontal" action="import.php" method="post" id="feeMemo" enctype="multipart/form-data">
<input type="hidden" name="view" id="view" value="import">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" style="font-weight:700;"> Import Halqas </h4>
</div>
<div class="modal-body">
 

	<div class="form-group" style="margin-bottom:10px;">
		<label class="control-label req col-lg-12" style="width:150px;"> <b>File</b></label>
		<div class="col-lg-12">
			<input id="std_photo" name="std_photo" class="btn btn-mid btn-primary clearfix" required type="file"> 
			<span style="color:#f00;">File extension should be .csv only</span>
		</div>
	</div>
	
<div style="clear:both;"></div>

</div>

<div style="clear:both;"></div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Closed</button>
	<input class="btn btn-primary" type="submit" value=" Import " id="submit_file" name="submit_file">
</div>

</div>
</form>';
}

?>