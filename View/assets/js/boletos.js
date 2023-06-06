$(document).ready(function () {
    listaBoletos();
});

function listaBoletos() {
    let datos = { "accion": "listaBoletos" }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-boletos")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de boletos.");
        }
    });
}

function buscarPor() {
    let buscar = $("#buscar-boleto").val();
    let filtro = $("#filtrar-boleto").val();

    let datos = {
        "accion": "buscarPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-boletos")[0].innerHTML = response;
            $("#btn-editar-boleto")[0].disabled = true;
            $("#btn-editar-boleto")[0].classList.remove("btn-primary");
            $("#btn-editar-boleto")[0].classList.add("btn-secondary");
            $("#btn-editar-boleto")[0].value = "";
            $("#btn-borrar-boleto")[0].disabled = true;
            $("#btn-borrar-boleto")[0].classList.remove("btn-danger");
            $("#btn-borrar-boleto")[0].classList.add("btn-secondary");
            $("#btn-borrar-boleto")[0].value = "";
        },
        error: function () {
            console.log("Error al cargar la lista de empleados.");
        }
    });
}


var registroAnterior = 0;
function seleccionarBoleto(id) {
    if (registroAnterior != 0) {
        $("#boleto-" + registroAnterior)[0].classList.remove("table-active");
    }
    registroAnterior = id;
    $("#boleto-" + id)[0].classList.add("table-active");
    $("#btn-editar-boleto")[0].disabled = false;
    $("#btn-editar-boleto")[0].classList.remove("btn-secondary");
    $("#btn-editar-boleto")[0].classList.add("btn-primary");
    $("#btn-editar-boleto")[0].value = id;
    $("#btn-borrar-boleto")[0].disabled = false;
    $("#btn-borrar-boleto")[0].classList.remove("btn-secondary");
    $("#btn-borrar-boleto")[0].classList.add("btn-danger");
    $("#btn-borrar-boleto")[0].value = id;

    let datos = {
        "accion": "seleccionarBoleto",
        "id_boleto": id
    }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {

            $("#editar-boleto-id-cliente").val(response.id_cliente);
            $("#editar-boleto-nombres").val(response.nombre_completo);
            $("#editar-boleto-dni").val(response.dni);
            $("#editar-boleto-carnet-extranjeria").val(response.carnet_extranjeria);
            $("#editar-boleto-pasaporte").val(response.pasaporte);
            $("#editar-boleto-id-ruta").val(response.id_ruta);
            $("#editar-boleto-ciudad-salida").val(response.ciudad_salida);
            $("#editar-boleto-ciudad-llegada").val(response.ciudad_llegada);
            $("#editar-boleto-tipo-viaje").val(response.tipo_viaje);
            $("#editar-boleto-precio").val(response.costo);
            $("#editar-boleto-hora-viaje")[0].selectedIndex = response.hora_viaje - 1;
            $("#editar-boleto-fecha-viaje").val(response.fecha_viaje);
            $("#editar-boleto-hora-registro").val(response.hora_registro);
            $("#editar-boleto-fecha-registro").val(response.fecha_registro);
        },
        error: function () {
        }
    });
}

function infoBoleto(id) {
    let datos = {
        "accion": "seleccionarBoleto",
        "id_boleto": id.value
    }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            $("#info-boleto-id-cliente").val(response.id_cliente);
            $("#info-boleto-nombres").val(response.nombre_completo);
            $("#info-boleto-dni").val(response.dni);
            $("#info-boleto-carnet-extranjeria").val(response.carnet_extranjeria);
            $("#info-boleto-pasaporte").val(response.pasaporte);
            $("#info-boleto-id-ruta").val(response.id_ruta);
            $("#info-boleto-ciudad-salida").val(response.ciudad_salida);
            $("#info-boleto-ciudad-llegada").val(response.ciudad_llegada);
            $("#info-boleto-tipo-viaje").val(response.tipo_viaje);
            $("#info-boleto-precio").val(response.costo);
            $("#info-boleto-hora-viaje")[0].selectedIndex = response.hora_viaje - 1;
            $("#info-boleto-fecha-viaje").val(response.fecha_viaje);
            $("#info-boleto-hora-registro").val(response.hora_registro);
            $("#info-boleto-fecha-registro").val(response.fecha_registro);
        },
        error: function () {
        }
    });
}

