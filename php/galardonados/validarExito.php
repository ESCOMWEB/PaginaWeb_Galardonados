<?php
include("cabecera.php"); 

session_start();
include("../sinPagina/configDB.php");

    $id = $_GET['id'];
    $compa = $_POST['compa'];
    $incap = $_POST['incap'];
    if($compa == ""){
        $compa = "/";
    }

    $sql = "SELECT * FROM galardonado WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $galardonado = mysqli_fetch_array($res);

    $sql = "SELECT * FROM asistencia WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $comprobando = mysqli_num_rows($res);
    //FALTA FORMATO
        if($comprobando != 0){
            $sql = "UPDATE asistencia SET Confirmacion = 'SI', Acompañante = '$compa', Incapacidad ='$incap' WHERE idGalardonado = '$id'";
            mysqli_query($conexion, $sql); 
        }
        else{
            $sql = "INSERT INTO asistencia (idGalardonado, Confirmacion, Acompañante, Incapacidad) values ('$id', 'SI', '$compa','$incap')";
            mysqli_query($conexion, $sql);  
        }


    
if(isset($_SESSION["usuarioID"])){
?>

        <section class="container">
            <div class="contenedorBus">
                <div class="container padding-2">
                    <h2> ¡Se Ha Validado EXITOSAMENTE!</h2>
                    <?php echo "<h2> CLAVE: $galardonado[0]</h2>" ?>
                    <?php echo "<h2> NOMBRE: $galardonado[1] $galardonado[2] $galardonado[3]</h2>" ?>
                    <?php echo "<h2> ACOMPAÑANTE: $compa</h2>" ?>
                    <hr>
                    <div class="contenedor-btn">
                        <a href="./comprobante.php" class="boton">Comprobante PDF</a>
                    </div>
                    <hr>
                    <div class="contenedor-btn">
                        <a href="principalGal.php" class="boton">Regresar</a>
                    </div>


                </div>
            </div>

            
        </section>
<?php include("pie.php");?>
<?php
}
else{
    header("location:./../");
}
?>