<?php 
//--------------- Status ------------------
$admstatus = array (
						array('status_id'=>1, 'status_name'=>'Active')		, array('status_id'=>2, 'status_name'=>'Inactive')
				   );
$ad_status = array (
						array('status_id'=>1, 'status_name'=>'Active')		, array('status_id'=>2, 'status_name'=>'Inactive')
				   );

function get_admstatus($id) {
	$listadmstatus= array (
							'1' => '<span class="label label-success" id="bns-status-badge">Active</span>', 
							'2' => '<span class="label label-danger" id="bns-status-badge">Inactive</span>');
	return $listadmstatus[$id];
}
//--------------- Employee Types ------------------
$gendertypes = array (
						array('id'=>1, 'name'=>'مرد'), 
						array('id'=>2, 'name'=>'عورت')
				    );
function get_gendertypes($id) {
	$listgendertypes = array (
								'1' => 'مرد', 
								'2' => 'عورت');
	return $listgendertypes[$id];
}
//--------------- STUDENT GENDER ------------------
$studentGender = array (
						array('id'=>1, 'name'=>'Male'), 
						array('id'=>2, 'name'=>'Female')
				    );

function get_studentGender($id) {

	$liststudentGender = array (
								'1' => 'Male', 
								'2' => 'Female');
	return $liststudentGender[$id];

}
//--------------- Suggestion Status ------------------
$SuggestionStatus = array (
						array('id'=>1, 'name'=>'Pending')				, 
						array('id'=>2, 'name'=>'Processing')			, 
						array('id'=>3, 'name'=>'Resolved')	
				   );

function get_SuggestionStatus($id) {
	$listSuggestionStatus = array (
							'1' => '<span class="label label-danger" id="bns-status-badge">Pending</span>', 
							'2' => '<span class="label label-info" id="bns-status-badge">Processing</span>', 
							'3' => '<span class="label label-success" id="bns-status-badge">Resolved</span>'	
						  );
	return $listSuggestionStatus[$id];
}
//--------------- Notification Status ------------------
$NotificationStatus = array (
						array('id'=>1, 'name'=>'Urgent')				, 
						array('id'=>2, 'name'=>'Reminder')				, 
						array('id'=>3, 'name'=>'Normal')	
				   );

function get_NotificationStatus($id) {
	$listNotificationStatus = array (
							'1' => '<span class="label label-danger" id="bns-status-badge">Urgent</span>', 
							'2' => '<span class="label label-info" id="bns-status-badge">Reminder</span>', 
							'3' => '<span class="label label-success" id="bns-status-badge">Normal</span>'	
						  );
	return $listNotificationStatus[$id];
}
//--------------- Designation Levels ------------------
$DesignationLevels = array (
						array('id'=>1, 'name'=>'Markaz')						,
						array('id'=>2, 'name'=>'Province')						, 
						array('id'=>3, 'name'=>'Zone')							, 
						array('id'=>4, 'name'=>'Division')						, 
						array('id'=>5, 'name'=>'Distric')						,
						array('id'=>6, 'name'=>'Tehsil')						,
						array('id'=>7, 'name'=>'Union Council')					,
						array('id'=>8, 'name'=>'Ward')					 
						
				   );

function get_DesignationLevels($id) {
	$listDesignationLevels = array (
							'1' => 'Markaz'										, 
							'2' => 'Province'									, 
							'3' => 'Zone'										, 
							'4' => 'Division'									,
							'5' => 'Distric'									,
							'6' => 'Tehsil'										,
							'7' => 'Union Council'								,
							'8' => 'Ward'									
						  );
	return $listDesignationLevels[$id];
}
//--------------- Designation Levels ------------------
$Degrees = array (
						array('id'=>1, 'name'=>'Primary/Middle')				,
						array('id'=>2, 'name'=>'Matric/O-Level')				,
						array('id'=>3, 'name'=>'FA/Fsc/A-Level')				, 
						array('id'=>4, 'name'=>'BA/Bsc')						, 
						array('id'=>5, 'name'=>'BS (Hons)')						, 
						array('id'=>6, 'name'=>'MA/Msc')						, 
						array('id'=>7, 'name'=>'Mphill/MS')						,
						array('id'=>8, 'name'=>'PHD')					 
						
				   );

