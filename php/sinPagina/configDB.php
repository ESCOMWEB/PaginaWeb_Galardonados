<?php
	$servidorBD = "localhost";
	$usuarioBD = "root";
	$contrasenaBD = "";
	$nombreBD = "basegalar";
	$conexion = mysqli_connect($servidorBD,$usuarioBD,$contrasenaBD,$nombreBD);
	mysqli_query($conexion, "SET NAMES 'utf8'"); //Esta instrucción permite guardar eñes y acentos en la BD ;)
	if(mysqli_connect_errno()){
		die("Problemas con la conexión al servidor MySQL: ".mysqli_connect_error());
	}else{
		mysqli_query($conexion, "SET NAMES 'utf8'"); //Esta instrucción permite guardar eñes y acentos en la BD ;)
	}
?>