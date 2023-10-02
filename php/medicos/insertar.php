<?php
require_once("../conectar.php");

$peticion = mysqli_query($medicos, "INSERT INTO medicos VALUES(NULL,
    '".$_POST['NombreCompletoM']."',
    '".$_POST['EspecialidadMedica']."',
    '".$_POST['TelefonoContactoM']."',
    '".$_POST['DireccionConsulta']."'
    )");

if($peticion){
    header("Location: ../../index.php");
}
?>