function get_Degrees($id) {
	$listDegrees = array (
							'1' => 'Primary/Middle'									, 
							'2' => 'Matric/O-Level'									, 
							'3' => 'FA/Fsc/A-Level'									, 
							'4' => 'BA/Bsc'											, 
							'5' => 'BS (Hons)'										, 
							'6' => 'MA/Msc'											,
							'7' => 'Mphill/MS'										,
							'8' => 'PHD'									
						  );
	return $listDegrees[$id];
}
//--------------- Religious Levels ------------------
$ReligiousDegrees = array (
						array('id'=>1, 'name'=>'Nazra')							,
						array('id'=>2, 'name'=>'Hifz')							,
						array('id'=>3, 'name'=>'Sanwiya')						,
						array('id'=>4, 'name'=>'Aliya')							, 
						array('id'=>5, 'name'=>'Almiya')						, 
						array('id'=>6, 'name'=>'Fazal Arbi')					 
						
				   );

function get_ReligiousDegrees($id) {
	$listReligiousDegrees = array (
							'1' => 'Nazra'										, 
							'2' => 'Hifz'										, 
							'3' => 'Sanwiya'									, 
							'4' => 'Aliya'										, 
							'5' => 'Almiya'										, 
							'6' => 'Fazal Arbi'									
						  );
	return $listReligiousDegrees[$id];
}
//--------------- Religious Levels ------------------
$LifeMembership = array (
						array('id'=>1, 'name'=>'Yes')							,
						array('id'=>2, 'name'=>'No')					 
						
				   );

function get_LifeMembership($id) {
	$listLifeMembership = array (
							'1' => 'Yes'										, 
							'2' => 'No'									
						  );
	return $listLifeMembership[$id];
}
//--------------- StudentTypes ----------
$StudentTypes = array (
					array('id'=>'01', 'name'=>'Enquiry Complete')				,
					array('id'=>'02', 'name'=>'Enquiry 3+Days')					,
					array('id'=>'03', 'name'=>'Enquiry Left')					,	
					array('id'=>'04', 'name'=>'Trial Pending')					,
					array('id'=>'05', 'name'=>'Trial Classes')					,
					array('id'=>'06', 'name'=>'Trial 3+Days')					,
					array('id'=>'07', 'name'=>'Trial Left')						,
					array('id'=>'08', 'name'=>'Class Regular')					,
					array('id'=>'09', 'name'=>'Drop Out')						,
					array('id'=>'10', 'name'=>'Class Freez')					,
					array('id'=>'11', 'name'=>'Class Completed')				,
					array('id'=>'12', 'name'=>'Certificate Issued')	
				   );

function get_StudentTypes($id) {
	$listStudentTypes = array (
							'01'		=> 'Enquiry Complete'					,
							'02'		=> 'Enquiry 3+Days'						,
							'03'		=> 'Enquiry Left'						,
							'04'		=> 'Trial Pending'						,
							'05'		=> 'Trial Classes'						,
							'06'		=> 'Trial 3+Days'						,
							'07'		=> 'Trial Left'							,
							'08'		=> 'Class Regular'						,
							'09'		=> 'Drop Out'							,
							'10'		=> 'Class Freez'						,
							'11'		=> 'Class Completed'					,
							'12'		=> 'Certificate Issued'		
							);
	return $listStudentTypes[$id];
}
//--------------- Month By ----------
$monthby = array (
					array('id'=>'01', 'name'=>'Janaury')				,
					array('id'=>'02', 'name'=>'February')				,
					array('id'=>'03', 'name'=>'March')					,	
					array('id'=>'04', 'name'=>'April')					,
					array('id'=>'05', 'name'=>'May')					,
					array('id'=>'06', 'name'=>'June')					,
					array('id'=>'07', 'name'=>'July')					,
					array('id'=>'08', 'name'=>'August')					,
					array('id'=>'09', 'name'=>'September')				,
					array('id'=>'10', 'name'=>'October')				,
					array('id'=>'11', 'name'=>'November')				,
					array('id'=>'12', 'name'=>'December')	
				   );

