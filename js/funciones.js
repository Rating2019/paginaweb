
function agregardatos(nombre,email,password){

	cadena="nombre=" + nombre + 
			"&email=" + email +
			"&password=" + password;

	$.ajax({
		type:"POST",
		url:"../php/agregarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('../componentes/admtabla.php');
				alertify.success("agregado con exito");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#emailu').val(d[2]);
	$('#passwordu').val(d[3]);
	$('#estadou').val(d[4]);
	
	
}

function actualizaDatos(){

	id=$('#idpersona').val();
	nombre=$('#nombreu').val();
	email=$('#emailu').val();
	password=$('#passwordu').val();
	estado=$('#estadou').val();

	cadena= "id=" + id +
			"&nombre=" + nombre + 
			"&email=" + email +
			"&password=" + password +
			"&estado=" + estado;

	$.ajax({
		type:"POST",
		url:"../php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('../componentes/admtabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
				  function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;
		$.ajax({
			type:"POST",
			url:"../php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('../componentes/admtabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
