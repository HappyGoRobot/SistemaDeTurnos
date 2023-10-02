<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "DELETE FROM turnos WHERE ID_Turno = '".$_GET['ID_Turno']."' LIMIT 1");

if($peticion){
    header("Location: turnos.php");
}
?>