var synosearchApp = angular.module('SynosearchApp', [
  'ngRoute',
  'synosearchControllers',
  'synosearchServices',
]).run(function($rootScope, $http) {
	$http.get("./content/application.json").success(function(message){
		$rootScope.sitetitle = message.application.name;
		$rootScope.menulist = message.application.menu;
	});
});

synosearchApp.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.
			when('/search', {
				templateUrl: 'partials/searchscreen.php',
			}).
			when('/adminadduser', {
				templateUrl: 'partials/admin_adduser.php',
			}).
			when('/adminaddfolder', {
				templateUrl: 'partials/admin_addfolder.php',
			}).
			otherwise({
		   		redirectTo: '/search'
			});
	}
]);