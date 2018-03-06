$("#selectOrigen").change(function () {
var selected_option = $('#selectOrigen').val();
$('#origen').attr('value','');
$('#origenID').attr('value','');


  if (selected_option === 'cliente') {
    $('#cliente').show();
    $("#taller").hide();
    $('#origen').attr('value','cliente');
  }
  if (selected_option === 'taller') {
    $('#cliente').hide();
    $("#taller").show();
    $('#origen').attr('value','taller');
  }
  if (selected_option === '') {
    $('#cliente').hide();
    $("#taller").hide();
    $('#origen').attr('value','');
  }

	$('#selectedClient').change(function () {
		var optCliente = $('#selectedClient').val();

		if(selected_option === 'cliente') {
			$('#cliente').change(function () {
				$('#origenID').attr('value',optCliente);
			});
		}
	});

	$('#selectedTaller').change(function () {
		var optTaller = $('#selectedTaller').val();
		
	if(selected_option === 'taller') {
		$('#taller').change(function () {
			$('#origenID').attr('value',optTaller);
		});
	}
	});

});
