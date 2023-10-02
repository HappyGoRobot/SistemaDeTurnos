<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos: Turno</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script src="../../js/horarios.js"></script>
    <script src="../../js/confirmar.js"></script>
</head>
<body>
    <a class="volver" href="turnos.php">VOLVER</a>
    <div class="container">
        <div class="contenido">
            <div class="titulo" style="box-shadow: none;">MODIFICAR DATOS: TURNO</div>
                <form action="actualizar.php" class="formulario" method="post">
                    <input type="hidden" name="idturno" value="<?php echo $_GET['idturno'];?>">
                    <label for="dni" class="required" style="margin-top: 10px;">DNI DEL PACIENTE:</label>
                    <input type="number" id="dni" name="dni" value="<?php echo $_GET['dni'];?>" maxlength="8" required>
                    <label for="idmedico" class="required">MÉDICO:</label><br>
                    <select name="idmedico" id="idmedico" onchange="cargarDiasYHorarios()">
                    <option value="" disabled selected>Seleccione un Médico</option>
                    <optgroup label="Pediatría">
                        <option value="1">Hugo Morales</option>
                        <option value="2">Emma Gómez</option>
                    </optgroup>
                    <optgroup label="Cardiología">
                        <option value="3">Enrique Godoy</option>
                        <option value="4">Ulises Molina</option>
                    </optgroup>
                    <optgroup label="Dermatología">
                        <option value="5">Anna Carrizo</option>
                        <option value="6">Lucía Chávez</option>
                    </optgroup>
                    <optgroup label="Hematología">
                        <option value="7">Mariana Paz</option>
                        <option value="8">Manuel Vera</option>
                    </optgroup>
                    </select>
                    <div id="diasYHorariosDisponibles"></div>
                    <label for="estado" class="required">ESTADO:</label><br>
                    <input type="radio" name="estado" value="En Espera" required>En Espera<br>
                    <input type="radio" name="estado" value="Atendido" required>Atendido<br>
                    <input type="radio" name="estado" value="Cancelado" required>Cancelado<br>
                    <div class="enviar"><input type="submit" id="modificar" value="MODIFICAR" onclick="confirmar();"></div>
                </form>
            </div>
        </div>
        <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>