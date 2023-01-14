<?php
session_start();
include("../sinPagina/configDB.php");

    $id = $_GET['id'];

    $sql = "SELECT * FROM galardonado WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $galardonado = mysqli_fetch_array($res);

    $sql = "SELECT * FROM asistencia WHERE idGalardonado = '$id'";
    $res = mysqli_query($conexion, $sql);
    $comprobando = mysqli_num_rows($res);

    if($comprobando != 0){
        $sql = "UPDATE asistencia SET Confirmacion = 'NO', Acompañante = '/' WHERE idGalardonado = '$id'";
        mysqli_query($conexion, $sql); 
    }
    else{
        $sql = "INSERT INTO asistencia (idGalardonado, Confirmacion, Acompañante) values ('$id', 'NO', '/')";
        mysqli_query($conexion, $sql);  
    }

    
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

        <section class="container">
            <div class="contenedorBus">
                <div class="container padding-2">
                    <h2> ¡Se Ha Validado (LA NO ASISTENCIA) EXITOSAMENTE!</h2>
                    <?php echo "<h2> CLAVE: $galardonado[0]</h2>" ?>
                    <?php echo "<h2> NOMBRE: $galardonado[1] $galardonado[2] $galardonado[3]</h2>" ?>

                    <div class="contenedor-btn">
                        <a href="principalDirector.php" class="boton">Regresar</a>
                    </div>
                </div>
            </div>

            
        </section>


        <!-- Footer -->
        <footer>
        <br><br>
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