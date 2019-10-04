<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$idusuario=$_POST['idusu'];

	$sql="DELETE from usuarios where id_usuario='$idusuario'";
	echo $result=mysqli_query($conexion,$sql);
 ?>