<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "UPDATE turnos SET
    dni = '".$_POST['dni']."',
    diahora = '".$_POST['diahora']."',
    idmedico = '".$_POST['idmedico']."',
    estado = '".$_POST['estado']."'
    WHERE idturno = '".$_POST['idturno']."'
    LIMIT 1");

if($peticion){
    header("Location: turnos.php");
}
?>