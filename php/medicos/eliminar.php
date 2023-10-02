<?php
require_once("../conectar.php");

$peticion = mysqli_query($medicos, "DELETE FROM medicos WHERE ID_Medico = '".$_GET['ID_Medico']."' LIMIT 1");

if($peticion){
    header("Location: medicos.php");
}
?>