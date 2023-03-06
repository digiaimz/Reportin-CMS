<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Profession.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Add Profession Detail</h3>

<hr>

<!--row-->
<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Name</label>
			<input type="text" class="form-control" id="profession_name" name="profession_name" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Code</label>
			<input type="text" class="form-control" id="profession_abbr" name="profession_abbr" placeholder="Enter Code" required autocomplete="off"> 
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="profession_status" name="profession_status" style="width:100%" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				echo '<option value="'.$itemadmstatus['status_id'].'">'.$itemadmstatus['status_name'].'</option>';
			}
	echo'
			</select>
	</div>
</div>
</div>
<!--/row-->

<div style="clear:both;"></div><br>

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Profession.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_Profession" name="submit_Profession" class="btn btn-success">   Create Profession </button>
	</div>
	
</form>
<!-----------------Form End--------------->
</div>
</div>
</div>
</div>
</div>
<!--./row-->

</div>
</div>
<!-- Page Content -->';
?>
