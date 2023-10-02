<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "UPDATE turnos SET estado='Cancelado' WHERE idturno='".$_GET['idturno']."' LIMIT 1");

if($peticion){
    header("Location: consultar.php");
}
?>