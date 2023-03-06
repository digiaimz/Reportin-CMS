<?php 
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
						array('id'=>1, 'name'=>'Yes')						,
						array('id'=>2, 'name'=>'No')					 
						
				   );

function get_LifeMembership($id) {
	$listLifeMembership = array (
							'1' => 'Yes'									, 
							'2' => 'No'									
						  );
	return $listLifeMembership[$id];
}
//------------------------------------------------------------------------------------
function cleanvars($str){ 
	return is_array($str) ? array_map('cleanvars', $str) : str_replace("\\", "\\\\", htmlspecialchars((get_magic_quotes_gpc() ? stripslashes($str) : $str), ENT_QUOTES)); 
}
//--------------- Pay Method ------------------
$Gender = array (
						array('id'=>1, 'name'=>'Male')			, 
						array('id'=>2, 'name'=>'Female')
				   );

function get_Gender($id) {
	$listGender = array (
							'1' => 'Male'						, 
							'2' => 'Female'
						  );
	return $listGender[$id];
}
//----------------------------------------
function curPageURL( $trim_query_string = false ) {
    $pageURL = (isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on') ? "https://" : "http://";
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    if( ! $trim_query_string ) {
        return $pageURL;
    } else {
        $url = explode( '?', $pageURL );
        return $url[0];
    }
}
//----------------------------------------
function generateSeoURL($string, $wordLimit = 0){
    $separator = '-';
    
    if($wordLimit != 0){
        $wordArr = explode(' ', $string);
        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
    }

    $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;'                   => '',
        '[^\w\d _-]'            => '',
        '\s+'                    => $separator,
        '('.$quoteSeparator.')+'=> $separator
    );

    $string = strip_tags($string);
    foreach ($trans as $key => $val){
        $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
    }

    $string = strtolower($string);

    return trim(trim($string, $separator));
}


//----------------------------------------
function ValidateEmail($email) {
	$regex = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'; # domain extension 
if($email == '') { 
	return false;
} else {
	$eregi = preg_replace($regex, '', $email);
}
return empty($eregi) ? true : false;
}


?>