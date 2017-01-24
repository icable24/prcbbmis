<!DOCTYPE html>
<html>
<head>
	<title>Philippine Red Cross Blood Bank Management Information Systems</title>
	 <!-- This stylesheet contains specific styles for displaying the map
         on this page. Replace it with your own styles as described in the
         documentation:
         https://developers.google.com/maps/documentation/javascript/tutorial -->
    <link rel="stylesheet" href="/maps/documentation/javascript/demos/demos.css">
</head>
<body>
 <style>
         html,
body {
	height: 100%;
	margin: 0;
	padding: 0;
}
#map {
	height: 100%;
        
}
    </style>
<?php include('header.php'); ?> 
    <br><br>
<div class="container">
	<div class="col-lg-3">
		<div class="list-group side_bar">
                        <a href="c_Brunei.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/bruneiflg.png"></span>&nbsp;&nbsp; Brunei</a>
                        <a href="c_Cambodia.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/cambodiaflg.png"></span>&nbsp;&nbsp; Cambodia</a>
                        <a href="c_Indonesia.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/indonesiaflg.png"></span>&nbsp;&nbsp; Indonesia</a>
			<a href="c_Laos.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/laosflg.png"></span>&nbsp;&nbsp; Laos</a>
			<a href="c_Malaysia.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/malaysiaflg.png"></span>&nbsp;&nbsp; Malaysia</a>
			<a href="c_Myanmar.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/myanmarflg.png"></span>&nbsp;&nbsp; Myanmar</a>
                        <a href="c_Philippines.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/philippinesflg.png"></span>&nbsp;&nbsp; Philippines</a>
			<a href="c_Singapore.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/singaporeflg.png"></span>&nbsp;&nbsp; Singapore</a>
			<a href="c_Thailand.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/thailandflg.png"></span>&nbsp;&nbsp; Thailand</a>
			<a href="c_Vietnam.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/vietnamflg.png"></span>&nbsp;&nbsp; Vietnam</a>
		</div>
	</div>
	<div class="col-lg-9">
		<div id='map' style='width: auto; height: 500px;'></div>
		<br>
	</div>

	<script src="script.js"></script>
	<script async defer 
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW-KU2LLQRjmIu7W10l3jD0VDLwrQzGP0&callback=initMap"></script>


<script>
var map;

	function initMap() {
	
	var broadway = {
		info: 'ok',
		lat: 41.976816,
		long: -87.659916
	};

	var belmont = {
		info: '<strong>Chipotle on Belmont</strong><br>\
					1025 W Belmont Ave<br> Chicago, IL 60657<br>\
					<a href="https://goo.gl/maps/PHfsWTvgKa92">Get Directions</a>',
		lat: 41.939670,
		long: -87.655167
	};

	var sheridan = {
		info: '<strong>Chipotle on Sheridan</strong><br>\r\
					6600 N Sheridan Rd<br> Chicago, IL 60626<br>\
					<a href="https://goo.gl/maps/QGUrqZPsYp92">Get Directions</a>',
		lat: 42.002707,
		long: -87.661236
	};

	var locations = [
      [broadway.info, broadway.lat, broadway.long, 0],
      [belmont.info, belmont.lat, belmont.long, 1],
      [sheridan.info, sheridan.lat, sheridan.long, 2],
    ];

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 13,
		center: new google.maps.LatLng(41.976816, -87.659916),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow({});

	var marker, i;

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function (marker, i) {
			return function () {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}
}
</script>

 <br><br>
    
<?php 
			include ('footer.php');
		?>
	

</body>
</html>