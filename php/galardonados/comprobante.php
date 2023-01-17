<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Movernos a la derecha
    $this->Cell(45);
    // Título
    $this->Cell(100,10,utf8_decode('Reporte de Validación'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(55, 10, 'idGalardonado',1,0,'C',0);
    $this->Cell(50, 10, 'Nombre',1,0,'C',0);
    $this->Cell(40, 10, 'ApellidoP',1,0,'C',0);
    $this->Cell(40, 10, 'ApellidoS',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require("../sinPagina/configDB.php");
/*
$sql = "SELECT * FROM galardonado";
$res = mysqli_query($conexion, $sql);
$nombre = mysqli_fetch_array($res);
*/
$consulta = "SELECT * FROM galardonado";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(55, 10, utf8_decode($row['idGalardonado']),1,0,'C',0);
    $pdf->Cell(50, 10, utf8_decode($row['Nombre']),1,0,'C',0);
    $pdf->Cell(40, 10, utf8_decode($row['ApellidoP']),1,0,'C',0);
    $pdf->Cell(40, 10, utf8_decode($row['ApellidoS']),1,1,'C',0);
}


//while($row = $nombre->fetch_assoc()){
    //$pdf->Cell(90,10,$row['Nombre'],1,0,'C',0);
//}



//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
$pdf->Output();
?>