<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Countries.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Add Country Detail</h3>

<hr>

<!--row-->
<div class="row">

	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Name</label>
			<input type="text" class="form-control" id="country_name" name="country_name" placeholder="Enter Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label class="req">Code</label>
			<input type="text" class="form-control" id="country_code" name="country_code" placeholder="Enter Code" required autocomplete="off"> 
		</div>
	</div>

</div>
<!--/row-->

<!--row-->
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="country_status" name="country_status" style="width:100%" autocomplete="off" required>';
			foreach($ad_status as $itemadmstatus) {
				echo '<option value="'.$itemadmstatus['status_id'].'">'.$itemadmstatus['status_name'].'</option>';
			}
	echo'
			</select>
	</div>
</div>
</div>
<!--/row-->

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Countries.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_countries" name="submit_countries" class="btn btn-success">   Create Country </button>
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
