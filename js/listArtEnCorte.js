var app = angular.module('crearEntradaSalida', ['ui.directives','ui.filters']);

app.controller('entradaSalida', function($scope){
	$scope.datoCortes = cortes;

	$scope.listaArt = [];
	$scope.inputCorteID = '';
	$scope.inputArtID = '';

	$scope.initialValue=iValue;

	$scope.listaArticulos = function(corteSeleccionado){
		$scope.listaArt = [];
		var corteSel = corteSeleccionado;
		// console.log(this)
		// console.log('Corte Seleccionado: '+corteSel)
		angular.forEach($scope.datoCortes, function(dato){
			// console.log('nc: '+dato.nc+' || ')
			if(dato.nc == corteSel){
				$scope.listaArt.push(dato);
			}
	});
		// console.log($scope.listaArt);
	}

	$scope.buscarArticulo = function(selectedCorteID){
		var selection = selectedCorteID;
		// console.log(selection)
		angular.forEach($scope.datoCortes, function(dato){
			if(dato.corteID == selection){
				$scope.inputArtID = dato.artID;
			}
			if(selection == undefined){
				$scope.inputArtID = '';
			}
		});
	}
//-------------- Origen / Taller / Cliente
	$scope.selectedArt = function(artSeleccionado){
		$scope.inputCorteID = artSeleccionado;
		// console.log('Articulo Seleccionado: '+selected)
	}


	$scope.origenControl = '';
	$scope.selectOrigen = function(origenSelect){
		$scope.origenControl = origenSelect;
	}

	$scope.finalSelection = '';
	$scope.chooseFinalOriginSelection = function (selected){
		$scope.finalSelection = selected;
	}

//-------------- Select
	angular.selectOption = function (dato1, dato2){
		console.log('dato1: '+dato1)
		console.log('dato2: '+dato2)
		if (dato1 == dato2){
			return 'selected';
		}
	}

});