<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$idus=$_POST['idusu'];
	$e=$_POST['ema'];
	$n=$_POST['nom'];
	$p=$_POST['pare'];
	$ed=$_POST['ed'];
	$s=$_POST['sx'];

	$sql="UPDATE usuarios set email='$e', 
							  nombre='$n', 
							  parent='$p', 
							  edad='$ed', 
							  sexo='$s' 
							  where id_usuario='$idus'";
	echo $result=mysqli_query($conexion,$sql);
 ?>