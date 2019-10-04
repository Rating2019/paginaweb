<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['idf'];
	$n=$_POST['nse'];
	$nf=$_POST['fami'];
	$d=$_POST['dir'];
	$t=$_POST['te'];
	$m=$_POST['ema'];
	$p=$_POST['pas'];

	$sql="UPDATE familia set nserie='$n', 
							 nfamilia='$nf', 
							 direc='$d', 
							 tel='$t', 
							 mail='$m', 
							 pass='$p' 
							 where id_familia='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>