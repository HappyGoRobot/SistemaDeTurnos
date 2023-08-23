<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css?v=<?php echo time();?>">
    <title>Modificar Datos - Paciente</title>
</head>
<body>
    <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="../index.php">VOLVER</a>
    <div class="container">
        <div class="contenido">
            <div class="titulo" style="box-shadow: none;">MODIFICAR DATOS PACIENTE</div>
                <form action="actualizar.php" class="formulario" method="post">
                <input type="hidden" name="ID_Paciente" value="<?php echo $_GET['ID_Paciente'];?>">
                <label for="NombreCompleto" class="required">Nombre Completo:</label>
                <input type="text" id="NombreCompleto" name="NombreCompleto" value="<?php echo $_GET['no'];?>" required>
                <label for="FechaNacimiento" class="required">Fecha de Nacimiento:</label>
                <input type="date" id="FechaNacimiento" name="FechaNacimiento" value="<?php echo $_GET['fn'];?>" required>
                <label for="" class="required">Género:</label><br>
                <input type="radio" name="Genero" value="Masculino" required>
                <label for="Masculino" style="font-weight: lighter;">Masculino</label><br>
                <input type="radio" name="Genero" value="Femenino" required>
                <label for="Femenino" style="font-weight: lighter;">Femenino</label><br>
                <label for="DNI" class="required">DNI:</label>
                <input type="number" id="DNI" name="DNI" value="<?php echo $_GET['dni'];?>" maxlength="8" required>
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
                <label for="DireccionPaciente" class="required">Dirección:</label>
                <input type="text" id="DireccionPaciente" name="DireccionPaciente" value="<?php echo $_GET['di'];?>" required>
                <label for="TelefonoContacto" class="required">Número Telefónico:</label>
                <input type="number" id="TelefonoContacto" name="TelefonoContacto" value="<?php echo $_GET['tf'];?>" required>
                <br>
                <div class="enviar"><input type="submit" value="MODIFICAR"></div>
                </form>
            </div>
        </div>
        <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>