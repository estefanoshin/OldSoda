	var crearTela = 'action_procesos.php?action=create&tipo=tela';

    var myform = document.getElementById('formCrearTela');

$(myform).submit(function(){
    var fd = new FormData(myform );
    $.ajax({
        url: crearTela,
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function () {
            // do something with the result
        }
    });
});