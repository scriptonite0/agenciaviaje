<?php
session_start();
if (isset($_SESSION['dni_usuario'])) {
?>
    <div class="container text-center">
        <div class="row " style="padding-top:1rem;">

            <!-- TABLA -->
            <div id="div-tabla-boletos-clientes" class="col-md-11  ">
                <div class="card difuminado shadow" style="height: 80vh;">
                    <div class="card-header d-flex">
                        <h3>Mis boletos de Viaje</h3>
                        <div class="input-group  ms-auto" style="width: 40%;">
                            <input id="cliente-buscar-boleto" class="form-control shadow" style="width: 40%;" type="search" placeholder="Buscar" aria-label="Buscar" onkeyup="buscarPor();">
                            <select class="form-select bg-light shadow fs-5" id="cliente-filtrar-boleto">
                                <option value="id_boleto" selected>ID Boleto</option>
                                <option value="id_ruta">ID Ruta</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body" style="padding:var(--bs-card-spacer-x);">
                        <div class="table-responsive " style="height: 65vh;">
                            <table class="table table-hover">
                                <thead style="vertical-align: top;">
                                    <tr style="font-size:20px;">
                                        <th scope="col">ID Boleto</th>
                                        <th scope="col">Ruta</th>
                                        <th scope="col">Costo</th>
                                        <th scope="col">Hora de Viaje</th>
                                        <th scope="col">Fecha de Viaje</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Detalles</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-boletos-clientes">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FUNCIONES -->
        <div id="card-funciones-boletos-clientes" class="position-absolute top-50 end-0 translate-middle-y" style="transition: 0.3s ease all;">
            <div class="card difuminado shadow" style="border-radius: 20px 0 0 20px !important;">
                <div class="card-header">
                    <h5><b>Opciones</b></h5>
                </div>
                <div class="card-body d-block">
                    <button id="btn-editar-boleto-cliente" class="btn btn-secondary shadow" data-bs-toggle="modal" data-bs-target="#editar-boleto" disabled><i class="fa-solid fa-pen-to-square" style="font-size:32px;"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var tablaEditable = "";
        var tablaNoEditable = "";

        $(document).ready(function() {
            listaBoletosRegistradosEditable();
            listaBoletosRegistradosNoEditable();
        });

        function listaBoletosRegistradosEditable() {
            var dni = <?php echo ($_SESSION["dni_usuario"]); ?>;
            let datos = {
                "accion": "listaBoletosClienteEditar",
                "dni": dni
            }
            $.ajax({
                url: "../../Controller/BoletosController.php",
                type: "POST",
                data: datos,
                success: function(response) {
                    $("#tabla-boletos-clientes")[0].innerHTML = response;
                },
                error: function() {
                    console.log("Error al cargar los boletos del cliente.");
                }
            });
        }

        function listaBoletosRegistradosNoEditable() {
            var dni = <?php echo ($_SESSION["dni_usuario"]); ?>;
            let datos = {
                "accion": "listaBoletosClienteNoEditar",
                "dni": dni
            }
            $.ajax({
                url: "../../Controller/BoletosController.php",
                type: "POST",
                data: datos,
                success: function(response) {
                    $("#tabla-boletos-clientes")[0].innerHTML += response;
                },
                error: function() {
                    console.log("Error al cargar los boletos del cliente.");
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
            $("#btn-editar-boleto-cliente")[0].disabled = false;
            $("#btn-editar-boleto-cliente")[0].classList.remove("btn-secondary");
            $("#btn-editar-boleto-cliente")[0].classList.add("btn-primary");
            $("#btn-editar-boleto-cliente")[0].value = id;

            let datos = {
                "accion": "seleccionarBoleto",
                "id_boleto": id
            }
            $.ajax({
                url: "../../Controller/BoletosController.php",
                type: "POST",
                data: datos,
                dataType: "json",
                success: function(response) {

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
                error: function() {}
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
                success: function(response) {
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
                error: function() {}
            });
        }
        ////////
        var modal = "";
        var descontar_monto = 0;

        function cargarRutas(btn) {
            descontar_monto = $("#editar-boleto-precio").val();
            modal = btn.value;
            let datos = {
                "accion": "cargarRutas"
            }
            $.ajax({
                url: "../../Controller/BoletosController.php",
                type: "POST",
                data: datos,
                success: function(response) {
                    $("#seleccionar-tabla-rutas")[0].innerHTML = response;
                },
                error: function() {
                    console.log("Error al cargar la sección de rutas.");
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
                success: function(response) {
                    $("#seleccionar-tabla-rutas")[0].innerHTML = response;
                },
                error: function() {
                    console.log("Error al cargar la lista de rutas.");
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
            $("#" + modal + "-boleto-id-ruta")[0].value = input_id_ruta;
            $("#" + modal + "-boleto-ciudad-salida")[0].value = input_ciudad_salida_ruta;
            $("#" + modal + "-boleto-ciudad-llegada")[0].value = input_ciudad_llegada_ruta;
            $("#" + modal + "-boleto-tipo-viaje")[0].value = input_tipo_viaje_ruta;
            $("#" + modal + "-boleto-precio")[0].value = input_costo_ruta;


            var tipoModal = document.getElementById(modal + '-boleto');
            var mostrarModal = new bootstrap.Modal(tipoModal);
            mostrarModal.show();
        }

        function volver() {
            var tipoModal = document.getElementById(modal + '-boleto');
            var mostrarModal = new bootstrap.Modal(tipoModal);
            mostrarModal.show();
        }

        function editarBoleto() {
            //Validar inputs
            if ($("#editar-boleto-id-cliente").val() != "" && $("#editar-boleto-id-ruta").val() != "" &&
                $("#editar-boleto-fecha-viaje").val() != "") {
                var datos = new FormData();

                // Editar los valores de los campos de entrada a formData
                datos.append("accion", "editarBoleto");
                datos.append("id_boleto", $("#btn-editar-boleto-cliente").val());
                datos.append("id_cliente", $("#editar-boleto-id-cliente").val());
                datos.append("id_ruta", $("#editar-boleto-id-ruta").val());
                datos.append("hora_viaje", $("#editar-boleto-hora-viaje").val());
                datos.append("fecha_viaje", $("#editar-boleto-fecha-viaje").val());
                datos.append("hora_registro", $("#editar-boleto-hora-registro").val());
                datos.append("fecha_registro", $("#editar-boleto-fecha-registro").val());
                datos.append("descontar_monto", descontar_monto);
                console.log(descontar_monto);
                $.ajax({
                    url: "../../Controller/BoletosController.php",
                    type: "POST",
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        listaBoletosRegistradosEditable();
                        listaBoletosRegistradosNoEditable();
                        switch (response) {
                            case "exito":
                                $("#mensaje-servidor")[0].innerHTML = "Se edito el <b>boleto</b>  con exito.";

                                $("#btn-editar-boleto-cliente").val("");
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

                                $("#btn-editar-boleto-cliente")[0].disabled = true;
                                $("#btn-editar-boleto-cliente")[0].classList.remove("btn-primary");
                                $("#btn-editar-boleto-cliente")[0].classList.add("btn-secondary");
                                $("#btn-editar-boleto-cliente")[0].value = "";
                                break;
                            default:
                                $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el boleto: </b>" + response;
                                break;
                        }
                    },
                    error: function() {
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el registro.</b>";
                    }
                });

            } else {
                $("#mensaje-servidor")[0].innerHTML = "<b>Completar los datos necesarios.</b>";
            }
        }
    </script>
<?php
}
?>