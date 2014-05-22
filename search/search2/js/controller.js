'use strict';

/* Controllers */

var SynoSearchControllers = angular.module('phonecatControllers', []);

SynoSearchControllers.controller('PhoneListCtrl', ['$scope', '$http',
  function($scope, $http) {
    $http.get('../synosearch.php').success(function(data) {
      $scope.search = data;
    });

    //$scope.orderProp = 'age';
  }]);

SynoSearchControllers.controller('MenuListCtrl', ['$scope', '$http',
  function($scope, $http) {
  	 $http.get('js/menu.json').success(function(data) {
      $scope.menu = data.menu;
    });
  }]);
  SynoSearchControllers.controller('SearchListCtrl', ['$scope', '$http',
  function($scope, $http) {
  	 $http.get('../synosearch.php?search=books&query=w').success(function(data) {
      $scope.search = data;
    });
  }]);