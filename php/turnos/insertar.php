<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "INSERT INTO turnos VALUES(NULL,
    '".$_POST['DNI']."',
    '".$_POST['DiaHora']."',
    '".$_POST['Medico']."',
    '".$_POST['Estado']."',
    '".$_POST['Observaciones']."'
    )");

if($peticion){
    header("Location: turnos.php");
}
?>