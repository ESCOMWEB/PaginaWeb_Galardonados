<?php
session_start();
include("./../sinPagina/configDB.php");

if (isset($_SESSION["usuarioID"])) {

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    $sqlCon = "SELECT * from galardonado where idGalardonado='".$id."'";
    $sqlRes = mysqli_query($conexion, $sqlCon);
    $sqlInf = mysqli_fetch_row($sqlRes);

    $sqlCon2 = "SELECT * from galardon_has_galardonado where galardonado_idGalardonado='".$id."'";
    $sqlRes2 = mysqli_query($conexion, $sqlCon);
    $sqlInf2 = mysqli_fetch_row($sqlRes2);

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

        <!-- JS para validar los datos -->
        <script src="./../../js/jquery-3.6.1.min.js"></script>
        <script src="./../../js/plugins/justValidate.js"></script>

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
                    <li class="jm-collapse"><a href="./registroGalardonado.php">Registro</a></li>
                    <li class="jm-collapse"><a href="/php/sinPagina/cerrarSesion.php">Cerrar sesión</a></li>
                </nav>
            </div>

            <section>

                <div class="container padding-2 i-s">
                    <h2>Registro de un nuevo galardonado</h2>
                    <form class="form-horizontal" id="formRegistroGar" role="form" autocomplete="on">
                        <div class="interior">
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="clave">Clave:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="clave" value="<?php echo $id?>" name="clave"
                                        placeholder="Clave, esta sera la misma para el usuario" type="text">
                                </div>
                            </div>
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="nombre" >Nombre:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="nombre" name="nombre" placeholder="nombre" type="text" value="<?php echo $sqlInf[1]?>">
                                </div>
                            </div>
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="apellidoP">Primer apellido:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="apellidoP" name="apellidoP"
                                        placeholder="Apellido paterno o primero" type="text" value="<?php echo $sqlInf[2]?>">
                                </div>
                            </div>
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="apellidoS">Segundo apellido:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="apellidoS" name="apellidoS"
                                        placeholder="Apellido materno o segundo" type="text" value="<?php echo $sqlInf[3]?>">
                                </div>
                            </div>
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="correo">Correo:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="correo" name="correo"
                                        placeholder="correo electronico" type="text" value="<?php echo $sqlInf[4]?>">
                                </div>
                            </div>
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="area">Area:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="area" name="area" value="<?php echo $sqlInf[6]?>">
                                        <option value="">Seleccione</option>
                                        <option value="D">Maestro</option>
                                        <option value="P">Personal de apoyo</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="unidad">Unidad:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="unidad" name="unidad" value="<?php echo $sqlInf[7]?>">
                                        <option value="">Seleccione</option>
                                        <?php

                                        $sqlCon = "SELECT nombre,idUnidad FROM unidad group by nombre";
                                        $sqlRes = mysqli_query($conexion, $sqlCon);
                                        while ($filas = mysqli_fetch_array($sqlRes)) {
                                            echo '<option value="' . $filas[1] . '">' . $filas[0] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <h2>Galardón que se recibe</h2>
                            <div class="form-group ctxt">
                                <label class="col-sm-3 control-label" for="galardon">Galardón:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="galardon" name="galardon" >
                                        <option value="">Seleccione</option>
                                        <?php
                                        $sqlCon2 = "SELECT galardon,idGalardon FROM galardon group by galardon";
                                        $sqlRes2 = mysqli_query($conexion, $sqlCon2);
                                        while ($filas = mysqli_fetch_array($sqlRes2)) {
                                            if ($sqlInf3[2] == $filas[1]) {
                                                echo '<option value="' . $filas[1] . '" selected>' . $filas[0] . '</option>';
                                            }
                                            else{
                                                echo '<option value="' . $filas[1] . '">' . $filas[0] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="Mensaje"></div>
                            <button class="btn btn-primary pull-right"  type="submit">Enviar</button>
                            
                        </div>
                    </form>
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
} else {
    header("location:./../");
}
?>