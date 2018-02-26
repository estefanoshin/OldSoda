// var listaInputs = document.getElementsByClassName('form-control');
var nombTela = document.querySelector('input[name="nombTela"]');
var proveedTela = document.querySelector('input[name="proveedTela"]');

//No tiene portabilidad -> Modificarlo luego
$(myform).submit(function(){
if(nombTela.value&&proveedTela.value){
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