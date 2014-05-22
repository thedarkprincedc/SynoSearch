'use strict';

/* App Module */

var SynoSearchApp = angular.module('SynoSearchApp', [
  'ngRoute',
  'phonecatControllers'
]);

SynoSearchApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/books', {
        templateUrl: 'partials/searchresults.php',
        controller: 'MenuListCtrl'
      }).
      when('/admin', {
        templateUrl: 'partials/searchresults.php',
        controller: 'MenuListCtrl'
      }).
      when('/videos', {
        templateUrl: 'partials/searchresults.php',
        controller: 'MenuListCtrl'
      }).
      when('/photos', {
        templateUrl: 'partials/searchresults.php',
        controller: 'MenuListCtrl'
      }).
      when('/phones/:phoneId', {
        templateUrl: 'partials/phone-detail.html',
        controller: 'PhoneDetailCtrl'
      }).
      otherwise({
        redirectTo: '/books'
      });
  }]);