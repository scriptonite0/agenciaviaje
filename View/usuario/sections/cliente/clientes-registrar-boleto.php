<div class="container-fluid mt-3 ml-1 mr-2">
    <div class="row">
        <div class="col-sm-12">
            <div class="card w-100 m-2 p-3">
                <div class="row">
                    <div class="col-sm-3">
                        <h5><b>Datos del Cliente</b></h5>
                        <div class="mb-1">
                            <label for="registrar-venta-id-cliente" class="col-form-label"><b>ID</b></label>
                            <input type="text" class="form-control shadow" id="registrar-venta-id-cliente" value="<?php session_start();
                                                                                                                    echo ($_SESSION["id"]); ?>" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-nombres" class="col-form-label"><b>Nombres</b></label>
                            <input type="text" class="form-control shadow" id="registrar-venta-nombres" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-apellidos" class="col-form-label"><b>Apellidos</b></label>
                            <input type="text" class="form-control shadow" id="registrar-venta-apellidos" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-dni" class="col-form-label "><b>DNI</b></label>
                            <input type="text" class="form-control shadow" id="registrar-venta-dni" value="<?php echo ($_SESSION["dni_usuario"]); ?>" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-telefono" class="col-form-label "><b>Teléfono</b></label>
                            <input type="text" class="form-control shadow" id="registrar-venta-telefono" readonly>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h5><b>Datos de la Venta</b></h5>
                        <div class="mb-1">
                            <label for="registrar-venta-n-boletos" class="col-form-label"><b>N° Boletos</b></label>
                            <input type="text" class="form-control shadow" value="0" id="registrar-venta-n-boletos" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-tipo-pago" class="col-form-label"><b>Tipo de Pago</b></label>
                            <select type="text" class="form-select shadow" id="registrar-venta-tipo-pago">
                                <option value="TARJETA" selected>Tarjeta</option>
                                <option value="YAPE">Yape</option>
                                <option value="IZIPAY">Izipay</option>
                                <option value="PLIN">Plin</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-monto-total" class="col-form-label "><b>Monto Total (S/.)</b></label>
                            <input type="text" class="form-control shadow" value="0" id="registrar-venta-monto-total" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-hora" class="col-form-label"><b>Hora de Registro</b></label>
                            <input type="text" class="form-control shadow" id="registrar-venta-hora" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="registrar-venta-fecha" class="col-form-label"><b>Fecha de Registro</b></label>
                            <input type="text" class="form-control shadow" id="registrar-venta-fecha" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5><b>Lista de Boletos</b></h5>
                        <div class=" card table-responsive " style="height: 55vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:18px;">
                                        <th scope="col">#</th>
                                        <th scope="col">ID Ruta</th>
                                        <th scope="col">Ciudad Partida</th>
                                        <th scope="col">Ciudad Destino</th>
                                        <th scope="col">ID Hora</th>
                                        <th scope="col">Hora Viaje</th>
                                        <th scope="col">Fecha Viaje</th>
                                        <th scope="col">Costo Viaje</th>
                                    </tr>
                                </thead>
                                <tbody id="registro-tabla-boletos-venta">

                                </tbody>
                            </table>
                        </div>
                        <div class="mx-auto">
                            <button id="btn-registrar-boleto-venta" class="btn btn-success" style="margin: 10px;" value="0" data-bs-toggle="modal" data-bs-target="#modal-registrar-boleto-venta">Agregar</button>
                            <button id="btn-editar-boleto-venta" class="btn btn-info" style="margin: 10px;" value="0" data-bs-toggle="modal" data-bs-target="#modal-editar-boleto-venta" onclick="modalEditarBoleto()" disabled>Editar</button>
                            <button id="btn-eliminar-boleto-venta" class="btn btn-danger" style="margin: 10px;" value="0" onclick="eliminarBoleto()" disabled>Eliminar</button>
                            <button id="btn-registrar-venta-cliente" class="btn btn-primary" style="margin: 10px;" value="0" data-bs-toggle="modal" data-bs-target="#confirmar-agregar-venta-cliente" disabled>Registrar la Venta</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        setFecha();
        datosCliente();
    });

    function datosCliente() {
        var dni = document.getElementById("registrar-venta-dni").value;
        let datos = {
            "accion": "seleccionarClientePorDni",
            "dni": dni
        }
        $.ajax({
            url: "../../Controller/ClientesController.php",
            type: "POST",
            data: datos,
            dataType: "json",
            success: function(response) {
                $("#registrar-venta-nombres").val(response.nombres);
                $("#registrar-venta-apellidos").val(response.apellidos);
                $("#registrar-venta-dni").val(response.dni);
                $("#registrar-venta-telefono").val(response.telefono);
            },
            error: function() {
                console.log("Error al cargar los datos del cliente.");
            }
        });
    }


    function setFecha() {
        var fechaInput = document.getElementById("registrar-venta-fecha");
        var fechaActual = new Date().toISOString().split("T")[0];
        fechaInput.value = fechaActual;

        var horaInput = document.getElementById("registrar-venta-hora");
        var fechaHoraActual = new Date().toLocaleString("es-PE", {
            timeZone: "America/Lima",
            hour: "numeric",
            minute: "numeric",
            hour12: true
        });

        horaInput.value = fechaHoraActual;
    }

    function cargarRutas(btn) {
        modal = btn.value;
        let datos = {
            "accion": "cargarRutas"
        }
        $.ajax({
            url: "../../Controller/VentasController.php",
            type: "POST",
            data: datos,
            success: function(response) {
                $("#seleccionar-tabla-rutas-venta")[0].innerHTML = response;
            },
            error: function() {
                console.log("Error al cargar la sección de rutas.");
            }
        });
    }
    var rutaAnterior = "0";
    var input_id_ruta = "",
        input_ciudad_salida_ruta = "",
        input_ciudad_llegada_ruta = "",
        input_tipo_viaje_ruta = "",
        input_costo_ruta = "";

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
        $("#modal-" + modal + "-boleto-venta-id-ruta")[0].value = input_id_ruta;
        $("#modal-" + modal + "-boleto-venta-ciudad-salida")[0].value = input_ciudad_salida_ruta;
        $("#modal-" + modal + "-boleto-venta-ciudad-llegada")[0].value = input_ciudad_llegada_ruta;
        $("#modal-" + modal + "-boleto-venta-precio")[0].value = input_costo_ruta;

        var tipoModal = document.getElementById('modal-' + modal + '-boleto-venta');
        var mostrarModal = new bootstrap.Modal(tipoModal);
        mostrarModal.show();
    }
    var num_boletos = 0;
    var indice = 0;

    function agregarBoletoEnLista(n_filas) {
        indice++;
        num_boletos++;
        let id_ruta = $("#modal-registrar-boleto-venta-id-ruta")[0].value;
        let ciudad_salida = $("#modal-registrar-boleto-venta-ciudad-salida")[0].value;
        let ciudad_llegada = $("#modal-registrar-boleto-venta-ciudad-llegada")[0].value;
        let costo = $("#modal-registrar-boleto-venta-precio")[0].value;
        let hora_viaje = $("#modal-registrar-boleto-venta-hora-viaje")[0].value;
        let fecha_viaje = $("#modal-registrar-boleto-venta-fecha-viaje")[0].value;
        let monto = $("#registrar-venta-monto-total")[0].value;
        monto_total = parseFloat(monto) + parseFloat(costo);
        $("#registrar-venta-monto-total")[0].value = parseFloat(monto_total);
        $("#registrar-venta-n-boletos")[0].value = num_boletos;
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

        let fila = "<tr id='boleto-registrado-" + indice + "' onclick='seleccionarBoleto(" + indice + ")' ><td>" + indice + "</td><td>" + id_ruta + "</td><td>" + ciudad_salida + "</td><td>" + ciudad_llegada + "</td><td>" + hora_viaje + "</td><td>" + hora + "</td><td>" + fecha_viaje + "</td><td>" + costo + "</td></tr>";
        $("#registro-tabla-boletos-venta")[0].innerHTML += fila;
        $("#btn-registrar-venta-cliente")[0].disabled = false;
    }
    var registroAnterior = 0;

    function seleccionarBoleto(indice) {
        if (registroAnterior != 0) {
            $("#boleto-registrado-" + registroAnterior)[0].classList.remove("table-active");
        }
        registroAnterior = indice;
        $("#boleto-registrado-" + indice)[0].classList.add("table-active");
        $("#btn-editar-boleto-venta")[0].value = indice;
        $("#btn-editar-boleto-venta")[0].disabled = false;
        $("#btn-eliminar-boleto-venta")[0].value = indice;
        $("#btn-eliminar-boleto-venta")[0].disabled = false;
    }
    var descontar_monto = 0;

    function modalEditarBoleto() {
        let indice = $("#btn-editar-boleto-venta")[0].value;
        var tabla = document.getElementById("boleto-registrado-" + indice);

        $("#modal-editar-boleto-venta-id-ruta")[0].value = tabla.cells[1].innerHTML;
        $("#modal-editar-boleto-venta-ciudad-salida")[0].value = tabla.cells[2].innerHTML;
        $("#modal-editar-boleto-venta-ciudad-llegada")[0].value = tabla.cells[3].innerHTML;
        $("#modal-editar-boleto-venta-precio")[0].value = tabla.cells[7].innerHTML;
        $("#modal-editar-boleto-venta-hora-viaje")[0].selectedIndex = parseInt(tabla.cells[4].innerHTML) - 1;
        $("#modal-editar-boleto-venta-fecha-viaje")[0].value = tabla.cells[6].innerHTML;
        descontar_monto = parseInt(tabla.cells[7].innerHTML);
    }

    function editarBoleto() {
        let monto_actual = $("#registrar-venta-monto-total")[0].value;
        let indice = $("#btn-editar-boleto-venta")[0].value;
        let id_ruta = $("#modal-editar-boleto-venta-id-ruta")[0].value;
        let ciudad_salida = $("#modal-editar-boleto-venta-ciudad-salida")[0].value;
        let ciudad_llegada = $("#modal-editar-boleto-venta-ciudad-llegada")[0].value;
        let costo = $("#modal-editar-boleto-venta-precio")[0].value;
        let hora_viaje = $("#modal-editar-boleto-venta-hora-viaje")[0].value;
        let fecha_viaje = $("#modal-editar-boleto-venta-fecha-viaje")[0].value;

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

        var tabla = document.getElementById("boleto-registrado-" + indice);
        tabla.cells[1].innerHTML = id_ruta;
        tabla.cells[2].innerHTML = ciudad_salida;
        tabla.cells[3].innerHTML = ciudad_llegada;
        tabla.cells[4].innerHTML = hora_viaje;
        tabla.cells[5].innerHTML = hora;
        tabla.cells[6].innerHTML = fecha_viaje;
        tabla.cells[7].innerHTML = costo;

        let nuevo_monto = parseInt(monto_actual) - descontar_monto + parseInt(costo);
        $("#registrar-venta-monto-total")[0].value = nuevo_monto;

        $("#btn-editar-boleto-venta")[0].value = "";
        $("#btn-editar-boleto-venta")[0].disabled = true;
        $("#btn-eliminar-boleto-venta")[0].value = "";
        $("#btn-eliminar-boleto-venta")[0].disabled = true;

        $("#boleto-registrado-" + registroAnterior)[0].classList.remove("table-active");
        registroAnterior = 0;
    }

    function eliminarBoleto(btn) {
        let indice = $("#btn-eliminar-boleto-venta")[0].value;
        var tabla = document.getElementById("boleto-registrado-" + indice);
        let descontar = tabla.cells[7].innerHTML;

        var fila = document.getElementById("boleto-registrado-" + indice);
        fila.parentNode.removeChild(fila);
        let n_boletos = $("#registrar-venta-n-boletos")[0].value;
        $("#registrar-venta-n-boletos")[0].value = n_boletos - 1;
        let monto = parseInt($("#registrar-venta-monto-total")[0].value);
        nuevo_monto = parseFloat(monto) - parseFloat(descontar);
        $("#registrar-venta-monto-total")[0].value = parseFloat(nuevo_monto);
        registroAnterior = 0;
        num_boletos--;
        $("#btn-editar-boleto-venta")[0].value = "";
        $("#btn-editar-boleto-venta")[0].disabled = true;
        $("#btn-eliminar-boleto-venta")[0].value = "";
        $("#btn-eliminar-boleto-venta")[0].disabled = true;
    }

    //REGISTRAR VENTA
    function registrarVenta() {
        //Validar inputs
        var datos = new FormData();
        // Agregar los valores de los campos de entrada a formData
        datos.append('id_cliente', $("#registrar-venta-id-cliente").val());
        datos.append('n_boletos', $("#registrar-venta-n-boletos").val());
        datos.append('tipo_pago', $("#registrar-venta-tipo-pago").val());
        datos.append('monto_total', $("#registrar-venta-monto-total").val());
        datos.append('tipo_viaje', "TERRESTRE");
        datos.append('hora_registro', $("#registrar-venta-hora").val());
        datos.append('fecha_registro', $('#registrar-venta-fecha').val());

        var boletos_registrados = new Array();
        var tabla = document.getElementById('registro-tabla-boletos-venta');

        var filas = tabla.rows;

        // Recorrer las filas y obtener los datos de las celdas
        for (var i = 0; i < filas.length; i++) {
            var celdas = filas[i].cells;
            var boleto = [($("#registrar-venta-id-cliente").val())];
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
            success: function(response) {
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se registro la venta con exito.</b>";
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al registrar la venta: </b>" + response;
                        break;
                }
            },
            error: function() {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al agregar la venta.</b>";
            }
        });

    }

</script>