<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos - Médico</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script>
    function confirmar() {
        var resultado = confirm("¿Está seguro de querer modificar este registro?");
        if(resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            location.reload();
        }
    }
    </script>
</head>
<body>
    <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="turnos.php">VOLVER</a>
    <div class="container">
        <div class="contenido">
            <div class="titulo" style="box-shadow: none;">MODIFICAR DATOS TURNO</div>
                <form action="actualizar.php" class="formulario" method="post">
                <input type="hidden" name="ID_Turno" value="<?php echo $_GET['ID_Turno'];?>">
                <label for="DNI" class="required">Paciente:</label>
                <input type="text" id="NombreCompleto" name="NombreCompletoM" value="<?php echo $_GET['ncm'];?>" required>
                
                <label for="EspecialidadMedica" class="required">Especialidad:</label>
                <input type="text" id="EspecialidadMedica" name="EspecialidadMedica" value="<?php echo $_GET['es'];?>" required>
                
                <label for="TelefonoContactoM" class="required">Teléfono:</label>
                <input type="number" id="TelefonoContactoM" name="TelefonoContactoM" value="<?php echo $_GET['tfc'];?>" maxlength="8" required>
                
                <label for="DireccionConsulta" class="required">Dirección:</label>
                <input type="text" id="DireccionConsulta" name="DireccionConsulta" value="<?php echo $_GET['dc'];?>" required>
                
                <br>
                <div class="enviar"><input type="submit" value="MODIFICAR" onclick="confirmar();"></div>
                </form>
            </div>
        </div>
        <footer style="margin: 0;">Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>