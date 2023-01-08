<?php
//iniciar conexion
include("configDB.php");

//recuperar los datos del formulario
$clave = $_POST["clave"];
$email = $_POST["email"];

//crear json para retorno de estado
$resp = [];

//validar existencia
$sqlCon = "SELECT Nombre,ApellidoP,ApellidoS,validacion from galardonado WHERE idGalardonado='$clave'";
$sqlRes = mysqli_query($conexion, $sqlCon);
$sqlInf = mysqli_fetch_row($sqlRes);

//if para determinar que llego un valor si no regresa 0
if (mysqli_num_rows($sqlRes)==1) {
  //if para determinar si ya se valido si no actualiza y mando correo
  if ($sqlInf[3] == '1') {
    $resp["cod"] = 2;
  }
  else {
    $sqlInsUAO = "UPDATE galardonado SET CorreoE='$email', validacion='1' WHERE idGalardonado='$clave' ";
    $resInsUAO = mysqli_query($conexion, $sqlInsUAO);
    if (mysqli_affected_rows($conexion) == 1) {
      //prepraracion de variables para envio de correo
      $sqlCon2 = "SELECT Usuario,Contraseña from cuentagalardonado WHERE idGalardonado='$clave'";
      $sqlRes2 = mysqli_query($conexion, $sqlCon2);
      $sqlInf2 = mysqli_fetch_row($sqlRes2);
      
      $nombre = $sqlInf[0];
      $apellidoP = $sqlInf[1];
      $apellidoS = $sqlInf[2];
      $asunto = "Felicitaciones! Galardon IPN";
      $mensaje = "Su usuario es:".$sqlInf2[0]." y su contraseña es:".$sqlInf2[1];
      include("./envioCorreo.php");
    }
  }
}
else {
  $resp["cod"] = 0;
}
echo json_encode($resp);
?>