function get_monthby($id) {
	$listmonthby = array (
							'01'		=> 'Janaury'						,
							'02'		=> 'February'						,
							'03'		=> 'March'							,
							'04'		=> 'April'							,
							'05'		=> 'May'							,
							'06'		=> 'June'							,
							'07'		=> 'July'							,
							'08'		=> 'August'							,
							'09'		=> 'September'						,
							'10'		=> 'October'						,
							'11'		=> 'November'						,
							'12'		=> 'December'		
							);
	return $listmonthby[$id];
}
//---------------------------------------
$newtimeslots = array('00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30','04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30','08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30','12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30','16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30','20:00', '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30');
//--------------- Level Status ------------------
$tanlevel = array (
						array('id'=>1, 'name'=>'Markazi')		,
						array('id'=>2, 'name'=>'Province')		,  
						array('id'=>3, 'name'=>'Zone')			, 
						array('id'=>4, 'name'=>'Division')		, 
						array('id'=>5, 'name'=>'District')		, 
						array('id'=>6, 'name'=>'Tehsil')		, 
						array('id'=>7, 'name'=>'UC')			, 
						array('id'=>8, 'name'=>'Unit')
				   );
				   
function get_tanlevel($id) {
	$listtanlevel= array (
							'1' => 'Markazi'					, 
							'2' => 'Province'					, 
							'3' => 'Zone'						, 
							'4' => 'Division'					,
							'5' => 'District'					,
							'6' => 'Tehsil'						,
							'7' => 'UC'							,
							'8' => 'Unit'
						  );
	return $listtanlevel[$id];
}
//-----------------------------------------------------------------------------------
$relations = array('Husband', 'Wife', 'Daughter', 'Brother', 'Brother in Law', 'Friend', 'Cousin');
//-----------------------------------------------------------------------------------
//--------------- Admins Rights ----------
$admtypes = array (
					array('id'=>1, 'name'=>'Administrator')			,
					array('id'=>2, 'name'=>'Markazi')				,	
					array('id'=>3, 'name'=>'Province')				,
					array('id'=>4, 'name'=>'Zone')					,
					array('id'=>5, 'name'=>'Division')				,
					array('id'=>6, 'name'=>'District')				,
					array('id'=>7, 'name'=>'Tehsil')				,
					array('id'=>8, 'name'=>'UC')					,
					array('id'=>9, 'name'=>'Unit')				
				   );

function get_admtypes($id) {
	$listadmrights = array (
							'1'	=> 'Administrator'					,
							'2'	=> 'Markazi'						,
							'3'	=> 'Province'						,
							'4'	=> 'Zone'							,	
							'5'	=> 'Division'						,
							'6'	=> 'District'						,
							'7'	=> 'Tehsil'							,
							'8'	=> 'UC'								,
							'9' => 'Unit'		
							);
	return $listadmrights[$id];
}
//--------------- OPAC SEARCH  ----------
$opacsearch = array('All','Title', 'Author', 'Keywords', 'Subject Heading', 'ISSN', 'ISBN', 'Publication Date', 'Place of Publication', 'Call No', 'Edition', 'Classification No', 'Author Mark', 'Accession No', 'Publisher');
//--------------- Course Level ----------
$curslevel = array('Basic', 'Middle' ,'Advance');
//--------------- Pay Method ------------------
$paymethod = array (
						array('id'=>1, 'name'=>'Paypal')			, 
						array('id'=>2, 'name'=>'Bank')
				   );

function get_paymethod($id) {
	$listpaymethod = array (
							'1' => 'Paypal'						, 
							'2' => 'Bank'
						  );
	return $listpaymethod[$id];
}

//--------------- Payments Status ------------------
$payments = array (
						array('id'=>1, 'name'=>'Paid')		, 
						array('id'=>2, 'name'=>'Unpaid')	
				   );

function get_payments($id) {
	$listpayments = array (
							'1' => 'Paid'					, 
							'2' => 'Unpaid'	
						  );
	return $listpayments[$id];
}
//--------------- Main Heads ------------------
$feedbackpoint = array (
					array('id'=>1, 'name'=>'Good'),
					array('id'=>2, 'name'=>'Very Good'),
					array('id'=>3, 'name'=>'Excellent'),
					array('id'=>4, 'name'=>'Neutral'),
					array('id'=>5, 'name'=>'Bad')
				   );

