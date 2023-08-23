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
                    <span style="font-size: 18px; font-weight: bold;">DATOS PERSONALES</span><br>
                    
                    <label for="NombreCompleto" class="required">NOMBRE COMPLETO:</label>
                    <input type="text" id="NombreCompleto" name="NombreCompleto" placeholder="Ingrese su Nombre Completo" required>

                    <label for="FechaNacimiento" class="required">FECHA DE NACIMIENTO:</label>
                    <input type="date" id="FechaNacimiento" name="FechaNacimiento" required>

                    <label for="Genero" class="required">GÉNERO:</label><br>
                    <input type="radio" name="Genero" value="Masculino" required>
                    <label for="Masculino" style="font-weight: lighter;">Masculino</label><br>
                    <input type="radio" name="Genero" value="Femenino" required>
                    <label for="Femenino" style="font-weight: lighter;">Femenino</label><br>

                    <label for="DNI" class="required">DNI:</label>
                    <input type="number" id="DNI" name="DNI" placeholder="Ingrese su Nº de DNI" maxlength="8" required>

                    <label for="id_os" class="required">OBRA SOCIAL:</label><br>
                    <select name="id_os" id="id_os" required>
                        <option value="" disabled selected>Seleccione una Obra Social</option>
                        <option value=1>DAMSU</option>
                        <option value=2>Jerárquicos</option>
                        <option value=3>Obra Social Provincia</option>
                        <option value=4>OSECAC</option>
                        <option value=5>OSTES</option>
                        <option value=6>Sancor Salud</option>
                    </select><br>

                    <label for="TelefonoContacto" class="required">NÚMERO TELEFÓNICO:</label>
                    <input type="number" id="TelefonoContacto" name="TelefonoContacto" placeholder="Ingrese su Nº de Teléfono" required>

                    <label for="DireccionPaciente" class="required">DIRECCIÓN:</label>
                    <input type="text" id="DireccionPaciente" name="DireccionPaciente" placeholder="Ingrese su Domicilio" required>
                    </div>

                    <div class="datosturnos">
                    <span style="font-size: 18px; font-weight: bold;">SELECCIÓN DE TURNO</span><br>

                    <!-- REEMPLAZAR ESTO -->
                    <label for="ID_Medico" class="required">MÉDICO:</label><br>
                    <select name="Medico" id="Medico">
                        <option value="" disabled selected>Seleccione un Médico</option>
                        <optgroup label="Especialidad 1">
                            <option value=1>Médico 1</option>
                            <option value=2>Médico 2</option>
                            <option value=3>Médico 3</option>
                        </optgroup>
                        <optgroup label="Especialidad 2">
                            <option value=4>Médico 4</option>
                            <option value=5>Médico 5</option>
                            <option value=6>Médico 6</option>
                        </optgroup>
                    </select><br>

                    <label for="Fecha" class="required">DÍA:</label>
                    <input type="date" id="Fecha" name="Fecha">

                    <label for="Hora" class="required">HORA:</label>
                    <input type="time" id="Hora" name="Hora">
                    <!-- -->
                    </div>

                    <input type="hidden" id="Estado" name="Estado" value="">
                    <input type="hidden" id="Observaciones" name="Observaciones" value="">

                    <br><div class="enviar"><input type="submit" value="ENVIAR"></div>
            </form>
        </div>
    </div>

<?php
    require_once("./php/conectar.php");
    $peticion = mysqli_query($pacientes, "SELECT pacientes.*, obrasocial.obrasocial FROM pacientes, obrasocial WHERE obrasocial.id_os = pacientes.id_os");
    $peticion2 = mysqli_query($medicos, "SELECT * FROM medicos");
    $peticion3 = mysqli_query($turnos, "SELECT turnos.*, pacientes.NombreCompleto, medicos.NombreCompletoM FROM turnos, pacientes, medicos WHERE pacientes.ID_Paciente = turnos.ID_Paciente AND medicos.ID_Medico = turnos.Medico");

    echo '
    <div align="center">
    <div class="tabla">
    <div align="left"><div class="titulo">PACIENTES</div></div>
    <table>
    <tr>
        <thead>
            <tr>
                <th>NOMBRE COMPLETO</th>
                <th>FECHA DE NACIMIENTO</th>
                <th>GÉNERO</th>
                <th>DNI</th>
                <th>OBRA SOCIAL</th>
                <th>TELÉFONO</th>
                <th>DIRECCIÓN</th>
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
                    <td>'.$pacientes['obrasocial'].'</td>
                    <td>'.$pacientes['TelefonoContacto'].'</td>
                    <td>'.$pacientes['DireccionPaciente'].'</td>
                    <td><a class="actualizar" href="./php/editar.php?ID_Paciente='.$pacientes['ID_Paciente'].'&no='.$pacientes['NombreCompleto'].'&fn='.$pacientes['FechaNacimiento'].'&gr='.$pacientes['Genero'].'&dni='.$pacientes['DNI'].'&ss='.$pacientes['obrasocial'].'&di='.$pacientes['DireccionPaciente'].'&tf='.$pacientes['TelefonoContacto'].'">ACTUALIZAR</a> ✔️</td>
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
                <th>NOMBRE COMPLETO</th>
                <th>ESPECIALIDAD</th>
                <th>TELÉFONO</th>
                <th>DIRECCIÓN</th>
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
                <th>HORA</th>
                <th>FECHA</th>
                <th>PACIENTE</th>
                <th>MÉDICO</th>
                <th>ESTADO</th>
                <th>OBSERVACIONES</th>
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
                    <td>'.$turnos['NombreCompleto'].'</td>
                    <td>'.$turnos['NombreCompletoM'].'</td>
                    <td>'.$turnos['Estado'].'</td>
                    <td></td>
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
