<?php

include_once(__DIR__ . "/../Class/ClassDetallesVentas.php");

class DAODetalleVenta extends Venta
{

    public string $tabla_detalle_venta = "detalle_venta";

    public function __construct()
    {
    }

    public function agregarDetalleVenta(DetalleVenta $datos)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "INSERT INTO " . $this->tabla_detalle_venta . " (id_venta, id_boleto) VALUES (:id_venta,  :id_boleto)";
            $stmt = $pdo->prepare($sql);

            $id_venta = $datos->getId_venta();
            $id_boleto = $datos->getId_boleto();


            $stmt->bindParam(':id_venta', $id_venta, PDO::PARAM_INT);
            $stmt->bindParam(':id_boleto', $id_boleto, PDO::PARAM_INT);

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
}
