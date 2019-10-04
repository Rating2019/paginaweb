<?php 
require_once "../php/conexion.php";
$conexion=conexion();
?>

 	<br>
 	<br>  
 	<div class="container-fluid" style="background:#241F1F; text-align:center;">
        <div class="row">
        <h2 style="color:white">Usuarios Registrados</h2>
        </div>
    </div>
    <br>

<div class="table-responsive">
	<div class="col-sm-12"> 
<!------CREACION DE TABLAS DE USUARIOS------>
		<table class="table table-hover table-condensed table-bordered">
<!------BOTON AGREGAR NUEVO USUARIO------->
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
<!------NOMBRE DE LA FILA DE LA TABLA-------->	
			<tr style='background-color: #FA8072' align='center'>
				<td><b>ID</b></td>
				<td><b>NOMBRE</b></td>
				<td><b>EMAIL</b></td>
				<td><b>ESTADO</b></td>
				<td><b>EDITAR</b></td>
				<td><b>ELIMINAR</b></td>
			</tr>
<!------CONEXION Y RECOLECCION DE DATOS------>
			<?php 
				$orden = "SELECT * FROM ingreso ORDER BY email ASC";
				$result=mysqli_query($conexion,$orden);
				
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4];
			 ?>

			<tr style='background-color: #3C8FA5'>
				<td align='center'><?php echo $ver[0] ?></td>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[4] ?></td>
<!------BOTON EDITAR Y ELIMINAR------>	
				<td align='center'>
					<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td align='center'>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>

