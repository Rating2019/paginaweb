function agregaform2(udatos){

	ud=udatos.split('||');

	$('#idusuario').val(ud[0]);
	$('#emailw').val(ud[1]);
	$('#nombrew').val(ud[2]);
	$('#parentw').val(ud[3]);
	$('#edadw').val(ud[4]);
	$('#sexow').val(ud[5])
}

function actualizaDatos2(){

	idusuario=$('#idusuario').val();
	email=$('#emailw').val();
	nombre=$('#nombrew').val();
	parent =$('#parentw').val();
	edad=$('#edadw').val();
	sexo=$('#sexow').val();

	cadena2="idusu=" + idusuario +
			"&ema=" + email + 
			"&nom=" + nombre +
			"&pare=" + parent +
			"&ed=" + edad +
			"&sx=" + sexo;

	$.ajax({
		type:"POST",
		url:"../php/actualizaDatosusu.php",
		data:cadena2,
		success:function(t){

			if(t==1){
				$('#usutabla').load('../componentes/usuariotabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function preguntarSiNo(id_usuario){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
				  function(){ eliminarDatos2(id_usuario) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos2(id_usuario) {
	cadena2="idusu=" + id_usuario;

	$.ajax({
		type:"POST",
		url:"../php/eliminarDatosusu.php",
		data:cadena2,
		success:function(t){

			if(t==1){
				$('#usutabla').load('../componentes/usuariotabla.php');
				alertify.success("Eliminado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}