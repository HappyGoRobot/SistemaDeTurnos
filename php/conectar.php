<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base = "clinica";

$pacientes = mysqli_connect($servidor, $usuario, $contrasena, $base);
$medicos = mysqli_connect($servidor, $usuario, $contrasena, $base);
$turnos = mysqli_connect($servidor, $usuario, $contrasena, $base);
?>