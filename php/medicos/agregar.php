<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Médico</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
</head>
<body>
<div class="container">
        <div class="contenido">
            <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="medicos.php">VOLVER</a>
            <div class="titulo" style="box-shadow: none;">AGREGAR NUEVO MÉDICO</div>
            <form id="turnoForm" class="formulario" action="insertar.php" method="post">
                <label for="NombreCompletoM" class="required">Nombre Completa:</label>
                <input type="text" id="NombreCompletoM" name="NombreCompletoM" placeholder="Ingrese Nombre Completo" required>
                <label for="EspecialidadMedica" class="required">Especialidad:</label>
                <input type="text" id="EspecialidadMedica" name="EspecialidadMedica" placeholder="Ingrese Especialidad Médica" required>
                <label for="TelefonoContactoM" class="required">Número Telefónico:</label>
                <input type="number" id="TelefonoContactoM" name="TelefonoContactoM" placeholder="Ingrese Nº de Teléfono" required>
                <label for="DireccionConsulta" class="required">Dirección:</label>
                <input type="text" id="DireccionConsulta" name="DireccionConsulta" placeholder="Ingrese Dirección de Consulta" required>
                <br><div class="enviar"><input type="submit" value="ENVIAR"></div>
            </form>
        </div>
    </div>
    <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</div>