$(document).ready(function () {
    listaEmpleados();
});

function listaEmpleados() {
    let datos = { "accion": "listaEmpleados" }
    $.ajax({
        url: "../../Controller/EmpleadosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-empleados")[0].innerHTML = response;
        },
        error: function () {
            console.log("Error al cargar la sección de usuario.");
        }
    });
}

function buscarPor() {
    let buscar = $("#buscar-empleado").val();
    let filtro = $("#filtrar-empleado").val();

    let datos = {
        "accion": "buscarPor",
        "buscar": buscar,
        "filtro": filtro
    }
    $.ajax({
        url: "../../Controller/EmpleadosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            $("#tabla-empleados")[0].innerHTML = response;
            $("#btn-editar-empleado")[0].disabled = true;
            $("#btn-editar-empleado")[0].classList.remove("btn-primary");
            $("#btn-editar-empleado")[0].classList.add("btn-secondary");
            $("#btn-editar-empleado")[0].value = "";
            $("#btn-borrar-empleado")[0].disabled = true;
            $("#btn-borrar-empleado")[0].classList.remove("btn-danger");
            $("#btn-borrar-empleado")[0].classList.add("btn-secondary");
            $("#btn-borrar-empleado")[0].value = "";
        },
        error: function () {
            console.log("Error al cargar la lista de empleados.");
        }
    });
}

//MOSTRAR IMAGEN SELECCIONADA
document.getElementById('agregar-empleado-foto').addEventListener('change', function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        var imageUrl = e.target.result;
        var imagenPreview = $('#mostrar-foto-empleado')[0];
        imagenPreview.style.backgroundImage = 'url(' + imageUrl + ')';
    };
    reader.readAsDataURL(file);
});
document.getElementById('editar-empleado-foto').addEventListener('change', function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        var imageUrl = e.target.result;
        var imagenPreview = $('#cargar-foto-empleado')[0];
        imagenPreview.style.backgroundImage = 'url(' + imageUrl + ')';
    };
    reader.readAsDataURL(file);
});

//SELECCIONAR EMPLEADO
var registroAnterior = 0;
var imagenEmpleado;
function seleccionarEmpleado(id) {
    if (registroAnterior != 0) {
        $("#empleado-" + registroAnterior)[0].classList.remove("table-active");
    }
    registroAnterior = id;
    $("#empleado-" + id)[0].classList.add("table-active");
    $("#btn-editar-empleado")[0].disabled = false;
    $("#btn-editar-empleado")[0].classList.remove("btn-secondary");
    $("#btn-editar-empleado")[0].classList.add("btn-primary");
    $("#btn-editar-empleado")[0].value = id;
    $("#btn-borrar-empleado")[0].disabled = false;
    $("#btn-borrar-empleado")[0].classList.remove("btn-secondary");
    $("#btn-borrar-empleado")[0].classList.add("btn-danger");
    $("#btn-borrar-empleado")[0].value = id;

    let datos = {
        "accion": "seleccionarEmpleado",
        "id": id
    }
    $.ajax({
        url: "../../Controller/EmpleadosController.php",
        type: "POST",
        data: datos,
        dataType: "json",
        success: function (response) {
            imagenEmpleado = response.foto;
            $("#editar-empleado-nombres").val(response.nombres);
            $("#editar-empleado-apellidos").val(response.apellidos);
            $("#editar-empleado-dni").val(response.dni);
            $("#editar-empleado-cargo").val(response.cargo);
            $("#editar-empleado-telefono").val(response.telefono);
            $("#editar-empleado-direccion").val(response.direccion);
            $("#editar-empleado-correo").val(response.correo);

            //Mostrar foto del empleado
            var base64 = "data:image/png;base64, " + response.foto;
            $("#cargar-foto-empleado")[0].style.backgroundImage = "url('" + base64 + "')";

        },
        error: function () {
        }
    });
}

