<!DOCTYPE html>
<html>
<head>
	<title>Philippine Red Cross Blood Bank Management Information Systems</title>
	 <!-- This stylesheet contains specific styles for displaying the map
         on this page. Replace it with your own styles as described in the
         documentation:
         https://developers.google.com/maps/documentation/javascript/tutorial -->
   
</head>
<body>
 <style>
     

	 #map {
        height: 500px;
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
		<div id='map'></div>
		<br>
	</div>
    <div>
        <a href="c_Philippines.php">By Chapter?</a>
        <a href="p_NegrosOccidental.php">By Hospitals?</a>
    </div>
</div>
	
	

<script>
      var customLabel = {
        chapter: {
          label: 'C'
        }
      };

<<<<<<< HEAD
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(12.1262138,122.4515049),
          zoom: 6,
          
        });
        var infoWindow = new google.maps.InfoWindow{
    
        }
=======
<script type="text/javascript">
    var locations = [
      ['<strong>Philippine Red Cross Main<br></strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.5720757,121.0466793,21] , 
      ['<strong>Philippine Red Cross Bacolod Chapter</strong><br>\<p>Available Blood</p><br>\
	<p><a href="requisition_form_byChapters.php">Request</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n\
        <a href="requisition_form_byChapters.php" style="text-align: right">Go to </a></p>'
       , 10.6761724,122.9570703,19],

      ['<strong>Philippine Red Cross Cebu Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 10.3124335,123.8917013,21],
      ['<strong>Philippine Red Cross Cagayan Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 17.6132213,121.7273084,21],
      ['<strong>Philippine Red Cross Vigan Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 17.5751601,120.3862903,21],
      ['<strong>Philippine Red Cross Abra Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 17.5998337,120.618535,21],
      ['<strong>Philippine Red Cross La Union Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 16.6146505,120.317175,21],
      ['<strong>Philippine Red Cross Nueva Vizcaya Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 16.4878715,121.1597741,21],
      ['<strong>Philippine Red Cross Quirino Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 16.5246079,121.5193845,21],
      ['<strong>Philippine Red Cross Nueva Ecija Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 15.4900431,120.9690693,21],
      ['<strong>Philippine Red Cross Bulacan Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.85694,120.8140655,21],
      ['<strong>Philippine Red Cross Pampanga Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 15.0239591,120.6875669,21],
      ['<strong>Philippine Red Cross Valenzuela Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.6780091,120.9785221,21],
      ['<strong>Philippine Red Cross Malabon Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.6695355,120.9756652,21],
      ['<strong>Philippine Red Cross Caloocan Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.6473076,120.9918956,21],
      ['<strong>Philippine Red Cross Quezon Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.6461487,121.0520345,21],
      ['<strong>Philippine Red Cross Manila Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.5879335,120.9762516,21],
      ['<strong>Philippine Red Cross Rizal Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.5746745,121.0607448,21],
      ['<strong>Philippine Red Cross Pasay Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.5309419,121.0041027,21],
      ['<strong>Philippine Red Cross Laguna Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.2746685,121.4178782,21],
      ['<strong>Philippine Red Cross San Pablo Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 14.0697118,121.3257398,21],
      ['<strong>Philippine Red Cross Marinduque Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 13.4470746,121.8410334,21],
      ['<strong>Philippine Red Cross Camarines Norte Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 13.4470746,121.8410334,21],
      ['<strong>Philippine Red Cross Camarines Sur Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 13.621737,123.1965382,21],
      ['<strong>Philippine Red Cross Romblon Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 12.5304392,122.2854133,21],
      ['<strong>Philippine Red Cross Camarines Norte Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 13.4470746,121.8410334,21],
      ['<strong>Philippine Red Cross Tangub Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 8.0611774,123.7513943,21],
      ['<strong>Philippine Red Cross Camarines Norte Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 13.4470746,121.8410334,21],
      ['<strong>Philippine Red Cross Sorsogon Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 12.9717699,124.0015203,20],
      ['<strong>Philippine Red Cross Masbate Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 12.3712772,123.6246535,20],
      ['<strong>Philippine Red Cross Northern Samar Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 12.5035212,124.6339548,21],
      ['<strong>Philippine Red Cross Northern Samar Chapter</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byChapters.php">Request</a>', 12.5035212,124.6339548,21],
    ];
>>>>>>> 6f9fe6099a5d831e0cc72842dc14316d09b8bba7

          // Change this depending on the name of your PHP or XML file
          downloadUrl('', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW-KU2LLQRjmIu7W10l3jD0VDLwrQzGP0&callback=initMap">
    </script>
    <br><br>
    
<?php 
			include ('footer.php');
		?>
	

</body>
</html>