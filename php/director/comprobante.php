<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    /*
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Movernos a la derecha
    $this->Cell(45);
    // Título
    $this->Cell(100,10,utf8_decode('Reporte de Validación'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
    */
    /*
    $this->Cell(55, 10, 'idGalardonado',1,0,'C',0);
    $this->Cell(50, 10, 'Nombre',1,0,'C',0);
    $this->Cell(40, 10, 'ApellidoP',1,0,'C',0);
    $this->Cell(40, 10, 'ApellidoS',1,1,'C',0);
    */
}

// Pie de página
function Footer()
{
    
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página

    $this->Image('img/banner.jpg',-15,260,240);
    
}

}

require("../sinPagina/configDB.php");

session_start();
    $idGalardonado = $_SESSION["usuarioID"];
    
    //include("../sinPagina/configDB.php");

    // Consulta Nombre del galardonado
    $sql = "SELECT * FROM galardonado WHERE idGalardonado = '$idGalardonado'";
    $res = mysqli_query($conexion, $sql);
    $nombre = mysqli_fetch_array($res);

    $sql = "SELECT * FROM galardon_has_galardonado WHERE galardonado_idGalardonado = '$nombre[0]'";
    $res = mysqli_query($conexion, $sql);
    $premio = mysqli_fetch_array($res);

    $sql = "SELECT * FROM galardon WHERE idGalardon = '$premio[1]'";
    $res = mysqli_query($conexion, $sql);
    $galardon = mysqli_fetch_array($res);

    //SI HAY ACOMPAÑANTE
    /*
    $sql = "SELECT * FROM galardonado WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $galardonado = mysqli_fetch_array($res);

    $sql = "SELECT * FROM asistencia WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $comprobando = mysqli_num_rows($res);*/
/*
$sql = "SELECT * FROM galardonado";
$res = mysqli_query($conexion, $sql);
$nombre = mysqli_fetch_array($res);
*/
/*
$consulta = "SELECT * FROM galardonado";
$resultado = $conexion->query($consulta);*/




//if($comprobando == '/'){
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Image('img/escudo.png',105,0,100);
    $pdf->setXY(150,25);

    $pdf->SetFont('Arial','',30);
    //$pdf->Cell(90,10,utf8_decode('FELICIDADES GALARDONADO'),1,0,'C',0);
    $pdf->Ln(15);
    $pdf->setX(45);
    //$pdf->Ln(50);
    //$pdf->setXY(30,60);
    //CELL ancho, largo, contenido, borde, salto de linea, alineacion, relleno
    $pdf->Cell(40, 5, utf8_decode($nombre['Nombre']),0,0,'R',0);
    $pdf->Cell(50, 5, utf8_decode($nombre['ApellidoP']),0,0,'C',0);
    $pdf->Cell(45, 5, utf8_decode($nombre['ApellidoS']),0,0,'L',0);

    $pdf->Ln(20);
    $pdf->setXY(50,60);

    $pdf->SetFont('Arial','',70);
    $pdf->Cell(40, 5, utf8_decode('ID:'),0,0,'R',0);
    $pdf->Cell(40, 5, utf8_decode($nombre['idGalardonado']),0,0,'L',0);
    $pdf->Ln(20);
    $pdf->setXY(90,90);

    $pdf->Cell(40, 5, utf8_decode('Evento: 21P'),0,0,'C',0);
    $pdf->Ln(20);
    $pdf->setXY(90,110);

    $pdf->SetFont('Arial','',16);

    $pdf->Cell(40, 5, utf8_decode('Entrega de Distinciones al Mérito Politécnico 2021'),0,0,'C',0);

    $pdf->Ln(20);
    $pdf->setXY(40,120);

    $pdf->SetFont('Arial','',20);
    $pdf->Cell(40, 5, utf8_decode('Galardon:'),0,0,'R',0);
    $pdf->Cell(40, 5, utf8_decode($galardon['galardon']),0,0,'L',0);

    $pdf->Ln(20);
    $pdf->setXY(15,130);
    $pdf->SetFillColor(94,33,41);
    $pdf->SetDrawColor(0,0,0);
    $pdf->Cell(0, 5, utf8_decode('...'),0,0,'R',1);

    $pdf->Ln(20);
    $pdf->setXY(20,140);
    $pdf->SetFont('Arial','',16);

    $pdf->Cell(40, 10, utf8_decode('Fecha: 21-Oct-2022'),0,1,'L',0);
    $pdf->setX(20);
    $pdf->Cell(40, 10, utf8_decode('Hora: 13:00 Horas'),0,1,'L',0);
    $pdf->setX(20);
    $pdf->Cell(40, 10, utf8_decode('Lugar: Auditorio "A" Alfredo Peralta del Centro Cultural Jaime Torres,'),0,1,'L',0);
    $pdf->setX(20);
    $pdf->Cell(40, 10, utf8_decode('(El Queso). Av. Luis Enrique, Unidad Profesional Zacatenco.'),0,1,'L',0);
    $pdf->Ln(20);
    $pdf->setXY(20,188);
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(40, 8, utf8_decode(' Consideraciones'),0,1,'L',0);
    $pdf->setX(23);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40, 5, utf8_decode('- Galardonados. Favor de presentarse a la mesa de registro ubicada en el lobby del auditorio'),0,1,'L',0);
    $pdf->setX(25.5);
    $pdf->Cell(40, 5, utf8_decode('con dos horas de anticipación.'),0,1,'L',0);
    $pdf->setX(23);
    $pdf->Cell(40, 5, utf8_decode('- Solo podrá asistir un acompañante.'),0,1,'L',0);
    $pdf->setXY(90,240);
    $pdf->Cell(40, 5, utf8_decode('UTEYCV - ESCOM / escom.ipn.mx'),0,1,'C',0);
    $pdf->Output();
//} else{
    
//}

//Ciclo para tabla
/*
while($row = $resultado->fetch_assoc()){
    $pdf->Cell(55, 10, utf8_decode($row['idGalardonado']),1,0,'C',0);
    $pdf->Cell(50, 10, utf8_decode($row['Nombre']),1,0,'C',0);
    $pdf->Cell(40, 10, utf8_decode($row['ApellidoP']),1,0,'C',0);
    $pdf->Cell(40, 10, utf8_decode($row['ApellidoS']),1,1,'C',0);
}*/


//while($row = $nombre->fetch_assoc()){
    //$pdf->Cell(90,10,$row['Nombre'],1,0,'C',0);
//}



//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));

?>