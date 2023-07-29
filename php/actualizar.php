<?php
require_once("./conectar.php");

$peticion = mysqli_query($pacientes, "UPDATE pacientes SET 
    nombre = '".$_POST['nombre']."',
    apellido = '".$_POST['apellido']."',
    dni = '".$_POST['dni']."',
    telefono = '".$_POST['telefono']."',
    fecha = '".$_POST['fecha']."',
    hora = '".$_POST['hora']."'
    WHERE idpaciente = '".$_POST['idpaciente']."'
    LIMIT 1"); 

if($peticion){
    header("Location: ../index.php");
}

?>