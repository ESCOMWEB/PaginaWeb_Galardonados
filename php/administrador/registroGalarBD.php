<?php

include("./../sinPagina/configDB.php");

$clave=$_POST["clave"];
$nombre=$_POST["nombre"];
$apellidoP = $_POST["apellidoP"];
$apellidoS = $_POST["apellidoS"];
$area = $_POST["area"];
$unidad = $_POST["unidad"];
$galardon = $_POST["galardon"];

$resp = [];

$sqlCon = "SELECT idGalardonado from galardonado WHERE idGalardonado='$clave'";
$sqlRes = mysqli_query($conexion, $sqlCon);
$sqlInf = mysqli_fetch_row($sqlRes);

if(mysqli_num_rows($sqlRes)==1){
    $resp["cod"] = 2;
}
else{
    
    $sqlReg="INSERT INTO galardonado(idGalardonado,Nombre,ApellidoP,ApellidoS,area,idUnidad)
    value('".$clave."','".$nombre."','".$apellidoP."','".$apellidoS."','".$area."','".$unidad."')";
    $sqlRes2 = mysqli_query($conexion, $sqlReg);

    $sqlReg="INSERT INTO cuentagalardonado
    value('".$clave."','".$clave."','".$clave."')";
    $sqlRes2 = mysqli_query($conexion, $sqlReg);

    $sqlReg="INSERT INTO galardon_has_galardonado
    value('".$clave."','".$galardon."','".$clave."')";
    $sqlRes2 = mysqli_query($conexion, $sqlReg);

    $resp["cod"] = 1;
}

echo json_encode($resp);