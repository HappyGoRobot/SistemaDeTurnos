function cargarDiasYHorarios() {
    var medicoSeleccionado = document.getElementById("Medico").value;

    if (medicoSeleccionado == '1') {
        var diasDisponibles = ["Miércoles", "Jueves", "Viernes"];
        var horariosPorDia = {
            "Miércoles": ["09:00 AM", "10:00 AM", "11:00 AM"],
            "Jueves": ["02:00 PM", "03:00 PM", "04:00 PM", "05:00 PM"],
            "Viernes": ["09:00 AM", "10:00 AM", "11:00 AM"]
        };
    }
    if (medicoSeleccionado == '2') {
        var diasDisponibles = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
        var horariosPorDia = {
            "Lunes": ["10:00 AM", "11:00 AM"],
            "Martes": ["02:00 PM", "03:00 PM"],
            "Miércoles": ["09:00 AM", "10:00 AM", "11:00 AM"],
            "Jueves": ["03:00 PM", "04:00 PM"],
            "Viernes": ["01:00 PM", "02:00 PM"]
        };
    }
    if (medicoSeleccionado == '3') {
        var diasDisponibles = ["Lunes", "Martes", "Miércoles"];
        var horariosPorDia = {
            "Lunes": ["09:00 AM", "10:00 AM", "11:00 AM"],
            "Martes": ["02:00 PM", "03:00 PM"],
            "Miércoles": ["09:00 AM", "10:00 AM"]
        };
    }

    var diasYHorariosDiv = document.getElementById("diasYHorariosDisponibles");
    diasYHorariosDiv.innerHTML = "<p><label for='' class='required'>DÍAS Y HORARIOS DISPONIBLES:</label></p>";
    for (var i = 0; i < diasDisponibles.length; i++) {
        var dia = diasDisponibles[i];
        var horarios = horariosPorDia[dia];
    diasYHorariosDiv.innerHTML += "<p><b>" + dia + "</b></p>";
    for (var j = 0; j < horarios.length; j++) {
        diasYHorariosDiv.innerHTML += "<input type='radio' name='DiaHora' value='" + dia + " - " + horarios[j] + "'>" + horarios[j] + "<br>";
        }
    }
}