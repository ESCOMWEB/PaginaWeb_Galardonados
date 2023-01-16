<?php 

session_start();
    $idGalardonado = $_SESSION["usuarioID"];
    
    include("../sinPagina/configDB.php");

    // Consulta Nombre del galardonado
    $sql = "SELECT * FROM galardonado WHERE idGalardonado = $idGalardonado";
    $res = mysqli_query($conexion, $sql);
    $nombre = mysqli_fetch_array($res);

if(isset($_SESSION["usuarioID"])){

ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/boot">

</head>
<body>
<?php include("../sinPagina/configDB.php"); 

$sql = "SELECT * FROM galardonado WHERE idGalardonado = $idGalardonado";
$res = mysqli_query($conexion, $sql);
$nombre = mysqli_fetch_array($res);


?>

<!-- TABLA EJEMPLO PDF -->
                        <h1>COMPROBANTE</h1>
                        <hr>
                        <table class="table table-striped">
                            <tr>
                                <td><b>Clave</b></td>
                                <td><b>Nombre</b></td>
                                <td><b>Evento</b></td>
                                <td><b>Galardón</b></td>
                            </tr>
                            <tr id = "fila">
                                <td><?php echo $galardon['idGalardonado'] ?></td>
                                <td><?php echo $nombre[1] , " " , $nombre[2] , " " , $nombre[3]?></td>
                                <td>Entrega de distinciones al Merito Politécnico</td>
                                <td><?php
                                while($galardon = mysqli_fetch_array($res2)){
                                    //Consulta galardones
                                    $sql = "SELECT * FROM galardon_has_galardonado WHERE galardonado_idGalardonado = '$galardon[0]'";
                                    $res = mysqli_query($conexion, $sql);
                                    $consulta2 = mysqli_fetch_array($res);

                                    //Tipo de galardon
                                    $sql = "SELECT * FROM galardon WHERE idGalardon = '$consulta2[1]'";
                                    $res = mysqli_query($conexion, $sql);
                                    $premio = mysqli_fetch_array($res);
                                ?>
                                <td><?php echo $premio['galardon'] ?></td>      
                            </tr>
                            <?php
                                }
                            ?>
                            <img src="../../img/banner top.jpg" class="imagen" />
                        </table>



</body>
</html>

<?php 
$html=ob_get_clean(); //VARIABLE PARA EL ARCHIVO HTML

//echo $hmtl; //comprobar si esta en memoria

//Crear el objeto de conversión HTML-PDF
require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("archivo_.pdf",array("Attachment" => false));

?>
                            
<?php include("pie.php");
}
else{
    header("location:./../");
}

?>