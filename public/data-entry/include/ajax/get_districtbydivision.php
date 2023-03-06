<?php 
error_reporting(0);
session_start();
	include "../../dbsetting/lms_vars_config.php";
	include "../../dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "../../functions/login_func.php";
	include "../../functions/functions.php";
//--------------------------------------------
if(isset($_GET['id_div'])) {
//--------------------------------------------			
		$sqllmsDistrict  = $dblms->querylms("SELECT id_dist, dist_name, dist_name_ur, id_div 
												FROM ".DISTRICTS." 
												WHERE id_div = '".cleanvars($_GET['id_div'])."' 
												AND dist_shown = '1'
												ORDER BY dist_name DESC");
		$Districtarray = array();
		while($rowDistrict	= mysqli_fetch_array($sqllmsDistrict)) {
			$Districtarray[] = $rowDistrict;
		}
//--------------------------------------------
echo ' 
<div class="col-md-4">
	<div class="form-group">
		<label> <img src="images_mem/dist.gif" border="0" align="middle">  </label>
			<select class="form-control select2" id="m_id_dist" name="m_id_dist" style="height:100%" autocomplete="off" onchange="get_tanzeemitehsilbytehsil(this.value)">
				<option value="">Select District</option>';
			foreach($Districtarray as $itemDistrict) { 
				echo '<option value="'.$itemDistrict['id_dist'].'"> '.$itemDistrict['dist_name_ur'].' - '.$itemDistrict['dist_name'].' </option>';
			}
	echo'
			</select>
		</div> 
	</div>';
//--------------------------------------------
}
//--------------------------------------------
?>