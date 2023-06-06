$(document).ready(function () {
    listaTransportes();
});

function listaTransportes() {
    let datos = { "accion": "listaTransportes" }
    $.ajax({
        url: "../../Controller/TransportesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-transportes")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de transportes.");
        }
    });
}

function buscarPor() {
    let buscar = $("#buscar-transporte").val();
    let filtro = $("#filtrar-transporte").val();

    let datos = {
        "accion": "buscarPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/TransportesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-transportes")[0].innerHTML = response;
            $("#btn-editar-transporte")[0].disabled = true;
            $("#btn-editar-transporte")[0].classList.remove("btn-primary");
            $("#btn-editar-transporte")[0].classList.add("btn-secondary");
            $("#btn-editar-transporte")[0].value = "";
            $("#btn-borrar-transporte")[0].disabled = true;
            $("#btn-borrar-transporte")[0].classList.remove("btn-danger");
            $("#btn-borrar-transporte")[0].classList.add("btn-secondary");
            $("#btn-borrar-transporte")[0].value = "";
        },
        error: function () {
            console.log("Error al cargar la lista de transportes.");
        }
    });
}

//SELECCIONAR TRANSPORTE
var registroAnterior = 0;
function seleccionarTransporte(id) {
    if (registroAnterior != 0) {
        $("#transporte-" + registroAnterior)[0].classList.remove("table-active");
    }
    registroAnterior = id;
    $("#transporte-" + id)[0].classList.add("table-active");
    $("#btn-editar-transporte")[0].disabled = false;
    $("#btn-editar-transporte")[0].classList.remove("btn-secondary");
    $("#btn-editar-transporte")[0].classList.add("btn-primary");
    $("#btn-editar-transporte")[0].value = id;
    $("#btn-borrar-transporte")[0].disabled = false;
    $("#btn-borrar-transporte")[0].classList.remove("btn-secondary");
    $("#btn-borrar-transporte")[0].classList.add("btn-danger");
    $("#btn-borrar-transporte")[0].value = id;

    let datos = {
        "accion": "seleccionarTransporte",
        "id_transporte": id
    }
    $.ajax({
        url: "../../Controller/TransportesController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            $("#editar-transporte-id-empleado").val(response.id_empleado);
            $("#editar-transporte-nombre-completo").val(response.nombres_chofer +" "+response.apellidos_chofer );
            $("#editar-transporte-dni").val(response.dni_chofer);
            $("#editar-transporte-telefono").val(response.telefono_chofer);
            $("#editar-transporte-correo").val(response.correo_chofer);
            $("#editar-transporte-modelo-vehiculo").val(response.modelo);
            $("#editar-transporte-placa-vehiculo").val(response.placa);
            $("#editar-transporte-seguro").val(response.seguro);
        },
        error: function () {
        }
    });
}

//AGREGAR TRANSPORTE
function agregarTransporte() {
    //Validar inputs
    if ($("#agregar-transporte-id-empleado").val() != "" && $("#agregar-transporte-modelo-vehiculo").val() != ""
        && $("#agregar-transporte-placa-vehiculo").val() != "" && $("#agregar-transporte-seguro").val() != "") {

        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('id_empleado', $("#agregar-transporte-id-empleado").val());
        datos.append('modelo_transporte', $("#agregar-transporte-modelo-vehiculo").val());
        datos.append('placa_transporte', $("#agregar-transporte-placa-vehiculo").val());
        datos.append('seguro_transporte', $("#agregar-transporte-seguro").val());
        datos.append('accion', 'agregarTransporte');

        $.ajax({
            url: "../../Controller/TransportesController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaTransportes();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se registro el transporte con exito.</b>";

                        $("#agregar-transporte-id-empleado").val("");
                        $("#agregar-transporte-nombre-completo").val("");
                        $("#agregar-transporte-dni").val("");
                        $("#agregar-transporte-telefono").val("");
                        $("#agregar-transporte-correo").val("");

                        $("#agregar-transporte-modelo-vehiculo").val("");
                        $("#agregar-transporte-placa-vehiculo").val("");
                        $("#agregar-ruta-ciudad-llegada").val("");
                        $("#agregar-transporte-seguro").val("");

                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al registrar el transporte: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al agregar el transporte.</b>";
            }
        });
    } else {
        $("#mensaje-servidor")[0].innerHTML = "<b>Completar todos los campos.</b>";

    }
}

