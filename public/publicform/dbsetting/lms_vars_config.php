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
	define('LMS_HOSTNAME'			, 'localhost');
	define('LMS_NAME'				, 'minhajki_dawa2021');
	define('LMS_USERNAME'			, 'minhajki_dawa21');
	define('LMS_USERPASS'			, 'k5Wu,a?1B@%}EY');
}
//-----------------DB Tables ------------------------
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
	define('COURSES'				, 'dawa_courses');
	define('CHAPTERS'				, 'dawa_chapters');
	
	define('PLANS'					, 'dawa_plans');
	define('PLANS_FEE'				, 'dawa_plan_fee');
	define('CURRENCY'				, 'dawa_currency');
	define('COUNTRIES'				, 'dawa_countries');
	define('DEPARTMENT'				, 'dawa_department');
	define('DESIGNATION'			, 'dawa_designation');
	define('DEGREES'				, 'dawa_degrees');
	define('PROFESSIONS'			, 'dawa_professions');
	define('UNIVERSITIES'			, 'dawa_universities');
//-------------------variavles-------------------------------

	$ip 	 = (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '') ? $_SERVER['REMOTE_ADDR'] : '';
//-------------variavles-------------------------------------
	define('ORG_IP'				, $ip);
	define('ORG_DO'				, $do);
	define('ORG_EPOCH'			, date("U"));
	define('ORG_CONTROL'		, $control);
	define('ORG_TID'			, $tid);
	define('ORG_OID'			, $oid);
	define('ORG_COUNTRYID'		, $countryid);
	define('ORG_CITYID'			, $cityid);
	define('ORG_MQI'			, $MQI);
	define('ORG_CID'			, $cid);
	define('ORG_NEWSPAPER'		, $newspaper);
	define('ORG_NP'				, $np);
	define('ORG_DATED'			, $dated);
	define('ORG_ARCHIVE'		, $archive);
	define('WEBSITE_ID'			, '1');
	define('WEBSITE_ID2'		, '2');
	define('WEBSITE_ID3'		, '11');
	define('FB_LINKS'			, '3.4M');
	define('TWITTER_FOLLOWS'	, '942K');
	define('WEBSITE_NAME'		, 'Minahj-ul-Quran International');
	define('WEBSITE_NAMEUR'		, 'تحریک منہاج القرآن');
	define('WEBSITE_NAMEAR'		, 'بـمنظّمة منهاج القرآن العالمية');
	define('WEBSITE_EMAIL'		, 'mib@minhaj.org');
	define('WEBSITE_URL'		, 'https://www.minhaj.org');
	define('WEBSITE_ADDRESS'	, 'https://dawa.minhaj.org');
	define('WEBSITE_ORDER'		, 'https://www.minhaj.org');
	define('HREF_ORG'			, 'https://www.minhaj.org');
	define('HREF_LOGO_COUNTRY'	, 'https://www.minhaj.net/images-headers-country');
	define('HREF_LOGO_CITY'		, 'https://www.minhaj.net/images-headers-city');
	define('HREF_ORG_IMG'		, 'http://minhajimages.kortechx.netdna-cdn.com');
	define('HREF_IMG_NET'		, 'https://www.minhaj.net');
	define('TITLE_HEADER'		, "Minhaj-ul-Quran International");
	define('TITLE_HEADERUR'		, "تحریک منہاج القرآن");
//--------------------------------------------------
?>