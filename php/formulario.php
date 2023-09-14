<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicite Su Turno</title>
    <link rel="stylesheet" href="../styles.css?v=<?php echo time();?>">
</head>
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
                    <!--<label for="Masculino">Masculino</label><br>!-->
                    <input type="radio" name="Genero" value="Femenino" required>Femenino<br>
                    <!--<label for="Femenino">Femenino</label><br>!-->

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

                    <!--<label for="ID_Medico" class="required">MÉDICO:</label><br>
                    <select name="Medico" id="Medico">
                        <option value="" disabled selected>Seleccione un Médico</option>
                        <optgroup label="Especialidad 1">
                            <option value=1>Médico 1</option>
                            <option value=2>Médico 2</option>
                            <option value=3>Médico 3</option>
                        </optgroup>
                        <optgroup label="Especialidad 2">
                            <option value=4>Médico 4</option>
                            <option value=5>Médico 5</option>
                            <option value=6>Médico 6</option>
                        </optgroup>
                    </select><br>

                    <label for="Fecha" class="required">DÍA:</label>
                    <input type="date" id="Fecha" name="Fecha">

                    <label for="Hora" class="required">HORA:</label>
                    <input type="time" id="Hora" name="Hora">!-->

                    <label for="ID_Medico" class="required">MÉDICO:</label><br>
                    <select name="Medico" id="Medico" onchange="cargarDiasYHorarios()">
                    <option value="" disabled selected>Seleccione un Médico</option>
                    <optgroup label="Especialidad 1">
                        <option value="1">Médico 1</option>
                        <option value="2">Médico 2</option>
                        <option value="3">Médico 3</option>
                    </optgroup>
                    </select>

                    <div id="diasYHorariosDisponibles"></div>
                    <br>

<script>
function cargarDiasYHorarios() {
    var medicoSeleccionado = document.getElementById("Medico").value;

    if (medicoSeleccionado == '1') {
        var diasDisponibles = ["Lunes", "Miércoles", "Viernes"];
        var horariosPorDia = {
            "Lunes": ["10:00 AM", "11:00 AM"],
            "Miércoles": ["09:00 AM", "10:00 AM", "11:00 AM"],
            "Viernes": ["01:00 PM", "02:00 PM"]
    };
}
    if (medicoSeleccionado == '2') {
        var diasDisponibles = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
        var horariosPorDia = {
            "Lunes": ["10:00 AM", "11:00 AM"],
            "Martes": ["02:00 PM", "03:00 PM"],
            "Miércoles": ["09:00 AM", "10:00 AM", "11:00 AM"],
            "Jueves": ["03:00 PM", "04:00 PM"],
            "Viernes": ["01:00 PM", "02:00 PM"]
    };
}
    else {
        var diasDisponibles = ["Lunes", "Martes", "Miércoles"];
        var horariosPorDia = {
            "Lunes": ["09:00 AM", "10:00 AM", "11:00 AM"],
            "Martes": ["02:00 PM", "03:00 PM", "04:00 PM", "05:00 PM"],
            "Miércoles": ["09:00 AM", "10:00 AM", "11:00 AM"]
    };
}

    var diasYHorariosDiv = document.getElementById("diasYHorariosDisponibles");
    diasYHorariosDiv.innerHTML = "<p><label for='' class='required'>DÍAS Y HORARIOS DISPONIBLES:</label></p>";
    for (var i = 0; i < diasDisponibles.length; i++) {
        var dia = diasDisponibles[i];
        var horarios = horariosPorDia[dia];
        diasYHorariosDiv.innerHTML += "<p><b>" + dia + "</b></p>";
        for (var j = 0; j < horarios.length; j++) {
            diasYHorariosDiv.innerHTML += "<input type='radio' name='DiaHora' value='" + dia + " - " + horarios[j] + "'>" + horarios[j] + "<br>";
        }
    }
}
</script>
                    </div>

                    <input type="hidden" id="Estado" name="Estado" value="En Espera">
                    <input type="hidden" id="Observaciones" name="Observaciones" value="">

                    <br><div class="enviar"><input type="submit" value="ENVIAR"></div>
            </form>
        </div>
    </div>
    <footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>