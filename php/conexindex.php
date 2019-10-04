<?php
    	$servidor="localhost";
		$usuario="root";
		$password="";
		$bd="id7960719_ratingtv";
	$conec=mysqli_connect($servidor,$usuario,$password,$bd);
	if (!$conec) {
		die("No es posible conectar con la base".mysqli_connect_error());
	}
	mysqli_query($conec,"SET NAMES 'utf8'");
?>  