//EDITAR TRANSPORTE
function editarTransporte() {

    //Validar inputs
    if ($("#editar-transporte-id-empleado").val() != "" && $("#editar-transporte-modelo-vehiculo").val() != ""
        && $("#editar-transporte-placa-vehiculo").val() != "" && $("#editar-transporte-seguro").val() != "") {
        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('id_transporte', $("#btn-editar-transporte").val());
        datos.append('id_empleado', $("#editar-transporte-id-empleado").val());
        datos.append('modelo_transporte', $("#editar-transporte-modelo-vehiculo").val());
        datos.append('placa_transporte', $("#editar-transporte-placa-vehiculo").val());
        datos.append('seguro_transporte', $("#editar-transporte-seguro").val());
        datos.append('accion', 'editarTransporte');

        $.ajax({
            url: "../../Controller/TransportesController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaTransportes();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se edito el registro con exito.</b>";
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el registro: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el registro.</b>";
            }
        });
    } else {
        $("#transporte-" + registroAnterior)[0].classList.remove("table-active");
        $("#btn-editar-transporte")[0].disabled = true;
        $("#btn-editar-transporte")[0].classList.remove("btn-primary");
        $("#btn-editar-transporte")[0].classList.add("btn-secondary");
        $("#btn-editar-transporte")[0].value = "";
        $("#btn-borrar-transporte")[0].disabled = true;
        $("#btn-borrar-transporte")[0].classList.remove("btn-danger");
        $("#btn-borrar-transporte")[0].classList.add("btn-secondary");
        $("#btn-borrar-transporte")[0].value = "";
        $("#mensaje-servidor")[0].innerHTML = "<b>No puede dejar ningun campo vacío.</b>";
    }
}

//BORRAR TRANSPORTE
function borrarTransporte() {
    let datos = {
        "accion": "eliminarTransporte",
        "id_transporte": $("#btn-borrar-transporte").val()
    }
    $.ajax({
        url: "../../Controller/TransportesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            listaTransportes();
            $("#mensaje-servidor")[0].innerHTML = "<b>" + response + "</b>";
            $("#btn-editar-transporte")[0].disabled = true;
            $("#btn-editar-transporte")[0].classList.remove("btn-primary");
            $("#btn-editar-transporte")[0].classList.add("btn-secondary");
            $("#btn-editar-transporte")[0].value = "";
            $("#btn-borrar-transporte")[0].disabled = true;
            $("#btn-borrar-transporte")[0].classList.remove("btn-danger");
            $("#btn-borrar-transporte")[0].classList.add("btn-secondary");
            $("#btn-borrar-transporte")[0].value = "";
            registroAnterior = 0;
        },
        error: function () {
            $("#mensaje-servidor")[0].innerHTML = "<b>Error al eliminar el registro de transporte.</b>";
        }
    });
}
var modal = "";
function cargarEmpleados(btn) {
    modal = btn.value;
    let datos = { "accion": "cargarEmpleados" }
    $.ajax({
        url: "../../Controller/TransportesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-empleados")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de empleados.");
        }
    });
}
function buscarEmpleadoPor() {
    let buscar = $("#seleccionar-buscar-empleado").val();
    let filtro = $("#seleccionar-filtrar-empleado").val();

    let datos = {
        "accion": "buscarEmpleadoPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/TransportesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-empleados")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la lista de empleados.");
        }
    });
}

var empleadoAnterior = "0";
var input_id_empleado = "", input_nombres_empleado = "", input_dni_empleado = "", input_telefono_empleado = "", input_correo_empleado = "";

function elegirEmpleado(id_empleado, nombres, dni, telefono, correo) {
    if (empleadoAnterior != 0) {
        $("#empleado-" + empleadoAnterior)[0].classList.remove("table-active");
    }
    empleadoAnterior = id_empleado;
    $("#empleado-" + id_empleado)[0].classList.add("table-active");
    input_id_empleado = id_empleado;
    input_nombres_empleado = nombres;
    input_dni_empleado = dni;
    input_telefono_empleado = telefono;
    input_correo_empleado = correo;
}

function setInputEmpleado() {
    $("#" + modal + "-transporte-id-empleado")[0].value = input_id_empleado;
    $("#" + modal + "-transporte-nombre-completo")[0].value = input_nombres_empleado;
    $("#" + modal + "-transporte-dni")[0].value = input_dni_empleado;
    $("#" + modal + "-transporte-telefono")[0].value = input_telefono_empleado;
    $("#" + modal + "-transporte-correo")[0].value = input_correo_empleado;


    var tipoModal = document.getElementById(modal + '-transporte');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}
function volver() {
    var tipoModal = document.getElementById(modal + '-transporte');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}