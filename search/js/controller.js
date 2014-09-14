var synosearchControllers = angular.module('synosearchControllers', []);

synosearchControllers.controller('SearchScreenController', ['$scope', '$http', "SearchService",
	function ($scope, $http, SearchService) {
		$scope.form = {
			"search" : ""
		};
		$scope.searchresults = [];
		$scope.searchresults.push({
			"filename" : "ddddddd",
			"filesize" : "ddddddd"
		});
		SearchService.query({s : "a"},function(message){
	  		$scope.searchresults = message.data;
	  		console.log(message);
	  	});
	  	$scope.onKeyUpSearchText = function(){
	  		SearchService.query({s : $scope.form.search},function(message){
	  			$scope.searchresults = message.data;	  		
	  		});
	  	};
	  
	}
]);
synosearchControllers.controller('UploadScreenController', ['$scope', '$http',
	function ($scope, $http) {
	   
	}
]);