function agregarBoleto() {
    //Validar inputs
    if ($("#agregar-boleto-id-cliente").val() != "" && $("#agregar-boleto-id-ruta").val() != ""
        && $("#agregar-boleto-fecha-viaje").val() != "") {

        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append("accion", "agregarBoleto");
        datos.append("id_cliente", $("#agregar-boleto-id-cliente").val());
        datos.append("id_ruta", $("#agregar-boleto-id-ruta").val());
        datos.append("hora_viaje", $("#agregar-boleto-hora-viaje").val());
        datos.append("fecha_viaje", $("#agregar-boleto-fecha-viaje").val());
        datos.append("hora_registro", $("#agregar-boleto-hora-registro").val());
        datos.append("fecha_registro", $("#agregar-boleto-fecha-registro").val());

        $.ajax({
            url: "../../Controller/BoletosController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaBoletos();

                switch (response) {
                    case "exito":

                        $("#mensaje-servidor")[0].innerHTML = "Se registro el <b>boleto</b>  con exito.";

                        $("#agregar-boleto-id-cliente").val("");
                        $("#agregar-boleto-nombres").val("");
                        $("#agregar-boleto-dni").val("");
                        $("#agregar-boleto-carnet-extranjeria").val("");
                        $("#agregar-boleto-pasaporte").val("");

                        $("#agregar-boleto-id-ruta").val("");
                        $("#agregar-boleto-ciudad-salida").val("");
                        $("#agregar-boleto-ciudad-llegada").val("");
                        $("#agregar-boleto-tipo-viaje").val("");
                        $("#agregar-boleto-precio").val("");

                        $("#agregar-boleto-hora-viaje")[0].selectedIndex = 0;
                        $("#agregar-boleto-hora-viaje").val("");
                        $("#agregar-boleto-fecha-viaje").val("");

                        $("#btn-editar-boleto")[0].disabled = true;
                        $("#btn-editar-boleto")[0].classList.remove("btn-primary");
                        $("#btn-editar-boleto")[0].classList.add("btn-secondary");
                        $("#btn-editar-boleto")[0].value = "";
                        $("#btn-borrar-boleto")[0].disabled = true;
                        $("#btn-borrar-boleto")[0].classList.remove("btn-danger");
                        $("#btn-borrar-boleto")[0].classList.add("btn-secondary");
                        $("#btn-borrar-boleto")[0].value = "";
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al registrar el boleto: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al agregar el registro.</b>";
            }
        });

    } else {
        $("#mensaje-servidor")[0].innerHTML = "<b>Completar los datos necesarios.</b>";
    }
}

function editarBoleto() {
    //Validar inputs
    if ($("#editar-boleto-id-cliente").val() != "" && $("#editar-boleto-id-ruta").val() != ""
        && $("#editar-boleto-fecha-viaje").val() != "") {
        var datos = new FormData();

        // Editar los valores de los campos de entrada a formData
        datos.append("accion", "editarBoleto");
        datos.append("id_boleto", $("#btn-editar-boleto").val());
        datos.append("id_cliente", $("#editar-boleto-id-cliente").val());
        datos.append("id_ruta", $("#editar-boleto-id-ruta").val());
        datos.append("hora_viaje", $("#editar-boleto-hora-viaje").val());
        datos.append("fecha_viaje", $("#editar-boleto-fecha-viaje").val());
        datos.append("hora_registro", $("#editar-boleto-hora-registro").val());
        datos.append("fecha_registro", $("#editar-boleto-fecha-registro").val());
        datos.append("descontar_monto", descontar_monto);

        $.ajax({
            url: "../../Controller/BoletosController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaBoletos();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "Se edito el <b>boleto</b>  con exito.";

                        $("#btn-editar-boleto").val("");
                        $("#editar-boleto-id-cliente").val("");
                        $("#editar-boleto-nombres").val("");
                        $("#editar-boleto-dni").val("");
                        $("#editar-boleto-carnet-extranjeria").val("");
                        $("#editar-boleto-pasaporte").val("");

                        $("#editar-boleto-id-ruta").val("");
                        $("#editar-boleto-ciudad-salida").val("");
                        $("#editar-boleto-ciudad-llegada").val("");
                        $("#editar-boleto-tipo-viaje").val("");
                        $("#editar-boleto-precio").val("");

                        $("#editar-boleto-hora-viaje")[0].selectedIndex = 0;
                        $("#editar-boleto-hora-viaje").val("");
                        $("#editar-boleto-fecha-viaje").val("");

                        $("#btn-editar-boleto")[0].disabled = true;
                        $("#btn-editar-boleto")[0].classList.remove("btn-primary");
                        $("#btn-editar-boleto")[0].classList.add("btn-secondary");
                        $("#btn-editar-boleto")[0].value = "";
                        $("#btn-borrar-boleto")[0].disabled = true;
                        $("#btn-borrar-boleto")[0].classList.remove("btn-danger");
                        $("#btn-borrar-boleto")[0].classList.add("btn-secondary");
                        $("#btn-borrar-boleto")[0].value = "";
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el boleto: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el registro.</b>";
            }
        });

    } else {
        $("#mensaje-servidor")[0].innerHTML = "<b>Completar los datos necesarios.</b>";
    }
}

