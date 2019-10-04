<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$n=$_POST['nombre'];
	$e=$_POST['email'];
	$p=$_POST['password'];
	

	$sql="INSERT into ingreso (nombre,email,password) values ('$n','$e','$p')";
	echo $result=mysqli_query($conexion,$sql);

 ?>