var app = angular.module('crearEntradaSalida', ['ui.directives','ui.filters']);

app.controller('corte', function($scope){
	$scope.datoCortes = cortes;

	$scope.listaArt = [];
	$scope.inputCorteID = '';

	$scope.listaArticulos = function(corteSeleccionado){
		$scope.listaArt = [];
		var corteSel = corteSeleccionado;
		// console.log('Corte Seleccionado: '+corteSel)
		angular.forEach($scope.datoCortes, function(dato){
			// console.log('nc: '+dato.nc+' || ')
			if(dato.nc == corteSel){
				$scope.listaArt.push(dato);
			}
	});
		// console.log($scope.listaArt);
	}


	$scope.selectedArt = function(artSeleccionado){
		$scope.inputCorteID = artSeleccionado;
		var selected = artSeleccionado;
		// console.log('Articulo Seleccionado: '+selected)
	}	

});