<?php

session_start();
    $idDirector = $_SESSION["usuarioID"];
    
    include("../sinPagina/configDB.php");

    // Consulta Nombre Director
    $sql = "SELECT * FROM director WHERE idDirector = $idDirector";
    $res = mysqli_query($conexion, $sql);
    $nombre = mysqli_fetch_array($res);
    
    // Consulta Unidad Academica Director
    $sql = "SELECT nombre FROM unidad WHERE idDirector = $idDirector";
    $res = mysqli_query($conexion, $sql);
    $unidad = mysqli_fetch_array($res);

    // ** Tabla ** //
    
    // Consulta Alumnos (TODOS)
    $sql = "SELECT idUnidad FROM unidad WHERE idDirector = $idDirector";
    $res = mysqli_query($conexion, $sql);
    $idUnidad = mysqli_fetch_array($res);

    $sql = "SELECT * FROM galardonado WHERE idUnidad = '$idUnidad[0]' ORDER BY Nombre ASC";
    $res2 = mysqli_query($conexion, $sql);


if(isset($_SESSION["usuarioID"])){
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPN - Distinciones al Mérito Politécnico</title>
    <link href="/img/Logo_Instituto_Politécnico_Nacional.png" rel="shortcut icon">

    <!-- CSS Framework Gobierno-->
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <!-- JS Framework Gobierno-->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <!-- CSS y JS Propio-->
    <link href="/css/style.css" rel="stylesheet">
    <script src="/js/barraNav.js"></script>

</head>

<!-- Contenido -->

<body>
    <main class="page">
        <!-- Header -->
        <header>
            <div class="no-margin">
                <a href="/index.html">
                    <img src="/img/banner top.jpg" class="imagen" />
                </a>
            </div>
        </header>

        <!-- Navegador -->
        <div class="nav-bg">
            <nav class="navegacion-principal contenedor jmenu">
                <label for="menu-btn" class="jm-menu-btn jm-icon-menu"></label>
                <input type="checkbox" id="menu-btn" class="jm-menu-btn">
                    <li class="jm-collapse"><a href="./../../index.php">Inicio</a></li>
                    <li class="jm-collapse"><a href="/php/sinPagina/cerrarSesion.php">Cerrar sesión</a></li>
            </nav>
        </div>

        <section>
            
            <div class="contenedorBus">
                <div class="container padding-2">
                <?php echo "<h2> Bienvenid@: $nombre[1] $nombre[2] $nombre[3]</h2>" ?>
            <?php echo "<h3> UNIDAD ACADEMICA: $unidad[0]</h3>" ?>
                    
                      <div class="tabla">
                      <table class="table table-striped">
                        <tr>
                            <td><b>N°</b></td>
                            <td><b>Clave</b></td>
                            <td><b>Nombre</b></td>
                            <td><b>Galardón</b></td>
                            <td><b>Asistencia</b></td>
                            <td><b>Acompañante</b></td>
                            <td><b>Validar</b></td>
                          </tr>
                          
                          <?php 
                            $numero = 0;
                            
                            while($galardon = mysqli_fetch_array($res2)){
                                $numero++;

                                // Consulta Asistencia & Acompañante
                                $sql = "SELECT * FROM asistencia WHERE idGalardonado = '$galardon[0]'";
                                $res = mysqli_query($conexion, $sql);
                                $consulta1 = mysqli_fetch_array($res);
                                if (is_null($consulta1)) {
                                    $asistencia = "SIN CONFIRMAR";
                                    $compa = "SIN CONFIRMAR";
                                }
                                else{
                                    $asistencia = $consulta1[1];
                                    $compa = $consulta1[2];
                                }

                                // Consulta Galardón
                                $sql = "SELECT * FROM galardon_has_galardonado WHERE galardonado_idGalardonado = '$galardon[0]'";
                                $res = mysqli_query($conexion, $sql);
                                $consulta2 = mysqli_fetch_array($res);

                                // Consulta Galardón
                                $sql = "SELECT * FROM galardon WHERE idGalardon = '$consulta2[1]'";
                                $res = mysqli_query($conexion, $sql);
                                $premio = mysqli_fetch_array($res);
                            ?>

                            <tr id = "fila">
                                <td><?php echo $numero ?></td>
                                <td><?php echo $galardon['idGalardonado'] ?></td>
                                <td><?php echo $galardon['Nombre'] , " " , $galardon['ApellidoP'] , " " , $galardon['ApellidoS']?></td>
                                <td><?php echo $premio['galardon'] ?></td>
                                <td><?php echo $asistencia?></td>
                                <td><?php echo $compa?></td>
                                <td>
                                    <?php 
                                        if($asistencia == "SI"){?>
                                            <a href="noValidar.php?id=<?php echo $galardon['idGalardonado']; ?>">
                                                <span class="a-color2 glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </a>
                                        <?php } 
                                        else if($asistencia == "NO"){ ?>
                                            <a href="validar.php?id=<?php echo $galardon['idGalardonado']; ?>">
                                                <span tyoe= "Submit" class="a-color1 glyphicon glyphicon-ok" aria-hidden="true"></span>
                                            </a>
                                        <?php } 
                                        else { ?>
                                            <a href="validar.php?id=<?php echo $galardon['idGalardonado']; ?>">
                                                <span tyoe= "Submit" class="a-color1 glyphicon glyphicon-ok" aria-hidden="true"></span>
                                            </a>

                                            <a href="noValidar.php?id=<?php echo $galardon['idGalardonado']; ?>">
                                                <span class="a-color2 glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </a>
                                        <?php } ?>

                                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>    
                                </td>          
                            </tr>
                        <?php 
                        }
                        ?>
                          
                      </table>
                      </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <div class="footer">
                <div class="container">
                    <h4>INSTITUTO POLITÉCNICO NACIONAL</h4>
                    <p>
                        D.R. Instituto Politécnico Nacional (IPN). Av. Luis Enrique Erro S/N, Unidad Profesional Adolfo
                        López Mateos, Zacatenco, Alcaldía Gustavo A. Madero, C.P. 07738, Ciudad de México. Conmutador:
                        55 57
                        29 60 00 / 55 57 29 63 00.
                    </p>
                    <br>
                    <p>
                        Esta página es una obra intelectual protegida por la Ley Federal del Derecho de Autor, puede ser
                        reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y
                        su
                        dirección electrónica; su uso para otros fines, requiere autorización previa y por escrito de la
                        Dirección General del Instituto.
                    </p>
                    <img src="/img/educacion2.png" class="imagen">
                </div>
            </div>
        </footer>
    </main>
</body>

</html>
<?php
}
else{
    header("location:./../");
}
?>