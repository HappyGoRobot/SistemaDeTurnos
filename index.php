<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Turnos</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <script>
    function confirmar() {
        var resultado = confirm("¿Está seguro de querer eliminar este registro?");
        if (resultado == false) {
            return;
        } else {
            window.location = "./php/eliminar.php?idpaciente='.$pacientes['idpaciente'].'"
}
}
    </script>
</head>
<body>
    <!-- NAVIGACIÓN 
    <nav>
        <ul>
            <li>
                <a href="">Complete con sus Datos</a>
            </li>
            <li><a href="">Seleccione Especialidad</a></li>
            <li><a href="">Seleccione Turno Disponible</a></li>
            <li><a href="">Seleccione Obra Social</a></li>
        </ul>
    </nav>--->

    <div class="container">
        <div class="contenido">

    <!-- FORMULARIO PARA TURNOS -->
    <div class="titulo">SOLICITE SU TURNO AQUI</div>
    <form id="turnoForm" class="turnoformulario" action="./php/insertar.php" method="post">
        <div class="datospersonales">
            <b>DATOS PERSONALES</b><br>
        <label for="nombre" class="required">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su Nombre" required>
       
        <label for="apellido" class="required">Apellido:</label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingrese su Apellido" required>  
        
        <label for="dni" class="required">DNI:</label>
        <input type="number" id="dni" name="dni" placeholder="Ingrese su Nº de DNI" maxlength="8" required>

        <label for="telefono" class="required">Número Telefónico:</label>
        <input type="number" id="telefono" name="telefono" placeholder="Ingrese su Nº de Teléfono" maxlength="10" required>
</div>

        <div class="datosturnos">
            <b>SELECCIÓN DE TURNO</b><br>
        <label for="fecha" class="required">Día:</label>
        <input type="date" id="fecha" name="fecha" required>

        <label for="hora" class="required">Hora:</label>
        <input type="time" id="hora" name="hora" required>

        <label for="medico" class="required">Médico:</label>
        <br>
        <select name="medico" id="medico">
        <option value="">Escoja un médico</option>
        <optgroup label="Especialidad 1">
            <option value="">Médico 1</option>
            <option value="">Médico 2</option>
            <option value="">Médico 3</option>
        </optgroup>
        <optgroup label="Especialidad 2">
            <option value="">Médico 4</option>
            <option value="">Médico 5</option>
            <option value="">Médico 6</option>
        </optgroup>
        </select>
</div>

        <br>
        <div class="enviar"><input type="submit" value="ENVIAR"></div>
    </form>

    <?php
    require_once("./php/conectar.php");
    
    $peticion = mysqli_query($pacientes, "SELECT * FROM pacientes");
    echo '
    <br>
    <div class="titulo">TURNOS</div>
    <br>
    <table>
    <tr>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion) > 0){
            while($pacientes = mysqli_fetch_assoc($peticion)){
                echo '
                <tr>
                    <td>'.$pacientes['nombre'].'</td>
                    <td>'.$pacientes['apellido'].'</td>
                    <td>'.$pacientes['dni'].'</td>
                    <td>'.$pacientes['telefono'].'</td>
                    <td>'.date("d-m-Y", strtotime($pacientes['fecha'])).'</td>
                    <td>'.$pacientes['hora'].'</td>
                    <td><a class="actualizar" href="./php/editar.php?idpaciente='.$pacientes['idpaciente'].'&no='.$pacientes['nombre'].'&ap='.$pacientes['apellido'].'&dni='.$pacientes['dni'].'&tf='.$pacientes['telefono'].'&fh='.$pacientes['fecha'].'&hr='.$pacientes['hora'].'">ACTUALIZAR</a> ✔️</td>
                    <td><a class="eliminar" href="./php/eliminar.php?idpaciente='.$pacientes['idpaciente'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="8">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table>'
    ?>

    <!-- TABLA
    <br>
    <div class="titulo">TURNOS</div>
    <br>
    <table>
        <tr>
            <thead>
                <th>Hora</th>
                <th>Nombre</th>
                <th>Apellido
                <th>Estado</th>
                <th>Médico</th>
                <th>Especialidad</th>

            </thead>
        </tr>
        <tbody>
            <tr>
                <td>00:00</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>En Espera</td>
                <td>Profesional Seleccionado</td>
                <td>Especialidad</td>
            </tr>
        </tbody>
    </table>-->
    
</div>
</div>

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
