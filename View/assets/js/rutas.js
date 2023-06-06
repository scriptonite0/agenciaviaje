$(document).ready(function () {
    listaRutas();
});

function listaRutas() {
    let datos = { "accion": "listaRutas" }
    $.ajax({
        url: "../../Controller/RutasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-rutas")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de rutas.");
        }
    });
}

function buscarPor() {
    let buscar = $("#buscar-ruta").val();
    let filtro = $("#filtrar-ruta").val();

    let datos = {
        "accion": "buscarPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/RutasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-rutas")[0].innerHTML = response;
            $("#btn-editar-ruta")[0].disabled = true;
            $("#btn-editar-ruta")[0].classList.remove("btn-primary");
            $("#btn-editar-ruta")[0].classList.add("btn-secondary");
            $("#btn-editar-ruta")[0].value = "";
            $("#btn-borrar-ruta")[0].disabled = true;
            $("#btn-borrar-ruta")[0].classList.remove("btn-danger");
            $("#btn-borrar-ruta")[0].classList.add("btn-secondary");
            $("#btn-borrar-ruta")[0].value = "";
        },
        error: function () {
            console.log("Error al cargar la lista de rutas.");
        }
    });
}

//SELECCIONAR RUTA
var registroAnterior = 0;
function seleccionarRuta(id) {
    if (registroAnterior != 0) {
        $("#ruta-" + registroAnterior)[0].classList.remove("table-active");
    }
    registroAnterior = id;
    $("#ruta-" + id)[0].classList.add("table-active");
    $("#btn-editar-ruta")[0].disabled = false;
    $("#btn-editar-ruta")[0].classList.remove("btn-secondary");
    $("#btn-editar-ruta")[0].classList.add("btn-primary");
    $("#btn-editar-ruta")[0].value = id;
    $("#btn-borrar-ruta")[0].disabled = false;
    $("#btn-borrar-ruta")[0].classList.remove("btn-secondary");
    $("#btn-borrar-ruta")[0].classList.add("btn-danger");
    $("#btn-borrar-ruta")[0].value = id;

    let datos = {
        "accion": "seleccionarRuta",
        "id_ruta": id
    }
    $.ajax({
        url: "../../Controller/RutasController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            $("#editar-ruta-terminal-salida").val(response.terminal_salida);
            $("#editar-ruta-terminal-llegada").val(response.terminal_llegada);
            $("#editar-ruta-ciudad-salida").val(response.ciudad_salida);
            $("#editar-ruta-ciudad-llegada").val(response.ciudad_llegada);
            $("#editar-ruta-tipo-viaje").val(response.tipo_viaje);
            $("#editar-ruta-costo").val(response.costo);

        },
        error: function () {
        }
    });
}

//AGREGAR RUTA
function agregarRuta() {
    //Validar inputs
    if ($("#agregar-ruta-terminal-salida").val() != "" && $("#agregar-ruta-terminal-salida").val() != ""
        && $("#agregar-ruta-ciudad-salida").val() != "" && $("#agregar-ruta-ciudad-llegada").val() != ""
        && $("#agregar-ruta-costo").val() != "") {

        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('terminal_salida', $("#agregar-ruta-terminal-salida").val());
        datos.append('terminal_llegada', $("#agregar-ruta-terminal-llegada").val());
        datos.append('ciudad_salida', $("#agregar-ruta-ciudad-salida").val());
        datos.append('ciudad_llegada', $("#agregar-ruta-ciudad-llegada").val());
        datos.append('tipo_viaje', $("#agregar-ruta-tipo-viaje").val());
        datos.append('costo', $("#agregar-ruta-costo").val());
        datos.append('accion', 'agregarRuta');

        $.ajax({
            url: "../../Controller/RutasController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaRutas();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se registro la ruta con exito.</b>";

                        $("#agregar-ruta-terminal-salida").val("");
                        $("#agregar-ruta-terminal-llegada").val("");
                        $("#agregar-ruta-ciudad-salida").val("");
                        $("#agregar-ruta-ciudad-llegada").val("");
                        $("#agregar-ruta-costo").val("");

                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al registrar la ruta: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al agregar la ruta.</b>";
            }
        });
    } else {
        $("#mensaje-servidor")[0].innerHTML = "<b>Completar todos los campos.</b>";

    }
}

//EDITAR RUTA
function editarRuta() {

    //Validar inputs
    if ($("#editar-ruta-terminal-salida").val() != "" && $("#editar-ruta-terminal-salida").val() != ""
        && $("#editar-ruta-ciudad-salida").val() != "" && $("#editar-ruta-ciudad-llegada").val() != ""
        && $("#editar-ruta-costo").val() != "") {
        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('id_ruta', $("#btn-editar-ruta").val());
        datos.append('terminal_salida', $("#editar-ruta-terminal-salida").val());
        datos.append('terminal_llegada', $("#editar-ruta-terminal-llegada").val());
        datos.append('ciudad_salida', $("#editar-ruta-ciudad-salida").val());
        datos.append('ciudad_llegada', $("#editar-ruta-ciudad-llegada").val());
        datos.append('tipo_viaje', $("#editar-ruta-tipo-viaje").val());
        datos.append('costo', $("#editar-ruta-costo").val());
        datos.append('accion', 'editarRuta');

        $.ajax({
            url: "../../Controller/RutasController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaRutas();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se edito el registro con exito.</b>";
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar la ruta: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el registro.</b>";
            }
        });
    } else {
        $("#ruta-" + registroAnterior)[0].classList.remove("table-active");
        $("#btn-editar-ruta")[0].disabled = true;
        $("#btn-editar-ruta")[0].classList.remove("btn-primary");
        $("#btn-editar-ruta")[0].classList.add("btn-secondary");
        $("#btn-editar-ruta")[0].value = "";
        $("#btn-borrar-ruta")[0].disabled = true;
        $("#btn-borrar-ruta")[0].classList.remove("btn-danger");
        $("#btn-borrar-ruta")[0].classList.add("btn-secondary");
        $("#btn-borrar-ruta")[0].value = "";
        $("#mensaje-servidor")[0].innerHTML = "<b>No puede dejar ningun campo vacío.</b>";
    }
}

//BORRAR RUTA
function borrarRuta() {
    let datos = {
        "accion": "eliminarRuta",
        "id_ruta": $("#btn-borrar-ruta").val()
    }
    $.ajax({
        url: "../../Controller/RutasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            listaRutas();
            $("#mensaje-servidor")[0].innerHTML = "<b>" + response + "</b>";
            $("#btn-editar-ruta")[0].disabled = true;
            $("#btn-editar-ruta")[0].classList.remove("btn-primary");
            $("#btn-editar-ruta")[0].classList.add("btn-secondary");
            $("#btn-editar-ruta")[0].value = "";
            $("#btn-borrar-ruta")[0].disabled = true;
            $("#btn-borrar-ruta")[0].classList.remove("btn-danger");
            $("#btn-borrar-ruta")[0].classList.add("btn-secondary");
            $("#btn-borrar-ruta")[0].value = "";
            registroAnterior = 0;
        },
        error: function () {
            $("#mensaje-servidor")[0].innerHTML = "<b>Error al eliminar la ruta.</b>";
        }
    });
}