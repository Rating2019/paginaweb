<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$idfamilia=$_POST['idf'];
	
	$sql="DELETE from familia where id_familia='$idfamilia'";
	echo $result=mysqli_query($conexion,$sql);

 ?>