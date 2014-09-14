var synosearchServices = angular.module('synosearchServices', ['ngResource']);


synosearchServices.factory('SearchService', ['$resource',
	function($resource){
	    return $resource('api/:phoneId.php?action=search2&q=books', 
	    	{
	    		search : "@searchterm"
	    	}, 
	    	{
	      		query	: 	{
      				method	: 'GET', 
      				params	: { 
      					phoneId: 'index',
      				} 
      				//isArray : true
	      		},
	      		init : {
      				method	: 'GET', 
      				params	: { 
      					phoneId: 'application'
      					
      				}, 
      				isArray : true
	      		}
	    });
	}
]);