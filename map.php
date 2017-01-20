<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v0.28.0/mapbox-gl.css' rel='stylesheet' />
</head>
<body>

<?php include('header.php'); ?> 

<div class="container">
	<div class="col-lg-3">
		<div class="list-group side_bar">
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/bruneiflg.png"></span>&nbsp;&nbsp; Brunei</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/cambodiaflg.png"></span>&nbsp;&nbsp; Cambodia</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/indonesiaflg.png"></span>&nbsp;&nbsp; Indonesia</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/laosflg.png"></span>&nbsp;&nbsp; Laos</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/malaysiaflg.png"></span>&nbsp;&nbsp; Malaysia</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/myanmarflg.png"></span>&nbsp;&nbsp; Myanmar</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/philippinesflg.png"></span>&nbsp;&nbsp; Philippines</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/singaporeflg.png"></span>&nbsp;&nbsp; Singapore</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/thailandflg.png"></span>&nbsp;&nbsp; Thailand</a>
			<a href="#" class="list-group-item bg"><span aria-hidden="true"><img src="./img/vietnamflg.png"></span>&nbsp;&nbsp; Vietnam</a>
		</div>
	</div>
	<div class="col-lg-9">
		<div id='map' style='width: auto; height: 500px;'></div>
		<br>
	</div>
</div>
	
		<script>
			mapboxgl.accessToken = 'pk.eyJ1IjoiYWJsZWljMjQiLCJhIjoiY2l3a3RsMzJ3MDA0NDJvcDI3bnhteG1vcCJ9.QNx6k3-uq9y4p3pDbyoYoA';
			var map = new mapboxgl.Map({
			container: 'map',
			center: [111.712,9.715],
			zoom: 3, 
			style: 'mapbox://styles/ableic24/ciwktqgx500k92ps5e5pc0n55'
			});

			document.oncontextmenu = function() {
	    		return false;
	    	}
		</script>
		
	
<?php include('footer.php'); ?>
</body>
</html>