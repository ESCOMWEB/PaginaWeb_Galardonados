<?php 

session_start();
$idGalardonado = $_SESSION["usuarioID"];

include("../sinPagina/configDB.php");

// Consulta Nombre del galardonado
$sql = "SELECT * FROM galardonado WHERE idGalardonado = '$idGalardonado'";
$res = mysqli_query($conexion, $sql);
$nombre = mysqli_fetch_array($res);

// Consulta Galardón
$sql = "SELECT * FROM galardon_has_galardonado WHERE galardonado_idGalardonado = '$nombre[0]'";
$res = mysqli_query($conexion, $sql);
$premio = mysqli_fetch_array($res);

// Consulta Premio
$sql = "SELECT * FROM galardon_has_galardonado WHERE galardonado_idGalardonado = '$nombre[0]'";
$res = mysqli_query($conexion, $sql);
$premio = mysqli_fetch_array($res);

// Consulta Galardon - Premio
$sql = "SELECT * FROM galardon WHERE idGalardon = '$premio[1]'";
$res = mysqli_query($conexion, $sql);
$galardon = mysqli_fetch_array($res);

include("cabecera.php"); 

if(isset($_SESSION["usuarioID"])){
?>
                    <h1>Distinciones al merito politécnico 2020, 2021 y 2022</h1>
                    
                      <br>
                      <hr>
                      <h2>Galardon:</h2>
                      <hr>

                      <div class="tabla">
                        <table class="table">
                            <tr>
                                <td><b>Clave</b></td>
                                <td><b>Nombre</b></td>
                                <td><b>Evento</b></td>
                                <td><b>Tipo</b></td>
                                <td><b>Galardon</b></td>
                                
                            </tr>
                            <tr id = "fila">
                                <td><?php echo $idGalardonado ?></td>
                                <td><?php echo $nombre[1] , " " , $nombre[2] , " " , $nombre[3]?></td>
                                <td>Entrega de distinciones al Merito Politécnico</td> 
                                <td><?php echo $galardon['Tipo'];?></td> 
                                <td><?php echo $galardon['galardon'];?></td> 
                                
                            </tr>
                            </table>

                            <h5>Observaciones:</h5>
                            <p><?php echo $galardon['Observaciones'];?></p>
                        </div>
<?php include("pie.php");

}
else{
    header("location:./../");
}

?>