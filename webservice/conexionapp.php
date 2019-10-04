<?php

	$cnx=mysqli_connect('localhost','root','','id7960719_ratingtv');
	if (!$cnx) {
		die("No es posible conectar con la base".mysqli_connect_error());
	}
	echo ' ';
	mysqli_query($cnx,"SET NAMES 'utf8'");
?>  