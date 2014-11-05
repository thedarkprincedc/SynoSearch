var synosearchServices = angular.module('synosearchServices', ['ngResource']);
synosearchServices.factory("UserService", ['$resource',
	function($resource){
		return $resource("scripts/users/:action/:id",
			{
				id : '@userid'
			},
			{
				query : {
					method : 'GET',
					params : {
						action: "showusers"
					},
					isArray : true
				},
				delete : {
					method : "DELETE",
					params : {
						action : "removeuser",
						id : '@userid'
					}
				},
				adduser : {
					method : "POST",
					params :{
						action: "adduser"
					}
				}
			}
			
		);
	}
]);

synosearchServices.factory('SearchService', ['$resource',
	function($resource)
	{
	   // return $resource('api/:phoneId.php?action=search2&q=books', 
		return $resource('search/:method?:q', 
	    	{
	    		search : "@searchterm"
	    	}, 
	    	{
	      		query	: 	{
      				method	: 'GET', 
      				params	: { 
      					method: 'db',
      					q : search
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