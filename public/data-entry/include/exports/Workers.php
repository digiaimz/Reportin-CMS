<?php 
//------------------------------------------------
$printsql 	= stripslashes($_POST['print_sql']);
//------------------------------------------------
$sqllms  = $dblms->querylms($printsql);
//------------------------------------------------
	$filename = "Workers";
//------------------------------------------------
/** Include PHPExcel */
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
//------------------------------------------------
// Create new PHPExcel object
//echo date('H:i:s').' Create new PHPExcel object'.EOL;
$objPHPExcel = new PHPExcel();
//------------------------------------------------
// Set document properties
//echo date('H:i:s').' Set document properties'.EOL;
$objPHPExcel->getProperties()->setCreator('Maarten Balliauw')
							 ->setLastModifiedBy('Maarten Balliauw')
							 ->setTitle('PHPExcel Test Document')
							 ->setSubject('PHPExcel Test Document')
							 ->setDescription('Test document for PHPExcel, generated using PHP classes.')
							 ->setKeywords('office PHPExcel php')
							 ->setCategory('Test result file');
//------------------------------------------------
// Create the worksheet
//echo date('H:i:s').' Add data'.EOL;
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'DAWAT BY SOCIAL MEDIA');
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'WORKERS DETAIL');
$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Sr.#')
                              ->setCellValue('B3', 'Full Name')
							  ->setCellValue('C3', 'Father Name')
							  ->setCellValue('D3', 'Whatsapp')
							  ->setCellValue('E3', 'Forum')
							  ->setCellValue('F3', 'District')
							  ->setCellValue('G3', 'Tehsil / Provincial Halaqa')
							  ->setCellValue('H3', 'Join Date');
//---------------------------------------------------------------------
$dataArray = array();
//---------------------------------------------------------------------
$srno = 0;
//---------------------------------------------------------------------
while($row = mysqli_fetch_array($sqllms)) {
//---------------------------------------------------------------------
$srno++;
//---------------------------------------------------------------------
if($row['id_country']) {
	$sqllmscountry	= $dblms->querylms("SELECT country_id, country_name FROM ".COUNTRIES." WHERE country_id = '".$row['id_country']."' LIMIT 1");
	$rowcountry 	= mysqli_fetch_array($sqllmscountry);
	$countryname	= $rowcountry['country_name'];
} else { 
	$countryname 	= ''; 
}
//---------------------------------------------------------------------
if($row['id_forum']) {
	$sqllmsForum	= $dblms->querylms("SELECT id_frm, frm_name FROM ".FORUMS." WHERE id_frm = '".$row['id_forum']."' LIMIT 1");
	$rowForum	 	= mysqli_fetch_array($sqllmsForum);
	$Forum			= $rowForum['frm_name'];
} else { 
	$Forum 			= ''; 
}
//---------------------------------------------------------------------
if($row['id_dist']) {
	$sqllmsDistrict		= $dblms->querylms("SELECT id_dist, dist_name FROM ".DISTRICTS." WHERE id_dist = '".$row['id_dist']."' LIMIT 1");
	$rowDistrict	 	= mysqli_fetch_array($sqllmsDistrict);
	$District			= $rowDistrict['dist_name'];
} else { 
	$District 			= ''; 
}
//---------------------------------------------------------------------
if($row['id_mtsl']) {
	$sqllmsmtsl		= $dblms->querylms("SELECT id_mtsl, mtsl_name FROM ".TANZEEMI_TEHSILS." WHERE id_mtsl = '".$row['id_mtsl']."' LIMIT 1");
	$rowmtsl	 	= mysqli_fetch_array($sqllmsmtsl);
	$MTSLName		= $rowmtsl['mtsl_name'];
} else { 
	$MTSLName 		= ''; 
}
//---------------------------------------------------------------------
	 $dataArray[] = array(	  $srno									    , 
	 							$row['worker_fullname']				 	, 
								$row['worker_fathername']				, 
								$row['worker_whatsapp']				 	, 
								$Forum				 					, 
								$District				 				, 
								$MTSLName								, 
								$row['date_added']					
						);
//---------------------------------------------------------------------
}
//---------------------------------------------------------------------
$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A4');
//---------------------------------------------------------------------
// Set title row bold
//echo date('H:i:s').' Set title row bold'.EOL;
$objPHPExcel->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(30);
$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
$objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A3:M3')->getFont()->setBold(true);


$objPHPExcel->getActiveSheet()->mergeCells('A1:K1');
$objPHPExcel->getActiveSheet()->mergeCells('A2:K2');

$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

//$objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// Set autofilter
//echo date('H:i:s').' Set autofilter'.EOL;
// Always include the complete filter range!
// Excel does support setting only the caption
// row, but that's not a best practise...
//$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
//echo date('H:i:s') , " Write to Excel2007 format" , EOL;
//$callStartTime = microtime(true);

//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
//$callEndTime = microtime(true);
//$callTime = $callEndTime - $callStartTime;
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>