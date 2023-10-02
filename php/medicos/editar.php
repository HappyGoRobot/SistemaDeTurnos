<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos: Médico</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script src="../../js/confirmar.js"></script>
</head>
<body>
    <a class="volver" href="medicos.php">VOLVER</a>
    <div class="container">
        <div class="contenido">
            <div class="titulo" style="box-shadow: none;">MODIFICAR DATOS: MÉDICO</div>
                <form action="actualizar.php" class="formulario" method="post">
                <input type="hidden" name="idmedico" value="<?php echo $_GET['idmedico'];?>">
                <label for="nombremedico" class="required">NOMBRE COMPLETO:</label>
                <input type="text" id="nombremedico" name="nombremedico" value="<?php echo $_GET['ncm'];?>" required>
                <label for="idespecialidad" class="required">ESPECIALIDAD:</label><br>
                    <select name="idespecialidad" id="idespecialidad" required>
                        <option value="" disabled selected>Seleccione una Especialidad</option>
                        <option value=1>Pediatría</option>
                        <option value=2>Cardiología</option>
                        <option value=3>Dermatología</option>
                        <option value=4>Hematología</option>
                    </select><br>
                <label for="telefonomedico" class="required">NÚMERO TELEFÓNICO:</label>
                <input type="text" id="telefonomedico" name="telefonomedico" value="<?php echo $_GET['tfc'];?>" maxlength="8" required>
                <label for="direccionmedico" class="required">DIRECCIÓN:</label>
                <input type="text" id="direccionmedico" name="direccionmedico" value="<?php echo $_GET['dc'];?>" required><br>
                <div class="enviar"><input type="submit" id="modificar" value="MODIFICAR" onclick="confirmar();"></div>
                </form>
            </div>
        </div>
        <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>