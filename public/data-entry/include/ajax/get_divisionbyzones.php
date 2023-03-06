<?php 
error_reporting(0);
session_start();
	include "../../dbsetting/lms_vars_config.php";
	include "../../dbsetting/classdbconection.php";
	$dblms = new dblms();
	include "../../functions/login_func.php";
	include "../../functions/functions.php";
//--------------------------------------------
if(isset($_GET['id_zone'])) {
//--------------------------------------------			
		$sqllmsDivision  = $dblms->querylms("SELECT id_div, div_name, div_name_ur, id_zone 
												FROM ".DIVISIONS." 
												WHERE id_zone = '".cleanvars($_GET['id_zone'])."' 
												AND div_shown = '1'
												ORDER BY div_name DESC");
		$Divisionarray = array();
		while($rowDivision	= mysqli_fetch_array($sqllmsDivision)) {
			$Divisionarray[] = $rowDivision;
		}
//--------------------------------------------
echo ' 
<div class="col-md-4">
	<div class="form-group">
		<label> <img src="images_mem/div.png" border="0" align="middle">  </label>
			<select class="form-control select2" id="m_id_div" name="m_id_div" style="height:100%" autocomplete="off" onchange="get_districtbydivision(this.value)">
				<option value="">Select Division</option>';
			foreach($Divisionarray as $itemDivision) { 
				echo '<option value="'.$itemDivision['id_div'].'"> '.$itemDivision['div_name_ur'].' - '.$itemDivision['div_name'].' </option>';
			}
	echo'
			</select>
		</div> 
	</div>';
//--------------------------------------------
}
//--------------------------------------------

//--------------------------------------------
if(isset($_GET['id_zone'])) {
//--------------------------------------------			
		$sqllmsDivision  = $dblms->querylms("SELECT id_div, div_name, div_name_ur, id_zone 
												FROM ".DIVISIONS." 
												WHERE id_zone = '".cleanvars($_GET['id_zone'])."' 
												AND div_shown = '1'
												ORDER BY div_name DESC");
		$Divisionarray = array();
		while($rowDivision	= mysqli_fetch_array($sqllmsDivision)) {
			$Divisionarray[] = $rowDivision;
		}
//--------------------------------------------
echo'
<div id="getdivisionbyzones">

</div>';
//--------------------------------------------
}
//--------------------------------------------
?>