//AGREGAR EMPLEADO
function agregarEmpleado() {
    //Validar inputs
    if ($("#agregar-empleado-nombres").val() != "" && $("#agregar-empleado-apellidos").val() != ""
        && $("#agregar-empleado-dni").val() != "" && $("#agregar-empleado-direccion").val() != ""
        && $("#agregar-empleado-telefono").val() != "" && $("#agregar-empleado-correo").val() != ""
        && $("#agregar-empleado-cargo").val() != "") {
        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('nombres', $("#agregar-empleado-nombres").val());
        datos.append('apellidos', $("#agregar-empleado-apellidos").val());
        datos.append('dni', $("#agregar-empleado-dni").val());
        datos.append('cargo', $("#agregar-empleado-cargo").val());
        datos.append('direccion', $("#agregar-empleado-direccion").val());
        datos.append('telefono', $("#agregar-empleado-telefono").val());
        datos.append('correo', $("#agregar-empleado-correo").val());
        datos.append('accion', 'agregarEmpleado');

        var file = $("#agregar-empleado-foto")[0]; // Obtener el elemento de entrada de archivo
        if (file.files.length > 0) {
            datos.append('agregarFoto', "si");
            datos.append('imagen', file.files[0]);
        } else {
            datos.append('agregarFoto', "no");
        }
        $.ajax({
            url: "../../Controller/EmpleadosController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaEmpleados();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se registro el empleado con exito.</b>";

                        $("#agregar-empleado-nombres").val("");
                        $("#agregar-empleado-apellidos").val("");
                        $("#agregar-empleado-dni").val("");
                        $("#agregar-empleado-direccion").val("");
                        $("#agregar-empleado-telefono").val("");
                        $("#agregar-empleado-correo").val("");
                        $("#agregar-empleado-cargo").val("");

                        var imagenPreview = $('#mostrar-foto-empleado')[0];
                        imagenPreview.style.backgroundImage = 'white';

                        break;
                    default:
                        $("#mensaje-servidor")[0].innerHTML = "<b>Error al registrar el empleado: </b>" + response;
                        break;
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al agregar el registro.</b>";
            }
        });
    } else {
        $("#mensaje-servidor")[0].innerHTML = "<b>Completar todos los campos.</b>";

    }
}

//EDITAR EMPLEADO
function editarEmpleado() {

    //Validar inputs
    if ($("#editar-empleado-nombres").val() != "" && $("#editar-empleado-apellidos").val() != ""
        && $("#editar-empleado-dni").val() != "" && $("#editar-empleado-direccion").val() != ""
        && $("#editar-empleado-telefono").val() != "" && $("#editar-empleado-correo").val() != ""
        && $("#editar-empleado-cargo").val() != "") {
        var datos = new FormData();

        // Agregar los valores de los campos de entrada a formData
        datos.append('id', $("#btn-editar-empleado").val());
        datos.append('nombres', $("#editar-empleado-nombres").val());
        datos.append('apellidos', $("#editar-empleado-apellidos").val());
        datos.append('dni', $("#editar-empleado-dni").val());
        datos.append('direccion', $("#editar-empleado-direccion").val());
        datos.append('telefono', $("#editar-empleado-telefono").val());
        datos.append('correo', $("#editar-empleado-correo").val());
        datos.append('cargo', $("#editar-empleado-cargo").val());

        var file = $("#editar-empleado-foto")[0]; // Obtener el elemento de entrada de archivo
        if (file.files.length > 0) {
            datos.append('cambiarFoto', "si");
            datos.append('imagen', file.files[0]);
        } else {
            datos.append('cambiarFoto', "no");
        }

        // Agregar la acción al formData
        datos.append('accion', 'editarEmpleado');

        $.ajax({
            url: "../../Controller/EmpleadosController.php",
            type: "POST",
            data: datos,
            contentType: false,
            processData: false,
            success: function (response) {
                listaEmpleados();
                switch (response) {
                    case "exito":
                        $("#mensaje-servidor")[0].innerHTML = "<b>Se edito el registro con exito.</b>";
                        var imagenEditar = $('#cargar-foto-empleado')[0];
                        imagenEditar.style.backgroundImage = 'white';
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

//BORRAR EMPLEADO
function borrarEmpleado() {
    let datos = {
        "accion": "eliminarEmpleado",
        "id": $("#btn-borrar-empleado").val()
    }
    $.ajax({
        url: "../../Controller/EmpleadosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            listaEmpleados();
            $("#mensaje-servidor")[0].innerHTML = "<b>" + response + "</b>";
            $("#btn-editar-empleado")[0].disabled = true;
            $("#btn-editar-empleado")[0].classList.remove("btn-primary");
            $("#btn-editar-empleado")[0].classList.add("btn-secondary");
            $("#btn-editar-empleado")[0].value = "";
            $("#btn-borrar-empleado")[0].disabled = true;
            $("#btn-borrar-empleado")[0].classList.remove("btn-danger");
            $("#btn-borrar-empleado")[0].classList.add("btn-secondary");
            $("#btn-borrar-empleado")[0].value = "";
            registroAnterior = 0;
        },
        error: function () {
            $("#mensaje-servidor")[0].innerHTML = "<b>Error al eliminar el registro.</b>";
        }
    });
}