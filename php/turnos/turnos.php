<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de: Turnos</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script src="../../js/confirmar.js"></script>
</head>
<body>
    <a class="volver" href="../administrador.php">VOLVER</a>
    <div align="center"><h1>ADMINISTRADOR DE: TURNOS</h1></div>
    <?php
    require_once("../../php/conectar.php");
    $peticion = mysqli_query($turnos, "SELECT turnos.*, pacientes.nombrepaciente, medicos.nombremedico FROM turnos, pacientes, medicos WHERE pacientes.dni = turnos.dni AND medicos.idmedico = turnos.idmedico");
echo '
    <div align="center">
    <div class="tabla">
    <div align="left"><div class="titulo">TURNOS</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>DÍA Y HORA</th>
                <th>PACIENTE</th>
                <th>MÉDICO</th>
                <th>ESTADO</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion) > 0){
            while($turnos = mysqli_fetch_assoc($peticion)){
                echo '
                <tr>
                    <td>'.$turnos['diahora'].'</td>
                    <td>'.$turnos['nombrepaciente'].'</td>
                    <td>'.$turnos['nombremedico'].'</td>
                    <td>'.$turnos['estado'].'</td>
                    <td><a class="actualizar" href="editar.php?idturno='.$turnos['idturno'].'&dni='.$turnos['dni'].'&dh='.$turnos['diahora'].'&es='.$turnos['estado'].'">ACTUALIZAR</a> ✔️</td>
                    <td><a class="eliminar" href="eliminar.php?idturno='.$turnos['idturno'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="8">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table> <br><button><a href="agregar.php">AGREGAR NUEVO TURNO</a></button></div>';
?>
<footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>