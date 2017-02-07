<?php 
	include 'login_success.php';
	require 'dbconnect.php';

	$id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    
     
   
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT SQL_CALC_FOUND_ROWS *  FROM inventory WHERE remarks LIKE 'Ok'";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Philippine Red Cross Blood Bank Management Information Systems</title>
	 <!-- This stylesheet contains specific styles for displaying the map
         on this page. Replace it with your own styles as described in the
         documentation:
         https://developers.google.com/maps/documentation/javascript/tutorial -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyDW-KU2LLQRjmIu7W10l3jD0VDLwrQzGP0" type="text/javascript"></script>
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
                        <a href="c_Philippines_1.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/philippinesflg.png"></span>&nbsp;&nbsp; Philippines</a>
			<a href="c_Singapore.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/singaporeflg.png"></span>&nbsp;&nbsp; Singapore</a>
			<a href="c_Thailand.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/thailandflg.png"></span>&nbsp;&nbsp; Thailand</a>
			<a href="c_Vietnam.php" class="list-group-item bg"><span aria-hidden="true"><img src="./img/vietnamflg.png"></span>&nbsp;&nbsp; Vietnam</a>
		</div>
	</div>
	<div class="col-lg-9">
		<div id='map'></div>
		<br>
                <div>
                    <a href="c_Philippines_1.php">By Chapter?</a>
                    <a href="p_NegrosOccidental_1.php">By Hospitals?</a>
    </div>
	</div>
</div>
	
	


<script type="text/javascript">
    var locations = [
      ['<form action="inventory_list.php" method="post">\<strong>Philippine Red Cross Bacolod Chapter</strong><br>\<p>Available Blood</p>\
        <p style="font-weight: bold"><?php echo $data['component']?></p>\
	<p><a href="requisition_form_byChapters.php">Request</a></form>', 10.6761724,122.9570703,19],
      ['<strong>Alfredo F. Marañon, Sr. Memorial District Hospital<br></strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.807708,123.372701,21] , 
      ['<strong>Bacolod Adventist Medical Center</strong><br>\<p>Available Blood</p><br>\
        <a href="requisition_form_byHospitals.php">Request</a>', 10.6476608,122.9494671,21],
      ['<strong>Bacolod Our Lady of Mercy Specialty Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.6898607,122.9714516,21],
      ['<strong>Bago City Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.5353332,122.8475057,21],
      ['<strong>Binalbagan Infirmary</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.2044765,122.9758139,21],
      ['<strong>Cadiz District Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.9475969,123.2898107,21],
      ['<strong>Calatrava District Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.5956043,123.4828658,21],
      ['<strong>Cauayan Municipal Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 9.9718374,122.5873684,21],
      ['<strong>Corazon Locsin Montelibano Memorial Regional Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.685624,122.9572993,21],
      ['<strong>Don Salvador Benedicto Memorial Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.4228147,122.9137014,21],
      ['<strong>Dr. Gumersindo Garcia, Sr. Memorial Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 9.9897914,122.8132915,21],
      ['<strong>Dr. Pablo O. Torre, Sr. Memorial Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.6827911,122.9581273,21],
      ['<strong>E.R. ELumba Clinic</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.3219475,123.019397,21],
      ['<strong>Eleuterio T. Decena Memorial Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 9.6295611,122.4662582,17],
      ['<strong>Gov. Valeriano M. Gatuslao Memorial Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.114413,122.8713687,21],
      ['<strong>Ignacio Lacson Arroyo Sr. Memorial District Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.2057832 ,122.983902,21],
      ['<strong>Immaculate Concepcion Health Center</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.8982558,123.0741631,21],
      ['<strong>Kabankalan City Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 9.7877078,122.8034765,21],
      ['<strong>Kabankalan District Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.0094649,122.8197528,21],
      ['<strong>Lopez District Farmers Hospital Inc</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.8967677,123.4141851,21],
      ['<strong>The Doctors Hospital, Inc</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.6781316,122.9603541,21],
      ['<strong>San Carlos City Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.4807349,123.4191839,21],
      ['<strong>San Carlos Doctors Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.4910796,123.4212228,21],
      ['<strong>Southern Negros Doctors Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.2057832,122.983902,21],
      ['<strong>South Bacolod General Hospital & General Center, Inc.</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.7908039,122.9777094,21],
      ['<strong>Valladolid District Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.7908039,122.9777094,21],
      ['<strong>Vicente Gustilo District Hospital</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byHospitals.php">Request</a>', 10.7908039,122.9777094,21],
    ];
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: new google.maps.LatLng(10.3105497,122.8722771),
     
    });
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

 <br><br>
    
<?php 
			include ('footer.php');
		?>
	

</body>
</html>