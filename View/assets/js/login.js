function showHidePasswordLogin() {
    let btn = $("#btn-show-hide-login")[0];
    let password = $("#login_password")[0];
    if (btn.textContent == "Mostrar") {
        password.type = "text";
        btn.innerHTML = "Ocultar";
    } else if (btn.textContent == "Ocultar") {
        password.type = "password";
        btn.innerHTML = "Mostrar";
    }
}