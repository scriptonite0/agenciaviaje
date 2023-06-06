<?php

session_start();
if (isset($_SESSION['dni_usuario'])) {

    include_once(__DIR__ . "/../Model/DAO/DAOReportes.php");


    if (isset($_POST["accion"])) {
        $DAO = new DAOReportes();
        switch ($_POST["accion"]) {
            case "mostrarReportesVentas":
                $numeroVentas = $DAO->ReporteNumVentas($_POST["desde"], $_POST["hasta"]);
                $montoVentas = $DAO->ReporteMontoVentas($_POST["desde"], $_POST["hasta"]);
                $datos = array(
                    "numero_ventas" => $numeroVentas["total_ventas"],
                    "monto_ventas" => $montoVentas["total_ventas"]
                );
                echo json_encode($datos);
                break;
            case "mostrarDatosGraficoVentas1":
                $dias = $DAO->MontoVentaMesActual();
                $datos = array();
                foreach ($dias as $dia) {
                    $datos[$dia["dia"]] = $dia["total_ventas"];
                }
                echo json_encode($datos);
                break;
            case "mostrarDatosGraficoVentas2":
                $dias = $DAO->CantidadVentaMesActual();
                $datos = array();
                foreach ($dias as $dia) {
                    $datos[$dia["dia"]] = $dia["cantidad_ventas"];
                }
                echo json_encode($datos);
                break;
            case "mostrarReportesBoletos":
                $cantidadBoletos = $DAO->ReporteCantidadBoletos($_POST["desde"], $_POST["hasta"]);
                $datos = array(
                    "cantidad_boletos" => $cantidadBoletos["total_boletos"],
                );
                echo json_encode($datos);
                break;
            case "mostrarDatosGraficoBoletos1":
                $dias = $DAO->BoletosRegistradosMesActual();
                $datos = array();
                foreach ($dias as $dia) {
                    $datos[$dia["dia"]] = $dia["cantidad_boletos"];
                }
                echo json_encode($datos);
                break;
            case "mostrarReportesClientes":
                $cantidadClientes = $DAO->ReporteClientesRegistrados($_POST["desde"], $_POST["hasta"]);
                $datos = array(
                    "cantidad_clientes" => $cantidadClientes["clientes_registrados"],
                );
                echo json_encode($datos);
                break;
            case "mostrarDatosGraficoClientes1":
                $destinos = $DAO->ReportesDetinosMasVisitados();
                $datos = array();
                foreach ($destinos as $destino) {
                    $datos[$destino["ciudad_salida"] . " -> " . $destino["ciudad_llegada"]] = $destino["cantidad_boletos"];
                }
                echo json_encode($datos);
                break;
            case "mostrarDatosGraficoClientes2":
                $clientes = $DAO->ReporteClientesFrecuentes();
                $datos = array();
                foreach ($clientes as $cliente) {
                    $datos[$cliente["nombres"] . " " . $cliente["apellidos"]] = $cliente["frecuencia"];
                }
                echo json_encode($datos);
                break;
        }
    }
}
