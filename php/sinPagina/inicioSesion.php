<?php
//iniciar conexion
include("configDB.php");
session_start();

//recuperar los datos del formulario
$usuario = $_POST["usuario"];
$contra = $_POST["contraseña"];

//crear json para retorno de estado
$resp = [];

$sqlCon = "SELECT contraseña from cuentagalardonado WHERE usuario='$usuario'";
$sqlRes = mysqli_query($conexion, $sqlCon);
$sqlInf = mysqli_fetch_row($sqlRes);

if (mysqli_num_rows($sqlRes) != 0) {
    if (mysqli_num_rows($sqlRes) != 0 && $contra==$sqlInf[0]) {
        $resp["cod"] = 3;
        $_SESSION["tipoUsuario"] = 3;
        $_SESSION["usuarioID"] = $usuario;
    }
    else {
        $resp["cod"] = 0;
    }
}
else {
    $sqlCon2 = "SELECT contraseña from cuentadirector WHERE usuario='$usuario'";
    $sqlRes2 = mysqli_query($conexion, $sqlCon2);
    $sqlInf2 = mysqli_fetch_row($sqlRes2);

    if (mysqli_num_rows($sqlRes2) != 0) {
        if (mysqli_num_rows($sqlRes2) != 0 && $contra==$sqlInf2[0]) {
            $resp["cod"] = 2;
            $_SESSION["tipoUsuario"] = 2;
            $_SESSION["usuarioID"] = $usuario;
        }
        else {
            $resp["cod"] = 0;
        }
    } 
    else {
        $sqlCon3 = "SELECT cuentaadmin.contraseña, admin.id_admin from cuentaadmin
         inner join admin on admin.id_admin=cuentaadmin.idAdmin where cuentaadmin.usuario='".$usuario."'";
        $sqlRes3 = mysqli_query($conexion, $sqlCon3);
        $sqlInf3 = mysqli_fetch_row($sqlRes3);

        if (mysqli_num_rows($sqlRes3) != 0 && $contra==$sqlInf3[0]) {
            $resp["cod"] = 1;
            $_SESSION["tipoUsuario"] = 1;
            $_SESSION["usuarioID"] = $usuario;
            $_SESSION["idAdmin"] = $sqlInf3[1];

        }
        else {
            $resp["cod"] = 0;
        }
    }
}

echo json_encode($resp);
?>