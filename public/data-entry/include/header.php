<?php
echo'
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicons -->
<link rel="icon" sizes="16x16" type="image/png" href="photos/favicon.png">
<link rel="apple-touch-icon" href="photos/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="photos/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="photos/apple-touch-icon-114x114.png">

<title> '.TITLE_HEADER.' </title>
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- ===== Plugin CSS ===== -->
<link rel="stylesheet" href="plugins/components/dropify/dist/css/dropify.min.css">
<!-- ===== Plugin CSS ===== -->
<link href="plugins/components/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
<!-- ===== Plugin CSS ===== -->
<link href="plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="http://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!--========Select 2=====----->
<link href="plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="plugins/components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
<link href="plugins/components/switchery/dist/switchery.min.css" rel="stylesheet" />
<link href="plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
<link href="plugins/components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
<link href="plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<!-- ===== Plugin CSS ===== -->
<link href="plugins/components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<!-- ===== Plugin CSS ===== -->
<!-- ===== Plugin CSS ===== -->
<link href="plugins/components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- ===== Animation CSS ===== -->
<link href="css/animate.css" rel="stylesheet">
<!-- ===== Custom CSS ===== -->
<link href="css/style.css" rel="stylesheet">
<link href="css/customcss.css" rel="stylesheet">
<!-- ===== Color CSS ===== -->
<link href="css/colors/default.css" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="plugins/components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="js/date_time.js"></script>

<![endif]-->
<style type="text/css">
	.req:after {content:"*";font-size:14px;color:#cc0000;padding-left:4px}
	.form_sep + .form_sep {margin-top:5px;padding-top:5px;border-top:1px dashed #e3e3e3}
	.form_sep:before,.form_sep:after {content:"";display:table;}
	.form_sep:after {clear:both;}
	
	.alert-box {
		color:#555;	border-radius:10px;	font-family:Tahoma,Geneva,Arial,sans-serif;font-size:13px; padding:10px 36px; margin:20px 100px 20px 100px;
	}
	.alert-box span { font-weight:bold; text-transform:uppercase; }
	.error { background:#ffecec url("images/error.png") no-repeat 10px 50%; border:1px solid #f5aca6; }
	.success { background:#e9ffd9 url("images/success.png") no-repeat 10px 50%;	border:1px solid #a6ca8a; }
	.warning { background:#fff8c4 url("images/warning.png") no-repeat 10px 50%;	border:1px solid #f2c779; }
	.notice { background:#e3f7fc url("images/notice.png") no-repeat 10px 50%; border:1px solid #8ed9f6; }
</style>
</head>
<body class="fix-header">';
//-----------------------------------------------
include_once("top_navi.php");
//-----------------------------------------------
include_once("left_navi.php");
//-----------------------------------------------
?>