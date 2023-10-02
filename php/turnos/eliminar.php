<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "DELETE FROM turnos WHERE idturno = '".$_GET['idturno']."' LIMIT 1");

if($peticion){
    header("Location: turnos.php");
}
?>