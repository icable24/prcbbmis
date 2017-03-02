<!DOCTYPE html>

<html>
    <head>
        
        <link rel="icon" type="image/png" href="../img/PRClogo.png">
        <link href="../css/header.css" rel="stylesheet" type="text/css"/>
        <link href="../css/custom_style.css" rel="stylesheet" type="text/css"/>
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        
        <title>Philippine Red Cross Blood Bank Management Information System</title>
        <link rel="icon" type="image/png" href="../img/PRClogo.png">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"/>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
             <script src="http://maps.google.com/maps/api/js?key=AIzaSyDW-KU2LLQRjmIu7W10l3jD0VDLwrQzGP0" type="text/javascript"></script>
    </head>

	<body>
    <style>       
       #map {
        height: 500px;
        width: 100%;
       }

    </style>
        <!--HEADER-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid header">
            	
            		<div class="col-md-1" style="margin-right:0px">
                            <a href="../index.php"><img src="../img/PRClogo.png" alt="thesis-logo" id="logo"/></a>
                	</div>
                    <div class="col-md-8">
                		<span style="font-size:42px; letter-spacing: 1px; margin-left: 10px;" >PHILIPPINE RED CROSS</span><br>
                		<span style="font-size:20px;padding-top:0px; letter-spacing: 1px; margin-left: 10px;">10th LACSON STREET, BACOLOD CITY, 6100 NEGROS OCCIDENTAL</span>
            		</div>
            </div>
            <!-- NAV BAR-->
           
            <div class="page_title_container" style="margin-top:0px">	
                <div class="collapse navbar-collapse" id="myNavbar">
                     
                     <ul class="nav navbar-nav col-lg-7">
                         <li class="col-xs-offset-9"><a href="mapout.php">MAP</a></li>
                     </ul>
                    
                    
                </div>  
            </div>
        </nav>
       

    <br><br>
<div class="container">
	<div class="col-lg-3">
		<div class="list-group side_bar">
                    <a href="c_Brunei.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/bruneiflg.png"></span>&nbsp;&nbsp; Brunei</a>
                    <a href="c_Cambodia.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/cambodiaflg.png"></span>&nbsp;&nbsp; Cambodia</a>
                    <a href="c_Indonesia.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/indonesiaflg.png"></span>&nbsp;&nbsp; Indonesia</a>
                    <a href="c_Laos.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/laosflg.png"></span>&nbsp;&nbsp; Laos</a>
                    <a href="c_Malaysia.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/malaysiaflg.png"></span>&nbsp;&nbsp; Malaysia</a>
                    <a href="c_Myanmar.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/myanmarflg.png"></span>&nbsp;&nbsp; Myanmar</a>
                    <a href="c_Philippines_1.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/philippinesflg.png"></span>&nbsp;&nbsp; Philippines</a>
                    <a href="c_Singapore.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/singaporeflg.png"></span>&nbsp;&nbsp; Singapore</a>
                    <a href="c_Thailand.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/thailandflg.png"></span>&nbsp;&nbsp; Thailand</a>
                    <a href="c_Vietnam.php" class="list-group-item bg"><span aria-hidden="true"><img src="../img/vietnamflg.png"></span>&nbsp;&nbsp; Vietnam</a>
		</div>
	</div>
	<div class="col-lg-9">
		<div id='map'></div>
		<br>
	</div>
</div>
	
	


<script type="text/javascript">
    var locations = [
      ['<strong>Brunei</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 4.5254025,114.1591413,9],
      ['<strong>Cambodia</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 12.2963276,104.7361466,7],
      ['<strong>Indonesia</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', -4.824171,121.7683894,5],
      ['<strong>Laos</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 19.1644031,102.3924702,6],
      ['<strong>Malaysia</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 5.1389094,102.1199891,6],
      ['<strong>Myanmar</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 20.8780807,96.6368639,5],
      ['<strong>Philippines</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 12.1262138,122.4515049,5],
      ['<strong>Singapore</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 1.3150701,103.7069325,11],
      ['<strong>Thailand</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 16.0109028,100.9927392,6],
      ['<strong>Vietnam</strong><br>\<p>Available Blood</p><br>\
	<a href="requisition_form_byCountry.php">Request</a>', 14.86692,108.3096936,6],
     
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: new google.maps.LatLng(8.3226909, 105.1730052),
     
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
<footer class="text-center">
  <p>&copy; 2016-2017 Information System | <a href="http://www.uno-r.edu.ph/academics/departments/information-technology/">College of Information Technology</a> | <a href="http://www.uno-r.edu.ph/">University of Negros Occidental-Recoletos</a></p> 
</footer>
    </body>
</html>
