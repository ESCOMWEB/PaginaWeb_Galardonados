<?php
session_start();

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
            <nav class="navegacion-principal contenedor">
                <a href="/index.php">Inicio</a>
                <a href="/php/sinPagina/cerrarSesion.php">Cerrar sesión</a>
            </nav>
        </div>

        <section>
            <div class="contenedorBus">
                <div class="container padding-2">
                    <h4>
                        <?php echo $_SESSION["tipoUsuario"];?>
                    </h4>
                    <select class="form-control">
                        <option>cecyt 1</option>
                        <option>cecyt 2</option>
                        <option>cecyt 3</option>
                        <option>cecyt 4</option>
                        <option>cecyt 5</option>
                      </select>
                      <br>
                      <!-- Botón básico -->
                      <button class="btn btn-primary" type="button">
                        Buscar
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                      <br>
                      <div class="tabla">
                      <table class="table table-striped">
                        <tr>
                            <td>ejemplo </td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                          </tr>
                          <tr>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                          </tr>
                          <tr>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                          </tr>
                          <tr>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                            <td>ejemplo</td>
                          </tr>
                          
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
                    <img src="/img/educacion2.png">
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