<?php 
session_start();
if (@!$_SESSION['email']) 
{
  header("Location:../index.php");
}

require_once "../php/conexion.php";
require('../librerias/fpdf/fpdf.php');
require('../php/conexpdfexcel.php');
require('../librerias/PHPExcel-1.8/Classes/PHPExcel.php');

if (isset($_POST))
{
/*
///CREACION DE PDF//
//*****************************************************************************************
  class PDF extends FPDF
{
// Cabecera de página
  function Header()
{
    // Logo
    $this->Image('../img/logo.jpg',10,8,30);
    $this->Ln(20);
    $this->SetFont('Arial','B',10);
    $this->Cell(70,10,'Rating Control',0,0,'L');
    // Salto de línea
    $this->Ln(10);
    // Arial bold 20
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de Datos',0,0,'C');
    // Salto de línea
    $this->Ln(10);
}
// Pie de página
  function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
    $pdf = new PDF();
    $pdf-> AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,date('d/m/Y'),0,1,'L');
    
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(24, 10, 'Email',1,0,'C',1);
    $pdf->Cell(24, 10, 'Nombre',1,0,'C',1);
    $pdf->Cell(20, 10, 'Canal',1,0,'C',1);
    $pdf->Cell(25, 10, 'Nom. Canal',1,0,'C',1);
    $pdf->Cell(23, 10, 'Permanencia',1,0,'C',1);
    $pdf->Cell(37, 10, 'Fecha/Hora Recibido',1,0,'C',1);
    $pdf->Cell(22, 10, 'Fecha Envio',1,0,'C',1);
    $pdf->Cell(20, 10, 'Hora envio',1,1,'C',1);

///*******************************************************************************************
///CREACION EXCEL//
///*******************************************************************************************
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
    'size'  =>  13
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
    $objPHPExcel->getActiveSheet()->setCellValue('D6', 'NOMBRE CANAL');
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('E6', 'TIEMPO DE PERMANENCIA');
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('F6', 'HORA FECHA RECIBIDO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('G6', 'FECHA ENVIO');
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $objPHPExcel->getActiveSheet()->setCellValue('H6', 'HORA ENVIO');
///*******************************************************************************************
*/
  $conexion=conexion();
  $cadena_buscada = $_POST["email"];
  $cadena_categoria = $_POST["categoria"];
  $verficador = false;  
  $sql=mysqli_query($conexion,"SELECT * FROM datos");

    echo "<table border='1'; class='table table-hover'; style='text-align: center; font-size:12px;'>";
    echo "<tr class='warning'>";
    echo  "<td width='10'>ID</td>";
    echo  "<td>EMAIL</td>";
    echo  "<td>NOMBRE</td>";
    echo  "<td>CANAL</td>";
    echo  "<td>NOMBRE CANAL</td>";
    echo  "<td>TIEMPO PERMANENCIA</td>";
    echo  "<td>HORA/FECHA RECIBIDO</td>";
    echo  "<td>FECHA ENVIO</td>";
    echo  "<td>HORA ENVIO</td>";
    echo  "</tr>"; 

	while($arreglo=mysqli_fetch_array($sql))
	{
    $posicion_coincidencia =  stripos($arreglo["$cadena_categoria"], $cadena_buscada);         
    if ($posicion_coincidencia === false) {
    		$verficador = true;
    	}else {
            	echo "<tr class=''>";
                echo "<td width='10'>$arreglo[0]</td>";
                echo "<td>$arreglo[1]</td>";
				echo "<td>$arreglo[2]</td>";
				echo "<td>$arreglo[3]</td>";
				echo "<td>$arreglo[4]</td>";
				echo "<td>$arreglo[5]</td>";
				echo "<td>$arreglo[6]</td>";
				echo "<td>$arreglo[7]</td>";
				echo "<td>$arreglo[8]</td>";
/*
//CREACION TABLA PDF//
//*****************************************************************************************
                $pdf->SetFont('Arial','',5);
                $pdf->Cell(24,10, $arreglo[1],1,0,'C',0);
                $pdf->Cell(24,10,utf8_decode($arreglo[2]),1,0,'C',0);
                $pdf->Cell(20,10, $arreglo[3],1,0,'C',0);
                $pdf->Cell(25,10, $arreglo[4],1,0,'C',0);
                $pdf->Cell(23,10, $arreglo[5],1,0,'C',0);
                $pdf->Cell(37,10, $arreglo[6],1,0,'C',0);
                $pdf->Cell(22,10, $arreglo[7],1,0,'C',0);
                $pdf->Cell(20,10, $arreglo[8],1,1,'C',0);
//*****************************************************************************************  
//CREACION TABLA EXCEL//
//*****************************************************************************************
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $arreglo[1]);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $arreglo[2]);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $arreglo[3]);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $arreglo[4]);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $arreglo[5]);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $arreglo[6]);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $arreglo[7]);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $arreglo[8]);
        
                $fila++; //Sumamos 1 para pasar a la siguiente fila
//*****************************************************************************************
*/                
       		echo "</tr>";	
    	}
	}
    echo "</table>";
//SALIDA PDF//
//*****************************************************************************************  
/*	$pdf->Output('F','archivo1.pdf');*/
//*****************************************************************************************
//SALIDA EXCEL//
//*****************************************************************************************
/*	$fila = $fila-1;

    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:H".$fila);
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save('../componentes/archivo2.xlsx');
//*****************************************************************************************
*/
}
?>