function get_feedbackpoint($id) {
	$listfeedbackpoint = array (
							'1'	=> 'Good',
							'2'	=> 'Very Good',
							'3'	=> 'Excellent',
							'4'	=> 'Neutral',
							'5'	=> 'Bad'
							);
	return $listfeedbackpoint[$id];
}
//--------------- Status Yes No ----------
$statusyesno = array (
						array('id'=>1, 'name'=>'Yes'), array('id'=>0, 'name'=>'No')
				   );

function get_statusyesno($id) {
	
	$liststatusyesno = array (
								'1'	=> 'Yes',	'0'	=> 'No'
							 );
	return $liststatusyesno[$id];
}
//--------------- Payment Types ------------------
$pay_types = array (
						array('id'=>1, 'name'=>'Bank'), array('id'=>2, 'name'=>'Cash'), array('id'=>3, 'name'=>'Cheque')
				   );

function get_paytypes($id) {
	$listpaytypes = array ('1' => 'Bank', '2' => 'Cash', '3' => 'Cheque');
	return $listpaytypes[$id];
}
//--------------- Gender ----------
$gender = array('Male', 'Female');
//--------------- Curruncy ----------
$curruncy = array('AUD','USD', 'CAD', 'EUR', 'GBP');
//--------------- Marital Status ----------
$marital = array('Married', 'Single');
//--------------- Sections ----------
$sections = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
//----------------Blood Groups------------------------------
$bloodgroup = array('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-');
//----------------Blood Groups------------------------------

function cleanvars($str){ 
	return is_array($str) ? array_map('cleanvars', $str) : str_replace("\\", "\\\\", htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES)); 
}
//----------------Time Format------------------------------
function get_hours_range( $start = 0, $end = 86400, $step = 1800, $format = 'g:i a' ) {
        $times = array();
        foreach ( range( $start, $end, $step ) as $timestamp ) {
                $hour_mins = gmdate( 'H:i', $timestamp );
                if ( ! empty( $format ) )
                        $times[$hour_mins] = gmdate( $format, $timestamp );
                else $times[$hour_mins] = $hour_mins;
        }
        return $times;
}

