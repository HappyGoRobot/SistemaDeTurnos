<?php
require_once("../conectar.php");

$peticion = mysqli_query($pacientes, "UPDATE pacientes SET 
    nombrepaciente = '".$_POST['nombrepaciente']."',
    fechanacimiento = '".$_POST['fechanacimiento']."',
    sexo = '".$_POST['sexo']."',
    dni = '".$_POST['dni']."',
    idobrasocial = '".$_POST['idobrasocial']."',
    telefonopaciente = '".$_POST['telefonopaciente']."',
    direccionpaciente = '".$_POST['direccionpaciente']."'
    WHERE idpaciente = '".$_POST['idpaciente']."'
    LIMIT 1");

if($peticion){
    header("Location: pacientes.php");
}
?>