<?php 
	include "dbsetting/lms_vars_config.php";
	include "dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "functions/login_func.php";
	include "functions/functions.php";
	checkCpanelLMSALogin();
//-------------------------------------------------------
if($view == 'delete') {
	if(isset($_GET['Wid'])) {
		$sqllms  = $dblms->querylms("DELETE FROM ".WORKERS." WHERE worker_id = '".cleanvars($_GET['Wid'])."'");
		header('location: Workers.php?del=1');
	}
}
//-------------------------------------------------------
	include_once("include/header.php");
//-------------------------------------------------------
echo'
<!-- Page Content -->
<div class="page-wrapper">
<div class="container-fluid">';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	

<!-------- ./Search Area row--------------->
<div class="row">
<div class="col-sm-12">
<div class="white-box">
<form class="form-group" style="margin-top:10px;" action="Workers.php" method="get">

<div class="row">

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
             <input type="search" name="srch" placeholder="Name" class="form-control">
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
             <select class="form-control select2" id="blood" name="blood" style="width:100%" autocomplete="off">
		<option value="">Select Blood Group </option>';
		foreach($bloodgroup as $itembloodgroup) {
			echo '<option value="'.$itembloodgroup.'">'.$itembloodgroup.'</option>';
		}
echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
        <select class="form-control select2" id="gender" name="gender" style="width:100%" autocomplete="off">
		<option value=""> Select Gender </option>';
		foreach($gender as $itemgender) {
			echo '<option value="'.$itemgender.'">'.$itemgender.'</option>';
		}
echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>


<div style="clear:both;"></div><br>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
        <select class="form-control select2" id="DesignationLevels" name="DesignationLevels" style="width:100%" autocomplete="off">
		<option value=""> Select Designation Levels </option>';
		foreach($DesignationLevels as $itemDesignationLevels) {
			echo '<option value="'.$itemDesignationLevels['id'].'">'.$itemDesignationLevels['name'].'</option>';
		}
echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
        <select class="form-control select2" id="Degrees" name="Degrees" style="width:100%" autocomplete="off">
		<option value=""> Select Degrees </option>';
		foreach($Degrees as $itemDegrees) {
			echo '<option value="'.$itemDegrees['id'].'">'.$itemDegrees['name'].'</option>';
		}
echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
        <select class="form-control select2" id="ReligiousDegrees" name="ReligiousDegrees" style="width:100%" autocomplete="off">
		<option value=""> Select Religious Degrees </option>';
		foreach($ReligiousDegrees as $itemReligiousDegrees) {
			echo '<option value="'.$itemReligiousDegrees['id'].'">'.$itemReligiousDegrees['name'].'</option>';
		}
echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div style="clear:both;"></div><br>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
        <select class="form-control select2" id="District" name="District" style="width:100%" autocomplete="off">
		<option value=""> Select District </option>';
		$sqlorgDistrict  = $dblms->querylms("SELECT id_dist,dist_name FROM ".DISTRICTS." WHERE dist_shown = '1'
																	AND id_dist IN (SELECT id_dist FROM ".WORKERS." WHERE worker_id != '' )
																	ORDER BY dist_name ASC ");
			while($rowDistrict = mysqli_fetch_array($sqlorgDistrict)) { 
				echo '<option value="'.$rowDistrict['id_dist'].'">'.$rowDistrict['dist_name'].'</option>';
			}
		echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div class="col-sm-4 col-xs-12">
   <div class="dataTables_length">
        <div class="input-group custom-search-form">
        <select class="form-control select2" id="Tehsil" name="Tehsil" style="width:100%" autocomplete="off">
		<option value=""> Select Tehsil </option>';
		$sqlorgTehsil  = $dblms->querylms("SELECT id_mtsl,mtsl_name FROM ".TANZEEMI_TEHSILS." WHERE mtsl_shown = '1' 
													AND id_mtsl IN (SELECT id_mtsl FROM ".WORKERS." WHERE worker_id != '' )
													ORDER BY mtsl_name ASC ");
			while($rowTehsil = mysqli_fetch_array($sqlorgTehsil)) { 
				echo '<option value="'.$rowTehsil['id_mtsl'].'">'.$rowTehsil['mtsl_name'].'</option>';
			}
		echo'
		</select>
            <span class="input-group-btn">
			 <button class="btn btn-primary" type="submit">
				 <span class="glyphicon glyphicon-search"></span>
			 </button>
          </span>
      </div>
  </div>
</div>

<div style="clear:both;"></div><br>



</div>
</form>

</div>
</div>
</div>

<!-------- ./Search Area row--------------->';
//-----------------------------------------------------------------------------------
} //Login Type 
//-----------------------------------------------------------------------------------
echo'

<!-- .row -->
<div class="row">
<div class="col-lg-12">
<div class="white-box">';
//-------------------------------------------------------
if(isset($_GET['del']) == 1) {
//-------------------------------------------------------
echo'<div class="alert alert-danger alert-dismissable" align="center">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>Warning: </span>Record deleted successfully.
	</div>';
}
//-------------------------------------------------------
echo'
<a class="box-title m-b-0"> <a href="Workers.php" class="fcbtn btn btn-success btn-outline btn-1e"> <i class="fa fa-list"></i> Workers List </a>';
//---------------------------------------------------------------------------------
if($_SESSION['LOGINTYPE_SSS'] == 1){
//---------------------------------------------------------------------------------
echo'	
<a href="Workers.php?view=add" class="fcbtn btn btn-info btn-outline btn-1e"> <i class="fa fa-plus"></i> Add Worker</a>';
//---------------------------------------------------------------------------------
}
//---------------------------------------------------------------------------------
echo'
<a href="Dashboard.php" class="fcbtn btn btn-primary btn-outline btn-1e"> <i class="fa fa-plus"></i> Dashboard </a><br><br>';
//------------------------------------------------
if(isset($_POST['submit_Students'])) { 
//------------------------------------------------
	$sqllmscheck  = $dblms->querylms("SELECT *
										FROM ".WORKERS."  
										WHERE (worker_username = ".$_POST['worker_username']." OR worker_email = ".$_POST['worker_email'].")"
									);
//------------------------------------------------	
	if( mysqli_num_rows($sqllmscheck) > 0 ){
//------------------------------------------------		
		if(mysqli_num_rows($sqllmscheck) > 0) {
			echo '<div id="infoupdated" class="alert-box error"><span>error: </span>Sorry User Name Or Email Already Taken.</div>';	
		} else {
			echo '<div id="infoupdated" class="alert-box error"><span>error: </span>Password Can\'t Be Empty.</div>';
		}
	} else {
//------------------------------------------------
	$worker_pass  	 = cleanvars($_POST['worker_userpass']);
	$worker_passmdf  = md5($worker_pass);
//------------------------------------------------
$sqllms  = $dblms->querylms("INSERT INTO ".WORKERS."(
														worker_status										, 
														worker_regno										, 
														worker_username										, 
														worker_userpass										, 
														worker_access										, 
														worker_fullname										, 
														worker_fathername									, 
														worker_guardian										, 
														worker_email										, 
														worker_cellno										, 
														worker_phone										, 
														worker_gender										, 
														worker_dob											, 
														worker_age											, 
														worker_address										, 
														worker_city											, 
														id_country											, 
														worker_regdate		
														
													  )
	   											VALUES(
														'".cleanvars($_POST['worker_status'])."'		    , 
														'".cleanvars($_POST['worker_regno'])."'	  			,
														'".cleanvars($_POST['worker_username'])."'	  	 	,
														'".$worker_passmdf."'	 						    ,
														'".cleanvars($_POST['worker_access'])."'	 	    ,
														'".cleanvars($_POST['worker_fullname'])."'	 	    ,
														'".cleanvars($_POST['worker_fathername'])."'	    ,
														'".cleanvars($_POST['worker_guardian'])."'	    	,
														'".cleanvars($_POST['worker_email'])."'	 	   		,
														'".cleanvars($_POST['worker_cellno'])."'	 	   	,
														'".cleanvars($_POST['worker_phone'])."'	 	    	,
														'".cleanvars($_POST['worker_gender'])."'	 	   	,
														'".cleanvars($_POST['worker_dob'])."'	 	   		,
														'".cleanvars($_POST['worker_age'])."'	 	   		,
														'".cleanvars($_POST['worker_address'])."'			,
														'".cleanvars($_POST['worker_city'])."'	 	   	    ,
														'".cleanvars($_POST['id_country'])."'	 	   		,
														NOW()	
														
													  )"
							);

//-------------------------------------------------------
$StudentID = $dblms->lastestid();
//-------------------------------------------------------
if(!empty($_FILES['worker_photo']['name'])) { 
//--------------------------------------
	$img 			= explode('.', $_FILES['worker_photo']['name']);
	$extension 	  = strtolower($img[1]);
//-------------------------------------------------------
	$img_dir		= "photos/Workers/";
	$originalImage  = $img_dir.to_seo_url(cleanvars($_POST['worker_fullname'])).'_'.$StudentID.".".strtolower($img[1]);
	$img_fileName   = to_seo_url(cleanvars($_POST['worker_fullname'])).'_'.$StudentID.".".strtolower($img[1]);
//-------------------------------------------------------
	if(in_array($extension , array('jpg','jpeg', 'gif', 'png'))) { 
//-------------------------------------------------------
		$sqllmsupload  = $dblms->querylms("UPDATE ".WORKERS."
														SET worker_photo = '".$img_fileName."'
												 WHERE  worker_id		= '".cleanvars($StudentID)."'");
		unset($sqllmsupload);
		$mode = '0644'; 
//-------------------------------------------------------	
		move_uploaded_file($_FILES['worker_photo']['tmp_name'],$originalImage);
		chmod ($originalImage, octdec($mode));
//-------------------------------------------------------
	}
//-------------------------------------------------------
}
//----------------------------------------------------------
if($sqllms) {
//----------------------------------------------------------
	echo'<div class="alert alert-info alert-dismissable" align="center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>success: </span>Record added successfully.
		</div>';
	}
//----------------------------------------------------------
}
}
//-------------------------------------------------------
if(!LMS_VIEW || LMS_VIEW == 'list') { 
	include("include/Pages/Workers/allWorkers.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "add") { 
	include("include/Pages/Workers/addWorkers.php");
}
//-------------------------------------------------------
if(LMS_VIEW == "modify") { 
	include("include/Pages/Workers/modifyWorkers.php");
}
//-------------------------------------------------------
include "include/footer.php";
//-------------------------------------------------------
?>