//==========================================================================
// MI PROGRAMA
//==========================================================================

// ------------------- RADIAL COLOR CHECK
var cVarios = document.getElementById('cVarios');
var eColorList = document.getElementById('eColorList');
var cPalette = document.getElementById('cPalette');
var coloresDB = document.getElementById('listaColores');
var colorDiv = document.createElement('div');
var td = document.getElementById('tablaColores');

var optionVarios = document.getElementById('optionVarios');
var optionColorList = document.getElementById('optionColorList');
var optionPalette = document.getElementById('optionPalette');

cVarios.addEventListener('change', function(){
	if (cVarios.checked == true) {
		optionColorList.hidden = true;
		optionPalette.hidden = true;
		coloresDB.value = 'varios';
		if(td.hasChildNodes()){
			td.removeChild(colorDiv);
			colorDiv = document.createElement('div');
		}
	}
});

eColorList.addEventListener('change', function(){
	if (eColorList.checked == true) {
		optionColorList.hidden = false;
		optionPalette.hidden = true;
		coloresDB.value = '';
		if(td.hasChildNodes()){
			td.removeChild(colorDiv);
			colorDiv = document.createElement('div');
		}
	}
});

cPalette.addEventListener('change', function(){
	if (cPalette.checked == true) {
		optionColorList.hidden = true;
		optionPalette.hidden = false;
		coloresDB.value = '';
	}
});

// ------------------- TABLA DE COLORES
var btn = document.getElementById('nuevaCelda');
var color = document.getElementById('valueSpan');


var arr = new Array();

function nuevoRow(){

	var span = document.createElement('span');
	var newBtn = document.createElement('button');
	btnText = document.createTextNode('BORRAR');
	newBtn.appendChild(btnText);

	td.appendChild(colorDiv);
	colorDiv.id = 'colorDiv';

	colorDiv.appendChild(span).innerHTML = color.innerText;
	span.style.backgroundColor = '#'+color.innerText;
	span.appendChild(newBtn);
	newBtn.type = 'button';
	newBtn.id = color.innerText;
	span.id = color.innerText;

	arr.push(color.innerText);

	
	if(coloresDB.value[0]==null){
		coloresDB.value += color.innerText;
	} else{
		coloresDB.value += ','+color.innerText;
	}
	

	newBtn.addEventListener('click', function borrarCelda(){
		span.remove();
		arr.splice(color.innerText,1);
		coloresDB.value = arr;
		// console.log(arr);
	});
}

btn.addEventListener('click', function crearCelda(){
	if(arr.includes(color.innerText) == false){
		nuevoRow();
		// console.log(arr);
	}
});

// ------------------- BORRAR TODOS LOS COLORES DEL PALETTE
var borrarTodo = document.getElementById('borrarTodo');

borrarTodo.addEventListener('click', function(){
	if(td.hasChildNodes()){
			td.removeChild(colorDiv);
			colorDiv = document.createElement('div');
			coloresDB.value = '';
		}
});


// ------------- CHECKBOX TALLES
var listaTalles = document.getElementById('listaTalles');
var arrTalles = new Array();
var tUnico = document.getElementById('unico');


for (var i = 1; i < 10; i++) {
	var checkbox = document.querySelector("input[name='"+i+"']");
	checkbox.addEventListener( 'change', function() {
	    if(this.checked) {
	        // console.log('checked! '+this.value);
	        if(tUnico.checked == false){	
	        	arrTalles.push(this.value);
		        listaTalles.value = arrTalles;
	        } else{
	        	unchkBox();
	        }
	    } else {
	        // console.log('UN-checked! '+this.value);
        	arrTalles.splice(arrTalles.indexOf(this.value),1);
	        listaTalles.value = arrTalles;
	    }
	});
}

// ------------- CHECKBOX TALLE UNICO

tUnico.addEventListener('change', function(){
	if(this.checked){
		arrTalles = this.value;
		listaTalles.value = arrTalles;
		unchkBox();
	} else{
		arrTalles = [];
		listaTalles.value = '';
	}
});

function unchkBox(){
	for (var i = 1; i < 10; i++) {
		var checkbox = document.querySelector("input[name='"+i+"']");
		checkbox.checked = false;

	}
}

// ------------- CHECKBOX FECHA

var anio = document.getElementById('anio');

var checkboxOi = document.querySelector("input[name=fecha");
checkboxOi.addEventListener('change', function(){
	anio.value = this.value.substr(0,4);
});