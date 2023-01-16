<?php include("cabecera.php"); 

session_start();
$idGalardonado = $_SESSION["usuarioID"];

include("../sinPagina/configDB.php");

// Consulta Nombre del galardonado
$sql = "SELECT * FROM galardonado WHERE idGalardonado = $idGalardonado";
$res = mysqli_query($conexion, $sql);
$nombre = mysqli_fetch_array($res);

if(isset($_SESSION["usuarioID"])){
?>
                    <h1>Distinciones al merito politécnico 2020, 2021 y 2022</h1>
                      <br>
                      <hr>
                      <h2>Galardones:</h2>
                      <hr>
                      <div class="tabla">
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
                            </table>
                        </div>
<?php include("pie.php");

}
else{
    header("location:./../");
}

?>