<?php 
//error_reporting(0);
//session_start();
	include_once "../../dbsetting/lms_vars_config.php";
	include_once "../../dbsetting/classdbconection.php";
	include_once("../../functions/functions.php");
	$dblms = new dblms();
//-------------------------------------------------------------------
	$District = $_GET['txt_District']; 
//-------------------------------------------------------------------
echo'
<div class="col col_6_of_12">
<label for="c_website" style="font-weight:600;" class="req"> (تحصیل / صوبائی حلقہ) Tehsil / Provincial Halaqa</label>
	<select id="txt_Tehsil" name="txt_Tehsil" autocomplete="off" required onchange="get_halqabyprovince(this.value)">
		<option value="">Select Tehsil</option>';
		$sqlorgTehsil  = $dblms->querylms("SELECT * FROM ".TANZEEMI_TEHSILS." WHERE mtsl_shown = '1' AND id_mdist = '".$District."' ORDER BY mtsl_name ASC ");
			while($rowTehsil = mysqli_fetch_array($sqlorgTehsil)) { 
				echo '<option value="'.$rowTehsil['id_mtsl'].'">'.$rowTehsil['mtsl_name'].' - '.$rowTehsil['mtsl_name_ur'].'</option>';
			}
	echo '
	</select>
</div>';	
//-------------------------------------------------------------------
?>