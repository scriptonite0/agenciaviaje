$(document).ready(function () {
    listaClientes();
});

function listaClientes() {
    let datos = { "accion": "listaClientes" }
    $.ajax({
        url: "../../Controller/ClientesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-clientes")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de usuario.");
        }
    });
}
function buscarPor() {
    let buscar = $("#buscar-cliente").val();
    let filtro = $("#filtrar-cliente").val();

    let datos = {
        "accion": "buscarPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/ClientesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-clientes")[0].innerHTML = response;
            $("#btn-editar-cliente")[0].disabled = true;
            $("#btn-editar-cliente")[0].classList.remove("btn-primary");
            $("#btn-editar-cliente")[0].classList.add("btn-secondary");
            $("#btn-editar-cliente")[0].value = "";
            $("#btn-borrar-cliente")[0].disabled = true;
            $("#btn-borrar-cliente")[0].classList.remove("btn-danger");
            $("#btn-borrar-cliente")[0].classList.add("btn-secondary");
            $("#btn-borrar-cliente")[0].value = "";
        },
        error: function () {
            console.log("Error al cargar la lista de clientes.");
        }
    });
}

//MOSTRAR IMAGEN SELECCIONADA
document.getElementById('agregar-cliente-foto').addEventListener('change', function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        var imageUrl = e.target.result;
        var imagenPreview = $('#mostrar-cliente-foto')[0];
        imagenPreview.style.backgroundImage = 'url(' + imageUrl + ')';
    };
    reader.readAsDataURL(file);
});
document.getElementById('editar-cliente-foto').addEventListener('change', function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        var imageUrl = e.target.result;
        var imagenPreview = $('#cargar-cliente-foto')[0];
        imagenPreview.style.backgroundImage = 'url(' + imageUrl + ')';
    };
    reader.readAsDataURL(file);
});

//SELECCIONAR CLIENTE
var registroAnterior = 0;
function seleccionarCliente(id) {
    if (registroAnterior != 0) {
        $("#cliente-" + registroAnterior)[0].classList.remove("table-active");
    }
    registroAnterior = id;
    $("#cliente-" + id)[0].classList.add("table-active");
    $("#btn-editar-cliente")[0].disabled = false;
    $("#btn-editar-cliente")[0].classList.remove("btn-secondary");
    $("#btn-editar-cliente")[0].classList.add("btn-primary");
    $("#btn-editar-cliente")[0].value = id;
    $("#btn-borrar-cliente")[0].disabled = false;
    $("#btn-borrar-cliente")[0].classList.remove("btn-secondary");
    $("#btn-borrar-cliente")[0].classList.add("btn-danger");
    $("#btn-borrar-cliente")[0].value = id;
    $("#editar-cliente-foto")[0].value = "";

    let datos = {
        "accion": "seleccionarCliente",
        "id": id
    }
    $.ajax({
        url: "../../Controller/ClientesController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            $("#editar-cliente-nombres").val(response.nombres);
            $("#editar-cliente-apellidos").val(response.apellidos);
            $("#editar-cliente-dni").val(response.dni);
            $("#editar-cliente-carnet-extranjeria").val(response.carnet_extranjeria);
            $("#editar-cliente-pasaporte").val(response.pasaporte);
            $("#editar-cliente-direccion").val(response.direccion);
            $("#editar-cliente-correo").val(response.correo);
            $("#editar-cliente-telefono").val(response.telefono);
            $("#editar-cliente-genero").val(response.genero);
            $("#editar-cliente-fecha-registro").val(response.fecha_registro_cliente);

            var base64 = "data:image/png;base64, " + response.foto;
            $("#cargar-cliente-foto")[0].style.backgroundImage = "url('" + base64 + "')";
        },
        error: function () {
        }
    });
}

