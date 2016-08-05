<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<link rel="icon" href="/parkiller/assets/images/parkiller.png" type="image/x-icon"/>
<link rel="shortcut icon" href="/parkiller/assets/images/parkiller.png" type="image/x-icon"/>
<title>Mapa-Parkiller</title>
<style>
html{height:100%;}
body{height:100%;margin:0px;font-family: Helvetica,Arial;}
</style>
 <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCnYsmt_9hawbjP26TzQnLumWMe98puWMs&v=3&sensor=false&libraries=geometry"></script>
<script type ="text/javascript" src="/parkiller/assets/app/connection_cliente.js"></script>
<script type ="text/javascript" src="/parkiller/assets/js/v3_epoly.js"></script>
<script type="text/javascript">
  	/** Definimos conexion con el socket**/
  	var BASE_URL = "<?php echo base_url(); ?>index.php";
  	var Broadcast = {
		POST : "<?php echo POST; ?>",
		BROADCAST_URL : "<?php echo BROADCAST_URL; ?>",
		BROADCAST_PORT : "<?php echo BROADCAST_PORT; ?>",
  	}; 
</script>
<script src="/parkiller/assets/app/lib.js"></script>
<script src="/parkiller/assets/app/functions.js"></script>
</head>
<body onload="initialize()">