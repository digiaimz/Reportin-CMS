<?php
//----------------------------------------------------
if((strstr(basename($_SERVER['REQUEST_URI']), '.php', true) == "dashboardmcw") || (strstr(basename($_SERVER['REQUEST_URI']), '.php', true) == "dashboardcosis") || (strstr(basename($_SERVER['REQUEST_URI']), '.php', true) == "dashboard")) {
	$ldshclsactive = 'class="open"';
	$ldshvis		= 'style="display:block; visibility:visible;"';
	$tdsheclsactive = 'class="heading-menu-active"';
} else { 
	$ldshclsactive 	= '';
	$ldshvis		= '';
	$tdsheclsactive = '';
}
//----------------------------------------------------
if((strstr(basename($_SERVER['REQUEST_URI']), '.php', true) == "evaluationdashboard")) {
	$levaluationclsactive 	= 'class="active"';
} else { 
	$levaluationclsactive 	= '';
} 
//----------------------------------------------------
echo'
<!-- ===== Left-Sidebar ===== -->
<aside class="sidebar">
<div class="scroll-sidebar">
<nav class="sidebar-nav">
<ul id="side-menu">
<li>
	<a class="active waves-effect" href="Dashboard.php" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
</li>';
//----------------------------------------------------
include_once("LEFT/".get_admtypes($_SESSION['LOGINTYPE_SSS']).".php");
//----------------------------------------------------
echo'
</ul>
</nav>
</div>
</aside>
<!-- ===== Left-Sidebar-End ===== -->';
?>