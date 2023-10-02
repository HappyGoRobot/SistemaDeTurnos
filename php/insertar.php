<?php
require_once("./conectar.php");

$peticion = mysqli_query($pacientes, "INSERT INTO pacientes VALUES(NULL,
    '".$_POST['nombrepaciente']."',
    '".$_POST['fechanacimiento']."',
    '".$_POST['sexo']."',
    '".$_POST['dni']."',
    '".$_POST['idobrasocial']."',
    '".$_POST['direccionpaciente']."',
    '".$_POST['telefonopaciente']."'
    )");

$peticion2 = mysqli_query($turnos, "INSERT INTO turnos VALUES(NULL,
    '".$_POST['dni']."',
    '".$_POST['diahora']."',
    '".$_POST['idmedico']."',
    '".$_POST['estado']."'
    )");

if($peticion){
    header("Location: formulario.php");
}
?>