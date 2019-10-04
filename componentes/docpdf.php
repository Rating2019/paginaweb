<?php
session_start();
if (@!$_SESSION['email']) {
  header("Location:../index.php");
}
require '../librerias/fpdf/fpdf.php';
require '../php/conexpdfexcel.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
     // Logo
    $this->Image('../img/logo.jpg',10,8,30);
    $this->Ln(20);
    $this->SetFont('Arial','B',10);
    $this->Cell(70,15,'Rating Control',0,0,'L');
    // Salto de línea
    $this->Ln(10);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'REPORTE DE DATOS',0,0,'C');
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

$consulta = "SELECT * FROM datos";
$resultado = $mysqli->query($consulta);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,date('d/m/Y'),0,1,'L');
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
 	$pdf->Cell(30, 10, 'Email',1,0,'C',1);
    $pdf->Cell(30, 10, 'Nombre',1,0,'C',1);
    $pdf->Cell(11, 10, 'Canal',1,0,'C',1);
    $pdf->Cell(30, 10, 'Nombre Canal',1,0,'C',1);
    $pdf->Cell(20, 10, 'Permanencia',1,0,'C',1);
    $pdf->Cell(29, 10, 'Fecha/Hora Recibido',1,0,'C',1);
    $pdf->Cell(20, 10, 'Fecha Envio',1,0,'C',1);
    $pdf->Cell(17, 10, 'Hora envio',1,1,'C',1);

  $pdf->SetFont('Arial','',5);
  while ($row = $resultado->fetch_assoc()){
    $pdf->Cell(30,10, $row['email'],1,0,'C',0);
    $pdf->Cell(30,10, $row['nombre'],1,0,'C',0);
    $pdf->Cell(11,10, $row['canal'],1,0,'C',0);
    $pdf->Cell(30,10, $row['nom_canal'],1,0,'C',0);
    $pdf->Cell(20,10, $row['tiempo_perm'],1,0,'C',0);
    $pdf->Cell(29,10, $row['hora_fecha_recib'],1,0,'C',0);
    $pdf->Cell(20,10, $row['fecha_envio'],1,0,'C',0);
    $pdf->Cell(17,10, $row['hora_envio'],1,1,'C',0);
  }
$pdf->Output();
?>       