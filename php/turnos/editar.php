<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos - Turno</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script src="../../js/horarios.js"></script>
    <script src="../../js/confirmar.js"></script>
</head>
<body>
    <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="turnos.php">VOLVER</a>
    <div class="container">
        <div class="contenido">
            <div class="titulo" style="box-shadow: none;">MODIFICAR DATOS TURNO</div>
                <form action="actualizar.php" class="formulario" method="post">
                    <input type="hidden" name="ID_Turno" value="<?php echo $_GET['ID_Turno'];?>">
                    <label for="DNI" class="required" style="margin-top: 10px;">DNI DEL PACIENTE:</label>
                    <input type="number" id="DNI" name="DNI" value="<?php echo $_GET['dni'];?>" maxlength="8" required>
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
                    <label for="Estado" class="required">ESTADO:</label><br>
                    <input type="radio" name="Estado" value="En Espera" required>En Espera<br>
                    <input type="radio" name="Estado" value="Atendido" required>Atendido<br>
                    <input type="radio" name="Estado" value="Cancelado" required>Cancelado<br>
                    <label for="Observaciones" class="required">OBSERVACIONES:</label>
                    <input type="text" id="Observaciones" name="Observaciones" value="<?php echo $_GET['ob'];?>">
                    <div class="enviar"><input type="submit" id="modificar" value="MODIFICAR" onclick="confirmar();"></div>
                </form>
            </div>
        </div>
        <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>