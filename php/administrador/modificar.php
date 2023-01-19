<?php

include("./../sinPagina/configDB.php");

$clave=$_POST["clave"];
$nombre=$_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoS = $_POST["apellidoS"];
$correo = $_POST["correo"];
$area = $_POST["area"];
$unidad = $_POST["unidad"];
$galardon = $_POST["galardon"];

$resp = [];

$sqlCon = "SELECT idGalardonado from galardonado WHERE idGalardonado='$clave'";
$sqlRes = mysqli_query($conexion, $sqlCon);
$sqlInf = mysqli_fetch_row($sqlRes);


    
    $sqlReg="UPDATE galardonado set idGalardonado='".$clave."', Nombre='".$nombre."', ApellidoP='".$apellidoP."',ApellidoS='".$apellidoS."', CorreoE='".$correo."', idUnidad='".$unidad."', area='".$area."' where idGalardonado='".$clave."'";
    $sqlRes = mysqli_query($conexion, $sqlReg);
    $sqlReg="UPDATE galardon_has_galardonado set galardon_idGalardon='".$galardon."' where galardonado_idGalardonado='".$clave."'";
    $sqlRes = mysqli_query($conexion, $sqlReg);

    $resp["cod"] = 1;


echo json_encode($resp);