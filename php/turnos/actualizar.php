<?php
require_once("../conectar.php");

$peticion = mysqli_query($turnos, "UPDATE turnos SET
    DNI = '".$_POST['DNI']."',
    DiaHora = '".$_POST['DiaHora']."',
    Medico = '".$_POST['Medico']."',
    Estado = '".$_POST['Estado']."',
    Observaciones = '".$_POST['Observaciones']."'
    WHERE ID_Turno = '".$_POST['ID_Turno']."'
    LIMIT 1");

if($peticion){
    header("Location: turnos.php");
}
?>