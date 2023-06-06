<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {


    include_once(__DIR__ . "/../Model/DAO/DAOVentas.php");
    include_once(__DIR__ . "/../Model/DAO/DAODetalleVentas.php");
    include_once(__DIR__ . "/../Model/DAO/DAOClientes.php");
    include_once(__DIR__ . "/../Model/DAO/DAOBoletos.php");
    include_once(__DIR__ . "/../Model/DAO/DAOVentas.php");
    include_once(__DIR__ . "/../Model/DAO/DAORutas.php");
    include_once(__DIR__ . "/../Model/DAO/DAOTransportes.php");


    if (isset($_POST["accion"])) {
        $DAO = new DAOVentas();
        switch ($_POST["accion"]) {
            case "listaVentas":
                $lista = $DAO->listaVentas();
                $tabla = "";
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='venta-" . $fila["id_venta"] . "' onclick='seleccionarVenta(" . $fila["id_venta"] . ")'>
                                <td>" . $fila["id_venta"] . "</td>
                                <td>" . $fila["id_cliente"] . "</td>
                                <td><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                                <td>" . $fila["nombres"] . " " . $fila["apellidos"] . "</td>
                                <td>" . $fila["dni"] . "</td>
                                <td>" . $fila["cant_boletos"] . "</td>
                                <td>" . $fila["monto_total"] . "</td>
                                <td>" . $fila["fecha_registro_venta"] . "</td>
                                <td><button class='btn btn-dark' onclick='infoVenta(" . $fila["id_venta"] . ")'  data-bs-toggle='modal' data-bs-target='#info-venta'><i class='fa-solid fa-info'></i></button></td>
                                </tr>";
                }
                echo $tabla;
                break;
            case "buscarPor":
                $lista = $DAO->buscarVentaPor($_POST["buscar"], $_POST["filtro"]);
                $tabla = "";
                foreach ($lista as $fila) {
                    $imagen = $fila['foto'];
                    $tabla .= "<tr id='venta-" . $fila["id_venta"] . "' onclick='seleccionarVenta(" . $fila["id_venta"] . ")'>
                                    <td>" . $fila["id_venta"] . "</td>
                                    <td>" . $fila["id_cliente"] . "</td>
                                    <td><img style='width: 75px; height: 90px;' src='data:image/jpeg;base64," . base64_encode($imagen) . "' ></td>
                                    <td>" . $fila["nombres"] . " " . $fila["apellidos"] . "</td>
                                    <td>" . $fila["dni"] . "</td>
                                    <td>" . $fila["cant_boletos"] . "</td>
                                    <td>" . $fila["monto_total"] . "</td>
                                    <td>" . $fila["fecha_registro_venta"] . "</td>
                                    <td><button class='btn btn-dark'><i class='fa-solid fa-info'></i></button></td>
                                    </tr>";
                }
                echo $tabla;
                break;
            case "seleccionarDatosVenta":
                $venta = $DAO->seleccionarVenta($_POST["id_venta"]);
                $DAOCliente = new DaoCliente();
                $cliente = $DAOCliente->seleccionarCliente($venta["id_cliente"]);

                $datos = array(
                    "id_venta" => $venta["id_venta"],
                    "id_cliente" => $venta["id_cliente"],
                    "nombres" => $cliente["nombres"] . " " . $cliente["apellidos"],
                    "dni" => $cliente["dni"],
                    "carnet_extranjeria" => $cliente["carnet_extranjeria"],
                    "pasaporte" => $cliente["pasaporte"],
                    "cant_boletos" => $venta["cant_boletos"],
                    "tipo_pago" => $venta["tipo_pago"],
                    "monto_total" => $venta["monto_total"],
                    "fecha_registro_venta" => $venta["fecha_registro_venta"]
                );
                header('Content-Type: application/json');
                echo json_encode($datos);
                break;
            case "informacionVenta":
                $venta = $DAO->seleccionarVenta($_POST["id_venta"]);
                $DAOCliente = new DaoCliente();
                $cliente = $DAOCliente->seleccionarCliente($venta["id_cliente"]);

                $datos = array(
                    "id_venta" => $venta["id_venta"],
                    "id_cliente" => $venta["id_cliente"],
                    "nombres" => $cliente["nombres"] . " " . $cliente["apellidos"],
                    "dni" => $cliente["dni"],
                    "carnet_extranjeria" => $cliente["carnet_extranjeria"],
                    "pasaporte" => $cliente["pasaporte"],
                    "cant_boletos" => $venta["cant_boletos"],
                    "tipo_pago" => $venta["tipo_pago"],
                    "monto_total" => $venta["monto_total"],
                    "fecha_registro_venta" => $venta["fecha_registro_venta"]
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
            case "agregarVenta":
                //Agregar la venta
                $datosVenta = new Venta(0, $_POST["id_cliente"], $_POST["n_boletos"], $_POST["tipo_pago"], $_POST["monto_total"], $_POST["fecha_registro"]);
                $agregarVenta = $DAO->agregarVenta($datosVenta);

                $boletos = $_POST['boletos'];
                $lista_boletos = json_decode($boletos, true);

                $id_venta = $DAO->ultimaVentaRegistrada();

                date_default_timezone_set('America/Lima');
                $horaActual = date('H:i A');
                $fechaActual = date('Y-m-d');

                //Agregar los boletos y detalle de venta
                foreach ($lista_boletos as $boleto) {
                    //Agregar los boletos
                    $datosBoleto = new Boleto(0, $boleto[2], $_POST["id_cliente"], $boleto[5], $boleto[7], $horaActual, $fechaActual);

                    $DAOBoleto = new DaoBoleto();
                    $agregarBoleto = $DAOBoleto->agregarBoleto($datosBoleto);
                    $id_boleto_agregado = $DAOBoleto->ultimoBoletoRegistrado();

                    //Agregar Detalle Venta
                    $datosDetalleVenta = new DetalleVenta(0, $id_venta["id_venta"], $id_boleto_agregado["id_boleto"]);
                    $DAODetalleVenta = new DAODetalleVenta();
                    $agregarDetalleVenta = $DAODetalleVenta->agregarDetalleVenta($datosDetalleVenta);
                }
                echo $agregarVenta;
                break;
            case "editarVenta":
                $editarVenta = $DAO->editarVenta($_POST["id_cliente"], $_POST["id_venta"], $_POST["tipo_pago"]);
                echo $editarVenta;
                break;
        }
    }
}
