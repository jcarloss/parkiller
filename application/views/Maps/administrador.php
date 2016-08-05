<?php if($header) echo $header ;?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" >PARKILLER (Exámen Backend)</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Conductores - Clientes</h1>
        <p>
			Interfaz de usuario Administrador que permite la inserción de posicion de los clientes y conductores para la simulación del trazo de rutas cortas 1 a 1. 
        </p>
        </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <div ng-view></div>
        </div>
      </div>

      <hr>
<?php if($footer) echo $footer ;?>
      
