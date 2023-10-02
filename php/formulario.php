<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicite Su Turno</title>
    <link rel="stylesheet" href="../styles.css?v=<?php echo time();?>">
    <script src="../js/horarios.js"></script>
</head>
<script>
window.onload = function() {
    document.getElementById('send').onclick = function(e) {
        alert("Tu número de turno es:" + document.getElementById("ID_Turno").value);
        return false;
    }
}
function enviar() {
    var turno = document.getElementById("ID_Turno").value;
    var text = "Tu número de turno es:";
    alert(text + turno);
    return false;
}
</script>
<body>
<a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="../index.php">VOLVER</a>
    <div class="container">
        <div class="contenido">
            <div class="titulo" style="box-shadow: none;">SOLICITE SU TURNO AQUI</div>
            <form id="turnoForm" class="formulario" action="insertar.php" method="post">
                <div class="datospersonales">
                    <span style="font-size: 18px; font-weight: bold;">DATOS PERSONALES</span><br>
                    <label for="NombreCompleto" class="required">NOMBRE COMPLETO:</label>
                    <input type="text" id="NombreCompleto" name="NombreCompleto" placeholder="Ingrese su Nombre Completo" required>
                    <label for="FechaNacimiento" class="required">FECHA DE NACIMIENTO:</label>
                    <input type="date" id="FechaNacimiento" name="FechaNacimiento" required>
                    <label for="Genero" class="required">GÉNERO:</label><br>
                    <input type="radio" name="Genero" value="Masculino" required>Masculino<br>
                    <input type="radio" name="Genero" value="Femenino" required>Femenino<br>
                    <label for="DNI" class="required" style="margin-top: 10px;">DNI:</label>
                    <input type="number" id="DNI" name="DNI" placeholder="Ingrese su Nº de DNI" maxlength="8" required>
                    <label for="id_os" class="required">OBRA SOCIAL:</label><br>
                    <select name="id_os" id="id_os" required>
                        <option value="" disabled selected>Seleccione una Obra Social</option>
                        <option value=1>DAMSU</option>
                        <option value=2>Jerárquicos</option>
                        <option value=3>Obra Social Provincia</option>
                        <option value=4>OSECAC</option>
                        <option value=5>OSTES</option>
                        <option value=6>Sancor Salud</option>
                    </select><br>
                    <label for="TelefonoContacto" class="required">NÚMERO TELEFÓNICO:</label>
                    <input type="number" id="TelefonoContacto" name="TelefonoContacto" placeholder="Ingrese su Nº de Teléfono" required>
                    <label for="DireccionPaciente" class="required">DIRECCIÓN:</label>
                    <input type="text" id="DireccionPaciente" name="DireccionPaciente" placeholder="Ingrese su Domicilio" required>
                    </div>
                    <div class="datosturnos">
                    <span style="font-size: 18px; font-weight: bold;">SELECCIÓN DE TURNO</span><br>
                    <label for="Medico" class="required">MÉDICO:</label><br>
                    <select name="Medico" id="Medico" onchange="cargarDiasYHorarios()">
                    <option value="" disabled selected>Seleccione un Médico</option>
                    <optgroup label="Especialidad 1">
                        <option value="1">Médico 1</option>
                        <option value="2">Médico 2</option>
                        <option value="3">Médico 3</option>
                    </optgroup>
                    </select>
                    <div id="diasYHorariosDisponibles"></div><br>
                    </div>
                    <input type="hidden" id="Estado" name="Estado" value="En Espera">
                    <input type="hidden" id="Observaciones" name="Observaciones" value="">
                    <br><div class="enviar"><input type="submit" onclick="enviar()" value="ENVIAR"></div>
            </form>
        </div>
    </div>
    <footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>