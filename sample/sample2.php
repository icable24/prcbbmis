<!DOCTYPE html>
<html>
<head>
<title>Contact Page with Multiple Maps Modal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<!-- Bootstrap core CSS -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.css" rel="stylesheet" media="screen">
 
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
<![endif]-->
<style>
    body { padding: 10px; background-color:#CCC }
    #map-container { height: 450px }
</style>
</head>
<body>
<div class="container">
<div class="row">
 
<div class="col-md-6">
<!-- Form -->
<form class="form-horizontal" name="commentform">
    <div class="form-group">
        <div class="col-md-6">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"/>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <textarea rows="6" class="form-control" id="comments" name="comments" placeholder="Your question or comment here"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <button type="submit" value="Submit" class="btn btn-warning pull-right">Send</button>
        </div>
    </div>
</form>
</div> <!-- / column 1 -->
 
<div class="col-md-6">
 
    <div class="col-md-6 col-xs-6">
        <h2>Venice</h2>
        <address>
        <strong>Peggy Guggenheim Collection</strong><br>
            Dorsoduro, 701-704<br>
            30123<br>
            Venezia<br>
            Italia<br>
            <abbr>P:</abbr> +39 041 240 5411<br>
            <!-- Button to trigger modal -->
            <a class="openmodal" href="#mapmodals" role="button" data-toggle="modal" data-id="Peggy Guggenheim Collection - Venice"><img src="04_maps.png" width="64" height="64" alt="map Venice" title="click to open Map"></a>  
       </address>
    </div> <!-- /column 2.1 -->
 
    <div class="col-md-6 col-xs-6">
 
      <h2>New York</h2>
        <address>
        <strong>Solomon R. Guggenheim Museum</strong><br>
            1071 5th Ave<br>
            New York<br>
            NY 10128<br>
            United States<br>
            <abbr>P:</abbr> +1 212 423 3500<br>
            <!-- Button to trigger modal -->
            <a class="openmodal" href="#mapmodals" role="button" data-toggle="modal" data-id="Solomon R. Guggenheim Museum - New York"><img src="04_maps.png" width="64" height="64" alt="map New York" title="click to open Map"></a>
        </address>
    </div> <!-- /column 2.2 -->
  </div> <!-- /column 2 -->
</div> <!-- /row -->
 
<!-- Modals -->
  <div class="modal fade" id="mapmodals">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="title_id"></h4>
        </div>
        <div class="modal-body">
          <div id="map-container"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="close" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
 
</div><!-- /container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
  function map_init(var_lati,var_long,var_markerTitle,var_contentString){
	  
    var var_location = new google.maps.LatLng(var_lati,var_long);
	
    var var_mapoptions = {
      zoom: 14,
      mapTypeControl: false,
      center:var_location,
      panControl:false,
      rotateControl:false,
      streetViewControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    var var_map = new google.maps.Map(document.getElementById("map-container"), var_mapoptions);
 
    var var_infowindow = new google.maps.InfoWindow({
      content: var_contentString
    });
    
    var var_marker = new google.maps.Marker({
		position: var_location,
		map: var_map,
		title:var_markerTitle,
		maxWidth: 200,
		maxHeight: 200
    });
    
    google.maps.event.addListener(var_marker, 'click', function() {
		  var_infowindow.open(var_map,var_marker);
    });
 
      $('#mapmodals').on('shown.bs.modal', function () {
          google.maps.event.trigger(var_map, "resize");
          var_map.setCenter(var_location);
      });
  }
 
$(document).on("click", ".openmodal", function () {
    var var_mapTitle = $(this).data('id');
    
    if (var_mapTitle == "Peggy Guggenheim Collection - Venice"){
      map_init(45.430817,12.331516,"Click to visit the Peggy Guggenheim Collection",
	  		'<div id="mapInfo">'+
            '<p><strong>Peggy Guggenheim Collection</strong><br><br>'+
            'Dorsoduro, 701-704<br>' +
            '30123<br>Venezia<br>'+
            'Phone: (+39) 041 240 5411</p>'+
            '<a href="http://www.guggenheim.org/venice" target="_blank">Plan your visit</a>'+
            '</div>');
    } else if (var_mapTitle == "Solomon R. Guggenheim Museum - New York"){
      map_init(40.783062,-73.959070,"Click to visit the Solomon R. Guggenheim Museum",
	  		'<div id="mapInfo">'+
            '<p><strong>Solomon R. Guggenheim Museum</strong><br><br>'+
            '1071 5th Ave<br>' +
			'New York<br>' +
			'NY 10128<br>' +
			'United States<br>' +
			'Phone: (+1) 212 423 3500</p>'+
            '<a href="http://www.guggenheim.org/new-york" target="_blank">Plan your visit</a>'+
            '</div>');
    }
    $(".modal-header #title_id").html( var_mapTitle );
    $('#mapmodals').modal('show');
});
</script>
</body>
</html>