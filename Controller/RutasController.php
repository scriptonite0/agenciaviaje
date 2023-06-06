<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {
    
    include_once(__DIR__ . "/../Model/DAO/DAORutas.php");


    if (isset($_POST["accion"])) {
        $DAO = new DaoRuta();
        switch ($_POST["accion"]) {
            case "listaRutas":
                $lista = $DAO->listaRutas();
                $tabla = "";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='ruta-" . $fila["id_ruta"] . "' onclick='seleccionarRuta(" . $fila["id_ruta"] . ")'>
                                <td>" . $fila["id_ruta"] . "</td>
                                <td>" . $fila["terminal_salida"] . "</td>
                                <td>" . $fila["terminal_llegada"] . "</td>
                                <td>" . $fila["ciudad_salida"] . "</td>
                                <td>" . $fila["ciudad_llegada"] . "</td>
                                <td>" . $fila["tipo_viaje"] . "</td>
                                <td>" . $fila["costo"] . "</td>
                                </tr>";
                }
                echo $tabla;
                break;
            case "buscarPor":
                $lista = $DAO->buscarRutaPor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='ruta-" . $fila["id_ruta"] . "' onclick='seleccionarRuta(" . $fila["id_ruta"] . ")'>
                            <td>" . $fila["id_ruta"] . "</td>
                            <td>" . $fila["terminal_salida"] . "</td>
                            <td>" . $fila["terminal_llegada"] . "</td>
                            <td>" . $fila["ciudad_salida"] . "</td>
                            <td>" . $fila["ciudad_llegada"] . "</td>
                            <td>" . $fila["tipo_viaje"] . "</td>
                            <td>" . $fila["costo"] . "</td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "seleccionarRuta":
                $seleccionar = $DAO->seleccionarRuta($_POST["id_ruta"]);
                $datos = array(
                    "id_ruta" => $seleccionar["id_ruta"],
                    "terminal_salida" => $seleccionar["terminal_salida"],
                    "terminal_llegada" => $seleccionar["terminal_llegada"],
                    "ciudad_salida" => $seleccionar["ciudad_salida"],
                    "ciudad_llegada" => $seleccionar["ciudad_llegada"],
                    "tipo_viaje" => $seleccionar["tipo_viaje"],
                    "costo" => $seleccionar["costo"]
                );
                header('Content-Type: application/json');
                echo json_encode($datos);
                break;
            case "agregarRuta":
                $datosRuta = json_decode(file_get_contents('php://input'), true);
                $datosRuta = new Ruta(0, $_POST["terminal_salida"], $_POST["terminal_llegada"], $_POST["ciudad_salida"], $_POST["ciudad_llegada"], $_POST["tipo_viaje"], $_POST["costo"]);
                $agregarRuta = $DAO->agregarRuta($datosRuta);

                echo $agregarRuta;
                break;
            case "editarRuta":
                $datosRuta = json_decode(file_get_contents('php://input'), true);
                $datosRuta = new Ruta($_POST["id_ruta"], $_POST["terminal_salida"], $_POST["terminal_llegada"], $_POST["ciudad_salida"], $_POST["ciudad_llegada"], $_POST["tipo_viaje"], $_POST["costo"]);
                $editarRuta = $DAO->editarRuta($datosRuta);

                echo $editarRuta;
                break;
            case "eliminarRuta":
                $eliminarRuta = $DAO->eliminarRuta($_POST["id_ruta"]);
                echo $eliminarRuta;
                break;
        }
    }
}
