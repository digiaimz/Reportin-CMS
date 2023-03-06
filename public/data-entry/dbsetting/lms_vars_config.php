<?php
//----------------------------------------------------
	error_reporting(0);
	ob_start();
	ob_clean();
	date_default_timezone_set("Asia/Karachi");
//----------------------------------------------------------------------------
if($_SERVER['HTTP_HOST']=="localhost" or $_SERVER['HTTP_HOST']=="127.0.0.1"){
//----------------------------------------------------------------------------	
//Local 
//----------------------------------------------------------------------------
	define('LMS_HOSTNAME'			, 'localhost');
	define('LMS_NAME'				, 'dawa_project');
	define('LMS_USERNAME'			, 'root');
	define('LMS_USERPASS'			, '');
//----------------------------------------------------------------------------
} else {
//----------------------------------------------------------------------------
// Live 
//$dblms->lastestid();	
//----------------------------------------------------------------------------	
	define('LMS_HOSTNAME'			, 'host');
	define('LMS_NAME'				, 'loginminhaj_dataentry');
	define('LMS_USERNAME'			, 'loginminhaj_dawa_user');
	define('LMS_USERPASS'			, '_9a;3kt?HGc*hhdawa');

}
///-----------------DB Tables ------------------------
	define('ADMINS'			  		, 'dawa_admins');
	define('ADMINS_HISTORY'	  		, 'dawa_admins_history');

	define('FORUMS'					, 'dawa_forum');
	define('PROVINCES'			 	, 'dawa_prov');
	define('PROVINCE_HALQA'			, 'dawa_prov_halqas');
	define('ZONES'					, 'dawa_zones');
	define('DIVISIONS'				, 'dawa_div');
	define('DISTRICTS'			 	, 'dawa_dist');
	define('TEHSILS'			 	, 'dawa_tsl');
	define('TANZEEMI_TEHSILS'	 	, 'dawa_mtsl');
	
	define('WORKERS'			  	, 'dawa_workers');
	define('ZEREDAWAT'			  	, 'dawa_zeredawat');	
	
	define('COUNTRIES'				, 'dawa_countries');
	define('DESIGNATION'			, 'dawa_designation');
	define('DEGREES'				, 'dawa_degrees');
	define('PROFESSIONS'			, 'dawa_professions');
	define('UNIVERSITIES'			, 'dawa_universities');
	

//--------------------------------------------------
	$ip	  	= (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '') ? $_SERVER['REMOTE_ADDR'] : '';
	$do	  	= (isset($_REQUEST['do']) && $_REQUEST['do'] != '') ? $_REQUEST['do'] : '';
	$view 	= (isset($_REQUEST['view']) && $_REQUEST['view'] != '') ? $_REQUEST['view'] : '';
	$page	= (isset($_REQUEST['page']) && $_REQUEST['page'] != '') ? $_REQUEST['page'] : '';
	$Limit	= (isset($_REQUEST['Limit']) && $_REQUEST['Limit'] != '') ? $_REQUEST['Limit'] : '';
//--------------------------------------------------
	define('LMS_IP'				, $ip);
	define('LMS_DO'				, $do);
	define('LMS_EPOCH'			, date("U"));
	define('LMS_VIEW'			, $view);
	define('TITLE_HEADER'		, 'Dawa Management System By MQI');
	define("SITE_NAME"			, "Dawa Management System By MQI");
	define("SITE_ADDRESS"		, "365-M Model Town, Lahore");
	define("COPY_RIGHTS"		, "MIB | Minhaj-ul-Quran International");
	define("COPY_RIGHTS_ORG"	, "&copy; 2010 - ".date("Y")." - All Rights Reserved.");
	define("COPY_RIGHTS_URL"	, "http://www.minhaj.net/");
//--------------------------------------------------
?>