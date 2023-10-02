<?php
require_once("../conectar.php");

$peticion = mysqli_query($medicos, "UPDATE medicos SET 
    nombremedico = '".$_POST['nombremedico']."',
    idespecialidad = '".$_POST['idespecialidad']."',
    telefonomedico = '".$_POST['telefonomedico']."',
    direccionmedico = '".$_POST['direccionmedico']."'
    WHERE idmedico = '".$_POST['idmedico']."'
    LIMIT 1");

if($peticion){
    header("Location: medicos.php");
}
?>