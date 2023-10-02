<?php
require_once("../conectar.php");

$peticion = mysqli_query($medicos, "INSERT INTO medicos VALUES(NULL,
    '".$_POST['nombremedico']."',
    '".$_POST['idespecialidad']."',
    '".$_POST['telefonomedico']."',
    '".$_POST['direccionmedico']."'
    )");

if($peticion){
    header("Location: medicos.php");
}
?>