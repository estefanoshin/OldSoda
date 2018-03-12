// HACER ALGO CON CORTE Y ARTICULO

var app = angular.module('crearEntradaSalida', []);

app.controller('corte', function($scope){
	$scope.datoCortes = [];
	$scope.datoCortes = cortes;
});

// myApp.controller('ContentCtrl', function ($scope, $http) {
//     $http({method: 'GET', url: 'content.php'}).success(function(data) {
//         $scope.contents = data;
//     });
// });

// $.post("filename.php",{var1: data, var2: data},function(data){
// //Do something with data return from PHP file.
// });