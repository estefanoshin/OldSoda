// var listaInputs = document.getElementsByClassName('form-control');
var nombTela = document.querySelector('input[name="nombTela"]');
var proveedTela = document.querySelector('input[name="proveedTela"]');
var nombTaller = document.querySelector('input[name=nombTaller');

//No tiene portabilidad -> Modificarlo luego
$(myform).submit(function(){
	if(myform.id == 'formCrearTela'){
		var compare = (nombTela.value&&proveedTela.value);
	}
	if(myform.id == 'formCrearTaller'){
		var compare = (nombTaller.value);
	}
if(compare){
	    var datosDelForm = new FormData(myform );
	    $.ajax({
	        url: urlActionProcesos,
	        data: datosDelForm,
	        cache: false,
	        processData: false,
	        contentType: false,
	        type: 'POST',
	        success: function () {
	            // do something with the result
	        }
	    });
}
	});