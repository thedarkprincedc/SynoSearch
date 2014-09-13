var synosearchServices = angular.module('synosearchServices', ['ngResource']);


synosearchServices.factory('SearchService', ['$resource',
	function($resource){
	    return $resource('content/:phoneId.json', {}, {
	      	query	: 	{
		      				method	: 'GET', 
		      				params	: { 
		      					phoneId: 'searchresults' 
		      				}, 
		      				isArray : true
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