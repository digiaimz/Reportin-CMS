<?php 
//error_reporting(0);
//session_start();
	include_once "../../dbsetting/lms_vars_config.php";
	include_once "../../dbsetting/classdbconection.php";
	include_once("../../functions/functions.php");
	$dblms = new dblms();
//-------------------------------------------------------------------
if($_GET['txt_Country'] == '158') {
//-------------------------------------------------------------------
	$Country = $_GET['txt_Country']; 
//-------------------------------------------------------------------
echo'
<div class="col col_6_of_12">
<label for="c_website" style="font-weight:600;" class="req">Province  ( صوبہ ) </label>
	<select id="txt_Provinces" name="txt_Provinces" autocomplete="off" required onchange="get_halqabyprovince(this.value)">
		<option value="">Select Province</option>';
		$sqlorgProvince  = $dblms->querylms("SELECT * FROM ".PROVINCES." WHERE prov_shown = '1' ORDER BY prov_name ASC ");
			while($rowProvince = mysqli_fetch_array($sqlorgProvince)) { 
				echo '<option value="'.$rowProvince['id_prov'].'">'.$rowProvince['prov_name'].'</option>';
			}
	echo '
	</select>
</div>

<div id="gethalqabyprovince">

</div>';	
//-------------------------------------------------------------------
} else {
//-------------------------------------------------------------------
echo'
<div class="col col_6_of_12">
	<label style="font-weight:600;" class="req"> City ( شہر ) </label>
	<input type="text" name="txt_City" id="txt_City" placeholder="City" title="City" autocomplete="off" required/>
</div>';
//-------------------------------------------------------------------
}
//-------------------------------------------------------------------
?>