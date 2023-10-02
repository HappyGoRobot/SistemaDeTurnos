<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Turno</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
    <script src="../../js/confirmar.js"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
.container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-family: 'Open Sans', sans-serif;
    background-color: #DFDFDF;
}
form {
    background: transparent;
    border: none;
    box-shadow: none;
}
input[type=text] {
    width: 145px;
}
</style>
<body>
    <a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="../../index.php">VOLVER</a>
    <div class="container">
        <form action="" method="GET">
            <span style="font-size: 24px; font-weight: bold;">CONSULTA DE TURNO</span><br><br>
            <label for="ID_Turno"># DE TURNO:</label>
            <input type="text" id="ID_Turno" placeholder="Ingrese su # de Turno" name="ID_Turno" value="<?php if(isset($_GET['ID_Turno'])){echo $_GET['ID_Turno'];} ?>"><br>
            <button type="submit" class="search">BUSCAR</button>
        </form>
    <?php 
    require_once("../conectar.php");
    if(isset($_GET['ID_Turno'])) {
        $ID_Turno = $_GET['ID_Turno'];
        $query = mysqli_query($turnos, "SELECT turnos.*, pacientes.NombreCompleto, medicos.NombreCompletoM FROM turnos, pacientes, medicos WHERE ID_Turno='$ID_Turno' AND pacientes.DNI = turnos.DNI AND medicos.ID_Medico = turnos.Medico");
        if(mysqli_num_rows($query) > 0) {
            echo '
            <br>
            <div class="tabla">
                <div align="left">
                    <div class="titulo">TURNO</div>
                </div>
            <table>
            <tr>
                <thead>
                    <tr>
                        <th>DÍA Y HORA</th>
                        <th>PACIENTE</th>
                        <th>MÉDICO</th>
                        <th>ESTADO</th>
                        <th>OBSERVACIONES</th>
                    </tr>
                </thead>
            <tbody>';
            while($turnos = mysqli_fetch_assoc($query)) {
            echo '
            <tr>
                <td>'.$turnos['DiaHora'].'</td>
                <td>'.$turnos['NombreCompleto'].'</td>
                <td>'.$turnos['NombreCompletoM'].'</td>
                <td>'.$turnos['Estado'].'</td>
                <td>'.$turnos['Observaciones'].'</td>
            </tr>
            <button>
                <a href="cancelar.php?ID_Turno='.$turnos['ID_Turno'].'" id="cancelar" onclick="confirmar();">CANCELA SU TURNO</a>
            </button>
            </div>';
                }
            }
            else {
                echo '
                <br>
                <tr>
                    <td colspan="6">No existe un turno con ese #.</td>
                </tr>';
            }
        }
?>
</div>
</body>
</html>