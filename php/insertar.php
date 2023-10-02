<?php
require_once("./conectar.php");

$peticion = mysqli_query($pacientes, "INSERT INTO pacientes VALUES(NULL,
    '".$_POST['NombreCompleto']."',
    '".$_POST['FechaNacimiento']."',
    '".$_POST['Genero']."',
    '".$_POST['DNI']."',
    '".$_POST['id_os']."',
    '".$_POST['DireccionPaciente']."',
    '".$_POST['TelefonoContacto']."'
    )");

$peticion2 = mysqli_query($turnos, "INSERT INTO turnos VALUES(NULL,
    '".$_POST['DNI']."',
    '".$_POST['DiaHora']."',
    '".$_POST['Medico']."',
    '".$_POST['Estado']."',
    '".$_POST['Observaciones']."'
    )");

if($peticion){
    header("Location: formulario.php");
}
?>