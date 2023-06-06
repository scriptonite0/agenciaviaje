<?php

include_once(__DIR__ . "/../Model/DAO/DAOUsuarios.php");

if (isset($_POST["accion"])) {
    $DAO = new DaoUsuario();
    switch ($_POST["accion"]) {
        case "iniciarSesion":
            $login = $DAO->iniciarSesion($_POST["dni_usuario"], $_POST["password_usuario"]);
            if ($login == true) {
                $mensaje = "usuario/dashboard.php";
            } else {
                $mensaje = "acceso denegado";
            }
            echo $mensaje;
            break;
        case "registrarse":
            $register = $DAO->registrarse($_POST["nombres"], $_POST["apellidos"], $_POST["dni_usuario"], $_POST["password_usuario"], "CLIENTE");
            echo $register;
            break;
        case "cerrarSesion":
            session_start();
            session_destroy();
            echo "../index.php";
            break;
    }
}
