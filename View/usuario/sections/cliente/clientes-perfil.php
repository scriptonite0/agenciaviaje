<div class="container">
    <div class="row">
        <div class="offset-sm-1 col-sm-10">
            <div class="card w-100 m-2 p-3">
                <h5><b>Datos Personales</b></h5>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="cliente-perfil-dni" class="col-form-label"><b>DNI</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-dni" value="<?php session_start(); echo ($_SESSION['dni_usuario']); ?>" disabled>
                        <label for="cliente-perfil-nombres" class="col-form-label"><b>Nombres</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-nombres">
                        <label for="cliente-perfil-apellidos" class="col-form-label"><b>Apellidos</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-apellidos">
                        <label for="cliente-perfil-carnet-extranjeria" class="col-form-label"><b>Carnet de Extranjeria</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-carnet-extranjeria">
                        <label for="cliente-perfil-pasaporte" class="col-form-label"><b>Pasaporte</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-pasaporte">
                    </div>
                    <div class="col-sm-4">
                        <label for="cliente-perfil-direccion" class="col-form-label"><b>Dirección</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-direccion">
                        <label for="cliente-perfil-telefono" class="col-form-label"><b>Telefono</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-telefono">
                        <label for="cliente-perfil-correo" class="col-form-label"><b>Correo</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-correo">
                        <label for="cliente-perfil-genero" class="col-form-label"><b>Genero</b></label>
                        <select type="text" class="form-select shadow" id="cliente-perfil-genero">
                            <option value="MASCULINO">Masculino</option>
                            <option value="FEMENINO">Femenino</option>
                        </select>
                        <label for="cliente-perfil-fecha-registro" class="col-form-label"><b>Fecha de Registro</b></label>
                        <input type="text" class="form-control shadow" id="cliente-perfil-fecha-registro" value="<?php echo ($_SESSION['fecha_registro']); ?>" disabled>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-2 mb-3">
                            <label for="formFile" class="form-label "><b>Subir Foto</b></label>
                            <div id="mostrar-foto-cliente" class="mx-auto mt-2 shadow" style="height: 240px; width: 200px; background-color: white; background-size: cover; background-position: center;">
                            </div>
                            <input class="form-control shadow mt-2" type="file" id="subir-foto-cliente">
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-secondary m-2" href="dashboard.php">Volver</a>
                            <button id="guardar-cambios" value="<?php echo ($_SESSION['id_usuario']); ?>" class="btn btn-primary m-2" onclick="guardarCambiosPerfil()" data-bs-toggle="modal" data-bs-target="#respuesta-servidor">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        datosCliente();
    });

    document.getElementById('subir-foto-cliente').addEventListener('change', function(e) {
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var imageUrl = e.target.result;
            var imagenPreview = $('#mostrar-foto-cliente')[0];
            imagenPreview.style.backgroundImage = 'url(' + imageUrl + ')';
        };
        reader.readAsDataURL(file);
    });

    function datosCliente() {
        var dni = document.getElementById("cliente-perfil-dni").value;
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
                $("#cliente-perfil-dni").val(response.dni);
                $("#cliente-perfil-nombres").val(response.nombres);
                $("#cliente-perfil-apellidos").val(response.apellidos);
                $("#cliente-perfil-carnet-extranjeria").val(response.carnet_extranjeria);
                $("#cliente-perfil-pasaporte").val(response.pasaporte);
                $("#cliente-perfil-direccion").val(response.direccion);
                $("#cliente-perfil-telefono").val(response.telefono);
                $("#cliente-perfil-correo").val(response.correo);
                if (response.genero == "MASCULINO") {
                    $("#cliente-perfil-genero")[0].selectedIndex = 0;
                } else {
                    $("#cliente-perfil-genero")[0].selectedIndex = 1;
                }
                $("#cliente-perfil-fecha-registro").val(response.fecha_registro_cliente);
                var base64 = "data:image/png;base64, " + response.foto;
                $("#mostrar-foto-cliente")[0].style.backgroundImage = "url('" + base64 + "')";

            },
            error: function() {
                console.log("Error al cargar los datos del cliente.");
            }
        });
    }

    function guardarCambiosPerfil() {

        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('id_cliente', $("#guardar-cambios").val());
        datos.append('nombres', $("#cliente-perfil-nombres").val());
        datos.append('apellidos', $("#cliente-perfil-apellidos").val());
        datos.append('dni', $("#cliente-perfil-dni").val());
        datos.append('carnet_extranjeria', $("#cliente-perfil-carnet-extranjeria").val());
        datos.append('pasaporte', $("#cliente-perfil-pasaporte").val());
        datos.append('direccion', $("#cliente-perfil-direccion").val());
        datos.append('telefono', $("#cliente-perfil-telefono").val());
        datos.append('correo', $("#cliente-perfil-correo").val());
        datos.append('genero', $("#cliente-perfil-genero").val());
        datos.append('fecha_registro_cliente', $("#cliente-perfil-fecha-registro").val());

        console.log("id_cliente:"+$("#guardar-cambios").val());
        console.log("nombres:"+$("#cliente-perfil-nombres").val());
        console.log("apellidos:"+$("#cliente-perfil-apellidos").val());
        console.log("dni:"+$("#cliente-perfil-dni").val());
        console.log("carnet:"+$("#cliente-perfil-carnet-extranjeria").val());
        console.log("pasaporte:"+$("#cliente-perfil-pasaporte").val());
        console.log("direccion:"+$("#cliente-perfil-direccion").val());
        console.log("telefono:"+$("#cliente-perfil-telefono").val());
        console.log("correo:"+$("#cliente-perfil-correo").val());
        console.log("genero:"+$("#cliente-perfil-genero").val());

        var file = $("#subir-foto-cliente")[0]; // Obtener el elemento de entrada de archivo
        if (file.files.length > 0) {
            datos.append('cambiarFoto', "si");
            datos.append('imagen', file.files[0]);
        } else {
            datos.append('cambiarFoto', "no");
        }
        // Agregar la acción al formData
        datos.append('accion', 'editarCliente');

        $.ajax({
            url: "../../Controller/ClientesController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function(response) {
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se edito el registro con exito.</b>";
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al guardar los cambios: </b>" + response;
                        break;
                }
            },
            error: function() {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al guardar los cambios.</b>";
            }
        });
    }
</script>