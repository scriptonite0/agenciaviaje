<?php

include_once(__DIR__ . "/../Class/ClassConexion.php");

class DAOReportes extends Conexion
{
    private string $tabla_ventas = "venta";
    private string $tabla_boletos = "boleto";


    public function __construct()
    {
    }

    //REPORTES DE VENTA
    public function ReporteNumVentas(string $desde, string $hasta)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT COUNT(*) AS total_ventas FROM " . $this->tabla_ventas . "
            WHERE fecha_registro_venta >= '" . $desde . "' AND fecha_registro_venta <= '" . $hasta . "' ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $numVentas = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $numVentas[0];
    }

    public function ReporteMontoVentas(string $desde, string $hasta)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT SUM(monto_total) AS total_ventas FROM " . $this->tabla_ventas . "
            WHERE fecha_registro_venta >= '" . $desde . "' AND fecha_registro_venta <= '" . $hasta . "' ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $montoVentas = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $montoVentas[0];
    }

    public function MontoVentaMesActual()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT DAY(fecha_registro_venta) AS dia, SUM(monto_total) AS total_ventas FROM venta
            WHERE YEAR(fecha_registro_venta) = YEAR(CURDATE()) AND MONTH(fecha_registro_venta) = MONTH(CURDATE())
            GROUP BY DAY(fecha_registro_venta)
            ORDER BY DAY(fecha_registro_venta)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $ventasMesActual = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $ventasMesActual;
    }
    public function CantidadVentaMesActual()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT DAY(fecha_registro_venta) AS dia, COUNT(*) AS cantidad_ventas FROM venta 
            WHERE YEAR(fecha_registro_venta) = YEAR(CURDATE()) AND MONTH(fecha_registro_venta) = MONTH(CURDATE()) 
            GROUP BY DAY(fecha_registro_venta)
            ORDER BY DAY(fecha_registro_venta)
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $ventasMesActual = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $ventasMesActual;
    }
    //REPORTES DE BOLETOS
    public function ReporteCantidadBoletos(string $desde, string $hasta)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT COUNT(*) AS total_boletos FROM " . $this->tabla_boletos . "
            WHERE fecha_registro_boleto >= '" . $desde . "' AND fecha_registro_boleto <= '" . $hasta . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $cantidadBoletos = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $cantidadBoletos[0];
    }

    public function BoletosRegistradosMesActual()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT DAY(fecha_registro_boleto) AS dia, COUNT(*) AS cantidad_boletos FROM boleto
            WHERE MONTH(fecha_registro_boleto) = MONTH(CURRENT_DATE()) AND YEAR(fecha_registro_boleto) = YEAR(CURRENT_DATE())
            GROUP BY DAY(fecha_registro_boleto)
            ORDER BY DAY(fecha_registro_boleto)
            ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $boletosRegistrados = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $boletosRegistrados;
    }

    //REPORTES CLIENTES
    public function ReporteClientesRegistrados(string $desde, string $hasta)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT COUNT(*) as clientes_registrados FROM cliente 
            WHERE fecha_registro_cliente >= '" . $desde . "' AND fecha_registro_cliente <= '" . $hasta . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $clientesRegistrados = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $clientesRegistrados[0];
    }

    public function ReporteClientesFrecuentes()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT c.id_cliente, c.nombres, c.apellidos, COUNT(*) AS frecuencia FROM cliente c
            INNER JOIN boleto b ON c.id_cliente = b.id_cliente
            WHERE MONTH(b.fecha_registro_boleto) = MONTH(CURRENT_DATE()) AND YEAR(b.fecha_registro_boleto) = YEAR(CURRENT_DATE())
            GROUP BY c.id_cliente, c.nombres, c.apellidos
            ORDER BY COUNT(*) DESC
            LIMIT 5";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $clientesFrecuentes = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $clientesFrecuentes;
    }
    public function ReportesDetinosMasVisitados()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT r.id_ruta, r.terminal_salida, r.terminal_llegada, r.ciudad_salida, r.ciudad_llegada, COUNT(*) AS cantidad_boletos 
            FROM boleto b INNER JOIN ruta r ON b.id_ruta = r.id_ruta 
            WHERE MONTH(b.fecha_registro_boleto) = MONTH(CURRENT_DATE()) AND YEAR(b.fecha_registro_boleto) = YEAR(CURRENT_DATE()) 
            GROUP BY r.id_ruta, r.terminal_salida, r.terminal_llegada, r.ciudad_salida, r.ciudad_llegada ORDER BY COUNT(*) DESC LIMIT 3;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $destinos = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $destinos;
    }
}
