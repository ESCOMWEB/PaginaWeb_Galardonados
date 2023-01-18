<?php 

session_start();
include("../sinPagina/configDB.php");

    $id = $_SESSION["usuarioID"];
    $sql = "SELECT * FROM galardonado WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $galardonado = mysqli_fetch_array($res);

    include("cabecera.php"); 
if(isset($_SESSION["usuarioID"])){
?>
        <!-- **Section** -->
                    <h1>Favor de registrar su asistencia</h1>
                    <hr>
                    <form role="form" method="POST" action="validarExito.php?id=<?php echo $id;?>">
                        <h5>¿Asistira con acompañantes al evento?*</h5>
                        <div class="checkbox">
                            <label>
                                <input type="radio" name="radio-01" value="opcion-02" checked="checked"> Si
                            </label>
                            <label>
                                <input type="radio" name="radio-01" value="opcion-01" > No
                            </label>
                            
                        </div> 
                        
                        <h5>En caso de haber contestado "Si", seleccione el tipo de servicio que pueda necesitar:</h5>
                        <div class="checkbox">
                            <label>
                              <input type="radio" name ="incap" id="incap" value="Silla Ruedas"> Silla de ruedas
                            </label>
                            <br>
                            <label>
                                <input type="radio" name ="incap" id="incap"  value="Bastón"> Bastón
                            </label>
                            <br>
                            <label>
                                <input type="radio" name ="incap" id="incap" value="Andadera"> Andadera
                            </label>
                            <br>
                            <label>
                                <input type="radio" name ="incap" id="incap"  value="Ceguera"> Ceguera
                            </label>
                            <br>
                            <label>
                                <input type="radio" name ="incap" id="incap"  value="Otro"> Otro
                            </label>
                            <br>
                            <label>
                                <input type="radio" name ="incap" id="incap"  value="/" checked> Ninguna
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email-01">Acompañante</label>
                            <input class="form-control" id="compa" name = "compa" placeholder="Ingresa Acompañante (Dejar vacio Si no se llevara)" type="text">
                        </div>

                        <h5>Verificar asistencia al evento: </h5>
                        <div>
                            <button class="btn btn-primary btn-lg active" data-target="#foo" type="submit" >Validar</button>
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