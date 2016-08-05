
var secondCtrl = myApp.controller("secondCtrl", ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope){

	/**
	 *This function add post into database 
	 */
	$scope.addPost = function(){
		if($scope.postText!="" && $scope.type!="" && $scope.type>=1){
			$http({
				method : "POST",
				url : BASE_URL + '/Mapa/addPost',				
				data : $.param({'postText':$scope.postText,'type':$scope.type}),
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).success(function(data){
				$scope.postText = "";
				if(data.status == "success")
				{
					var typeData = { broadType : Broadcast.POST, data : data.postData};
					$rootScope.conn.sendMsg(typeData);
				}
			});
		}
	else{
		alert("Completa los datos por favor");
	}
	};

	$scope.deleteAllPost = function(){
		$http({
			method : "POST",
			url : BASE_URL + '/Mapa/deleteAllPost',				
			data : $.param({'delete':"all"}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).success(function(data){
				$scope.postText = "";
			if(data.status == "success")
			{
				var typeData = { broadType : Broadcast.POST, data : data.postData};
				$rootScope.conn.sendMsg(typeData);

			}
			}
		);
	
		}
	/**
	 *This function gets all post from DB to wall
	 */
	$scope.getPosts = function() {
		
		$http({
			url : BASE_URL + "/Mapa/getPosts",
			method : "POST",
			headers : {	'Content-Type' : 'application/x-www-form-urlencoded'}
		}).success(function(data) {
			
			$rootScope.posts = data.posts;
			
		});
	};

}]);