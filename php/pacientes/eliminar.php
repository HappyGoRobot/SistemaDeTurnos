<?php
require_once("../conectar.php");

$peticion = mysqli_query($pacientes, "DELETE FROM pacientes WHERE ID_Paciente = '".$_GET['ID_Paciente']."' LIMIT 1");

if($peticion){
    header("Location: pacientes.php");
}
?>