<?php
session_start();
if (@!$_SESSION['email']) {
  header("Location:../index.php");
}
	//Incluimos librería y archivo de conexión
	require '../librerias/PHPExcel-1.8/Classes/PHPExcel.php';
	require '../php/conexpdfexcel.php';
	//Consulta
	$sql = "SELECT email, nombre, canal, nom_canal, tiempo_perm, hora_fecha_recib, fecha_envio, hora_envio FROM datos";
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../img/logo1.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Eduardo")->setDescription("Reporte de Datos");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Datos Rating");

	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(80);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

	$estiloTituloReporte = array(
    'font'  => array(
	'name'  => 'Arial',
	'bold'  => true,
	'italic'=> false,
	'strike'=> false,
	'size'  =>	13
    ),
    'fill'  => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders'    => array(
	'allborders' => array(
	'style'      => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment'  => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font'  => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size'  => 10,
	'color' => array(
	'rgb'   => 'FFFFFF'
	)
    ),
    'fill'  => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders'    => array(
	'allborders' => array(
	'style'      => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment'  =>  array(
	'horizontal' =>  PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'   =>  PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));

	$objPHPExcel->getActiveSheet()->getStyle('A1:E4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:H6')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($estiloTituloColumnas);
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE DATOS');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:H3');

	////TITULO///
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('A5', 'RatingControl');

	///CABECERA///
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'EMAIL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NOMBRE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'CANAL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'NOMBRE DEL CANAL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'TIEMPO DE PERMANENCIA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'HORA FECHA RECIBIDO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'FECHA ENVIO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', 'HORA ENVIO');
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc())
	{
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['email']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['nombre']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['canal']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['nom_canal']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['tiempo_perm']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['hora_fecha_recib']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['fecha_envio']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['hora_envio']);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}

	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:H".$fila);
	
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Datos.xlsx"');
	header('Cache-Control: max-age=0');
	
	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('php://output');	
?>