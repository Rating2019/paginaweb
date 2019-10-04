<?php 
session_start();
if (@!$_SESSION['email']) {
  header("Location:../index.php");
}
?>
<?php 
require_once "../php/conexion.php";
	$conexion=conexion();
?>
<!--------------LIBRERIAS UTILIZADAS--------------------------------->
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Sistema Rating</title>
	<link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">

	<script src="../librerias/jquery-3.2.1.min.js"></script>
	<script src="../librerias/bootstrap/js/bootstrap.js"></script>
	<script src="../librerias/alertifyjs/alertify.js"></script>
</head>

	<br>
 	<br>  
 	<div class="container-fluid" style="background:#241F1F; text-align:center;">
        <div class="row">
           <h2 style="color:white">Familias Registradas</h2>
        </div>
    </div>
    <br>

<div class="table-responsive">
	<div class="col-sm-12"></div>
<!------CREACION DE TABLAS DE USUARIOS------>
		<table class="table table-hover table-condensed table-bordered">
<!------NOMBRE DE LA FILA DE LA TABLA------>	
			<tr style='background-color: #FA8072' align='center' >
				<td><b>ID</b></td>
				<td><b>NUMERO DE SERIE</b></td>
				<td><b>EMPRESA TVCABLE</b></td>
				<td><b>FAMILIA</b></td>
				<td><b>DIRECCION</b></td>
				<td><b>TELEFONO</b></td>
				<td><b>EMAIL</b></td>
				<td><b>PASSWORD</b></td>
				<td><b>EDITAR</b></td>
				<td><b>ELIMINAR</b></td>
			</tr>
<!------CONEXION Y RECOLECCION DE DATOS------>
			<?php 
				$orden = "SELECT * FROM familia ORDER BY mail ASC";
				$result=mysqli_query($conexion,$orden);
				
				while($ver=mysqli_fetch_row($result)){ 
					$fdatos=$ver[0]."||".
						   	$ver[1]."||".
						   	$ver[2]."||".
						   	$ver[3]."||".
						   	$ver[4]."||".
						   	$ver[5]."||".
						   	$ver[6]."||".
						   	$ver[7];
			 ?>
			<tr style='background-color: #3C8FA5'>
				<td align='center'><?php echo $ver[0] ?></td>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
				<td align='center'><?php echo $ver[7] ?></td>
				<td align='center'>
					<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform1('<?php echo $fdatos ?>')">
						
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
</html>
