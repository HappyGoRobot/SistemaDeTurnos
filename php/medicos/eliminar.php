<?php
require_once("../conectar.php");

$peticion = mysqli_query($medicos, "DELETE FROM medicos WHERE idmedico = '".$_GET['idmedico']."' LIMIT 1");

if($peticion){
    header("Location: medicos.php");
}
?>