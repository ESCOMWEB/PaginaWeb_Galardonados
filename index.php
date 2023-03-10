<?php
session_start();

if(!isset($_SESSION["usuarioID"])){
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPN - Distinciones al Mérito Politécnico</title>
    <link href="img/Logo_Instituto_Politécnico_Nacional.png" rel="shortcut icon">

    <!-- CSS Framework Gobierno-->
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <!-- JS Framework Gobierno-->
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

    <!-- CSS y JS Propio-->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/barraNav.js"></script>

</head>

<!-- Contenido -->

<body>
    <main class="page">
        <!-- Header -->
        <header>
            <div class="no-margin">
                <a href="index.php">
                    <img src="img/banner top.jpg" class="imagen" />
                </a>
            </div>
        </header>

        <!-- Navegador Responsivo -->
        <div class="nav-bg">
            <nav class="navegacion-principal contenedor jmenu">
                <label for="menu-btn" class="jm-menu-btn jm-icon-menu"></label>
                <input type="checkbox" id="menu-btn" class="jm-menu-btn">
                    <li class="jm-collapse"><a href="index.php">Inicio</a></li>
                    <li class="jm-collapse"><a href="html/inicio_sesion.html">Iniciar Sesión</a></li>
                    <li class="jm-collapse"><a href="html/registro.html">Registrarse</a></li>
                    <li class="jm-collapse"><a download href="pdf/convocatoria.pdf">Convocatoria <span class="glyphicon glyphicon-download-alt"
                        aria-hidden="true"></span></a></li>
            </nav>
        </div>

        <!--Slider-->
        <div class="container">
        <hr>
            <div class="slider">
                <ul>
                    <li>
                        <img src="img/gal1.jpg"
                            alt="Galardonados 1">
                    </li>
                    <li>
                        <img src="img/gal2.jpg"
                            alt="Galardonados 2">
                    </li>
                    <li>
                        <img src="img/gal3.jpg"
                            alt="Galardonados 3">
                    </li>
                    <li>
                        <img src="img/gal4.jpg"
                            alt="Galardonados 4">
                    </li>
                </ul>
            </div>
            <hr>
        </div>

        <!-- Convocatoria -->
        <section>
            <div class="convocatoria">
                <div class="container padding-2">
                    <h1>Distinciones al Mérito Politécnico 2022</h1>
                    <p>
                        La Comisión de Distinciones al Mérito Politécnico del XL Consejo General Consultivo del
                        Instituto
                        Politécnico Nacional, de conformidad con lo establecido en los artículos 3, fracción I y 4
                        fracciones XXII y XXIII de la Ley Orgánica; 1, 2, 9, 33, 34, 36 y 39 del Reglamento de
                        Distinciones
                        al Mérito Politécnico; 195 y 196 fracción VI del Reglamento Interno y 50 del Reglamento del
                        Consejo
                        General Consultivo, ordenamientos todos del Instituto Politécnico Nacional; con la finalidad de
                        reconocer a las personas integrantes de la comunidad politécnica que destacan por una conducta,
                        trayectoria, servicio o acción ejemplar o sobresaliente que haya tenido por objeto exaltar el
                        prestigio del Instituto, apoyar la realización de sus finalidades, impulsar el desarrollo de la
                        educación técnica en el país o beneficiar a la humanidad, por lo anterior es que se tiene a bien
                        emitir la siguiente:
                    </p>
                    <div class="contenedor-btn">
                        <a target="_blank" class="boton" href="pdf/convocatoria.pdf">Convocatoria   
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Instrucciones -->
        <section class="contenedor-img">
            <div class="container">
                <h2>PROCESO INSTITUCIONAL PARA ORTORGAMINETO DE DISTINCIONES</h2>
                <br>
                <div class="tres-columnas">
                    <div class="iconos">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload"
                            width="72" height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                            <polyline points="9 15 12 12 15 15" />
                            <line x1="12" y1="12" x2="12" y2="21" />
                        </svg>
                        <h3>Registro</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni id perspiciatis totam
                            ipsa quis</p>

                    </div>

                    <div class="iconos">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="72"
                            height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                        </svg>
                        <h3>Inicio De Sesión</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni id perspiciatis totam
                            ipsa quis</p>
                    </div>

                    <div class="iconos">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="72"
                            height="72" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        <h3>Confirmación</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni id perspiciatis totam
                            ipsa quis</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer -->
        <footer>
            <div class="footer">
                <div class="container">
                    <h2>INSTITUTO POLITÉCNICO NACIONAL</h2>
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
                    <img src="img/educacion2.png" class="imagen">
                </div>
            </div>
        </footer>
    </main>
</body>

</html>

<?php
}
else if($_SESSION["tipoUsuario"]==1){
    header("location:/php/administrador/principalAdmin.php");
}
else if($_SESSION["tipoUsuario"]==2){
    header("location:/php/director/principalDirector.php");
}
else{
    echo '<p>' . $_SESSION["tipoUsuario"] . '</p>';
}
?>