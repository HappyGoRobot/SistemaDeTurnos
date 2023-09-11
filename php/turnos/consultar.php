<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Turno</title>
    <link rel="stylesheet" href="../../styles.css?v=<?php echo time();?>">
</head>
<script>
function confirmar() {
        var resultado = confirm("¿Está seguro de querer cancelar este turno?");
        if(resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            location.reload();
        }
    }
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
html {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    font-family: 'Open Sans', sans-serif;
    background-color: #DFDFDF;
}
body {
    /*position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;*/
}
form {
    background: transparent;
    border: none;
    box-shadow: none;
}
</style>
<body>
<!--<a style="color: black; position: fixed; left: 1%; top: 2%; font-weight: bold; border: 3px solid #94ADD7; border-radius: 8px; background: rgb(148, 173, 215, 0.7); padding: 3px;" href="home.php">VOLVER</a>!-->
    <span style="font-size: 24px; font-weight: bold;">CONSULTA DE TURNO</span>
    <br><br>
    <form action="" method="GET">
        <label for="ID_Turno"># DE TURNO:</label>
        <input type="text" id="ID_Turno" placeholder="Ingrese su # de Turno" name="ID_Turno" value="<?php if(isset($_GET['ID_Turno'])){echo $_GET['ID_Turno'];} ?>">
        <button type="submit" class="search">BUSCAR</button>
        
    </form>

    <?php 
    require_once("../../php/conectar.php");
    
    if(isset($_GET['ID_Turno'])) {
        $ID_Turno = $_GET['ID_Turno'];
        $query = mysqli_query($turnos, "SELECT turnos.*, pacientes.NombreCompleto, medicos.NombreCompletoM FROM turnos, pacientes, medicos WHERE ID_Turno='$ID_Turno' AND pacientes.ID_Paciente = turnos.ID_Paciente AND medicos.ID_Medico = turnos.Medico");

        if(mysqli_num_rows($query) > 0) {
            echo '
            <br><br>
            <div class="tabla">
                <div align="left">
                    <div class="titulo">TURNO</div>
                </div>
            <table>
            <tr>
                <thead>
                    <tr>
                        <th>HORA</th>
                        <th>FECHA</th>
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
                <td>'.$turnos['Hora'].'</td>
                <td>'.date("d-m-Y", strtotime($turnos['Fecha'])).'</td>
                <td>'.$turnos['NombreCompleto'].'</td>
                <td>'.$turnos['NombreCompletoM'].'</td>
                <td>'.$turnos['Estado'].'</td>
                <td>'.$turnos['Observaciones'].'</td>
            </tr>
            <button>
                <a href="cancelar.php?ID_Turno='.$turnos['ID_Turno'].'" onclick="confirmar();">CANCELA SU TURNO</a>
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
</body>
</html>