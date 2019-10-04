<?php

	setlocale(LC_ALL,"es_ES");
	date_default_timezone_set('America/La_Paz');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$datos = json_decode(file_get_contents("php://input"),true);
		$fechaActual = getdate();
		$segundos = $fechaActual['seconds'];
		$minutos = $fechaActual['minutes'];
		$hora = $fechaActual['hours'];
		$dia = $fechaActual['mday'];
		$mes = $fechaActual['mon'];
		$year = $fechaActual['year'];
		$miliseconds = DateTime::createFromFormat('U.u',microtime(true));

		$hora_del_mensaje = strftime("%H:%M:%S");
        $hora_del_mensaje2 = strftime("%d-%m-%Y");

		echo json_encode(array('hora' => $hora_del_mensaje , 'fecha' => $hora_del_mensaje2));
	}else{
		echo json_encode(array('resultado' => "Error"));
	}
?>