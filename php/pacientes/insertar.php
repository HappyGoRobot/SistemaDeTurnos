<?php
require_once("../conectar.php");

$peticion = mysqli_query($pacientes, "INSERT INTO pacientes VALUES(NULL,
    '".$_POST['NombreCompleto']."',
    '".$_POST['FechaNacimiento']."',
    '".$_POST['Genero']."',
    '".$_POST['DNI']."',
    '".$_POST['id_os']."',
    '".$_POST['DireccionPaciente']."',
    '".$_POST['TelefonoContacto']."'
    )");

if($peticion){
    header("Location: pacientes.php");
}
?>