//------------------------------------------- Key Value
function searchArrayKeyVal($sKey, $id, $array) {
	foreach ($array as $key => $val) {
		if ($val[$sKey] == $id) {
			return $key;
		}
	}
	return null;
}
//--------------- Arrary Search ------------------
function arrayKeyValueSearch($array, $key, $value)
{
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subArray) {
            $results = array_merge($results, arrayKeyValueSearch($subArray, $key, $value));
        }
    }
    return $results;
}
//-----------------------------------------------------------------
function to_seo_url($str){
   // if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
      //  $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
    $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
    $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
    $str = trim($str, '-');
    return $str;
}
//------------months name in urdu---------
$monthsname = array (
						array ('id' => '01'		,'name' => 'جنوری'		,'namear' => 'يناير'),
						array ('id' => '02'		,'name' => 'فروری'		,'namear' => 'فبراير'),
						array ('id' => '03'		,'name' => 'مارچ'		,'namear' => 'مارس'),
						array ('id' => '04'		,'name' => 'اپریل'		,'namear' => 'أبريل'),
						array ('id' => '05'		,'name' => 'مئی'		,'namear' => 'مايو'),
						array ('id' => '06'		,'name' => 'جون'		,'namear' => 'يونيو'),
						array ('id' => '07'		,'name' => 'جولائی'		,'namear' => 'يوليو'),
						array ('id' => '08'		,'name' => 'اگست'		,'namear' => 'أغسطس'),
						array ('id' => '09'		,'name' => 'ستمبر'		,'namear' => 'سبتمبر'),
						array ('id' => '10'		,'name' => 'اکتوبر'		,'namear' => 'أكتوبر'),
						array ('id' => '11'		,'name' => 'نومبر'		,'namear' => 'نوفمبر'),
						array ('id' => '12'		,'name' => 'دسمبر'		,'namear' => 'ديسمبر'),
);
//--------------- Log File Action----------
function get_logfile($id) {

	$listlogfile = array (
							'1' => 'Add'		, 
							'2' => 'Update'		, 
							'3' => 'Delete'		,
							'4' => 'Login'	
						  );
	return $listlogfile[$id];

}
//----------------------- Country LIST ----------------------------
$countrylist = array (
					array('id'=>1, 'name'=>'Afghanistan')							,
					array('id'=>2, 'name'=>'Albania')								,
					array('id'=>3, 'name'=>'Algeria')								,
					array('id'=>4, 'name'=>'Andorra')								,
					array('id'=>5, 'name'=>'Angola')								,
					array('id'=>6, 'name'=>'Antigua and Barbuda')					,
					array('id'=>7, 'name'=>'Argentina')								,
					array('id'=>8, 'name'=>'Armenia')								,
					array('id'=>9, 'name'=>'Aruba')									,
					array('id'=>10, 'name'=>'Australia')							,
					array('id'=>11, 'name'=>'Austria')								,
					array('id'=>12, 'name'=>'Azerbaijan')							,
					array('id'=>13, 'name'=>'Bahamas, The')							,
					array('id'=>14, 'name'=>'Bahrain')								,
					array('id'=>15, 'name'=>'Bangladesh')							,
					array('id'=>16, 'name'=>'Barbados')								,
					array('id'=>17, 'name'=>'Belarus')								,
					array('id'=>18, 'name'=>'Belgium')								,
					array('id'=>19, 'name'=>'Belize')								,
					array('id'=>20, 'name'=>'Benin')								,
					array('id'=>21, 'name'=>'Bhutan')								,
					array('id'=>22, 'name'=>'Bolivia')								,
					array('id'=>23, 'name'=>'Bosnia and Herzegovina')				,
					array('id'=>24, 'name'=>'Botswana')								,
					array('id'=>25, 'name'=>'Brazil')								,
					array('id'=>26, 'name'=>'Brunei')								,
					array('id'=>27, 'name'=>'Bulgaria')								,
					array('id'=>28, 'name'=>'Burkina Faso')							,
					array('id'=>29, 'name'=>'Burma')								,
					array('id'=>30, 'name'=>'Burundi')								,
					array('id'=>31, 'name'=>'Cambodia')								,
					array('id'=>32, 'name'=>'Cameroon')								,
					array('id'=>33, 'name'=>'Canada')								,
					array('id'=>34, 'name'=>'Cabo Verde')							,
					array('id'=>35, 'name'=>'Central African Republic')				,
					array('id'=>36, 'name'=>'Chad')									,
					array('id'=>37, 'name'=>'Chile')								,
					array('id'=>38, 'name'=>'China')								,
					array('id'=>39, 'name'=>'Colombia')								,
					array('id'=>40, 'name'=>'Comoros')								,
					array('id'=>41, 'name'=>'Congo, Democratic Republic of the')	,
					array('id'=>42, 'name'=>'Congo, Republic of the')				,
					array('id'=>43, 'name'=>'Costa Rica')							,
					array('id'=>44, 'name'=>'Cote dIvoire')							,
					array('id'=>45, 'name'=>'Croatia')								,
					array('id'=>46, 'name'=>'Cuba')									,
					array('id'=>47, 'name'=>'Curacao')								,
					array('id'=>48, 'name'=>'Cyprus')								,
					array('id'=>49, 'name'=>'Czechia')								,
					array('id'=>50, 'name'=>'Denmark')								,
					array('id'=>51, 'name'=>'Djibouti')								,
					array('id'=>52, 'name'=>'Dominica')								,
					array('id'=>53, 'name'=>'Dominican Republic')					,
					array('id'=>54, 'name'=>'East Timor (see Timor-Leste)')			,
					array('id'=>55, 'name'=>'Ecuador')								,
					array('id'=>56, 'name'=>'Egypt')								,
					array('id'=>57, 'name'=>'El Salvador')							,
					array('id'=>58, 'name'=>'Equatorial Guinea')					,
					array('id'=>59, 'name'=>'Eritrea')								,
					array('id'=>60, 'name'=>'Estonia')								,
					array('id'=>61, 'name'=>'Ethiopia')								,
					array('id'=>62, 'name'=>'Fiji')									,
					array('id'=>63, 'name'=>'Finland')								,
					array('id'=>64, 'name'=>'France')								,
					array('id'=>65, 'name'=>'Gabon')								,
					array('id'=>66, 'name'=>'Gambia, The')							,
					array('id'=>67, 'name'=>'Georgia')								,
					array('id'=>68, 'name'=>'Germany')								,
					array('id'=>69, 'name'=>'Ghana')								,
					array('id'=>70, 'name'=>'Greece')								,
					array('id'=>71, 'name'=>'Grenada')								,
					array('id'=>72, 'name'=>'Guatemala')							,
					array('id'=>73, 'name'=>'Guinea')								,
					array('id'=>74, 'name'=>'Guinea-Bissau')						,
					array('id'=>75, 'name'=>'Guyana')								,
					array('id'=>76, 'name'=>'Haiti')								,
					array('id'=>77, 'name'=>'Holy See')								,
					array('id'=>78, 'name'=>'Honduras')								,
					array('id'=>79, 'name'=>'Hong Kong')							,
					array('id'=>80, 'name'=>'Hungary')								,
					array('id'=>81, 'name'=>'Iceland')								,
					array('id'=>82, 'name'=>'India')								,
					array('id'=>83, 'name'=>'Indonesia')							,
					array('id'=>84, 'name'=>'Iran')									,
					array('id'=>85, 'name'=>'Iraq')									,
					array('id'=>86, 'name'=>'Ireland')								,
					array('id'=>87, 'name'=>'Israel')								,
					array('id'=>88, 'name'=>'Italy')								,
					array('id'=>89, 'name'=>'Jamaica')								,
					array('id'=>90, 'name'=>'Japan')								,
					array('id'=>91, 'name'=>'Jordan')								,
					array('id'=>92, 'name'=>'Kazakhstan')							,
					array('id'=>93, 'name'=>'Kenya')								,
					array('id'=>94, 'name'=>'Kiribati')								,
					array('id'=>95, 'name'=>'Korea, North')							,
					array('id'=>96, 'name'=>'Korea, South')							,
					array('id'=>97, 'name'=>'Kosovo')								,
					array('id'=>98, 'name'=>'Kuwait')								,
					array('id'=>99, 'name'=>'Kyrgyzstan')							,
					array('id'=>100, 'name'=>'Laos')								,
					array('id'=>101, 'name'=>'Latvia')								,
					array('id'=>102, 'name'=>'Lebanon')								,
					array('id'=>103, 'name'=>'Lesotho')								,
					array('id'=>104, 'name'=>'Liberia')								,
					array('id'=>105, 'name'=>'Libya')								,
					array('id'=>106, 'name'=>'Liechtenstein')						,
					array('id'=>107, 'name'=>'Lithuania')							,
					array('id'=>108, 'name'=>'Luxembourg')							,
					array('id'=>109, 'name'=>'Macau')								,
					array('id'=>110, 'name'=>'Macedonia')							,
					array('id'=>111, 'name'=>'Madagascar')							,
					array('id'=>112, 'name'=>'Malawi')								,
					array('id'=>113, 'name'=>'Malaysia')							,
					array('id'=>114, 'name'=>'Maldives')							,
					array('id'=>115, 'name'=>'Mali')								,
					array('id'=>116, 'name'=>'Malta')								,
					array('id'=>117, 'name'=>'Marshall Islands')					,
					array('id'=>118, 'name'=>'Mauritania')							,
					array('id'=>119, 'name'=>'Mauritius')							,
					array('id'=>120, 'name'=>'Mexico')								,
					array('id'=>121, 'name'=>'Micronesia')							,
					array('id'=>122, 'name'=>'Moldova')								,
					array('id'=>123, 'name'=>'Monaco')								,
					array('id'=>124, 'name'=>'Mongolia')							,
					array('id'=>125, 'name'=>'Montenegro')							,
					array('id'=>126, 'name'=>'Morocco')								,
					array('id'=>127, 'name'=>'Mozambique')							,
					array('id'=>128, 'name'=>'Namibia')								,
					array('id'=>129, 'name'=>'Nauru')								,
					array('id'=>130, 'name'=>'Nepal')								,
					array('id'=>131, 'name'=>'Netherlands')							,
					array('id'=>132, 'name'=>'New Zealand')							,
					array('id'=>133, 'name'=>'Nicaragua')							,
					array('id'=>134, 'name'=>'Niger')								,
					array('id'=>135, 'name'=>'Nigeria')								,
					array('id'=>136, 'name'=>'North Korea')							,
					array('id'=>137, 'name'=>'Norway')								,
					array('id'=>138, 'name'=>'Oman')								,
					array('id'=>139, 'name'=>'Pakistan')							,
					array('id'=>140, 'name'=>'Palau')								,
					array('id'=>141, 'name'=>'Palestinian Territories')				,
					array('id'=>142, 'name'=>'Panama')								,
					array('id'=>143, 'name'=>'Papua New Guinea')					,
					array('id'=>144, 'name'=>'Paraguay')							,
					array('id'=>145, 'name'=>'Peru')								,
					array('id'=>146, 'name'=>'Philippines')							,
					array('id'=>147, 'name'=>'Poland')								,
					array('id'=>148, 'name'=>'Portugal')							,
					array('id'=>149, 'name'=>'Qatar')								,
					array('id'=>150, 'name'=>'Romania')								,
					array('id'=>151, 'name'=>'Russia')								,
					array('id'=>152, 'name'=>'Rwanda')								,
					array('id'=>153, 'name'=>'Saint Kitts and Nevis')				,
					array('id'=>154, 'name'=>'Saint Lucia')							,
					array('id'=>155, 'name'=>'Saint Vincent and the Grenadines')	,
					array('id'=>156, 'name'=>'Samoa')								,
					array('id'=>157, 'name'=>'San Marino')							,
					array('id'=>158, 'name'=>'Sao Tome and Principe')				,
					array('id'=>159, 'name'=>'Saudi Arabia')						,
					array('id'=>160, 'name'=>'Senegal')								,
					array('id'=>161, 'name'=>'Serbia')								,
					array('id'=>162, 'name'=>'Seychelles')							,
					array('id'=>163, 'name'=>'Sierra Leone')						,
					array('id'=>164, 'name'=>'Singapore')							,
					array('id'=>165, 'name'=>'Sint Maarten')						,
					array('id'=>166, 'name'=>'Slovakia')							,
					array('id'=>167, 'name'=>'Slovenia')							,
					array('id'=>168, 'name'=>'Solomon Islands')						,	
					array('id'=>169, 'name'=>'Somalia')								,
					array('id'=>170, 'name'=>'South Africa')						,
					array('id'=>171, 'name'=>'South Korea')							,
					array('id'=>172, 'name'=>'South Sudan')							,
					array('id'=>173, 'name'=>'Spain')								,
					array('id'=>174, 'name'=>'Sri Lanka')							,
					array('id'=>175, 'name'=>'Sudan')								,
					array('id'=>176, 'name'=>'Suriname')							,
					array('id'=>177, 'name'=>'Swaziland')							,
					array('id'=>178, 'name'=>'Sweden')								,
					array('id'=>179, 'name'=>'Switzerland')							,
					array('id'=>180, 'name'=>'Syria')								,
					array('id'=>181, 'name'=>'Taiwan')								,
					array('id'=>182, 'name'=>'Tajikistan')							,
					array('id'=>183, 'name'=>'Tanzania')							,
					array('id'=>184, 'name'=>'Thailand')							,
					array('id'=>185, 'name'=>'Timor-Leste')							,
					array('id'=>186, 'name'=>'Togo')								,
					array('id'=>187, 'name'=>'Tonga')								,
					array('id'=>188, 'name'=>'Trinidad and Tobago')					,
					array('id'=>189, 'name'=>'Tunisia')								,
					array('id'=>190, 'name'=>'Turkey')								,
					array('id'=>191, 'name'=>'Turkmenistan')						,
					array('id'=>192, 'name'=>'Tuvalu')								,
					array('id'=>193, 'name'=>'Uganda')								,
					array('id'=>194, 'name'=>'Ukraine')								,
					array('id'=>195, 'name'=>'United Arab Emirates')				,
					array('id'=>196, 'name'=>'United Kingdom')						,
					array('id'=>197, 'name'=>'Uruguay')								,
					array('id'=>198, 'name'=>'Uzbekistan')							,
					array('id'=>199, 'name'=>'Vanuatu')								,
					array('id'=>200, 'name'=>'Venezuela')							,
					array('id'=>201, 'name'=>'Vietnam')								,
					array('id'=>202, 'name'=>'Yemen')								,
					array('id'=>203, 'name'=>'Zambia')								,
					array('id'=>204, 'name'=>'Zimbabwe')						
 );

