
/** Al cargar el documento esperamos 2 segundos para iniciar el trazado entre clientes y conductores Parkiller **/
$(document).ready(function(){
	setTimeout(function(){
	    var distanciaMenor="";
	    var match=false;
	    for(var i=0;i<clientes.length;i++){
	      distanciaMenor="";
	      match=false
	      for(var j=0;j<conductores.length;j++){
	        if(distanciaMenor==""){  
	          distanciaMenor=calcDistance(clientes[i],conductores[j]);
	          conductorCercano=j;
	          match=true;
	        }
	        else if(calcDistance(clientes[i],conductores[j])<distanciaMenor){
	          distanciaMenor=calcDistance(clientes[i],conductores[j]);
	          conductorCercano=j;
	          match=true;
	        }
	      }
	      if(match){
	        createMarker(clientes[i], "Cliente Parkiller", "<b>Hey! me urge mi carro</b>","cliente");
	        createMarker(conductores[conductorCercano], "Conductor Parkiller", "<b>Voy en camino</b>","parkiller");
	        calcRoute(clientes[i],conductores[conductorCercano],i);
	      }else
	        createMarker(clientes[i], "Cliente Parkiller", "<b>Hey! me urge mi carro</b>","cliente");
	      //Eliminamos conductor usado
	      conductores.splice(conductorCercano, 1);
	    } 
	    for( j=0;j<conductores.length;j++){
	        createMarker(conductores[j], "Conductor Parkiller", "<b>Voy en camino</b>","parkiller");
	      }  
	},2000);
  

});