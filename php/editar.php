<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css?v=<?php echo time(); ?>">
    <title>Modificar Turno</title>
</head>
<body>
<div class="container">
        <div class="contenido">
            <div class="titulo">MODIFICAR TURNO</div>
            <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="../index.php">VOLVER</a>
            <br>
        <form action="actualizar.php" method="post">
        <input type="hidden" name="idpaciente" value="<?php echo $_GET['idpaciente'];?>">

        <b>DATOS PERSONALES</b><br>
        <label for="nombre" class="required">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $_GET['no']; ?>">
        
        <label for="apellido" class="required">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $_GET['ap']; ?>">
        
        <label for="dni" class="required">DNI:</label>
        <input type="number" name="dni" value="<?php echo $_GET['dni']; ?>" maxlength="8">
    
        <label for="telefono" class="required">Número Telefónico:</label>
        <input type="number" name="telefono" value="<?php echo $_GET['tf']; ?>" maxlength="10">

        <br><br><b>SELECCIÓN DE TURNO</b><br>
        <label for="fecha" class="required">Día:</label>
        <input type="date" name="fecha" value="<?php echo $_GET['fh']; ?>">
    
        <label for="hora" class="required">Hora:</label>
        <input type="time" name="hora" value="<?php echo $_GET['hr']; ?>">
    
        <br><div align="center"><input type="submit" value="ACTUALIZAR"></div>
    </form>
</div>
</div>
</body>
</html>