var modal = "";
function cargarClientes(btn) {
    modal = btn.value;
    let datos = { "accion": "cargarClientes" }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-clientes")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de usuario.");
        }
    });
}
var descontar_monto = 0;
function cargarRutas(btn) {
    descontar_monto = $("#editar-boleto-precio").val();
    modal = btn.value;
    let datos = { "accion": "cargarRutas" }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-rutas")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de rutas.");
        }
    });
}
function buscarClientePor() {
    let buscar = $("#seleccionar-buscar-cliente").val();
    let filtro = $("#seleccionar-filtrar-cliente").val();

    let datos = {
        "accion": "buscarClientePor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-clientes")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la lista de clientes.");
        }
    });
}
function buscarRutaPor() {
    let buscar = $("#seleccionar-buscar-ruta").val();
    let filtro = $("#seleccionar-filtrar-ruta").val();

    let datos = {
        "accion": "buscarRutaPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-rutas")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la lista de rutas.");
        }
    });
}
var clienteAnterior = "0";
var input_id_cliente = "", input_nombres_cliente = "", input_dni_cliente = "", input_carnet_extranjeria_cliente = "", input_pasaporte_cliente = "";

function elegirCliente(id_cliente, nombres, dni, carnet_extranjeria, pasaporte) {
    if (clienteAnterior != 0) {
        $("#cliente-" + clienteAnterior)[0].classList.remove("table-active");
    }
    clienteAnterior = id_cliente;
    $("#cliente-" + id_cliente)[0].classList.add("table-active");
    input_id_cliente = id_cliente;
    input_nombres_cliente = nombres;
    input_dni_cliente = dni;
    input_carnet_extranjeria_cliente = carnet_extranjeria;
    input_pasaporte_cliente = pasaporte;
}

var rutaAnterior = "0";
var input_id_ruta = "", input_ciudad_salida_ruta = "", input_ciudad_llegada_ruta = "", input_tipo_viaje_ruta = "", input_costo_ruta = "";

function elegirRuta(id_ruta, ciudad_salida, ciudad_llegada, tipo_viaje, costo) {
    if (rutaAnterior != 0) {
        $("#ruta-" + rutaAnterior)[0].classList.remove("table-active");
    }
    rutaAnterior = id_ruta;
    $("#ruta-" + id_ruta)[0].classList.add("table-active");
    input_id_ruta = id_ruta;
    input_ciudad_salida_ruta = ciudad_salida;
    input_ciudad_llegada_ruta = ciudad_llegada;
    input_tipo_viaje_ruta = tipo_viaje;
    input_costo_ruta = costo;
}

function setInputRuta() {
    $("#" + modal + "-boleto-id-ruta")[0].value = input_id_ruta;
    $("#" + modal + "-boleto-ciudad-salida")[0].value = input_ciudad_salida_ruta;
    $("#" + modal + "-boleto-ciudad-llegada")[0].value = input_ciudad_llegada_ruta;
    $("#" + modal + "-boleto-tipo-viaje")[0].value = input_tipo_viaje_ruta;
    $("#" + modal + "-boleto-precio")[0].value = input_costo_ruta;


    var tipoModal = document.getElementById(modal + '-boleto');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}

function setInputCliente() {
    $("#" + modal + "-boleto-id-cliente")[0].value = input_id_cliente;
    $("#" + modal + "-boleto-nombres")[0].value = input_nombres_cliente;
    $("#" + modal + "-boleto-dni")[0].value = input_dni_cliente;
    $("#" + modal + "-boleto-carnet-extranjeria")[0].value = input_carnet_extranjeria_cliente;
    $("#" + modal + "-boleto-pasaporte")[0].value = input_pasaporte_cliente;


    var tipoModal = document.getElementById(modal + '-boleto');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}

function volver() {
    var tipoModal = document.getElementById(modal + '-boleto');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}

function setFecha() {
    // Obtener el elemento del input de fecha
    var fechaInput = document.getElementById("agregar-boleto-fecha-registro");

    // Obtener la fecha actual en el formato "YYYY-MM-DD"
    var fechaActual = new Date().toISOString().split("T")[0];

    // Establecer la fecha en el input
    fechaInput.value = fechaActual;
    // Obtener el elemento del input de hora
    var horaInput = document.getElementById("agregar-boleto-hora-registro");

    // Obtener la fecha y hora actual en el huso horario de Lima, Perú
    var fechaHoraActual = new Date().toLocaleString("es-PE", { timeZone: "America/Lima" });

    // Obtener solo la hora y los minutos en formato "hora:minutos"
    var horaActual = fechaHoraActual.split(" ")[1].substring(0, 5);

    // Establecer la hora en el input
    horaInput.value = horaActual;
}