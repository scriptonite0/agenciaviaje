<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {

    include_once(__DIR__ . "/../Model/DAO/DAOTransportes.php");
    include_once(__DIR__ . "/../Model/DAO/DAOEmpleados.php");



    if (isset($_POST["accion"])) {
        $DAO = new DaoTransporte();
        switch ($_POST["accion"]) {
            case "listaTransportes":
                $lista = $DAO->listaTransportes();
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='transporte-" . $fila["id_transporte"] . "' onclick='seleccionarTransporte(" . $fila["id_transporte"] . ")'>
                            <td>{$fila['id_transporte']}</td>
                            <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                            <td>{$fila['nombres']} {$fila['apellidos']}</td>
                            <td>{$fila['modelo_transporte']}</td>
                            <td>{$fila['placa_transporte']}</td>
                            <td>{$fila['seguro_transporte']}</td>
                        </tr>";
                }
                echo $tabla;
                break;
            case "buscarPor":
                $lista = $DAO->buscarTransportePor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='transporte-{$fila['id_transporte']}' onclick='elegirTransporte(\"{$fila['id_transporte']}\", \"{$fila['nombres']} {$fila['apellidos']}\", \"{$fila['modelo_transporte']}\", \"{$fila['placa_transporte']}\", \"{$fila['seguro_transporte']}\")'>
                                <td>{$fila['id_transporte']}</td>
                                <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                                <td>{$fila['nombres']} {$fila['apellidos']}</td>
                                <td>{$fila['modelo_transporte']}</td>
                                <td>{$fila['placa_transporte']}</td>
                                <td>{$fila['seguro_transporte']}</td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "seleccionarTransporte":
                $seleccionar = $DAO->seleccionarTransporte($_POST["id_transporte"]);
                $datos = array(
                    "id_transporte" => $seleccionar["id_transporte"],
                    "id_empleado" => $seleccionar["id_empleado"],
                    "nombres_chofer" => $seleccionar["nombres"],
                    "apellidos_chofer" => $seleccionar["apellidos"],
                    "dni_chofer" => $seleccionar["dni"],
                    "telefono_chofer" => $seleccionar["telefono"],
                    "correo_chofer" => $seleccionar["correo"],
                    "modelo" => $seleccionar["modelo_transporte"],
                    "placa" => $seleccionar["placa_transporte"],
                    "seguro" => $seleccionar["seguro_transporte"]
                );
                header('Content-Type: application/json');
                echo json_encode($datos);
                break;
            case "agregarTransporte":
                $datosTransporte = json_decode(file_get_contents('php://input'), true);
                $datosTransporte = new Transporte(0, $_POST["id_empleado"], $_POST["modelo_transporte"], $_POST["placa_transporte"], $_POST["seguro_transporte"]);
                $agregarTransporte = $DAO->agregarTransporte($datosTransporte);

                echo $agregarTransporte;
                break;
            case "cargarEmpleados":
                $DAOEmpleado = new DaoEmpleado();
                $lista = $DAOEmpleado->listaEmpleadosChofer();
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='empleado-{$fila['id_empleado']}' onclick='elegirEmpleado(\"{$fila['id_empleado']}\", \"{$fila['nombres']} {$fila['apellidos']}\", \"{$fila['dni']}\", \"{$fila['telefono']}\", \"{$fila['correo']}\")'>
                                            <td>{$fila['id_empleado']}</td>
                                            <td>{$fila['nombres']}</td>
                                            <td>{$fila['apellidos']}</td>
                                            <td>{$fila['cargo']}</td>
                                            <td>{$fila['dni']}</td>
                                            <td>{$fila['telefono']}</td>
                                            <td>{$fila['correo']}</td>
                                            <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                                        </tr>";
                }
                echo $tabla;
                break;
            case "buscarEmpleadoPor":
                $DAOEmpleado = new DaoEmpleado();
                $lista = $DAOEmpleado->buscarEmpleadoChoferPor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='empleado-{$fila['id_empleado']}' onclick='elegirEmpleado(\"{$fila['id_empleado']}\", \"{$fila['nombres']} {$fila['apellidos']}\", \"{$fila['dni']}\", \"{$fila['telefono']}\", \"{$fila['correo']}\")'>
                                            <td>{$fila['id_empleado']}</td>
                                            <td>{$fila['nombres']}</td>
                                            <td>{$fila['apellidos']}</td>
                                            <td>{$fila['cargo']}</td>
                                            <td>{$fila['dni']}</td>
                                            <td>{$fila['telefono']}</td>
                                            <td>{$fila['correo']}</td>
                                            <td class='' ><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                                        </tr>";
                }
                echo $tabla;
                break;
            case "editarTransporte":
                $datosTransporte = json_decode(file_get_contents('php://input'), true);
                $datosTransporte = new Transporte($_POST["id_transporte"], $_POST["id_empleado"], $_POST["modelo_transporte"], $_POST["placa_transporte"], $_POST["seguro_transporte"]);
                $editarTransporte = $DAO->editarTransporte($datosTransporte);

                echo $editarTransporte;
                break;
            case "eliminarTransporte":
                $eliminarTransporte = $DAO->eliminarTransporte($_POST["id_transporte"]);
                echo $eliminarTransporte;
                break;
        }
    }
}
