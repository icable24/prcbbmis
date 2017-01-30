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
       #map {
        height: 400px;
        width: 100%;
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
</div>

    <script>
    
      function initMap() {
        var Thailand = {lat: 12.9037312, lng: 92.443246};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: Thailand
        });
        var marker = new google.maps.Marker({
          position: Thailand,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW-KU2LLQRjmIu7W10l3jD0VDLwrQzGP0 
&callback=initMap">
    </script>

 <br><br>
    
<?php 
			include ('footer.php');
		?>
	

</body>
</html>