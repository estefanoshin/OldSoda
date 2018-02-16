// BORRADO REDIRECTION action_procesos
function borrar(index,id,tipo){
	if(confirm('Esta seguro que desea borrarlo?')){
		window.location.assign(window.location.origin+"/soda/action_procesos.php?action=delete&"+index+"="+id+"&tipo="+tipo);
	}
}		