<!DOCTYPE html>
<html ng-app="myApp" ng-controller="mainCtrl">
<head>
	<title>Administrador-Parkiller</title>
	<link rel="icon" href="/parkiller/assets/images/parkiller.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="/parkiller/assets/images/parkiller.png" type="image/x-icon"/>

	<script type="text/javascript">
  		var BASE_URL = "<?php echo base_url(); ?>index.php";
  		var Broadcast = {
			POST : "<?php echo POST; ?>",
			BROADCAST_URL : "<?php echo BROADCAST_URL; ?>",
			BROADCAST_PORT : "<?php echo BROADCAST_PORT; ?>",
		};
  	</script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/Connection.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>
	<!--
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-animate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-sanitize.min.js"></script>	
	-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/angular-route.min.js"></script>
	
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/myApp.js"></script>
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/mainCtrl.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/app/secondCtrl.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
