<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos: Paciente</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script src="../../js/confirmar.js"></script>
</head>
<body>
    <a class="volver" href="pacientes.php">VOLVER</a>
    <div class="container">
        <div class="contenido">
            <div class="titulo" style="box-shadow: none;">MODIFICAR DATOS: PACIENTE</div>
                <form action="actualizar.php" class="formulario" method="post">
                <input type="hidden" name="idpaciente" value="<?php echo $_GET['idpaciente'];?>">
                <label for="nombrepaciente" class="required">NOMBRE COMPLETO:</label>
                <input type="text" id="nombrepaciente" name="nombrepaciente" value="<?php echo $_GET['no'];?>" required>
                <label for="fechanacimiento" class="required">FECHA DE NACIMIENTO:</label>
                <input type="date" id="fechanacimiento" name="fechanacimiento" value="<?php echo $_GET['fn'];?>" required>
                <label for="sexo" class="required">SEXO:</label><br>
                <input type="radio" name="sexo" value="M" required>
                <label for="M" style="font-weight: lighter;">M</label><br>
                <input type="radio" name="sexo" value="F" required>
                <label for="F" style="font-weight: lighter;">F</label><br>
                <label for="DNI" class="required">DNI:</label>
                <input type="number" id="dni" name="dni" value="<?php echo $_GET['dni'];?>" maxlength="8" required>
                <label for="idobrasocia;" class="required">OBRA SOCIAL:</label><br>
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
                <input type="text" id="telefonopaciente" name="telefonopaciente" value="<?php echo $_GET['tf'];?>" required>
                <br>
                <label for="direccionpaciente" class="required">DIRECCIÓN:</label>
                <input type="text" id="direccionpaciente" name="direccionpaciente" value="<?php echo $_GET['di'];?>" required>
                <div class="enviar"><input type="submit" id="modificar" value="MODIFICAR" onclick="confirmar();"></div>
                </form>
            </div>
        </div>
        <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>