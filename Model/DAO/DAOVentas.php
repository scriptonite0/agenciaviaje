<?php

include_once(__DIR__ . "/../Class/ClassVentas.php");

class DAOVentas extends Venta
{

    public string $tabla_venta = "venta";
    public string $tabla_cliente = "cliente";

    public function __construct()
    {
    }

    public function listaVentas()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla_venta .
                " INNER JOIN " . $this->tabla_cliente . " WHERE " . $this->tabla_venta . ".id_cliente = " . $this->tabla_cliente . ".id_cliente";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $ventas = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            $ventas = $e;
        }
        return $ventas;
    }

    public function ultimaVentaRegistrada()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT id_venta FROM " . $this->tabla_venta . " ORDER BY id_venta DESC LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $ultimaVenta = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            $ventas = $e;
        }
        return $ultimaVenta[0];
    }
    public function buscarVentaPor(string $buscar, string $filtro)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla_venta . " 
            INNER JOIN " . $this->tabla_cliente . " WHERE  " . $this->tabla_venta . ".id_cliente = " . $this->tabla_cliente . ".id_cliente AND " . $filtro . " LIKE '%" . $buscar . "%'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $ventas = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            $ventas = $e;
        }
        return $ventas;
    }
    public function seleccionarVenta(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla_venta . " WHERE id_venta = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $venta = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $venta[0];
    }

    public function agregarVenta(Venta $datos)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "INSERT INTO " . $this->tabla_venta . " (id_cliente, cant_boletos, tipo_pago, monto_total, fecha_registro_venta) VALUES (:id_cliente, :cant_boletos, :tipo_pago, :monto_total, :fecha_registro_venta)";
            $stmt = $pdo->prepare($sql);


            $id_cliente = $datos->getId_cliente();
            $cant_boletos = $datos->getCant_boletos();
            $tipo_pago = $datos->getTipo_pago();
            $monto_total = $datos->getMonto_total();
            $fecha_registro_venta = $datos->getFecha_registro_venta();



            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':cant_boletos', $cant_boletos, PDO::PARAM_INT);
            $stmt->bindParam(':tipo_pago', $tipo_pago, PDO::PARAM_STR);
            $stmt->bindParam(':monto_total', $monto_total, PDO::PARAM_INT);
            $stmt->bindParam(':fecha_registro_venta', $fecha_registro_venta, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "exito";
        } catch (exception $e) {
            $mensaje = "Error al agregar el registro: " . $e;
        }
        return $mensaje;
    }

    public function editarRuta(Venta $datos)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {

            $stmt = $pdo->prepare("UPDATE " . $this->tabla_venta . " SET id_cliente = :id_cliente, cant_boletos = :cant_boletos, tipo_pago= :tipo_pago, monto_total = :monto_total, fecha_registro_venta = :fecha_registro_venta WHERE id_venta = :id_venta");

            $id_venta = $datos->getId_venta();
            $id_cliente = $datos->getId_cliente();
            $cant_boletos = $datos->getCant_boletos();
            $tipo_pago = $datos->getTipo_pago();
            $monto_total = $datos->getMonto_total();
            $fecha_registro_venta = $datos->getFecha_registro_venta();

            $stmt->bindParam(':id_venta', $id_venta, PDO::PARAM_INT);
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':cant_boletos', $cant_boletos, PDO::PARAM_INT);
            $stmt->bindParam(':tipo_pago', $tipo_pago, PDO::PARAM_STR);
            $stmt->bindParam(':monto_total', $monto_total, PDO::PARAM_INT);
            $stmt->bindParam(':fecha_registro_venta', $fecha_registro_venta, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "exito";
        } catch (Exception $e) {
            $mensaje = "Error al editar el registro: " . $e;
        }
        return $mensaje;
    }
    public function eliminarVenta(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "DELETE FROM " . $this->tabla_venta . " WHERE id_venta = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "Se elimino el registro exitosamente.";
        } catch (Exception $e) {
            $mensaje = "Error al eliminar la Venta: Asegurese de borrar con anticipación los registros de Detalle de Venta que incluyan la Venta seleccionada a borrar.";
        }
        return $mensaje;
    }
    public function editarVenta(int $id_cliente, int $id_venta, string $tipo_pago)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $stmt = $pdo->prepare("UPDATE " . $this->tabla_venta . " SET id_cliente = :id_cliente, tipo_pago = :tipo_pago WHERE id_venta = :id_venta");
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':tipo_pago', $tipo_pago, PDO::PARAM_STR);
            $stmt->bindParam(':id_venta', $id_venta, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare("UPDATE boleto SET id_cliente = :id_cliente WHERE id_boleto IN ( SELECT id_boleto FROM detalle_venta WHERE id_venta = :id_venta )");
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':id_venta', $id_venta, PDO::PARAM_INT);
            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "Se edito el registro exitosamente.";
        } catch (Exception $e) {
            $mensaje = "Error al editar: " . $e;
        }
        return $mensaje;
    }
}
