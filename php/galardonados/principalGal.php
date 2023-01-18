<?php 

session_start();
    $idGalardonado = $_SESSION["usuarioID"];
    
    include("../sinPagina/configDB.php");



    // Consulta Nombre del galardonado
    $sql = "SELECT * FROM galardonado WHERE idGalardonado = '$idGalardonado'";
    $res = mysqli_query($conexion, $sql);
    $nombre = mysqli_fetch_array($res);

    include("cabecera.php");
if(isset($_SESSION["usuarioID"])){

?>

<!-- **Section** -->
                    <h1>Bienvenido</h1>
                    <?php echo "<h2> Bienvenid@: $nombre[1] $nombre[2] $nombre[3]</h2>" ?>
                    <hr>
                    <p>
                        <h6>Gracias por acatar la convocatoria.</h6>
                        <br>
                        <b>I.</b> Las y los interesados deberán presentar formalmente su interés de
                        postulación al Titular de la Dependencia Politécnica responsable, así como
                        la documentación soporte, a partir de la publicación de esta convocatoria
                        y hasta el 21 de febrero de 2022.<br>
                        <b>II.</b> Las personas Titulares de las Dependencias Politécnicas, serán los únicos
                        responsables de validar la información y, en su caso, registrar la
                        postulación ante la Comisión de Distinciones al Mérito Politécnico del XL
                        Consejo General Consultivo, mediante un Oficio que incluya el nombre de
                        los candidatos de su dependencia y la distinción a la que aspiran.
                        En el caso de las Unidades Académicas, sus titulares deberán someter a
                        consideración y aprobación de su Consejo Técnico Consultivo Escolar o del
                        Colegio de Profesores, según sea el caso, la propuesta de candidatos a
                        distinciones, anexando la documentación soporte a los expedientes, así
                        como el acta de la sesión correspondiente.<br>
                        <b>III.</b> Una vez que haya concluido el periodo de registro, los titulares de las
                        diferentes dependencias politécnicas deberán de enviar a la Secretaría
                        General, a más tardar el 25 de febrero de 2022, los expedientes íntegros de
                        los candidatos a las distinciones y el Oficio o Acta que soporte dichas
                        candidaturas, así como la ficha de registro que se encuentra en el
                        Instructivo para la Presentación de Candidatos a las Distinciones al Mérito
                        Politécnico.
                        Los Oficios o Actas deberán de incluir el nombre completo de los
                        candidatos, su Clave Única de Registro de Población (CURP) y la Distinción
                        a la que aspiran.<br>
                        <b>IV.</b> No se recibirán propuestas fuera de las fechas establecidas en la
                        convocatoria.<br>
                        <b>V.</b> Las propuestas presentadas por las unidades responsables que no reúnan
                        los requisitos establecidos no serán consideradas por la Comisión de
                        Distinciones al Mérito Politécnico.<br>
                        <b>VI.</b> La normatividad establecida para el otorgamiento de las Distinciones al
                        Mérito Politécnico será de observancia general en las Dependencias
                        Politécnicas, y su aplicación responsabilidad de los titulares
                    </p>
                    <div class="contenedor-btn">
                        <a target="_blank" class="boton" href="pdf/convocatoria.pdf">Convocatoria <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-down" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <line x1="4" y1="24" x2="20" y2="24" />
                            <line x1="12" y1="18" x2="12" y2="8" />
                            <line x1="12" y1="18" x2="16" y2="14" />
                            <line x1="12" y1="18" x2="8" y2="14" />
                          </svg></a>
                    </div>
                    <hr>
                    <p>La técnica al servicio de la patria</p>
<?php include("pie.php");
}
else{
    header("location:./../");
}

?>