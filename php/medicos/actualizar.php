<?php
require_once("../../conectar.php");

$peticion = mysqli_query($medicos, "UPDATE medicos SET 
    NombreCompletoM = '".$_POST['NombreCompletoM']."',
    EspecialidadMedica = '".$_POST['EspecialidadMedica']."',
    TelefonoContactoM = '".$_POST['TelefonoContactoM']."',
    DireccionConsulta = '".$_POST['DireccionConsulta']."'
    WHERE ID_Medico = '".$_POST['ID_Medico']."'
    LIMIT 1");

if($peticion){
    header("Location: ../../index.php");
}
?>