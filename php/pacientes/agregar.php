<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo: Paciente</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
</head>
<body>
<div class="container">
        <div class="contenido">
            <a class="volver" href="pacientes.php">VOLVER</a>
            <div class="titulo" style="box-shadow: none;">AGREGAR NUEVO: PACIENTE</div>
            <form class="formulario" action="insertar.php" method="post">
                <label for="nombrepaciente" class="required">NOMBRE COMPLETO:</label>
                <input type="text" id="nombrepaciente" name="nombrepaciente" placeholder="Ingrese su Nombre Completo" required>
                <label for="fechanacimiento" class="required">FECHA DE NACIMIENTO:</label>
                <input type="date" id="fechanacimiento" name="fechanacimiento" required>
                <label for="sexo" class="required">SEXO:</label><br>
                <input type="radio" name="sexo" value="M" required>M<br>
                <input type="radio" name="sexo" value="F" required>F<br>
                <label for="dni" class="required" style="margin-top: 10px;">DNI:</label>
                <input type="number" id="dni" name="dni" placeholder="Ingrese su Nº de DNI" maxlength="8" required>
                <label for="idobrasocial" class="required">OBRA SOCIAL:</label><br>
                <select name="idobrasocial" id="idobrasocial" required>
                    <option value="" disabled selected>Seleccione una Obra Social</option>
                    <option value=1>DAMSU</option>
                    <option value=2>Jerárquicos</option>
                    <option value=3>Obra Social Provincia</option>
                    <option value=4>OSECAC</option>
                    <option value=5>OSTES</option>
                    <option value=6>Sancor Salud</option>
                </select><br>
                <label for="telefonopaciente" class="required">NÚMERO TELEFÓNICO:</label>
                <input type="text" id="telefonopaciente" name="telefonopaciente" placeholder="Ingrese su Nº de Teléfono" required>
                <label for="direccionpaciente" class="required">DIRECCIÓN:</label>
                <input type="text" id="direccionpaciente" name="direccionpaciente" placeholder="Ingrese su Domicilio" required>
                <br><div class="enviar"><input type="submit" value="ENVIAR"></div>
            </form>
        </div>
    </div>
    <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</div>