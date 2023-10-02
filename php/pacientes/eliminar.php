<?php
require_once("../conectar.php");

$peticion = mysqli_query($pacientes, "DELETE FROM pacientes WHERE idpaciente = '".$_GET['idpaciente']."' LIMIT 1");

if($peticion){
    header("Location: pacientes.php");
}
?>