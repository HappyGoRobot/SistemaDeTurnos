<?php
require_once("../conectar.php");

$peticion = mysqli_query($pacientes, "INSERT INTO pacientes VALUES(NULL,
    '".$_POST['nombrepaciente']."',
    '".$_POST['fechanacimiento']."',
    '".$_POST['sexo']."',
    '".$_POST['dni']."',
    '".$_POST['idobrasocial']."',
    '".$_POST['telefonopaciente']."',
    '".$_POST['direccionpaciente']."'
    )");

if($peticion){
    header("Location: pacientes.php");
}
?>