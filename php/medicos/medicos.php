<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de: Médicos</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script src="../../js/confirmar.js"></script>
</head>
<body>
    <a class="volver" href="../administrador.php">VOLVER</a>
    <div align="center"><h1>ADMINISTRADOR DE: MÉDICOS</h1></div>
    <?php
    require_once("../../php/conectar.php");
    $peticion = mysqli_query($medicos, "SELECT medicos.*, especialidad.especialidad FROM medicos, especialidad WHERE especialidad.idespecialidad = medicos.idespecialidad");
    echo '
    <div align="center">
    <div class="tabla">
    <div align="left"><div class="titulo">MÉDICOS</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>NOMBRE COMPLETO</th>
                <th>ESPECIALIDAD</th>
                <th>TELÉFONO</th>
                <th>DIRECCIÓN</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion) > 0){
            while($medicos = mysqli_fetch_assoc($peticion)){
                echo '
                <tr>
                    <td>'.$medicos['nombremedico'].'</td>
                    <td>'.$medicos['especialidad'].'</td>
                    <td>'.$medicos['telefonomedico'].'</td>
                    <td>'.$medicos['direccionmedico'].'</td>
                    <td><a class="actualizar" href="editar.php?idmedico='.$medicos['idmedico'].'&ncm='.$medicos['nombremedico'].'&es='.$medicos['idespecialidad'].'&tfc='.$medicos['telefonomedico'].'&dc='.$medicos['direccionmedico'].'">ACTUALIZAR</a> ✔️</td>
                    <td><a class="eliminar" href="eliminar.php?idmedico='.$medicos['idmedico'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="6">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table> <br><button><a href="agregar.php">AGREGAR NUEVO MÉDICO</a></button></div>';
?>
<footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>