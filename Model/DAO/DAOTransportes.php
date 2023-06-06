<?php

include_once(__DIR__ . "/../Class/ClassTransportes.php");

class DaoTransporte extends Transporte
{
    private string $tabla_transporte = "transporte";
    private string $tabla_empleado = "empleado";

    public function __construct()
    {
    }

    public function listaTransportes()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla_transporte . " INNER JOIN empleado WHERE " . $this->tabla_transporte . ".id_empleado = " . $this->tabla_empleado . ".id_empleado";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $transportes = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $transportes;
    }

    public function buscarTransportePor(string $buscar, string $filtro)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla_transporte . " INNER JOIN empleado WHERE " . $this->tabla_transporte . ".id_empleado = " . $this->tabla_empleado . ".id_empleado AND " . $filtro . " LIKE '%" . $buscar . "%'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $transportes = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $transportes;
    }
    public function seleccionarTransporte(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla_transporte . " INNER JOIN empleado WHERE " . $this->tabla_transporte . ".id_empleado = " . $this->tabla_empleado . ".id_empleado AND  id_transporte = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $transporte = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $transporte[0];
    }

    public function agregarTransporte(Transporte $datosTransporte)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "INSERT INTO " . $this->tabla_transporte . " (id_empleado, modelo_transporte, placa_transporte, seguro_transporte) VALUES (:id_empleado, :modelo_transporte, :placa_transporte, :seguro_transporte)";
            $stmt = $pdo->prepare($sql);

            $id_empleado = $datosTransporte->getId_empleado();
            $modelo_transporte = $datosTransporte->getModelo_transporte();
            $placa_transporte = $datosTransporte->getPlaca_transporte();
            $seguro_transporte = $datosTransporte->getSeguro_transporte();

            $stmt->bindParam(':id_empleado', $id_empleado, PDO::PARAM_INT);
            $stmt->bindParam(':modelo_transporte', $modelo_transporte, PDO::PARAM_STR);
            $stmt->bindParam(':placa_transporte', $placa_transporte, PDO::PARAM_STR);
            $stmt->bindParam(':seguro_transporte', $seguro_transporte, PDO::PARAM_STR);

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

    public function editarTransporte(Transporte $datosTransporte)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {

            $stmt = $pdo->prepare("UPDATE " . $this->tabla_transporte . " SET id_empleado = :id_empleado, modelo_transporte = :modelo_transporte, placa_transporte = :placa_transporte, seguro_transporte = :seguro_transporte WHERE id_transporte = :id_transporte");


            $id_transporte = $datosTransporte->getId_transporte();
            $id_empleado = $datosTransporte->getId_empleado();
            $modelo_transporte = $datosTransporte->getModelo_transporte();
            $placa_transporte = $datosTransporte->getPlaca_transporte();
            $seguro_transporte = $datosTransporte->getSeguro_transporte();


            $stmt->bindParam(':id_transporte', $id_transporte, PDO::PARAM_INT);
            $stmt->bindParam(':id_empleado', $id_empleado, PDO::PARAM_INT);
            $stmt->bindParam(':modelo_transporte', $modelo_transporte, PDO::PARAM_STR);
            $stmt->bindParam(':placa_transporte', $placa_transporte, PDO::PARAM_STR);
            $stmt->bindParam(':seguro_transporte', $seguro_transporte, PDO::PARAM_STR);
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
    public function eliminarTransporte(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "DELETE FROM " . $this->tabla_transporte . " WHERE id_transporte = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "Se elimino el registro exitosamente.";
        } catch (Exception $e) {
            $mensaje = "Error al eliminar la Transporte: Asegurese de borrar con anticipación las  que incluyan la ruta seleccionada a borrar.";
        }
        return $mensaje;
    }
}
