$(document).ready(function () {
 if ($(".address-form").length > 0) {
		   if (($(".address-form  .address-first-name  input[type='text']").val() == "") && ($(".address-form .address-last-name  input[type='text']").val() == "")) {
$.notify({
	title: '<strong>Heads up!</strong>',
	message: 'You can use any of bootstraps other alert styles as well by default.'
},{
	type: 'success'
});var ipaddress = "";
			var city;
			var state;
			var country;
			var company;
			//nearby places
			var map;
			var request;
			var service;
			
			function errorFunction(){
				console.log("Geocoder failed");
			}
			
			
			$.ajax({
				method: "GET",
				url: "/wpapi/UserMgmtApi/GetUserDetailsbyIP?ipaddress="+"",
				success: function (returnData, textStatus, jqXHR) {
					var data = JSON.parse(returnData);
					console.log("before navigator.geolocation");
					if (navigator.geolocation) {
						var geocoder = new google.maps.Geocoder();
						navigator.geolocation.getCurrentPosition((position) => {
							var lat = position.coords.latitude;
							var lng = position.coords.longitude;
							var latlng = new google.maps.LatLng(lat, lng);
							
				 
				 /* map = new google.maps.Map(document.getElementById('map'), {
						  center: latlng,
						   zoom: 15
						 });

					    request = {
						location: latlng,
					     radius: '500',
						 query: 'company'
					   };
				 service = new google.maps.places.PlacesService(map);
                  service.textSearch(request, callback);*/
							// console.log("before geocode");
						  
							geocoder.geocode({'latLng': latlng}, function(results, status) {
							  if (status == google.maps.GeocoderStatus.OK) {
							  console.log(results)
								if (results[1]) {
								//find country name
									 for (var i=0; i<results[0].address_components.length; i++) {
										for (var b=0;b<results[0].address_components[i].types.length;b++) {
											if (results[0].address_components[i].types[b] == "locality") {
												data.City ==""?city= results[0].address_components[i].long_name:city=data.City;
											}
											if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
												data.StateProvince ==""?state= results[0].address_components[i].long_name:state=data.StateProvince;
											}
											if (results[0].address_components[i].types[b] == "country") {
												data.Country == ""?country= results[0].address_components[i].long_name:country=data.Country;
											}
											if (results[0].address_components[i].types[b] == "administrative_area_level_3") {
											data.Company == ""?company=results[0].address_components[i].long_name:company=data.Company;
											}
										}
									}
									$("#City").val(city);
									$("#State").val(state);
									$("#Country").val(country);
									console.log(city,state,country,company)
									//$(".editprofile-form .editprofile-city .col-sm-9 input[type='text']").val(city);
									//$(".editprofile-form .editprofile-stateprovince .col-sm-9 input[type='text']").val(state);
									//$(".editprofile-form .editprofile-country .col-sm-9 select").val(country);
								
									//$(".editprofile-form .editprofile-company .col-sm-9 input[type='text']").val(company);
								//city data


								} else {
									console.log("No results found");
									$("#City").val(data.City);
									$("#State").val(data.StateProvince);
									$("#Country").val(data.Country);
									//$(".editprofile-form .editprofile-city .col-sm-9 input[type='text']").val(data.City);
									//$(".editprofile-form .editprofile-stateprovince .col-sm-9 input[type='text']").val(data.StateProvince);
									//$(".editprofile-form .editprofile-country .col-sm-9 select").val(data.Country);
									//$(".editprofile-form .editprofile-company .col-sm-9 input[type='text']").val(data.Company);
									
								}
							  } else {
								console.log("Geocoder failed due to: " + status);
								$("#City").val(data.City);
								$("#State").val(data.StateProvince);
								$("#Country").val(data.Country);
								//$(".editprofile-form .editprofile-city .col-sm-9 input[type='text']").val(data.City);
								//$(".editprofile-form .editprofile-stateprovince .col-sm-9 input[type='text']").val(data.StateProvince);
								//$(".editprofile-form .editprofile-country .col-sm-9 select").val(data.Country);
								//$(".editprofile-form .editprofile-company .col-sm-9 input[type='text']").val(data.Company);
							  }
							});
						}, errorFunction);
						/*function callback(results, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    console.log(place)
					data.Company=place
					$(".editprofile-form .editprofile-company .col-sm-9 input[type='text']").val(data.Company);
    }
  }
}*/

															
					}
					
					$(".editprofile-form .editprofile-email .col-sm-9 input[type='email']").val(data.Email);
					$(".editprofile-form .editprofile-email .col-sm-9 input[type='email']").attr("readonly",true);
					$(".editprofile-form .editprofile-Salutation .col-sm-9 input[type='text']").val(data.Salutation);
					$(".editprofile-form .editprofile-first-name .col-sm-9 input[type='text']").val(data.FirstName);
					$(".editprofile-form .editprofile-last-name .col-sm-9 input[type='text']").val(data.LastName);
					$(".editprofile-form .editprofile-title .col-sm-9 input[type='text']").val(data.Title);
					
				}
				
				
			});
				$.ajax({
				method: "GET",
				contentType: "application/json",
				url: "/wpapi/UserMgmtApi/GetUserDetailsbyIP?ipaddress="+"",
                 success: function initialize() {
					//var lat=navigator.geolocation.position.coords.latitude;
					//var lng=navigator.geolocation.position.coords.longitude;
                var exact = new google.maps.LatLng(37.087811,-95.711849);
				//var exact=new google.maps.LatLng;
                 var request={
				  location: exact,
                  radius: '100',
                  type: ['establishment']
                   };
				 service = new google.maps.places.PlacesService(document.createElement('div'));
				 service.nearbySearch(request, callback);
				 
				var places = [];
				function callback(results, status) {
				if (status == google.maps.places.PlacesServiceStatus.OK) {
					console.log(results);
				for (var i = 0; i < results.length; i++) {
				places.push(results[i].name);}
				
                console.log(places)
				
				$("#Company").autocomplete({source:places});
				//$(".editprofile-form .editprofile-company .col-sm-9 input[type='text']").autocomplete({source:places});

		}
    }
				 }
});
	
			 


		}
    }
	
});	