//------------------------------------------------------------------
function generateNewString($len = 20) {
	$token = "poiuztrewqasdfghjklmnbvcxy1234567890";
	$token = str_shuffle($token);
	$token = substr($token, 0, $len);

	return $token;
}
//------------------------------------------------------------------
function redirectToLoginPage() {
	header('Location: login.php');
	exit();
}
//------------------------------------------------------------------
gethostname();
gethostbyname(gethostname());
php_uname();

class OS_BR{

    private $agent = "";
    private $info = array();

    function __construct(){
        $this->agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : NULL;
        $this->getBrowser();
        $this->getOS();
    }

    function getBrowser(){
        $browser = array("Navigator"            => "/Navigator(.*)/i",
                         "Firefox"              => "/Firefox(.*)/i",
                         "Internet Explorer"    => "/MSIE(.*)/i",
                         "Google Chrome"        => "/chrome(.*)/i",
                         "MAXTHON"              => "/MAXTHON(.*)/i",
                         "Opera"                => "/Opera(.*)/i",
                         );
        foreach($browser as $key => $value){
            if(preg_match($value, $this->agent)){
                $this->info = array_merge($this->info,array("Browser" => $key));
                $this->info = array_merge($this->info,array(
                  "Version" => $this->getVersion($key, $value, $this->agent)));
                break;
            }else{
                $this->info = array_merge($this->info,array("Browser" => "UnKnown"));
                $this->info = array_merge($this->info,array("Version" => "UnKnown"));
            }
        }
        return $this->info['Browser'];
    }

