// BORRADO REDIRECTION action_procesos
function borrar(index,id,tipo){
	if(confirm('Esta seguro que desea borrarlo?')){
		window.location.assign(window.location.origin+"/soda/action_procesos.php?action=delete&"+index+"="+id+"&tipo="+tipo);
	}
}

function borrarTela(index,id,tipo,uso){
	if(confirm('Esta seguro que desea borrarlo?')){
		if(uso == 'enUso'){
			
			alert('La tela se esta utilizando en algun articulo, el borrado NO se realizara !!')
		}else{
			window.location.assign(window.location.origin+"/soda/action_procesos.php?action=delete&"+index+"="+id+"&tipo="+tipo);
		}
	}
}

function borrarArt(index,id,tipo,uso){
	if(confirm('Esta seguro que desea borrarlo?')){
		if(uso == 'enUso'){
			
			alert('el Articulo se esta utilizando en algun Corte, el borrado NO se realizara !!')
		}else{
			window.location.assign(window.location.origin+"/soda/action_procesos.php?action=delete&"+index+"="+id+"&tipo="+tipo);
		}
	}
}