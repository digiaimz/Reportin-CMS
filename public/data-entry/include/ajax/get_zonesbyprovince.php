<?php 
error_reporting(0);
session_start();
	include "../../dbsetting/lms_vars_config.php";
	include "../../dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "../../functions/login_func.php";
	include "../../functions/functions.php";
//--------------------------------------------
if(isset($_GET['id_prov'])) {
//--------------------------------------------			
		$sqllmsZone  = $dblms->querylms("SELECT id_zone, zone_name, zone_name_ur, id_prov 
												FROM ".ZONES." 
												WHERE id_prov = '".cleanvars($_GET['id_prov'])."' 
												AND zone_shown = '1'
												ORDER BY zone_name DESC");
		$Zonearray = array();
		while($rowZone	= mysqli_fetch_array($sqllmsZone)) {
			$Zonearray[] = $rowZone;
		}
//--------------------------------------------
echo ' 
<div class="col-md-4">
	<div class="form-group">
		<label> <img src="images_mem/zone.gif" border="0" align="middle">  </label>
			<select class="form-control select2" id="m_id_zone" name="m_id_zone" style="height:100%" autocomplete="off" onchange="get_divisionbyzones(this.value)">
				<option value="">Select Zone</option>';
			foreach($Zonearray as $itemZone) { 
				echo '<option value="'.$itemZone['id_zone'].'"> '.$itemZone['zone_name_ur'].' - '.$itemZone['zone_name'].' </option>';
			}
	echo'
			</select>
		</div> 
	</div>';
//--------------------------------------------
}
//--------------------------------------------
?>