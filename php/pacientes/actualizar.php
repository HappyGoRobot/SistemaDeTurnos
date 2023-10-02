<?php
require_once("../conectar.php");

$peticion = mysqli_query($pacientes, "UPDATE pacientes SET 
    NombreCompleto = '".$_POST['NombreCompleto']."',
    FechaNacimiento = '".$_POST['FechaNacimiento']."',
    Genero = '".$_POST['Genero']."',
    DNI = '".$_POST['DNI']."',
    id_os = '".$_POST['id_os']."',
    DireccionPaciente = '".$_POST['DireccionPaciente']."',
    TelefonoContacto = '".$_POST['TelefonoContacto']."'
    WHERE ID_Paciente = '".$_POST['ID_Paciente']."'
    LIMIT 1");

if($peticion){
    header("Location: ../../index.php");
}
?>