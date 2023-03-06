<?php 
	define('TITLE_HEADER'		, 'Data Entry Operator | Vision 2025');
	define("SITE_NAME"			, "Data Entry Operator | Vision 2025");
	define("COPY_RIGHTS"		, "MIB | Minhaj-ul-Quran International");
	define("COPY_RIGHTS_ORG"	, "&copy; ".date("Y")." - All Rights Reserved.");
	define("COPY_RIGHTS_URL"	, "http://www.minhaj.net/");
//---------------------------------------
include "functions/login_func.php";
//---------------------------------------
if(isset($_SESSION['LOGINIDA_SSS'])) {
header("Location: index.php");	
} else { 

$login_id = (isset($_POST['login_id']) && $_POST['login_id'] != '') ? $_POST['login_id'] : '';	
//	$errorMessage = '';
if (isset($_POST['login_id'])) {
	$result = cpanelLMSAuserLogin();
	if ($result != '') {
		$errorMessage = $result;
	}
}
//---------------------------------------
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
<link rel="icon" type="image/png" sizes="16x16" href="photos/favicon.png">
<title> '.TITLE_HEADER.' </title>
<!-- ===== Bootstrap CSS ===== -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- ===== Plugin CSS ===== -->
<!-- ===== Animation CSS ===== -->
<link href="css/animate.css" rel="stylesheet">
<!-- ===== Custom CSS ===== -->
<link href="css/style.css" rel="stylesheet">
<!-- ===== Color CSS ===== -->
<link href="css/colors/red.css" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="mini-sidebar fix-header">
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register" background="photos/membership.jpg">
<div class="login-box">
<div class="white-box">
<form class="form-horizontal" id="frmLogin" name="frmLogin" method="post">
    <h3 align="center" class="box-title m-b-20"> '.TITLE_HEADER.' </h3>';
//---------------------------------------
if(isset($errorMessage)) {
	echo $errorMessage;
}
//-----------------------------------------					
echo'
	<div class="form-group ">
		<div class="col-xs-12">
			<input class="form-control" id="login_id" name="login_id" value="'.$login_id.'" type="text" required placeholder="Email">
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12">
			<input class="form-control" id="inputPassword" name="login_pass" type="password" required placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			
		</div>
	</div>
	<div class="form-group text-center m-t-20">
		<div class="col-xs-12">
			<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
		</div>
	</div>
	
	<div class="form-group m-b-0">
		<div class="col-sm-12 text-center">
			<p>'.COPY_RIGHTS_ORG.'<br>
				<p>  Developed by  </p>
				<a href="'.COPY_RIGHTS_URL.'" class="text-primary m-l-5"><b>'.COPY_RIGHTS.'</b></a>
				v 3.0   
			 </p>
		</div>
	</div>


</form>

</div>
</div>
</section>
<!-- jQuery -->
<script src="plugins/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="js/sidebarmenu.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.js"></script>
<!--Style Switcher -->
<script src="plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>';
}
?>