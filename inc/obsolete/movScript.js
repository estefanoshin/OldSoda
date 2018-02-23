//--------------------------------------------------------------------
//--------------------------------------------------------------------

// ------------- CHECKBOX MOVIMIENTO
var listaMov = document.getElementById('movimiento');
// var arrMov= new Array();

var checkboxE = document.getElementById('entrada');
var checkboxS = document.getElementById('salida');
checkboxE.addEventListener('change', writeMov);
checkboxS.addEventListener('change', writeMov);

function writeMov(){
	if(this.checked) {
        // console.log('checked! '+this.value);
        listaMov.value = this.value;
        // console.log(arrTmp);
        // listaTmp.value = arrTmp;
    }
}