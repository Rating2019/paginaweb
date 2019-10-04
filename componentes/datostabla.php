<?php 
session_start();
if (@!$_SESSION['email']) {
  header("Location:../index.php");
}
require_once "../php/conexion.php";

$conexion=conexion();

?>

<div class="table-responsive">
	<div class="col-sm-12"> 
<!------CREACION DE TABLAS DE USUARIOS------>
		<table class="table table-hover table-condensed table-bordered">
<!------NOMBRE DE LA FILA DE LA TABLA------>	
			<tr style='background-color: #FA8072' align='center'>
				<td><b>ID</b></td>
				<td><b>EMAIL</b></td>
				<td><b>NOMBRE</b></td>
				<td><b>CANAL</b></td>
				<td><b>NOMBRE CANAL</b></td>
				<td><b>TIEMPO DE PERMANENCIA</b></td>
				<td><b>FECHA-HORA-RECIBIDO</b></td>
				<td><b>FECHA ENVIO</b></td>
				<td><b>HORA ENVIO</b></td>
			</tr>
<!------CONEXION Y RECOLECCION DE DATOS------>
			<?php 
				$orden = "SELECT * FROM datos";
				$result=mysqli_query($conexion,$orden);
	
				while($ver=mysqli_fetch_row($result)){ 
					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6]."||".
						   $ver[7]."||".
						   $ver[8];
			 ?>

			<tr style='background-color: #3C8FA5'>
				<td align='center'><?php echo $ver[0] ?></td>
				<td align='center'><?php echo $ver[1] ?></td>
				<td align='center'><?php echo $ver[2] ?></td>
				<td align='center'><?php echo $ver[3] ?></td>
				<td align='center'><?php echo $ver[4] ?></td>
				<td align='center'><?php echo $ver[5] ?></td>
				<td align='center'><?php echo $ver[6] ?></td>
				<td align='center'><?php echo $ver[7] ?></td>
				<td align='center'><?php echo $ver[8] ?></td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>

