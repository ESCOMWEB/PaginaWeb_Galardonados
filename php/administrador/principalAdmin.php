<?php
session_start();
include("./../sinPagina/configDB.php");

if (isset($_SESSION["usuarioID"])) {
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
                <a href="/php/administrador/principalAdmin.php">
                    <img src="/img/banner top.jpg" class="imagen" />
                </a>
            </div>

            </header>

          
 <!-- Navegador Responsivo -->
        <div class="nav-bg">
            <nav class="navegacion-principal contenedor jmenu">
                <label for="menu-btn" class="jm-menu-btn jm-icon-menu"></label>
                <input type="checkbox" id="menu-btn" class="jm-menu-btn">
                    <li class="jm-collapse"><a href="/php/administrador/principalAdmin.php">Inicio</a></li>
                    <li class="jm-collapse"><a href="/php/sinPagina/cerrarSesion.php">Cerrar sesión</a></li>
            </nav>
        </div>

            <section>
                <div class="container padding-2">
                    <h4>
                        <?php

                        $clave = $_SESSION["idAdmin"];
                        $sqlCon = "SELECT * from admin WHERE id_admin='$clave'";
                        $sqlRes = mysqli_query($conexion, $sqlCon);
                        $sqlInf = mysqli_fetch_row($sqlRes);

                        echo "<h2>Bienvenido " . $sqlInf[1] . "</h2>";
                        ?>
                    </h4>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#galardonados">Galardonados</a></li>
                        <li><a data-toggle="tab" href="#directores">Directores</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="galardonados">
                            <p>Seleccione la unidad</p>
                            <script>
                                function cambiar() {
                                    history.pushState({data:true}, 'Titulo', 'principalAdmin.php');
                                    window.location.href = window.location.href + "?id=" + $("#unidad").val();

                                }
                            </script>
                            <select class="form-control ctxt" id="unidad" name="unidad" onchange="cambiar()">
                                <option value="all">Todas</option>
                                <?php

                                $sqlCon = "SELECT nombre,idUnidad FROM unidad group by nombre";
                                $sqlRes = mysqli_query($conexion, $sqlCon);
                                while ($filas = mysqli_fetch_array($sqlRes)) {
                                    if($_GET["id"]==$filas[1]){
                                        echo '<option value="' . $filas[1] . '" selected>' . $filas[0] . '</option>';
                                    } else {
                                        echo '<option value="' . $filas[1] . '">' . $filas[0] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <br>
                            <div class="tabla">
                                <table class="table table-striped" id="tablaa">
                                    <tbody>
                                        <tr ondblclick="alert('Hello')">
                                            <td><b>Clave</b></td>
                                            <td><b>Nombre</b></td>
                                            <td><b>Galardon</b></td>
                                            <td><b>Correo electronico</b></td>
                                            <td><b>Area</b></td>
                                            <td><b>Modificar</b></td>
                                        </tr>

                                        <?php

                                        if (isset($_GET["id"])) {
                                            $id = $_GET["id"];
                                            if($id=='all'){
                                                $sqlCon = "SELECT galardonado.idGalardonado, galardonado.Nombre, galardonado.ApellidoP, galardonado.ApellidoS,galardon.galardon, galardonado.CorreoE, galardonado.area
                                            FROM galardonado
                                            inner join galardon_has_galardonado on galardonado.idGalardonado=galardon_has_galardonado.galardonado_idGalardonado
                                            inner join galardon on galardon_idGalardon=galardon.idGalardon;";
                                            } else {
                                                $sqlCon = 'SELECT galardonado.idGalardonado, galardonado.Nombre, galardonado.ApellidoP, galardonado.ApellidoS,galardon.galardon, galardonado.CorreoE, galardonado.area
                                            FROM galardonado
                                            inner join galardon_has_galardonado on galardonado.idGalardonado=galardon_has_galardonado.galardonado_idGalardonado
                                            inner join galardon on galardon_idGalardon=galardon.idGalardon
                                            where galardonado.idUnidad="' . $id . '"';
                                                $sqlRes = mysqli_query($conexion, $sqlCon);
                                            }
                                        } 
                                        else if( !isset($_GET["id"])) {
                                            $sqlCon = "SELECT galardonado.idGalardonado, galardonado.Nombre, galardonado.ApellidoP, galardonado.ApellidoS,galardon.galardon, galardonado.CorreoE, galardonado.area
                                            FROM galardonado
                                            inner join galardon_has_galardonado on galardonado.idGalardonado=galardon_has_galardonado.galardonado_idGalardonado
                                            inner join galardon on galardon_idGalardon=galardon.idGalardon;";
                                            $sqlRes = mysqli_query($conexion, $sqlCon);
                                        }
                                        while ($filas = mysqli_fetch_array($sqlRes)) {
                                            echo '<tr value="' . $filas[0] . '">';
                                            echo '<td>' . $filas[0] . '</td>';
                                            echo '<td>' . $filas[1] . ' ' . $filas[2] . ' ' . $filas[3] . '</td>';
                                            echo '<td>' . $filas[4] . '</td>';
                                            echo '<td>' . $filas[5] . '</td>';
                                            if ($filas[6] == 'D') {
                                                echo '<td>Maestro</td>';
                                            } else {
                                                echo '<td>Personal de apoyo</td>';
                                            }
                                            echo '<td>
                                                <a href="actualizacion.php?id='.$filas[0].'"> 
                                                    <span tyoe= "Submit" class="a-color1 glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                </a>
                                                <a href="eliminar.php?id='.$filas[0].'"> 
                                                    <span tyoe= "Submit" class="a-color1 glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </a
                                            </td>';
                                            
                                            echo '</tr>';
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="directores">
                            <h2>Directores de las instuticiones</h2>
                            <div class="tabla">
                            <table class="table table-striped" id="tablaa">
                                    <tbody>
                                        <tr ondblclick="alert('Hello')">
                                            <td><b>Clave</b></td>
                                            <td><b>Nombre</b></td>
                                            <td><b>Unidad</b></td>
                                            <td><b>Modificar</b></td>
                                        </tr>

                                        <?php

                                        $sqlCon = "SELECT director.idDirector, director.Nombre, director.ApellidoP, director.ApellidoS, unidad.Nombre
                                        FROM director inner join unidad on director.idDirector=unidad.idDirector;";
                                        $sqlRes = mysqli_query($conexion, $sqlCon);
                                        


                                        while ($filas = mysqli_fetch_array($sqlRes)) {
                                            echo '<tr value="' . $filas[0] . '">';
                                            echo '<td>' . $filas[0] . '</td>';
                                            echo '<td>' . $filas[1] . ' ' . $filas[2] . ' ' . $filas[3] . '</td>';
                                            echo '<td>' . $filas[4] . '</td>';
                                            echo '<td>
                                                <a href="actualizacion.php?id='.$filas[0].'"> <span tyoe= "Submit" class="a-color1 glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                </a>

                                            <a href="eliminar.php?id='.$filas[0].'"> 
                                                    <span tyoe= "Submit" class="a-color1 glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </a
                                            </td>';
                                            
                                            echo '</tr>';
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
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
} else {
    header("location:./../");
}
?>