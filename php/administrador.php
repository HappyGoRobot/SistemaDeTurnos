<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
html {
    font-family: 'Open Sans', sans-serif;
    background-color: #DFDFDF;
}
.menu {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
footer {
    margin: 16px 0 24px 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
button {
    font-size: 18px;
    display: inline-block;
    width: auto;
    border: 3px solid #94ADD7;
    border-radius: 8px;
    padding: 6px;
    background-color: rgb(148, 173, 215, 0.7);
    box-shadow: 4px 4px 0px 0px rgb(124, 115, 192, 0.3);
    font-weight: bold;
}
a {
    text-decoration: none;
}
.volver {
    color: black;
    position: fixed;
    left: 1%;
    top: 2%;
    font-weight: bold;
    border: 3px solid #94ADD7;
    border-radius: 8px;
    background: rgb(148, 173, 215, 0.7);
    padding: 3px;
}
</style>
<body>
    <a class="volver" href="../index.php">VOLVER</a>
    <div class="menu">
        <button><a href="pacientes/pacientes.php">ADMINISTRACIÓN DE PACIENTES</a></button>
        <br><br>
        <button><a href="medicos/medicos.php">ADMINISTRACIÓN DE MÉDICOS</a></button>
        <br><br>
        <button><a href="turnos/turnos.php">ADMINISTRACIÓN DE TURNOS</a></button>
        <footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
    </div>
</body>
</html>