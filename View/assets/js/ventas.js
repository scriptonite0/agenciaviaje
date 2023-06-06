$(document).ready(function () {
    listaVentas();
});

function listaVentas() {
    let datos = { "accion": "listaVentas" }
    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-ventas")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de ventas.");
        }
    });
}

function buscarPor() {
    let buscar = $("#buscar-venta").val();
    let filtro = $("#filtrar-venta").val();

    let datos = {
        "accion": "buscarPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-ventas")[0].innerHTML = response;
            $("#btn-editar-venta")[0].disabled = true;
            $("#btn-editar-venta")[0].classList.remove("btn-primary");
            $("#btn-editar-venta")[0].classList.add("btn-secondary");
            $("#btn-editar-venta")[0].value = "";
            $("#btn-borrar-venta")[0].disabled = true;
            $("#btn-borrar-venta")[0].classList.remove("btn-danger");
            $("#btn-borrar-venta")[0].classList.add("btn-secondary");
            $("#btn-borrar-venta")[0].value = "";
        },
        error: function () {
            console.log("Error al cargar la lista de ventas.");
        }
    });
}

//SELECCIONAR VENTA
var registroAnterior = 0;
function seleccionarVenta(id) {
    if (registroAnterior != 0) {
        $("#venta-" + registroAnterior)[0].classList.remove("table-active");
    }
    var indice_tipo_pago = 0;

    registroAnterior = id;
    $("#venta-" + id)[0].classList.add("table-active");
    $("#btn-editar-venta")[0].disabled = false;
    $("#btn-editar-venta")[0].classList.remove("btn-secondary");
    $("#btn-editar-venta")[0].classList.add("btn-primary");
    $("#btn-editar-venta")[0].value = id;
    $("#btn-borrar-venta")[0].disabled = false;
    $("#btn-borrar-venta")[0].classList.remove("btn-secondary");
    $("#btn-borrar-venta")[0].classList.add("btn-danger");
    $("#btn-borrar-venta")[0].value = id;

    let datos = {
        "accion": "seleccionarDatosVenta",
        "id_venta": id
    }

    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#editar-venta-id-cliente").val(response.id_cliente);
            $("#editar-venta-nombres").val(response.nombres);
            $("#editar-venta-dni").val(response.dni);
            $("#editar-venta-carnet-extranjeria").val(response.carnet_extranjeria);
            $("#editar-venta-pasaporte").val(response.pasaporte);
            $("#editar-venta-cant-boletos").val(response.cant_boletos);
            switch (response.tipo_pago) {
                case "TARJETA":
                    indice_tipo_pago = 0;
                    break;
                case "YAPE":
                    indice_tipo_pago = 1;
                    break;
                case "IZIPAY":
                    indice_tipo_pago = 2;
                    break;
                case "PLIN":
                    indice_tipo_pago = 3;
                    break;
            }
            $("#editar-venta-tipo-pago")[0].selectedIndex = indice_tipo_pago;
            $("#editar-venta-monto").val(response.monto_total);
            $("#editar-venta-fecha-registro").val(response.fecha_registro_venta);
        },
        error: function () {
            console.log("error");
        }
    });
    let datosBoletos = {
        "accion": "cargarBoletosVenta",
        "id_venta": id
    }

    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datosBoletos,
        success: function (response) {
            $("#editar-tabla-boletos-venta")[0].innerHTML = response;
        },
        error: function (e) {
        }
    });
}

function infoVenta(id) {
    let datos = {
        "accion": "seleccionarDatosVenta",
        "id_venta": id
    }

    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#info-venta-id-cliente").val(response.id_cliente);
            $("#info-venta-nombres").val(response.nombres);
            $("#info-venta-dni").val(response.dni);
            $("#info-venta-carnet-extranjeria").val(response.carnet_extranjeria);
            $("#info-venta-pasaporte").val(response.pasaporte);
            $("#info-venta-cant-boletos").val(response.cant_boletos);
            switch (response.tipo_pago) {
                case "TARJETA":
                    indice_tipo_pago = 0;
                    break;
                case "YAPE":
                    indice_tipo_pago = 1;
                    break;
                case "IZIPAY":
                    indice_tipo_pago = 2;
                    break;
                case "PLIN":
                    indice_tipo_pago = 3;
                    break;
            }
            $("#info-venta-tipo-pago")[0].selectedIndex = indice_tipo_pago;
            $("#info-venta-monto").val(response.monto_total);
            $("#info-venta-fecha-registro").val(response.fecha_registro_venta);
        },
        error: function () {
            console.log("error");
        }
    });
    let datosBoletos = {
        "accion": "cargarBoletosVenta",
        "id_venta": id
    }

    $.ajax({
        url: "../../Controller/BoletosController.php",
        type: "POST",
        data: datosBoletos,
        success: function (response) {
            $("#info-tabla-boletos-venta")[0].innerHTML = response;
        },
        error: function (e) {
        }
    });

}

