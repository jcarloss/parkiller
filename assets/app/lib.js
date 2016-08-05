  var conn = new Connection(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);
  var map;
  var directionDisplay;
  var directionsService;
  var start=[];
  var end=[];
  var markerArray = [];
  var position;
  var marker = null;
  var gmarkers=[];
  var speed = 0.000005, wait = 1;
  var infowindow = null;
  var bounds = [];
  var route = [];
  var _path=[];
  var _legs=[];
  var clientes=[];
  var conductores=[];
  var cont=0;
  var contConductor=0;
  var clienteLocation="";
  var conductorLocation="";
  var conductorCercano="";
  var positionsClientes=[];
  var positionsConductores=[];
  var polyline = [];
  var poly2 = [];
  var stepDisplay;
  var rendererOptions = {
    map: map
  }
  var directionsDisplay  =[];// new google.maps.DirectionsRenderer(rendererOptions);
  var myPano;   
  var panoClient;
  var nextPanoId;
  var timerHandle = null;
  /** Crear marcadores de tipo cliente y conductor **/
  function createMarker(latlng, label, html,_icon) {
    var contentString = '<b>'+label+'</b><br>'+html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: label,
        draggable:true,
        icon:"/parkiller/assets/images/"+_icon+".png"
       // zIndex: Math.round(latlng.lat()*-100000)<<5
        });
    marker.myname = label;
    gmarkers.push(marker);
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.setContent(contentString); 
      infowindow.open(map,marker);
    });
    var markers = gmarkers;
    return marker;
}

/** Iniciamos el mapa **/
function initialize() {
  infowindow = new google.maps.InfoWindow(
    { 
      size: new google.maps.Size(150,50)
    });
    // Instantiate a directions service.
    directionsService = new google.maps.DirectionsService();
    
    // Create a map and center it on Manhattan.
    var myOptions = {
      zoom: 14,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    address = 'Mexico city'
    geocoder = new google.maps.Geocoder();
	  geocoder.geocode( { 'address': address}, function(results, status) {
       map.setCenter(results[0].geometry.location);
	});
    
    // Create a renderer for directions and bind it to the map.
    var rendererOptions = {
      map: map
    }
  }

	var steps = []
		function calcRoute(from,to,pos){
    directionsDisplay[pos]=new google.maps.DirectionsRenderer(rendererOptions);
    var myPano;   
    // Instantiate an info window to hold step text.
    stepDisplay = new google.maps.InfoWindow();
    polyline[pos] = new google.maps.Polyline({
      path: [],
      strokeColor: '#FF0000',
      strokeWeight: 3
    });
    poly2[pos] = new google.maps.Polyline({
      path: [],
      strokeColor: '#FF0000',
      strokeWeight: 3
    });
    if (timerHandle) { clearTimeout(timerHandle); }
    if (marker) { marker.setMap(null);}
    polyline[pos].setMap(null);
    poly2[pos].setMap(null);
    directionsDisplay[pos].setMap(null);
    polyline[pos] = new google.maps.Polyline({
	   path: [],
	   strokeColor: '#FF0000',
	   strokeWeight: 3
    });
    poly2[pos] = new google.maps.Polyline({
	   path: [],
	   strokeColor: '#FF0000',
	   strokeWeight: 3
    });  
    start[pos]=from;
    end[pos]=to;
    var travelMode = google.maps.DirectionsTravelMode.WALKING
    var request = {
        origin: start[pos],
        destination: end[pos],
        travelMode: travelMode
    };

    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK){
        directionsDisplay[pos].setDirections(response);
        bounds[pos] = new google.maps.LatLngBounds();
        route[pos] = response.routes[0];
        startLocation = new Object();
        endLocation = new Object();

      	_path[pos] = response.routes[0].overview_path;
      	_legs[pos] = response.routes[0].legs;
        for (i=0;i<_legs[pos].length;i++) {
          if (i == 0) { 
            startLocation.latlng = _legs[pos][i].start_location;
            startLocation.address= _legs[pos][i].start_address;
          }
          endLocation.latlng = _legs[pos][i].end_location;
          endLocation.address = _legs[pos][i].end_address;
          var steps = _legs[pos][i].steps;
          for (j=0;j<steps.length;j++) {
            var nextSegment = steps[j].path;
            for (k=0;k<nextSegment.length;k++) {
              polyline[pos].getPath().push(nextSegment[k]);
              bounds[pos].extend(nextSegment[k]);
            }
          }
        }
        polyline[pos].setMap(map);
	    //startAnimation();
    }                                                    
 });
}
 	var step = 50; // 5; // metres
	var tick = 100; // milliseconds
	var eol;
	var k=0;
	var stepnum=0;
	var speed = "";
	var lastVertex = 1;

	/** Funcion recursiva para la trancision de pocisiones **/
    function updatePoly(d) {
        // Spawn a new polyline every 20 vertices, because updating a 100-vertex poly is too slow
        if (poly2.getPath().getLength() > 20) {
          poly2=new google.maps.Polyline([polyline.getPath().getAt(lastVertex-1)]);
          // map.addOverlay(poly2)
        }

        if (polyline.GetIndexAtDistance(d) < lastVertex+2) {
           if (poly2.getPath().getLength()>1) {
             poly2.getPath().removeAt(poly2.getPath().getLength()-1)
           }
           poly2.getPath().insertAt(poly2.getPath().getLength(),polyline.GetPointAtDistance(d));
        } else {
          poly2.getPath().insertAt(poly2.getPath().getLength(),endLocation.latlng);
        }
      }

/** Funcion recursiva para la trancision de pocisiones **/
    function animate(d) {
        if (d>eol) {
          map.panTo(endLocation.latlng);
          marker.setPosition(endLocation.latlng);
          return;
        }
        var p = polyline.GetPointAtDistance(d);
        map.panTo(p);
        marker.setPosition(p);
        updatePoly(d);
        timerHandle = setTimeout("animate("+(d+step)+")", tick);
      }
/** Funcion para iniciar la animación **/
function startAnimation() {
        eol=polyline.Distance();
        map.setCenter(polyline.getPath().getAt(0));
        poly2 = new google.maps.Polyline({path: [polyline.getPath().getAt(0)], strokeColor:"#0000FF", strokeWeight:10});
        setTimeout("animate(50)",2000);  // Allow time for the initial map display
}
/** Distancia entre dos ubicaciones (coord1,coor2) **/
function calcDistance(p1, p2) {
  return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
}
