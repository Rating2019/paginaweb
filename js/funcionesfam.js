function agregaform1(fdatos){

	fd=fdatos.split('||');

	$('#idfamilia').val(fd[0]);
	$('#nseriev').val(fd[1]);
	$('#familiav').val(fd[2]);
	$('#direccionv').val(fd[3]);
	$('#telefonov').val(fd[4]);
	$('#mailv').val(fd[5]);
	$('#passwordv').val(fd[6])
}

function actualizaDatos1(){

	id_familia=$('#idfamilia').val();
	nserie=$('#nseriev').val();
	nfamilia=$('#familiav').val();
	direc=$('#direccionv').val();
	tel=$('#telefonov').val();
	mail=$('#mailv').val();
	pass=$('#passwordv').val();

	cadena1="idf=" + id_familia +
			"&nse=" + nserie + 
			"&fami=" + nfamilia +
			"&dir=" + direc +
			"&te=" + tel +
			"&ema=" + mail +
			"&pas=" + pass;

	$.ajax({

		type:"POST",
		url:"../php/actualizaDatosfam.php",
		data:cadena1,
		success:function(t){

			if(t==1){
				$('#famtabla').load('../componentes/familiatabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function preguntarSiNo(id_familia){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
   				  function(){ eliminarDatos1(id_familia) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos1(id_familia) {

	cadena1="idf=" + id_familia;

	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosfam.php",
		data:cadena1,
		success:function(t){

			if(t==1){
				$('#famtabla').load('../componentes/familiatabla.php');
				alertify.success("Eliminado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}