var modal = "";
function cargarClientes(btn) {
    modal = btn.value;
    let datos = { "accion": "cargarClientes" }
    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-clientes-venta")[0].innerHTML = response;
            $("#btn-agregar-boleto-venta")[0].disabled = false;
        },
        error: function () {
            console.log("Error al cargar la sección de usuario.");
        }
    });
}
function cargarRutas(btn) {
    modal = btn.value;
    let datos = { "accion": "cargarRutas" }
    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-rutas-venta")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de rutas.");
        }
    });
}

function buscarClientePor() {
    let buscar = $("#seleccionar-buscar-cliente-venta").val();
    let filtro = $("#seleccionar-filtrar-cliente-venta").val();

    let datos = {
        "accion": "buscarClientePor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-clientes-venta")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la lista de clientes.");
        }
    });
}
function buscarRutaPor() {
    let buscar = $("#seleccionar-buscar-ruta-venta").val();
    let filtro = $("#seleccionar-filtrar-ruta-venta").val();

    let datos = {
        "accion": "buscarRutaPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#seleccionar-tabla-rutas-venta")[0].innerHTML = response;
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
    $("#" + modal + "-boleto-venta-id-ruta")[0].value = input_id_ruta;
    $("#" + modal + "-boleto-venta-ciudad-salida")[0].value = input_ciudad_salida_ruta;
    $("#" + modal + "-boleto-venta-ciudad-llegada")[0].value = input_ciudad_llegada_ruta;
    $("#" + modal + "-boleto-venta-tipo-viaje")[0].value = input_tipo_viaje_ruta;
    $("#" + modal + "-boleto-venta-precio")[0].value = input_costo_ruta;


    var tipoModal = document.getElementById('agregar-boleto-venta');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}

function setInputCliente() {
    $("#" + modal + "-venta-id-cliente")[0].value = input_id_cliente;
    $("#" + modal + "-venta-nombres")[0].value = input_nombres_cliente;
    $("#" + modal + "-venta-dni")[0].value = input_dni_cliente;
    $("#" + modal + "-venta-carnet-extranjeria")[0].value = input_carnet_extranjeria_cliente;
    $("#" + modal + "-venta-pasaporte")[0].value = input_pasaporte_cliente;


    var tipoModal = document.getElementById(modal + '-venta');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}


function volver() {
    var tipoModal = document.getElementById(modal + '-boleto-venta');
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
}

function setFecha() {
    // Obtener el elemento del input de fecha
    var fechaInput = document.getElementById("agregar-venta-fecha-registro");

    // Obtener la fecha actual en el formato "YYYY-MM-DD"
    var fechaActual = new Date().toISOString().split("T")[0];

    // Establecer la fecha en el input
    fechaInput.value = fechaActual;

    // Obtener el elemento del input de hora
    var horaInput = document.getElementById("agregar-venta-hora-registro");

    // Obtener la fecha y hora actual en el huso horario de Lima, Perú
    var fechaHoraActual = new Date().toLocaleString("es-PE", { timeZone: "America/Lima" });

    // Obtener solo la hora en formato de 12 horas con AM/PM
    var horaActual = fechaHoraActual.split(" ")[1];
    var hora = horaActual.substring(0, 5);
    var ampm = horaActual.substring(9, 11);

    // Establecer la hora en el input junto con AM o PM
    horaInput.value = hora + " " + ampm;
}
var num_boletos = 0;