//AGREGAR CLIENTE
function agregarCliente() {
    //Validar inputs
    if ($("#agregar-cliente-nombres").val() != "" && $("#agregar-cliente-apellidos").val() != ""
        && $("#agregar-cliente-dni").val() != "" && $("#agregar-cliente-carnet-extranjeria").val() != ""
        && $("#agregar-cliente-pasaporte").val() != "") {
        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('nombres', $("#agregar-cliente-nombres").val());
        datos.append('apellidos', $("#agregar-cliente-apellidos").val());
        datos.append('dni', $("#agregar-cliente-dni").val());
        datos.append('carnet_extranjeria', $("#agregar-cliente-carnet-extranjeria").val());
        datos.append('pasaporte', $("#agregar-cliente-pasaporte").val());

        datos.append('direccion', $("#agregar-cliente-direccion").val());
        datos.append('telefono', $("#agregar-cliente-telefono").val());
        datos.append('correo', $("#agregar-cliente-correo").val());
        datos.append('genero', $("#agregar-cliente-genero").val());
        datos.append('fecha_registro_cliente', $("#agregar-cliente-fecha-registro").val());
        datos.append('accion', 'agregarCliente');

        console.log($("#agregar-cliente-nombres").val());
        console.log($("#agregar-cliente-apellidos").val());
        console.log($("#agregar-cliente-dni").val());
        console.log($("#agregar-cliente-carnet-extranjeria").val());
        console.log($("#agregar-cliente-pasaporte").val());
        console.log($("#agregar-cliente-direccion").val());
        console.log($("#agregar-cliente-telefono").val());
        console.log($("#agregar-cliente-correo").val());
        console.log($("#agregar-cliente-genero").val());
        console.log($("#agregar-cliente-fecha-registro").val());

        var file = $("#agregar-cliente-foto")[0]; // Obtener el elemento de entrada de archivo
        if (file.files.length > 0) {
            datos.append('agregarFoto', "si");
            datos.append('imagen', file.files[0]);
        } else {
            datos.append('agregarFoto', "no");
        }
        $.ajax({
            url: "../../Controller/ClientesController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaClientes();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "Se registro el <b>cliente</b>  con exito.";

                        $("#agregar-cliente-nombres").val("");
                        $("#agregar-cliente-apellidos").val("");
                        $("#agregar-cliente-dni").val("");
                        $("#agregar-cliente-carnet-extranjeria").val("");
                        $("#agregar-cliente-pasaporte").val("");
                        $("#agregar-cliente-direccion").val("");
                        $("#agregar-cliente-telefono").val("");
                        $("#agregar-cliente-correo").val("");
                        $("#agregar-cliente-genero").val("");
                        $("#agregar-cliente-fecha-registro").val("");

                        var imagenPreview = $('#mostrar-cliente-foto')[0];
                        imagenPreview.style.backgroundImage = 'white';
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al registrar el cliente: </b>" + response;
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

//EDITAR CLIENTE
function editarCliente() {

    //Validar inputs
    if ($("#editar-cliente-nombres").val() != "" && $("#editar-cliente-apellidos").val() != ""
        && $("#editar-cliente-dni").val() != "" && $("#editar-cliente-carnet-extranjeria").val() != ""
        && $("#editar-cliente-pasaporte").val() != "") {
        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('id_cliente', $("#btn-editar-cliente").val());
        datos.append('nombres', $("#editar-cliente-nombres").val());
        datos.append('apellidos', $("#editar-cliente-apellidos").val());
        datos.append('dni', $("#editar-cliente-dni").val());
        datos.append('carnet_extranjeria', $("#editar-cliente-carnet-extranjeria").val());
        datos.append('pasaporte', $("#editar-cliente-pasaporte").val());
        datos.append('direccion', $("#editar-cliente-direccion").val());
        datos.append('telefono', $("#editar-cliente-telefono").val());
        datos.append('correo', $("#editar-cliente-correo").val());
        datos.append('genero', $("#editar-cliente-genero").val());
        datos.append('fecha_registro_cliente', $("#editar-cliente-fecha-registro").val());
        datos.append('accion', 'editarCliente');

        var file = $("#editar-cliente-foto")[0]; // Obtener el elemento de entrada de archivo
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
            success: function (response) {
                listaClientes();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se edito el registro con exito.</b>";
                        $("#btn-editar-cliente")[0].disabled = true;
                        $("#btn-editar-cliente")[0].classList.remove("btn-primary");
                        $("#btn-editar-cliente")[0].classList.add("btn-secondary");
                        $("#btn-editar-cliente")[0].value = "";
                        $("#btn-borrar-cliente")[0].disabled = true;
                        $("#btn-borrar-cliente")[0].classList.remove("btn-danger");
                        $("#btn-borrar-cliente")[0].classList.add("btn-secondary");
                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el empleado: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al editar el registro.</b>";
            }
        });
    } else {
        $("#empleado-" + registroAnterior)[0].classList.remove("table-active");
        $("#btn-editar-empleado")[0].disabled = true;
        $("#btn-editar-empleado")[0].classList.remove("btn-primary");
        $("#btn-editar-empleado")[0].classList.add("btn-secondary");
        $("#btn-editar-empleado")[0].value = "";
        $("#btn-borrar-empleado")[0].disabled = true;
        $("#btn-borrar-empleado")[0].classList.remove("btn-danger");
        $("#btn-borrar-empleado")[0].classList.add("btn-secondary");
        $("#btn-borrar-empleado")[0].value = "";
        $("#mensaje-servidor")[0].innerHTML = "<b>No puede dejar ningun campo vacío.</b>";
    }
}

//BORRAR CLIENTE
function borrarCliente() {
    let datos = {
        "accion": "eliminarCliente",
        "id_cliente": $("#btn-borrar-cliente").val()
    }
    $.ajax({
        url: "../../Controller/ClientesController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            listaClientes();
            $("#mensaje-servidor")[0].innerHTML = "<b>" + response + "</b>";
            $("#btn-editar-cliente")[0].disabled = true;
            $("#btn-editar-cliente")[0].classList.remove("btn-primary");
            $("#btn-editar-cliente")[0].classList.add("btn-secondary");
            $("#btn-editar-cliente")[0].value = "";
            $("#btn-borrar-cliente")[0].disabled = true;
            $("#btn-borrar-cliente")[0].classList.remove("btn-danger");
            $("#btn-borrar-cliente")[0].classList.add("btn-secondary");
            $("#btn-borrar-cliente")[0].value = "";
            registroAnterior = 0;
        },
        error: function () {
            $("#mensaje-servidor")[0].innerHTML = "<b>Error al eliminar el registro.</b>";
        }
    });
}
