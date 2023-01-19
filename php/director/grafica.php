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

        <!--grafica-->
        <link href="https://playground.anychart.com/gallery/src/Pie_and_Donut_Charts/Donut_Chart/iframe" rel="canonical">
        <meta content="Acme Corp,Circle Chart,Donut Chart,Doughnut Chart,Pie Chart" name="keywords">
        <meta content="AnyChart - JavaScript Charts designed to be embedded and integrated" name="description">
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
        <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" rel="stylesheet" type="text/css">
        <style>
            #container {
                height: 50rem;
                text-align: center;
            }
        </style>

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

                    <li class="jm-collapse"><a href="/php/director/principalDirector.php">Galardonados</a></li>
                    <li class="jm-collapse"><a href="/php/director/grafica.php">Asistencia</a></li>
                    <li class="jm-collapse"><a href="/php/sinPagina/cerrarSesion.php">Cerrar sesión</a></li>
                </nav>
            </div>

            <?php

            $sqlCon = "SELECT count(*) FROM galardonado ";
            $sqlRes = mysqli_query($conexion, $sqlCon);
            $sqlInf = mysqli_fetch_row($sqlRes);

            $sqlCon2 = "SELECT count(*) FROM Asistencia where Confirmacion='SI' ";
            $sqlRes2 = mysqli_query($conexion, $sqlCon2);
            $sqlInf2 = mysqli_fetch_row($sqlRes2);

            $sqlCon3 = "SELECT count(*) FROM Asistencia where Confirmacion='NO' ";
            $sqlRes3 = mysqli_query($conexion, $sqlCon3);
            $sqlInf3 = mysqli_fetch_row($sqlRes3);

            if(mysqli_num_rows($sqlRes2)==0){
                $asistira =0;
            }
            else{
                $asistira =$sqlInf2[0];
            }
            if(mysqli_num_rows($sqlRes3)==0){
                $nasistira =0;
            }
            else{
                $nasistira =$sqlInf3[0];
            }
            $sinc=$sqlInf[0]-$nasistira-$asistira;
            ?>

            <div class="container padding-2 i-s">
                <div id="container"></div>
                <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
                <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
                <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
                <script type="text/javascript">anychart.onDocumentReady(function () {
                        // create pie chart with passed data
                        var chart = anychart.pie([
                            ['Asistiran', <?php echo $asistira;  ?>],
                            ['No asistiran', <?php echo $nasistira;  ?>],
                            ['Sin confirmar', <?php echo $sinc;  ?>]
                        ]);

                        // set chart title text settings
                        chart
                            .title('Porcentaje de asistencias confirmadas y no confirmadas')
                            // set chart radius
                            .radius('43%')
                            // create empty area in pie chart
                            .innerRadius('30%');

                        // set container id for the chart
                        chart.container('container');
                        // initiate chart drawing
                        chart.draw();
                    });</script>
            </div>
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