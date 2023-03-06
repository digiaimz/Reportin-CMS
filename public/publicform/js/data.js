<!--Get Province Halqas Detail-->
function get_halqabyprovince(txt_Provinces) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_halqabyprovince.php",  
		data: "txt_Provinces="+txt_Provinces,  
		success: function(msg){  
			$("#gethalqabyprovince").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get Province Halqas Detail-->

<!--Get District Tehisls Detail-->
function get_TehsilsbyDistrict(txt_District) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_TehsilsbyDistrict.php",  
		data: "txt_District="+txt_District,  
		success: function(msg){  
			$("#getTehsilsbyDistrict").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get District Tehisls Detail-->

<!--Get organizational responsibility Detail-->
function get_organizationalresponsibility(txt_organizational_responsibility) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_organizationalresponsibility.php",  
		data: "txt_organizational_responsibility="+txt_organizational_responsibility,  
		success: function(msg){  
			$("#getorganizationalresponsibility").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get organizational responsibility Detail-->

<!--Get Rafaqat Status Detail-->
function get_rafaqatstatus(txt_membership_status) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_rafaqatstatus.php",  
		data: "txt_membership_status="+txt_membership_status,  
		success: function(msg){  
			$("#getrafaqatstatus").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get Rafaqat Status Detail-->

<!--Get States Detail-->
function get_statesbycountry(txt_Country) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_statesbycountry.php",  
		data: "txt_Country="+txt_Country,  
		success: function(msg){  
			$("#getstatesbycountry").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get States Detail-->

<!--Get Zones Detail-->
function get_zonesbyprovince(id_prov) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_zonesbyprovince.php",  
		data: "id_prov="+id_prov,  
		success: function(msg){  
			$("#getzonesbyprovince").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get Zones Detail-->

<!--Get Division Detail-->
function get_divisionbyzones(id_zone) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_divisionbyzones.php",  
		data: "id_zone="+id_zone,  
		success: function(msg){  
			$("#getdivisionbyzones").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get Division Detail-->

<!--Get District Detail-->
function get_districtbydivision(id_div) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_districtbydivision.php",  
		data: "id_div="+id_div,  
		success: function(msg){  
			$("#getdistrictbydivision").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get District Detail-->


<!--Get Tanzeemi Tehsil Detail-->
function get_tanzeemitehsilbytehsil(id_dist) {  
	$("#loading").html('<img src="images/ajax-loader-horizintal.gif"> loading...');  
	$.ajax({  
		type: "GET",  
		url: "include/ajax/get_tanzeemitehsilbytehsil.php",  
		data: "id_dist="+id_dist,  
		success: function(msg){  
			$("#gettanzeemitehsilbytehsil").html(msg); 
			$("#loading").html(''); 
		}
	});  
}
<!--Get Tanzeemi Tehsil Detail-->



