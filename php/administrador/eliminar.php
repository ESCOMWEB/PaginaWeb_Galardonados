<?php

include("./../sinPagina/configDB.php");

$id = $_GET['id'];

$resp = [];

$sqlCon = "DELETE from galardonado where idGalardonado='".$id."'";
$sqlRes = mysqli_query($conexion, $sqlCon);

header("location:./../../");
?>