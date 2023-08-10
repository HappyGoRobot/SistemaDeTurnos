<?php
require_once("./conectar.php");

$peticion = mysqli_query($pacientes, "DELETE FROM pacientes WHERE ID_Paciente = '".$_GET['ID_Paciente']."' LIMIT 1");
$peticion2 = mysqli_query($medicos, "DELETE FROM medicos WHERE ID_Medico = '".$_GET['ID_Medico']."' LIMIT 1");
$peticion3 = mysqli_query($turnos, "DELETE FROM turnos WHERE ID_Turno = '".$_GET['ID_Turno']."' LIMIT 1");

if($peticion){
    header("Location: ../index.php");
}
?>