function agregarBoletoEnLista(n_filas) {

    num_boletos++;
    let id_ruta = $("#agregar-boleto-venta-id-ruta")[0].value;
    let ciudad_salida = $("#agregar-boleto-venta-ciudad-salida")[0].value;
    let ciudad_llegada = $("#agregar-boleto-venta-ciudad-llegada")[0].value;
    let costo = $("#agregar-boleto-venta-precio")[0].value;
    let hora_viaje = $("#agregar-boleto-venta-hora-viaje")[0].value;
    let fecha_viaje = $("#agregar-boleto-venta-fecha-viaje")[0].value;
    let cant_boletos = $("#agregar-venta-cant-boletos")[0].value;
    let monto_total = $("#agregar-venta-monto")[0].value;
    monto_total = parseFloat(monto_total) + parseFloat(costo);
    $("#agregar-venta-monto")[0].value = parseFloat(monto_total);
    $("#agregar-venta-cant-boletos")[0].value = num_boletos;
    let num = 4;
    let hora = "";
    for (i = 0; i < hora_viaje; i++) {
        num += 2;
    }
    if (num >= 12) {
        hora = num + ":00 PM";
    } else {
        hora = num + ":00 AM";
    }

    let fila = "<tr><td>" + num_boletos + "</td><td>" + id_ruta + "</td><td>" + ciudad_salida + "</td><td>" + ciudad_llegada + "</td><td>" + hora_viaje + "</td><td>" + hora + "</td><td>" + fecha_viaje + "</td><td>" + costo + "</td></tr>";
    $("#tabla-boletos-venta")[0].innerHTML += fila;

    var tipoModal = document.getElementById("agregar-venta");
    var mostrarModal = new bootstrap.Modal(tipoModal);
    mostrarModal.show();
    $("#btn-registrar-venta")[0].disabled = false;
}
//AGREGAR VENTA
function agregarVenta() {
    //Validar inputs


    var datos = new FormData();

    // Agregar los valores de los campos de entrada a formData
    datos.append('id_cliente', $("#agregar-venta-id-cliente").val());
    datos.append('n_boletos', $("#agregar-venta-cant-boletos").val());
    datos.append('tipo_pago', $("#agregar-venta-tipo-pago").val());
    datos.append('monto_total', $("#agregar-venta-monto").val());
    datos.append('tipo_viaje', $("#agregar-ruta-tipo-viaje").val());
    datos.append('hora_registro', $("#agregar-venta-hora-registro").val());
    datos.append('fecha_registro', $('#agregar-venta-fecha-registro').val());

    var boletos_registrados = new Array();
    var tabla = document.getElementById('tabla-boletos-venta');

    var filas = tabla.rows;

    // Recorrer las filas y obtener los datos de las celdas
    for (var i = 0; i < filas.length; i++) {
        var celdas = filas[i].cells;
        var boleto = [($("#agregar-venta-id-cliente").val())];
        for (var j = 0; j < celdas.length; j++) {
            var dato = celdas[j].textContent;
            boleto.push(dato);
        }
        boletos_registrados.push(boleto)
    }
    console.log(boletos_registrados);

    datos.append('boletos', JSON.stringify(boletos_registrados));
    datos.append('accion', "agregarVenta");

    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        contentType: false,
        processData: false,
        success: function (response) {
            listaVentas();
            switch (response) {
                case "exito":
                    $("#mensaje-servidor")[0].innerHTML = "<b>Se registro la venta con exito.</b>";
                    var tbody = document.getElementById("tabla-boletos-venta");
                    while (tbody.hasChildNodes()) {
                        tbody.removeChild(tbody.firstChild);
                    }
                    $("#agregar-venta-cant-boletos").val("0");
                    $("#agregar-venta-monto").val("0");
                    num_boletos = 0;
                    break;
                default:
                    $("#mensaje-servidor")[0].innerHTML = "<b>Error al registrar la venta: </b>" + response;
                    break;
            }
        },
        error: function () {
            $("#mensaje-servidor")[0].innerHTML = "<b>Error al agregar la venta.</b>";
        }
    });
}

//EDITAR VENTA
function editarVenta() {
    var id_cliente = $("#editar-venta-id-cliente").val();
    var id_venta = $("#btn-editar-venta").val();
    var tipo_pago = $("#editar-venta-tipo-pago").val();
    let datos = {
        "accion": "editarVenta",
        "id_cliente": id_cliente,
        "id_venta": id_venta,
        "tipo_pago": tipo_pago
    }
    $.ajax({
        url: "../../Controller/VentasController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            listaVentas();
            $("#mensaje-servidor")[0].innerHTML = response;
        },
        error: function () {
            $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar la venta.</b>";
        }
    });
}
