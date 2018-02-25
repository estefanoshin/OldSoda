var listaInputs = document.getElementsByClassName('form-control');

//No tiene portabilidad -> Modificarlo luego
$(myform).submit(function(){
if(listaInputs[0].value&&listaInputs[1].value){
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