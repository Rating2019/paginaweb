<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$n=$_POST['nombre'];
	$e=$_POST['email'];
	$p=$_POST['password'];
	$es=$_POST['estado'];

	$sql="UPDATE ingreso set nombre='$n', email='$e', password='$p', estado='$es' where id='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>