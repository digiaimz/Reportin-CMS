<?php 
error_reporting(0);
session_start();
	include "../../dbsetting/lms_vars_config.php";
	include "../../dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "../../functions/login_func.php";
	include "../../functions/functions.php";
//--------------------------------------------
if(isset($_GET['id_dist'])) {
//--------------------------------------------			
		$sqllmsTehsil  = $dblms->querylms("SELECT id_mtsl, mtsl_name , mtsl_name_ur, id_mdist 
												FROM ".TANZEEMI_TEHSILS." 
												WHERE id_mdist = '".cleanvars($_GET['id_dist'])."' 
												AND mtsl_shown = '1'
												ORDER BY mtsl_name DESC");
		$Tehsilarray = array();
		while($rowTehsil	= mysqli_fetch_array($sqllmsTehsil)) {
			$Tehsilarray[] = $rowTehsil;
		}
//--------------------------------------------
echo ' 
<div class="col-md-4">
	<div class="form-group">
		<label> <img src="images_mem/t-tsl.gif" border="0" align="middle">  </label>
			<select class="form-control select2" id="m_id_tsl" name="m_id_tsl" style="height:100%" autocomplete="off">
				<option value="">Select Tanzeemi Tehsil</option>';
			foreach($Tehsilarray as $itemTehsil) { 
				echo '<option value="'.$itemTehsil['id_mtsl'].'"> '.$itemTehsil['mtsl_name_ur'].' - '.$itemTehsil['mtsl_name'].'</option>';
			}
	echo'
			</select>
		</div> 
	</div>';
//--------------------------------------------
}
//--------------------------------------------
?>