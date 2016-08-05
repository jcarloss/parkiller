<?php echo ($data["templates"]["header"]);?>
<script>  
  <?php 
    $count=0;
    foreach($data["clientes"] as $c){?>
    clientes[<?php echo $count?>]=new google.maps.LatLng(<?php echo $c['position']?>); 
  <?php $count++;}?>
  <?php 
    $count=0;
    foreach($data["conductores"] as $c){?>conductores[<?php echo $count?>]=new google.maps.LatLng(<?php echo $c['position']?>);    
  <?php $count++;}?>
</script>
<div id="map_canvas" style="width:100%;height:100%;"></div>
<?php echo ($data["templates"]["footer"]);?>
