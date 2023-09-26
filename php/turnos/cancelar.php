<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "UPDATE turnos SET Estado='Cancelado' WHERE ID_Turno='".$_GET['ID_Turno']."' LIMIT 1");

if($peticion){
    header("Location: consultar.php");
}
?>