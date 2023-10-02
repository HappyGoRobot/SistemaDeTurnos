<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo: Médico</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
</head>
<body>
<div class="container">
        <div class="contenido">
            <a class="volver" href="medicos.php">VOLVER</a>
            <div class="titulo" style="box-shadow: none;">AGREGAR NUEVO: MÉDICO</div>
            <form id="turnoForm" class="formulario" action="insertar.php" method="post">
                <label for="nombremedico" class="required">NOMBRE COMPLETO:</label>
                <input type="text" id="nombremedico" name="nombremedico" placeholder="Ingrese Nombre Completo" required>
                <label for="idespecialidad" class="required">ESPECIALIDAD:</label><br>
                    <select name="idespecialidad" id="idespecialidad" required>
                        <option value="" disabled selected>Seleccione una Especialidad</option>
                        <option value=1>Pediatría</option>
                        <option value=2>Cardiología</option>
                        <option value=3>Dermatología</option>
                        <option value=4>Hematología</option>
                    </select><br>
                <label for="telefonomedico" class="required">NÚMERO TELEFÓNICO:</label>
                <input type="text" id="telefonomedico" name="telefonomedico" placeholder="Ingrese Nº de Teléfono" required>
                <label for="direccionmedico" class="required">DIRECCIÓN:</label>
                <input type="text" id="direccionmedico" name="direccionmedico" placeholder="Ingrese Dirección de Consulta" required>
                <br><div class="enviar"><input type="submit" value="ENVIAR"></div>
            </form>
        </div>
    </div>
    <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</div>