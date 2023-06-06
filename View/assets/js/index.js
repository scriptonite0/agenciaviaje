function login() {
    var dni = document.getElementById("login-dni").value;
    var password = document.getElementById("login-password").value;

    let datos = {
        "accion": "iniciarSesion",
        "dni_usuario": dni,
        "password_usuario": password
    }
    $.ajax({
        url: "../Controller/UsuariosController.php",
        type: "POST",
        data: datos,
        success: function (response) {
            if (response == "acceso denegado") {
                alert("Datos incorrectos");
            } else {
                location.href = response;
            }
        },
        error: function () {
            $("#mensaje-servidor")[0].innerHTML = "<b>Error al eliminar el registro.</b>";
        }
    });
}
function register() {
    var nombres = document.getElementById("register-nombres").value;
    var apellidos = document.getElementById("register-apellidos").value;
    var dni = document.getElementById("register-dni").value;
    var password = document.getElementById("register-password").value;
    if (dni.length != 8) {
        alert("¡El DNI debe tener 8 dígitos!");
    }
    else if (nombres == "" || apellidos == "" || dni == "" || password == "") {
        alert("¡Complete todos los campos!");
    } else {

        let datos = {
            "accion": "registrarse",
            "nombres": nombres,
            "apellidos": apellidos,
            "dni_usuario": dni,
            "password_usuario": password
        }
        $.ajax({
            url: "../Controller/UsuariosController.php",
            type: "POST",
            data: datos,
            success: function (response) {
                if (response == "dni duplicado") {
                    alert("¡Ya existe una cuenta registrada con el DNI ingresado!");
                } else {
                    console.log(response);
                    $("#register-nombres")[0].value = "";
                    $("#register-apellidos")[0].value = "";
                    $("#register-dni")[0].value = "";
                    $("#register-password")[0].value = "";
                    alert("¡Registro exitoso!");
                }
            },
            error: function () {
                $("#mensaje-servidor")[0].innerHTML = "<b>Error al eliminar el registro.</b>";
            }
        });
    }
}

function showHidePasswordLogin() {
    let btn = $("#btn-show-hide-login")[0];
    let password = $("#login-password")[0];
    if (btn.textContent == "Mostrar") {
        password.type = "text";
        btn.innerHTML = "Ocultar";
    } else if (btn.textContent == "Ocultar") {
        password.type = "password";
        btn.innerHTML = "Mostrar";
    }
}
function showHidePasswordRegister() {
    let btn = $("#btn-show-hide-register")[0];
    let password = $("#register-password")[0];
    if (btn.textContent == "Mostrar") {
        password.type = "text";
        btn.innerHTML = "Ocultar";
    } else if (btn.textContent == "Ocultar") {
        password.type = "password";
        btn.innerHTML = "Mostrar";
    }
}