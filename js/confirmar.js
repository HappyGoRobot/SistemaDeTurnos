function confirmar() {
    if (document.getElementById("modificar")) {
        var resultado = confirm("¿Está seguro de querer modificar este registro?");
        if (resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            location.reload();
        }
    }
    if (document.getElementById("cancelar")) {
        var resultado = confirm("¿Está seguro de querer cancelar este turno?");
        if (resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            location.reload();
        }
    }
    else {
        var resultado = confirm("¿Está seguro de querer eliminar este registro?");
        if (resultado == true) {
            return true;
        }
        else {
            event.preventDefault();
            location.reload();
        }
    }
}