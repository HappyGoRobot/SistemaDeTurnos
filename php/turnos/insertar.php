<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "INSERT INTO turnos VALUES(NULL,
    '".$_POST['dni']."',
    '".$_POST['diahora']."',
    '".$_POST['idmedico']."',
    '".$_POST['estado']."'
    )");

if($peticion){
    header("Location: turnos.php");
}
?>