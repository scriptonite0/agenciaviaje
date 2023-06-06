<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {

    include_once(__DIR__ . "/../Model/DAO/DAOClientes.php");

    if (isset($_POST["accion"])) {
        $DAO = new DaoCliente();
        switch ($_POST["accion"]) {
            case "listaClientes":
                $lista = $DAO->listaClientes();
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='cliente-" . $fila["id_cliente"] . "' onclick='seleccionarCliente(" . $fila["id_cliente"] . ")'>
                                <td>" . $fila["id_cliente"] . "</td>
                                <td>" . $fila["nombres"] . "</td>
                                <td>" . $fila["apellidos"] . "</td>
                                <td>" . $fila["dni"] . "</td>
                                <td>" . $fila["carnet_extranjeria"] . "</td>
                                <td>" . $fila["pasaporte"] . "</td>
                                <td>" . $fila["direccion"] . "</td>
                                <td>" . $fila["telefono"] . "</td>
                                <td>" . $fila["correo"] . "</td>
                                <td>" . $fila["genero"] . "</td>
                                <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "buscarPor":
                $lista = $DAO->buscarClientePor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='cliente-" . $fila["id_cliente"] . "' onclick='seleccionarCliente(" . $fila["id_cliente"] . ")'>
                                <td>" . $fila["id_cliente"] . "</td>
                                <td>" . $fila["nombres"] . "</td>
                                <td>" . $fila["apellidos"] . "</td>
                                <td>" . $fila["dni"] . "</td>
                                <td>" . $fila["carnet_extranjeria"] . "</td>
                                <td>" . $fila["pasaporte"] . "</td>
                                <td>" . $fila["direccion"] . "</td>
                                <td>" . $fila["telefono"] . "</td>
                                <td>" . $fila["correo"] . "</td>
                                <td>" . $fila["genero"] . "</td>
                                <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "seleccionarClientePorDni":
                $seleccionar = $DAO->seleccionarClientePorDni($_POST["dni"]);
                $datos = array(
                    "id_cliente" => $seleccionar["id_cliente"],
                    "nombres" => $seleccionar["nombres"],
                    "apellidos" => $seleccionar["apellidos"],
                    "dni" => $seleccionar["dni"],
                    "carnet_extranjeria" => $seleccionar["carnet_extranjeria"],
                    "pasaporte" => $seleccionar["pasaporte"],
                    "direccion" => $seleccionar["direccion"],
                    "telefono" => $seleccionar["telefono"],
                    "correo" => $seleccionar["correo"],
                    "genero" => $seleccionar["genero"],
                    "fecha_registro_cliente" => $seleccionar["fecha_registro_cliente"],
                    "foto" => base64_encode($seleccionar["foto"])
                );
                echo json_encode($datos);
                break;
                case "seleccionarCliente":
                    $seleccionar = $DAO->seleccionarCliente($_POST["id"]);
                    $datos = array(
                        "id_cliente" => $seleccionar["id_cliente"],
                        "nombres" => $seleccionar["nombres"],
                        "apellidos" => $seleccionar["apellidos"],
                        "dni" => $seleccionar["dni"],
                        "carnet_extranjeria" => $seleccionar["carnet_extranjeria"],
                        "pasaporte" => $seleccionar["pasaporte"],
                        "direccion" => $seleccionar["direccion"],
                        "telefono" => $seleccionar["telefono"],
                        "correo" => $seleccionar["correo"],
                        "genero" => $seleccionar["genero"],
                        "fecha_registro_cliente" => $seleccionar["fecha_registro_cliente"],
                        "foto" => base64_encode($seleccionar["foto"])
                    );
                    echo json_encode($datos);
                    break;
            case "agregarCliente":
                $datosCliente = json_decode(file_get_contents('php://input'), true);
                if ($_POST["agregarFoto"] == "si") {
                    $foto = $_FILES['imagen']['tmp_name'];
                    $datosCliente = new Cliente(0, $_POST["nombres"], $_POST["apellidos"], $_POST["dni"], $_POST["carnet_extranjeria"], $_POST["pasaporte"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"], $_POST["genero"], $_POST["agregarFoto"], $foto, $_POST["fecha_registro_cliente"]);
                    $agregarCliente = $DAO->agregarCliente($datosCliente);
                } else {
                    $datosCliente = new Cliente(0, $_POST["nombres"], $_POST["apellidos"], $_POST["dni"], $_POST["carnet_extranjeria"], $_POST["pasaporte"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"],  $_POST["genero"], $_POST["agregarFoto"], "", $_POST["fecha_registro_cliente"]);
                    $agregarCliente = $DAO->agregarCliente($datosCliente);
                }
                echo $agregarCliente;
                break;
            case "editarCliente":
                $datosCliente = json_decode(file_get_contents('php://input'), true);
                if ($_POST["cambiarFoto"] == "si") {
                    $foto = $_FILES['imagen']['tmp_name'];
                    $datosCliente = new Cliente($_POST["id_cliente"], $_POST["nombres"], $_POST["apellidos"], $_POST["dni"],  $_POST["carnet_extranjeria"], $_POST["pasaporte"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"], $_POST["genero"], $_POST["cambiarFoto"], $foto, $_POST["fecha_registro_cliente"]);
                    $editarCliente = $DAO->editarCliente($datosCliente);
                } else {
                    $datosCliente = new Cliente($_POST["id_cliente"], $_POST["nombres"], $_POST["apellidos"], $_POST["dni"],  $_POST["carnet_extranjeria"], $_POST["pasaporte"], $_POST["direccion"], $_POST["telefono"], $_POST["correo"], $_POST["genero"], $_POST["cambiarFoto"], "", $_POST["fecha_registro_cliente"]);
                    $editarCliente = $DAO->editarCliente($datosCliente);
                }
                echo $editarCliente;
                break;
            case "eliminarCliente":
                $eliminarCliente = $DAO->eliminarCliente($_POST["id_cliente"]);
                echo $eliminarCliente;
                break;
        }
    }
}
