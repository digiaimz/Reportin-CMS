<?php 
echo'

<li><a class="waves-effect" href="Workers.php" aria-expanded="false"><span class="hide-menu"> Workers </span></a></li>
<li><a class="waves-effect" href="AboutDistrict.php" aria-expanded="false"><span class="hide-menu"> About District </span></a></li>
<li><a class="waves-effect" href="Tehsils.php" aria-expanded="false"><span class="hide-menu"> Tehsils </span></a></li>
<li><a class="waves-effect" href="TanzimeTehsils.php" aria-expanded="false"><span class="hide-menu"> Tanzime Tehsils </span></a></li>
<li><a class="waves-effect" href="Forums.php" aria-expanded="false"><span class="hide-menu"> Forums </span></a></li>

<li><a class="waves-effect"><span class="hide-menu" style="color:blue;"> Welcome '.$_SESSION['LOGINFNAMEA_SSS'].' ( Coordinator : '.$_SESSION['LOGINTEHSILS_SSS'].' ) </span></a></li>';
?>