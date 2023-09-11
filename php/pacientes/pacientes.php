<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Turnos</title>
    <link rel="stylesheet" href="../../styles.css">
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
    <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="../home.php">VOLVER</a>
    <div align="center"><h1>ADMINISTRADOR DE: PACIENTES</h1></div>

    <?php
    require_once("../../php/conectar.php");
    $peticion = mysqli_query($pacientes, "SELECT pacientes.*, obrasocial.obrasocial FROM pacientes, obrasocial WHERE obrasocial.id_os = pacientes.id_os");

    echo '
    <div align="center">
    <div class="tabla">
    <div align="left"><div class="titulo">PACIENTES</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>NOMBRE COMPLETO</th>
                <th>FECHA DE NACIMIENTO</th>
                <th>GÉNERO</th>
                <th>DNI</th>
                <th>OBRA SOCIAL</th>
                <th>TELÉFONO</th>
                <th>DIRECCIÓN</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion) > 0){
            while($pacientes = mysqli_fetch_assoc($peticion)){
                echo '
                <tr>
                    <td>'.$pacientes['NombreCompleto'].'</td>
                    <td>'.date("d-m-Y", strtotime($pacientes['FechaNacimiento'])).'</td>
                    <td>'.$pacientes['Genero'].'</td>
                    <td>'.$pacientes['DNI'].'</td>
                    <td>'.$pacientes['obrasocial'].'</td>
                    <td>'.$pacientes['TelefonoContacto'].'</td>
                    <td>'.$pacientes['DireccionPaciente'].'</td>
                    <td><a class="actualizar" href="editar.php?ID_Paciente='.$pacientes['ID_Paciente'].'&no='.$pacientes['NombreCompleto'].'&fn='.$pacientes['FechaNacimiento'].'&gr='.$pacientes['Genero'].'&dni='.$pacientes['DNI'].'&ss='.$pacientes['obrasocial'].'&di='.$pacientes['DireccionPaciente'].'&tf='.$pacientes['TelefonoContacto'].'">ACTUALIZAR</a> ✔️</td>
                    <td><a class="eliminar" href="../eliminar.php?ID_Paciente='.$pacientes['ID_Paciente'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="9">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table></div>';
?>
<footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>