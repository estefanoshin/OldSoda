$('#cliente').hide();
$("#taller").hide();

$("#selectOrigen").change(function () {
var selected_option = $('#selectOrigen').val();
$('#origen').attr('value','');


  if (selected_option === 'cliente') {
    $('#cliente').show();
    $("#taller").hide();
  }
  if (selected_option === 'taller') {
    $('#cliente').hide();
    $("#taller").show();
  }
  if (selected_option === '') {
    $('#cliente').hide();
    $("#taller").hide();
  }

	$('#selectedClient').change(function () {
		var optCliente = $('#selectedClient').val();

		if(selected_option === 'cliente') {
			$('#cliente').change(function () {
				$('#origen').attr('value',optCliente);
			});
		}
	});

	$('#selectedTaller').change(function () {
		var optTaller = $('#selectedTaller').val();
		
	if(selected_option === 'taller') {
		$('#taller').change(function () {
			$('#origen').attr('value',optTaller);
		});
	}
	});

});
