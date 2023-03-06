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



