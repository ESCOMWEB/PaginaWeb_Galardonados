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

    $sql = "SELECT * FROM galardonado WHERE idUnidad = '$idUnidad[0]'";
    $res2 = mysqli_query($conexion, $sql);
    
    

?>