    function getOS(){
        $OS = array("Windows"   =>   "/Windows/i",
                    "Linux"     =>   "/Linux/i",
                    "Unix"      =>   "/Unix/i",
                    "Mac"       =>   "/Mac/i"
                    );

        foreach($OS as $key => $value){
            if(preg_match($value, $this->agent)){
                $this->info = array_merge($this->info,array("Operating System" => $key));
                break;
            }
        }
        return $this->info['Operating System'];
    }

    function getVersion($browser, $search, $string){
        $browser = $this->info['Browser'];
        $version = "";
        $browser = strtolower($browser);
        preg_match_all($search,$string,$match);
        switch($browser){
            case "firefox": $version = str_replace("/","",$match[1][0]);
            break;

            case "internet explorer": $version = substr($match[1][0],0,4);
            break;

            case "opera": $version = str_replace("/","",substr($match[1][0],0,5));
            break;

            case "navigator": $version = substr($match[1][0],1,7);
            break;

            case "maxthon": $version = str_replace(")","",$match[1][0]);
            break;

            case "google chrome": $version = substr($match[1][0],1,10);
        }
        return $version;
    }

    function showInfo($switch){
        $switch = strtolower($switch);
        switch($switch){
            case "browser": return $this->info['Browser'];
            break;

            case "os": return $this->info['Operating System'];
            break;

            case "version": return $this->info['Version'];
            break;

            case "all" : return array($this->info["Version"], 
              $this->info['Operating System'], $this->info['Browser']);
            break;

            default: return "Unkonw";
            break;

        }
    }
}

// using
// create an new instant of OS_BR class
$obj = new OS_BR();
// // if you want to show one by one information then try showInfo() function

//------------------------------------------------------------------
function get_timeago( $ptime )
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array( 
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
//------------------------------------------------------------------
//------------------------------------------------------------------
	
?>