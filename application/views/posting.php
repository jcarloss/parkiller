<div ng-controller="secondCtrl" ng-init="getPosts()">
	<form name="addPostForm" ng-model="addPostForm" >
		<div class="row">
			<div class="col-md-12 alert alert-danger">
				* Por el momento el sistema solo acepta coordenadas como pocisiones
			</div>
			
		</div>
		<div class="row">
			<label class="col-md-2 control-label">
				Nueva posición
			</label>
			<div class="col-md-3">
				<input type="text" class="form-control" ng-model="postText" placeholder="19.4377047,-99.1495031" />
			</div>
			<label class="col-md-1 control-label">
				Tipo
			</label>
			<div class="col-md-2">
				<select ng-model="type" id="type" class="form-control">
					<option selected="selected" value="1">Conductor Parkiller</option>
					<option value="2">Cliente Parkiller</option>
				</select>
			</div>
			<div class="col-md-2"   align="center">
				<span class="btn btn-md btn-primary" ng-click="addPost()">Agregar</span>
			</div>
			<div class="col-md-2" align="center" ng-click="deleteAllPost();getPosts()">
				<span class="btn btn-md btn-danger">Reiniciar</span>
			</div>
		</div>
	</form>	
</div>
<div class="row">
    <div class="col-md-12">
    	<h2>Tabla de pocisiones actuales</h2>
      	<div >
      		<table class="table table-striped table-bordered" width="100%">
      			<thead>
      				<tr>
      					<th>Posición</th>
      					<th>Tipo</th>
      					<th>Fecha</th>
      				</tr>
      			</thead>
      			<tbody ng-repeat="post in posts">
      				<tr>
      					<td>{{post.position}}</td>
      					<td>{{post.name}}</td>
      					<td>{{post.creation}}</td>
      				</tr>
      			</tbody>
      			
      		</table>
			
		</div>
	</div>
</div>											
