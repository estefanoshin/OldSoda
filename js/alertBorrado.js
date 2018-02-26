// BORRADO REDIRECTION action_procesos
function borrar(index,id,tipo){
	if(confirm('Esta seguro que desea borrarlo?')){
		window.location.assign(window.location.origin+"/soda/action_procesos.php?action=delete&"+index+"="+id+"&tipo="+tipo);
	}
}

function borrarTela(index,id,tipo,telaEnUso){
	if(confirm('Esta seguro que desea borrarlo?')){
		if(! telaEnUso){
			console.log(telaEnUso);
			alert('La tela se esta utilizando en algun articulo, el borrado no se realizara !!')
		}else{
		window.location.assign(window.location.origin+"/soda/action_procesos.php?action=delete&"+index+"="+id+"&tipo="+tipo);
		}
	}
}