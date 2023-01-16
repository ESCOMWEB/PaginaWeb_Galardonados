<?php include("cabecera.php"); 

session_start();
include("../sinPagina/configDB.php");

    $id = $_GET['id'];
    $sql = "SELECT * FROM galardonado WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $galardonado = mysqli_fetch_array($res);

if(isset($_SESSION["usuarioID"])){
?>
        <!-- **Section** -->
                    <h1>Favor de registrar su asistencia</h1>
                    <hr>
                    <form role="form" method="POST" action="validarExito.php?id=<?php echo $id;?>">
                        <h3>¿Asistira con acompañantes al evento?*</h3>
                        <div class="checkbox">
                            <label>
                                <input type="radio" name="radio-01" value="opcion-01" checked="checked"> No
                            </label>
                            <label>
                                <input type="radio" name="radio-01" value="opcion-02" checked="checked"> Si
                            </label>
                        </div> 
                        
                        <h3>En caso de haber contestado "Si", seleccione el tipo de servicio que puda necesitar:</h3>
                        <div class="checkbox">
                            <label>
                              <input type="checkbox" id="compa" value="opcion-01"> Silla de ruedas
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" id="compa"  value="opcion-02"> Bastón
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" id="compa" value="opcion-03"> Andadera
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" id="compa"  value="opcion-04"> Ceguera
                            </label>
                            <br>
                            <label>
                                <input type="checkbox" id="compa"  value="opcion-05"> Otro
                            </label>
                        </div>
                        <h3>Verificar asistencia al evento: </h3>
                        <div>
                            <button class="btn btn-primary btn-lg active" data-target="#foo" type="submit" >Validar</button>
                        </div>
                        <div>
                            <a href="../sinpagina/comprobante.php">Comprobante PDF</a>
                        </div>
                    </form>
                    <hr>
                    <p>La técnica al servicio de la patria</p>
<?php include("pie.php");?>
<?php
}
else{
    header("location:./../");
}
?>