<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
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
    </style>
<body>
    <button><a href="pacientes/pacientes.php">ADMINISTRACIÓN DE PACIENTES</a></button>
    <br><br>
    <button><a href="medicos/medicos.php">ADMINISTRACIÓN DE MÉDICOS</a></button>
    <br><br>
    <button><a href="turnos/turnos.php">ADMINISTRACIÓN DE TURNOS</a></button>
    <footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>
</body>
</html>