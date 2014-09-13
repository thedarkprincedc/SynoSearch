var synosearchControllers = angular.module('synosearchControllers', []);

synosearchControllers.controller('SearchScreenController', ['$scope', '$http', "SearchService",
	function ($scope, $http, SearchService) {
		$scope.searchresults = [];
		$scope.searchresults.push({
			"filename" : "ddddddd",
			"filesize" : "ddddddd"
		});
		SearchService.query(function(message){
	  		$scope.searchresults = message;
	  		console.log(message);
	  	});
	  
	  
	}
]);
synosearchControllers.controller('UploadScreenController', ['$scope', '$http',
	function ($scope, $http) {
	   
	}
]);