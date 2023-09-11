<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Turnos</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script>
    function confirmar() {
        var resultado = confirm("¿Está seguro de querer eliminar este registro?");
        if(resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            location.reload();
        }
    }
    </script>
</head>
<body>
<!--<nav>
        <ul>
            <li>
                <a href="">Complete con sus Datos</a>
            </li>
            <li><a href="">Seleccione Especialidad</a></li>
            <li><a href="">Seleccione Turno Disponible</a></li>
            <li><a href="">Seleccione Obra Social</a></li>
        </ul>
    </nav>--->
    <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="../../index.php">VOLVER</a>
    <div align="center"><h1>ADMINISTRADOR DE: TURNOS</h1></div>

    <?php
    require_once("../../php/conectar.php");
    $peticion3 = mysqli_query($turnos, "SELECT turnos.*, pacientes.NombreCompleto, medicos.NombreCompletoM FROM turnos, pacientes, medicos WHERE pacientes.DNI = turnos.DNI AND medicos.ID_Medico = turnos.Medico");

echo '
    <div align="center">
    <div class="tabla">
    <div align="left"><div class="titulo">TURNOS</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <!--<th>FECHA</th>!-->
                <th>DÍA Y HORA</th>
                <th>PACIENTE</th>
                <th>MÉDICO</th>
                <th>ESTADO</th>
                <th>OBSERVACIONES</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion3) > 0){
            while($turnos = mysqli_fetch_assoc($peticion3)){
                echo '
                <tr>
                    <!--<td>'.date("d-m-Y", strtotime($turnos['Fecha'])).'</td>!-->
                    <td>'.$turnos['DiaHora'].'</td>
                    <td>'.$turnos['NombreCompleto'].'</td>
                    <td>'.$turnos['NombreCompletoM'].'</td>
                    <td>'.$turnos['Estado'].'</td>
                    <td>'.$turnos['Observaciones'].'</td>
                    <td></td>
                    <td><a class="eliminar" href="../eliminar.php?ID_Turno='.$turnos['ID_Turno'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="8">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table></div>';
?>
<footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>