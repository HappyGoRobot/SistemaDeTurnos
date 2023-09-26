<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Turnos</title>
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
    <button><a href="php/formulario.php">SOLICITE SU TURNO</a></button>
    <br><br>
    <button><a href="php/turnos/consultar.php">CONSULTA SU TURNO</a></button>
    <footer>Clínica &copy; <script>document.write(new Date().getFullYear())</script></footer>

    <!-- Código JavaScript -->
<script>
    let turnos = [];

    function enviarFormulario(event) {
        event.preventDefault(); // Evitamos que el formulario se envíe de forma predeterminada

        // Obtenemos los valores del formulario
        const nombre = document.getElementById("nombre").value;
        const apellido = document.getElementById("apellido").value;
        const dni = document.getElementById("dni").value;
        const telefono = document.getElementById("telefono").value;
        const fecha = document.getElementById("fecha").value;
        const hora = document.getElementById("hora").value;
        const estado = document.getElementById("estado").value;
        const especialidad = document.getElementById("especialidad").value;

        // Creamos un objeto que representa el turno
        const nuevoTurno = {
            hora: hora,
            nombre: nombre,
            apellido: "apellido",
            estado: "En Espera",
            medico: "Profesional Seleccionado",
            especialidad: "Especialidad"
        };

        // Agregamos el turno al arreglo de turnos
        turnos.push(nuevoTurno);

        // Actualizamos la tabla de turnos
        actualizarTablaTurnos();

        // Luego de procesar los datos, podrías mostrar un mensaje de confirmación o redirigir a otra página
        const fechaFormateada = new Date(fecha).toLocaleDateString('es-ES', { day: '2-digit', month: 'long', year: 'numeric' });
    alert(`Has solicitado un turno para el día ${fechaFormateada} a las ${hora}.`);

        // Limpiamos el formulario para que los campos queden vacíos
        document.getElementById("turnoForm").reset();
    }

    function actualizarTablaTurnos() {
        const tablaTurnos = document.querySelector("table tbody");

        // Limpiamos la tabla
        tablaTurnos.innerHTML = "";

        // Rellenamos la tabla con los datos de los turnos
        turnos.forEach((turno) => {
            const fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${turno.hora}</td>
                <td>${turno.nombre}</td>
                <td>${turno.apellido}</td>                
                <td>${turno.estado}</td>
                <td>${turno.medico}</td>
                <td>${turno.especialidad}</td>
            `;
            tablaTurnos.appendChild(fila);
        });
    }
</script>
</body>
</html>