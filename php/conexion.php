<?php 
		function conexion(){
			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="id7960719_ratingtv";
			$conexion=mysqli_connect($servidor,$usuario,$password,$bd);
			return $conexion;
		}
 ?>