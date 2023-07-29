<?php
require_once("./conectar.php");

$peticion = mysqli_query($pacientes, "INSERT INTO pacientes VALUES(NULL,
    '".$_POST['nombre']."',
    '".$_POST['apellido']."',
    '".$_POST['dni']."',
    '".$_POST['telefono']."',
    '".$_POST['fecha']."',
    '".$_POST['hora']."'
    )");

if($peticion){
    header("Location: ../index.php");
}

?>