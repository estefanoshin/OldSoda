//Articulo

//Tela
var nombTela = document.querySelector('input[name="nombTela"]');
var proveedTela = document.querySelector('input[name="proveedTela"]');

//Taller
var nombTaller = document.querySelector('input[name=nombTaller');

//Cliente
var nombCliente = document.querySelector('input[name=nombClient');

//Corte
var nc = document.querySelector('input[name=nc]');
var fechaCorte = document.querySelector('input[name=fechaCorte]');
var temporada = document.querySelector('input[name=temporada]');
var artID = document.querySelector('input[name=artID]');

$(myform).submit(function(){
	if(myform.id == 'formCrearTela'){
		var compare = (nombTela.value&&proveedTela.value);
	}
	if(myform.id == 'formCrearTaller'){
		var compare = (nombTaller.value);
	}
	if(myform.id == 'formCrearCliente'){
		var compare = (nombCliente.value);
	}
	if(myform.id == 'formCrearCorte'){
		var compare = (nc.value&&fechaCorte.value&&temporada.value&&artID.value);
	}
if(compare){
	    var datosDelForm = new FormData(myform);
	    $.ajax({
	        url: urlActionProcesos,
	        data: datosDelForm,
	        cache: false,
	        processData: false,
	        contentType: false,
	        type: 'POST',
	        success: function () {
	            // do something with the result
	            // alert(urlActionProcesos)
	        }
	    });
}
	});