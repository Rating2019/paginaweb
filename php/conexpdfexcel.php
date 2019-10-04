<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'id7960719_ratingtv');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>