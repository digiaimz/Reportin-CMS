<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
//-------------------------------------------------
date_default_timezone_set('Europe/London');
//-------------------------------------------------
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------
if($_POST['type'] == 'Tehsils') {
//-------------------------------------------------
	include("include/Print/Tehsils.php");
//-------------------------------------------------
}
//-------------------------------------------------


//-------------------------------------------------
if($_POST['type'] == 'TTehsils') {
//-------------------------------------------------
	include("include/Print/TTehsils.php");
//-------------------------------------------------
}
//-------------------------------------------------


//-------------------------------------------------
if($_POST['type'] == 'Workers') {
//-------------------------------------------------
	include("include/Print/Workers.php");
//-------------------------------------------------
}
//-------------------------------------------------


//-------------------------------------------------
if($_POST['type'] == 'Universities') {
//-------------------------------------------------
	include("include/Print/Universities.php");
//-------------------------------------------------
}
//-------------------------------------------------


?>