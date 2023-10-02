<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Paciente</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
</head>
<body>
<div class="container">
        <div class="contenido">
            <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="pacientes.php">VOLVER</a>
            <div class="titulo" style="box-shadow: none;">AGREGAR NUEVO PACIENTE</div>
            <form id="turnoForm" class="formulario" action="insertar.php" method="post">
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
                <br><div class="enviar"><input type="submit" value="ENVIAR"></div>
            </form>
        </div>
    </div>
    <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</div>