<?php 
echo '
<div class="panel-wrapper collapse in" aria-expanded="true">
<div class="panel-body">
<!-----------------Form Start--------------->
<form method="post" action="Workers.php" enctype="multipart/form-data">
<div class="form-body">

<h3 class="box-title m-t-40" style="font-size:30px;text-decoration:none;text-align:center;"> Add Workers Detail</h3>';
//------------------------------------------------------------------------------------------------------------
	$sqllmsadmins	= $dblms->querylms("SELECT worker_id FROM ".WORKERS." ORDER BY worker_id DESC LIMIT 1");
	$valueadmins	= mysqli_fetch_array($sqllmsadmins);
	$employeenumber = "Dawa-001".($valueadmins['worker_id']+1); 
//------------------------------------------------------------------------------------------------------------
echo'
<hr>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label>Registration #</label>
			<input type="text" class="form-control" id="worker_regno" name="worker_regno" value="'.$employeenumber.'" readonly required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Username </label>
			<input type="text" class="form-control" id="worker_username" name="worker_username" placeholder="Enter Username" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Password </label>
			<input type="password" class="form-control" id="worker_userpass" name="worker_userpass" placeholder="Enter Password" autocomplete="off">
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div><br>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label class="req">Student Accesee</label>
			<select class="form-control" id="worker_access" name="worker_access" style="width:100%" autocomplete="off" required>';
			foreach($statusyesno as $itemstatusyesno) {
				echo '<option value="'.$itemstatusyesno['id'].'">'.$itemstatusyesno['name'].'</option>';
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Full Name </label>
			<input type="text" class="form-control" id="worker_fullname" name="worker_fullname" placeholder="Enter Full Name" required autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Father Name </label>
			<input type="text" class="form-control" id="worker_fathername" name="worker_fathername" placeholder="Enter Father Name" required autocomplete="off">
		</div>
	</div>
	
</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">

	<div class="col-md-3">
		<div class="form-group">
			<label> CNIC </label>
			<input type="text" class="form-control" id="worker_cnic" name="worker_cnic" placeholder="Enter CNIC" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label> Blood Group </label>
			<select class="form-control" id="worker_blood" name="worker_blood" style="width:100%" autocomplete="off">';
			foreach($bloodgroup as $itembloodgroup) {
				echo '<option value="'.$itembloodgroup.'">'.$itembloodgroup.'</option>';
			}
	echo'
			</select>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label class="req"> Gender </label>
			<select class="form-control" id="worker_gender" name="worker_gender" style="width:100%" autocomplete="off" required>';
			foreach($gender as $itemgender) {
				echo '<option value="'.$itemgender.'">'.$itemgender.'</option>';
			}
	echo'
			</select>
		</div>
	</div>

	<div class="col-md-3">
		<div class="form-group">
			<label> Date of Birth </label>
			<input type="date" class="form-control" id="worker_dob" name="worker_dob" placeholder="Enter Date of Birth" autocomplete="off">
		</div>
	</div>
	
</div>
<!--/row-->

<div style="clear:both;"></div>


<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label> Phone # </label>
			<input type="text" class="form-control" id="worker_phone" name="worker_phone" placeholder="Enter Phone #" autocomplete="off">
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Email </label>
			<input type="email" class="form-control" id="worker_email" name="worker_email" placeholder="Enter Email" required autocomplete="off">
		</div>
	</div>
	
	
	<div class="col-md-4">
		<div class="form-group">
			<label> Photo  </label>
			<input type="file" class="form-control" id="worker_photo" name="worker_photo" autocomplete="off">
		</div>
	</div>
	
</div>
<!--/row-->

<div style="clear:both;"></div>

<!--row-->
<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			<label class="req"> Join Date </label>
			<input type="date" class="form-control" id="worker_joinsdate" name="worker_joinsdate" value="'.date("Y-m-d").'" readonly autocomplete="off">
		</div>
	</div>
	

	<div class="col-md-4">
		<div class="form-group">
			<label> City </label>
			<input type="text" class="form-control" id="worker_city" name="worker_city" placeholder="Enter City" autocomplete="off">
		</div>
	</div>

	
	<div class="col-md-4">
		<div class="form-group">
			<label> Country </label>
			<select class="form-control select2" id="id_country" name="id_country" autocomplete="off">
				<option value="">Select Country</option>';
				  $sqllmscountry	= $dblms->querylms("SELECT country_id, country_name FROM ".COUNTRIES." WHERE country_status = '1' ORDER BY country_name ASC");
			while($valuecountry	= mysqli_fetch_array($sqllmscountry)) { 
				echo '<option value="'.$valuecountry['country_id'].'">'.$valuecountry['country_name'].'</option>';
			}
	echo'
			</select>
		</div>
	</div>

</div>
<!--/row-->

<div style="clear:both;"></div>


<!-- .row-->
<div class="row" style="margin-top:20px;">
	<div class="form-group">
		<label class="col-md-12 control-label"> Postal Address </label>
		<div class="col-md-12">
			<input type="text" class="form-control" id="worker_postaladdress" name="worker_postaladdress" placeholder="Enter Postal Address" autocomplete="off">
		</div>
	</div>
</div>
<!--/row-->

<div style="clear:both;"></div>

<!-- .row-->
<div class="row" style="margin-top:20px;">
	<div class="form-group">
		<label class="col-md-12 control-label"> Remarks </label>
		<div class="col-md-12">
			<textarea class="form-control" id="worker_remarks" name="worker_remarks" rows="6" ></textarea>
			 <script>
				document.addEventListener("DOMContentLoaded", function(){
				 CKEDITOR.replace( "worker_remarks", {
						  toolbar: "Advanced",
						  uiColor: "#ffffff",
						  height: "150px"
						  });
				  });
			</script>
			
		</div>
	</div>
</div>
<!--/row-->

<div style="clear:both;"></div>

			
<!--row-->
<div class="row" style="margin-top:20px;">
<div class="col-md-12">
	<div class="form-group">
		<label>Status</label>
			<select class="form-control" id="worker_status" name="worker_status" style="width:100%" autocomplete="off" required>';
			foreach($admstatus as $itemadmstatus) {
				echo '<option value="'.$itemadmstatus['status_id'].'">'.$itemadmstatus['status_name'].'</option>';
			}
	echo'
			</select>
	</div>
</div>
</div>
<!--/row-->

<div style="clear:both;"></div>

</div>

	<div class="form-actions" align="center" style="margin-top:50px;">
		<a href="Workers.php" class="btn btn-default">Cancel</a>
		<button type="submit" id="submit_Students" name="submit_Students" class="btn btn-success">   Create Worker </button>
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
