<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {

    include_once(__DIR__ . "/../Model/DAO/DAOBoletos.php");
    include_once(__DIR__ . "/../Model/DAO/DAOClientes.php");
    include_once(__DIR__ . "/../Model/DAO/DAORutas.php");
    include_once(__DIR__ . "/../Model/DAO/DAOTransportes.php");

    if (isset($_POST["accion"])) {
        $DAO = new DaoBoleto();
        switch ($_POST["accion"]) {
            case "listaBoletos":
                $lista = $DAO->listaBoletos();
                $tabla = "";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='boleto-" . $fila["id_boleto"] . "' class='text-center text-middle' onclick='seleccionarBoleto(" . $fila["id_boleto"] . ")'>
                                <td>" . $fila["id_boleto"] . "</td>
                                <td>" . $fila["id_cliente"] . "</td>
                                <td>" . $fila["id_ruta"] . "</td>
                                <td>" . $fila["descripcion_hora_viaje"] . "</td>
                                <td>" . $fila["fecha_viaje"] . "</td>
                                <td>" . $fila["hora_registro_boleto"] . "</td>
                                <td>" . $fila["fecha_registro_boleto"] . "</td>
                                <td><button value='" . $fila['id_boleto'] . "' class='btn btn-dark' onclick='infoBoleto(this)' data-bs-toggle='modal' data-bs-target='#info-boleto' ><i class='fa-solid fa-info'></i></button></td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "cargarBoletosVenta":
                $lista = $DAO->listaBoletosVenta($_POST["id_venta"]);
                $tabla = "";
                $it = 0;
                foreach ($lista as $fila) {
                    $it++;
                    $tabla .= "<tr class='text-center text-middle'>
                                    <td>" . $it. "</td>
                                    <td>" . $fila["id_ruta"] . "</td>
                                    <td>" . $fila["ciudad_salida"] . "</td>
                                    <td>" . $fila["ciudad_llegada"] . "</td>
                                    <td>" . $fila["hora_viaje"] . "</td>
                                    <td>" . $fila["descripcion_hora_viaje"] . "</td>
                                    <td>" . $fila["fecha_viaje"] . "</td>
                                    <td>" . $fila["costo"] . "</td>
                                </tr>";
                }
                echo $tabla;
                break;
            case "agregarBoleto":
                $datosBoleto = new Boleto(0, $_POST["id_ruta"], $_POST["id_cliente"], $_POST["hora_viaje"], $_POST["fecha_viaje"], $_POST["hora_registro"], $_POST["fecha_registro"]);
                $agregarBoleto = $DAO->agregarBoleto($datosBoleto);
                echo $agregarBoleto;
                break;
            case "editarBoleto":
                $datosBoleto = new Boleto($_POST["id_boleto"], $_POST["id_ruta"], $_POST["id_cliente"], $_POST["hora_viaje"], $_POST["fecha_viaje"], $_POST["hora_registro"], $_POST["fecha_registro"]);
                $editarBoleto = $DAO->editarBoleto($datosBoleto);
                if ($_POST["descontar_monto"] != 0) {
                    $id = $_POST["id_boleto"];
                    $DAO->descontarMonto($id, intval($_POST["descontar_monto"]));
                }
                echo $editarBoleto;
                break;
            case "buscarPor":
                $lista = $DAO->buscarBoletoPor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='boleto-" . $fila["id_boleto"] . "' class='text-center text-middle' onclick='seleccionarBoleto(" . $fila["id_boleto"] . ")'>
                                <td>" . $fila["id_boleto"] . "</td>
                                <td>" . $fila["id_cliente"] . "</td>
                                <td>" . $fila["id_ruta"] . "</td>
                                <td>" . $fila["descripcion_hora_viaje"] . "</td>
                                <td>" . $fila["fecha_viaje"] . "</td>
                                <td>" . $fila["hora_registro_boleto"] . "</td>
                                <td>" . $fila["fecha_registro_boleto"] . "</td>
                                <td><button value='" . $fila['id_boleto'] . "' class='btn btn-dark' onclick='infoBoleto(this)' data-bs-toggle='modal' data-bs-target='#info-boleto' ><i class='fa-solid fa-info'></i></button></td>
                            </tr>";
                }
                echo $tabla;
                break;

            case "listaBoletosClienteNoEditar":
                $lista = $DAO->listaBoletosRegistradosNoEditar($_POST["dni"]);
                $tabla = "<br><tr><td colspan='7' style='font-size:20px;'>BOLETOS EN USO (NO SE PUEDEN EDITAR)</td></tr>";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='boleto-" . $fila["id_boleto"] . "' class='text-center text-middle'>
                    <td>" . $fila["id_boleto"] . "</td>
                    <td>" . $fila["ciudad_salida"] . " -> " . $fila["ciudad_llegada"] . "</td>
                    <td>" . $fila["costo"] . "</td>
                    <td>" . $fila["descripcion_hora_viaje"] . "</td>
                    <td>" . $fila["fecha_viaje"] . "</td>
                    <td>" . $fila["estado_boleto"] . "</td>
                    <td><button value='" . $fila['id_boleto'] . "' class='btn btn-dark' onclick='infoBoleto(this)' data-bs-toggle='modal' data-bs-target='#info-boleto' ><i class='fa-solid fa-info'></i></button></td>
                    </tr>";
                }
                echo $tabla;
                break;
            case "listaBoletosClienteEditar":
                $lista = $DAO->listaBoletosRegistradosEditar($_POST["dni"]);
                $tabla = "<tr><td colspan='7' style='font-size:20px;'>BOLETOS PENDIENTES (SE PUEDEN EDITAR)</td></tr>";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='boleto-" . $fila["id_boleto"] . "' class='text-center text-middle' onclick='seleccionarBoleto(" . $fila["id_boleto"] . ")'>
                    <td>" . $fila["id_boleto"] . "</td>
                    <td>" . $fila["ciudad_salida"] . " -> " . $fila["ciudad_llegada"] . "</td>
                    <td>" . $fila["costo"] . "</td>
                    <td>" . $fila["descripcion_hora_viaje"] . "</td>
                    <td>" . $fila["fecha_viaje"] . "</td>
                    <td>" . $fila["estado_boleto"] . "</td>
                    <td><button value='" . $fila['id_boleto'] . "' class='btn btn-dark' onclick='infoBoleto(this)' data-bs-toggle='modal' data-bs-target='#info-boleto' ><i class='fa-solid fa-info'></i></button></td>
                </tr>";
                }
                echo $tabla;
                break;
            case "seleccionarBoleto":
                $seleccionarBoleto = $DAO->seleccionarBoleto($_POST["id_boleto"]);
                $datos = array(
                    "id_boleto" => $seleccionarBoleto["id_boleto"],
                    "id_cliente" => $seleccionarBoleto["id_cliente"],
                    "nombre_completo" => $seleccionarBoleto["cliente_nombre"] . " " . $seleccionarBoleto["cliente_apellido"],
                    "dni" => $seleccionarBoleto["cliente_dni"],
                    "carnet_extranjeria" => $seleccionarBoleto["carnet_extranjeria"],
                    "pasaporte" => $seleccionarBoleto["pasaporte"],
                    "id_ruta" => $seleccionarBoleto["id_ruta"],
                    "ciudad_salida" => $seleccionarBoleto["ciudad_salida"],
                    "ciudad_llegada" => $seleccionarBoleto["ciudad_llegada"],
                    "tipo_viaje" => $seleccionarBoleto["tipo_viaje"],
                    "costo" => $seleccionarBoleto["costo"],
                    "hora_viaje" => $seleccionarBoleto["hora_viaje"],
                    "fecha_viaje" => $seleccionarBoleto["fecha_viaje"],
                    "hora_registro" => $seleccionarBoleto["hora_registro_boleto"],
                    "fecha_registro" => $seleccionarBoleto["fecha_registro_boleto"]
                );
                header('Content-Type: application/json');
                echo json_encode($datos);
                break;
            case "cargarClientes":
                $DAOCliente = new DaoCliente();
                $lista = $DAOCliente->listaClientes();
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='cliente-{$fila['id_cliente']}' onclick='elegirCliente(\"{$fila['id_cliente']}\", \"{$fila['nombres']}\", \"{$fila['dni']}\", \"{$fila['carnet_extranjeria']}\", \"{$fila['pasaporte']}\")'>
                                <td>{$fila['id_cliente']}</td>
                                <td>{$fila['nombres']}</td>
                                <td>{$fila['apellidos']}</td>
                                <td>{$fila['dni']}</td>
                                <td>{$fila['carnet_extranjeria']}</td>
                                <td>{$fila['pasaporte']}</td>
                                <td>{$fila['telefono']}</td>
                                <td class=''><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "'></td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "cargarRutas":
                $DAORuta = new DaoRuta();
                $lista = $DAORuta->listaRutas();
                $tabla = "";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='ruta-{$fila['id_ruta']}' onclick='elegirRuta(\"{$fila['id_ruta']}\", \"{$fila['ciudad_salida']}\", \"{$fila['ciudad_llegada']}\", \"{$fila['tipo_viaje']}\", \"{$fila['costo']}\")'>
                                    <td>{$fila['id_ruta']}</td>
                                    <td>{$fila['terminal_salida']}</td>
                                    <td>{$fila['terminal_llegada']}</td>
                                    <td>{$fila['ciudad_salida']}</td>
                                    <td>{$fila['ciudad_llegada']}</td>
                                    <td>{$fila['tipo_viaje']}</td>
                                    <td>{$fila['costo']}</td>
                                </tr>";
                }
                echo $tabla;
                break;
            case "buscarClientePor":
                $DAOCliente = new DaoCliente();
                $lista = $DAOCliente->buscarClientePor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                header('Content-Type: image/jpeg');
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='cliente-{$fila['id_cliente']}' onclick='elegirCliente(\"{$fila['id_cliente']}\", \"{$fila['nombres']}\", \"{$fila['dni']}\", \"{$fila['carnet_extranjeria']}\", \"{$fila['pasaporte']}\")'>
                                <td>{$fila['id_cliente']}</td>
                                <td>{$fila['nombres']}</td>
                                <td>{$fila['apellidos']}</td>
                                <td>{$fila['dni']}</td>
                                <td>{$fila['carnet_extranjeria']}</td>
                                <td>{$fila['pasaporte']}</td>
                                <td>{$fila['telefono']}</td>
                                <td class=''><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "'></td>
                            </tr>";
                }
                echo $tabla;
                break;
            case "buscarRutaPor":
                $DAORuta = new DaoRuta();
                $lista = $DAORuta->buscarRutaPor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                foreach ($lista as $fila) {
                    $tabla .= "<tr id='ruta-{$fila['id_ruta']}' onclick='elegirRuta(\"{$fila['id_ruta']}\", \"{$fila['ciudad_salida']}\", \"{$fila['ciudad_llegada']}\", \"{$fila['tipo_viaje']}\", \"{$fila['costo']}\")'>
                                    <td>{$fila['id_ruta']}</td>
                                    <td>{$fila['terminal_salida']}</td>
                                    <td>{$fila['terminal_llegada']}</td>
                                    <td>{$fila['ciudad_salida']}</td>
                                    <td>{$fila['ciudad_llegada']}</td>
                                    <td>{$fila['tipo_viaje']}</td>
                                    <td>{$fila['costo']}</td>
                                </tr>";
                }
                echo $tabla;
                break;
        }
    }
}
