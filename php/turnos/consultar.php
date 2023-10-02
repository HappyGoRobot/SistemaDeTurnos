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
    <a class="volver" href="../../index.php">VOLVER</a>
    <div class="container">
        <form action="" method="GET">
            <span style="font-size: 24px; font-weight: bold;">CONSULTA DE TURNO</span><br><br>
            <label for="idturno"># DE TURNO:</label>
            <input type="text" id="idturno" placeholder="Ingrese su # de Turno" name="idturno" value="<?php if(isset($_GET['idturno'])){echo $_GET['idturno'];} ?>"><br>
            <button type="submit" class="search">BUSCAR</button>
        </form>
    <?php 
    require_once("../conectar.php");
    if(isset($_GET['idturno'])) {
        $idturno = $_GET['idturno'];
        $peticion = mysqli_query($turnos, "SELECT turnos.*, pacientes.nombrepaciente, medicos.nombremedico FROM turnos, pacientes, medicos WHERE idturno='$idturno' AND pacientes.dni = turnos.dni AND medicos.idmedico = turnos.idmedico");
        if(mysqli_num_rows($peticion) > 0) {
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
                    </tr>
                </thead>
            <tbody>';
            while($turnos = mysqli_fetch_assoc($peticion)) {
            echo '
            <tr>
                <td>'.$turnos['diahora'].'</td>
                <td>'.$turnos['nombrepaciente'].'</td>
                <td>'.$turnos['nombremedico'].'</td>
                <td>'.$turnos['estado'].'</td>
            </tr>
            <button>
                <a href="cancelar.php?idturno='.$turnos['idturno'].'" id="cancelar" onclick="confirmar();">CANCELA SU TURNO</a>
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