<?php
echo'
<!-- ===== Top-Navigation ===== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
<div class="navbar-header">
<a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
	<i class="fa fa-bars"></i>
</a>
<div class="top-left-part">
	<a class="logo" href="Dashboard.php">
		<span><img src="photos/logo.jpg" alt="homepage" class="dark-logo" /></span>
	</a>
</div>
<ul class="nav navbar-top-links navbar-left hidden-xs">
	<li>
		<form role="search" class="app-search hidden-xs" action="Posts.php?view=list">
			<i class="icon-magnifier"></i>
			<input type="text" name="srch" placeholder="Search..." class="form-control">
		</form>
	</li>
</ul>
<ul class="nav navbar-top-links navbar-right pull-right">';	
//------------------------------------------------
	$sqllmsTop  = $dblms->querylms("SELECT *   
										FROM ".ADMINS." 
										WHERE emply_id = ".$_SESSION['LOGINIDA_SSS']."  ");
										
	$rowstdTop = mysqli_fetch_array($sqllmsTop);
//------------------------------------------------
if($rowstdTop['emply_photo']) { 
	$stdphotoTop = '<img class="img-circle" src="photos/Admin/'.$rowstdTop['emply_photo'].'" alt="'.$rowstdTop['emply_name'].'"/>';
} else {
	$stdphotoTop = '<img class="img-circle" src="photos/Admin/default.png" alt="'.$rowstdTop['emply_name'].'"/>';
}
//---------------------------------------------------------					
echo'
<li class="dropdown">
	<a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
		<i class="fa fa-user"></i>
	</a>
	<ul class="dropdown-menu mailbox animated bounceInDown">
		
		<li>
			
			<div class="message-center">
				
				<div style="clear:both;" ></div>
				<a href="profile.php">
					<div class="user-img">
						'.$stdphotoTop.'
						<span class="profile-status online pull-right"></span>
					</div>
					<div class="mail-contnet">
						<h5><b>'.$_SESSION['LOGINUSERA_SSS'].'</b></h5>
						<span class="mail-desc">Manage Profile</span>
					</div>
				</a>
				<div style="clear:both;" ></div>
				<a href="Profile.php"><i class="ti-user"></i> Profile </a>				
				<a href="index.php?logout"><i class="ti-power-off"></i> Logout </a>
				
			</div>
		</li>
		
	</ul>
</li>

</ul>
</div>
</nav>
<!-- ===== Top-Navigation-End ===== -->';
?>