<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Turnos</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time();?>">
    <script>
    function confirmar() {
        var resultado = confirm("¿Está seguro de querer eliminar este registro?");
        if(resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            window.location = "index.php";
        }
    }
    </script>
</head>
<body>
<!--<nav>
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
            <div class="titulo" style="box-shadow: none;">SOLICITE SU TURNO AQUI</div>
            <form id="turnoForm" class="formulario" action="./php/insertar.php" method="post">
                <div class="datospersonales">
                    <b>DATOS PERSONALES</b><br>
                    
                    <label for="NombreCompleto" class="required">Nombre Completo:</label>
                    <input type="text" id="NombreCompleto" name="NombreCompleto" placeholder="Ingrese su Nombre Completo" required>

                    <label for="FechaNacimiento" class="required">Fecha de Nacimiento:</label>
                    <input type="date" id="FechaNacimiento" name="FechaNacimiento" required>

                    <label for="Genero" class="required">Género:</label><br>
                    <input type="radio" name="Genero" value="Masculino" required>
                    <label for="Masculino" style="font-weight: lighter;">Masculino</label><br>
                    <input type="radio" name="Genero" value="Femenino" required>
                    <label for="Femenino" style="font-weight: lighter;">Femenino</label><br>

                    <label for="DNI" class="required">DNI:</label>
                    <input type="number" id="DNI" name="DNI" placeholder="Ingrese su Nº de DNI" maxlength="8" required>

                    <label for="NumeroSeguroSocial" class="required">Seguro Social:</label>
                    <input type="number" id="NumeroSeguroSocial" name="NumeroSeguroSocial" placeholder="Ingrese su Nº de Seguro Social" required>

                    <label for="TelefonoContacto" class="required">Número Telefónico:</label>
                    <input type="number" id="TelefonoContacto" name="TelefonoContacto" placeholder="Ingrese su Nº de Teléfono" required>

                    <label for="DireccionPaciente" class="required">Dirección:</label>
                    <input type="text" id="DireccionPaciente" name="DireccionPaciente" placeholder="Ingrese su Domicilio" required>
                    </div>

                    <div class="datosturnos">
                    <b>SELECCIÓN DE TURNO</b><br>

                    <label for="Fecha" class="required">Día:</label>
                    <input type="date" id="Fecha" name="Fecha">

                    <label for="Hora" class="required">Hora:</label>
                    <input type="time" id="Hora" name="Hora">

                    <label for="ID_Medico" class="required">Médico:</label><br>
                    <select name="Medico" id="Medico">
                        <option value="">Escoja un médico</option>
                        <optgroup label="Especialidad 1">
                            <option value="1">Médico 1</option>
                            <option value="2">Médico 2</option>
                            <option value="3">Médico 3</option>
                        </optgroup>
                        <optgroup label="Especialidad 2">
                            <option value="4">Médico 4</option>
                            <option value="5">Médico 5</option>
                            <option value="6">Médico 6</option>
                        </optgroup>
                    </select>
                    </div>

                    <input type="hidden" id="Estado" name="Estado" value="N/A">
                    <input type="hidden" id="Observaciones" name="Observaciones" value="Sin Observaciones.">

                    <br><div class="enviar"><input type="submit" value="ENVIAR"></div>
            </form>
        </div>
    </div>

<?php
    require_once("./php/conectar.php");
    $peticion = mysqli_query($pacientes, "SELECT * FROM pacientes");
    $peticion2 = mysqli_query($medicos, "SELECT * FROM medicos");
    $peticion3 = mysqli_query($turnos, "SELECT * FROM turnos");

    echo '
    <div align="center">
    <div class="tabla">
    <div align="left"><div class="titulo">PACIENTES</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Fecha de Nacimiento</th>
                <th>Género</th>
                <th>DNI</th>
                <th>Seguro Social</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion) > 0){
            while($pacientes = mysqli_fetch_assoc($peticion)){
                echo '
                <tr>
                    <td>'.$pacientes['NombreCompleto'].'</td>
                    <td>'.date("d-m-Y", strtotime($pacientes['FechaNacimiento'])).'</td>
                    <td>'.$pacientes['Genero'].'</td>
                    <td>'.$pacientes['DNI'].'</td>
                    <td>'.$pacientes['NumeroSeguroSocial'].'</td>
                    <td>'.$pacientes['TelefonoContacto'].'</td>
                    <td>'.$pacientes['DireccionPaciente'].'</td>
                    <td><a class="actualizar" href="./php/editar.php?ID_Paciente='.$pacientes['ID_Paciente'].'&no='.$pacientes['NombreCompleto'].'&fn='.$pacientes['FechaNacimiento'].'&gr='.$pacientes['Genero'].'&dni='.$pacientes['DNI'].'&ss='.$pacientes['NumeroSeguroSocial'].'&di='.$pacientes['DireccionPaciente'].'&tf='.$pacientes['TelefonoContacto'].'">ACTUALIZAR</a> ✔️</td>
                    <td><a class="eliminar" href="./php/eliminar.php?ID_Paciente='.$pacientes['ID_Paciente'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="9">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table></div>';

    echo '
    <br><br>
    <div class="tabla">
    <div align="left"><div class="titulo">MÉDICOS</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Especialidad</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion2) > 0){
            while($medicos = mysqli_fetch_assoc($peticion2)){
                echo '
                <tr>
                    <td>'.$medicos['NombreCompletoM'].'</td>
                    <td>'.$medicos['EspecialidadMedica'].'</td>
                    <td>'.$medicos['TelefonoContactoM'].'</td>
                    <td>'.$medicos['DireccionConsulta'].'</td>
                    <td><a class="actualizar" href="./php/editarmedico.php?ID_Medico='.$medicos['ID_Medico'].'&ncm='.$medicos['NombreCompletoM'].'&es='.$medicos['EspecialidadMedica'].'&tfc='.$medicos['TelefonoContactoM'].'&dc='.$medicos['DireccionConsulta'].'">ACTUALIZAR</a> ✔️</td>
                    <td><a class="eliminar" href="./php/eliminar.php?ID_Medico='.$medicos['ID_Medico'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="6">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table> <br><button><a href="php/agregarmedico.php">AGREGAR NUEVO MÉDICO</a></button></div>';

echo '
    <br><br>
    <div class="tabla">
    <div align="left"><div class="titulo">TURNOS</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Estado</th>
                <th>Observaciones</th>
                <th><span style="color: green;">ACTUALIZAR</span></th>
                <th><span style="color: red;">ELIMINAR</span></th>
            </tr>
        </thead>
        <tbody>';
        if(mysqli_num_rows($peticion3) > 0){
            while($turnos = mysqli_fetch_assoc($peticion3)){
                echo '
                <tr>
                    <td>'.$turnos['Hora'].'</td>
                    <td>'.date("d-m-Y", strtotime($turnos['Fecha'])).'</td>
                    <td></td>
                    <td>'.$turnos['Medico'].'</td>
                    <td>'.$turnos['Estado'].'</td>
                    <td>'.$turnos['Observaciones'].'</td>
                    <td></td>
                    <td><a class="eliminar" href="./php/eliminar.php?ID_Turno='.$turnos['ID_Turno'].'" onclick="confirmar();">ELIMINAR</a> ❌</td>
                </tr>';
            }
        }
        else {
            echo '<tr>
            <td colspan="8">No existen registros para mostrar.</td>
            </tr>';
        }
    echo '</tbody></table></div>';
?>

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
