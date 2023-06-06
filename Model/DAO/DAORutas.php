<?php

include_once(__DIR__ . "/../Class/ClassRutas.php");

class DaoRuta extends Ruta
{
    private string $tabla = "ruta";

    public function __construct()
    {
    }

    public function listaRutas()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $rutas = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $rutas;
    }

    public function buscarRutaPor(string $buscar, string $filtro)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE " . $filtro . " LIKE '%" . $buscar . "%'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $rutas = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $rutas;
    }
    public function seleccionarRuta(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE id_ruta = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $ruta = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $ruta[0];
    }

    public function agregarRuta(Ruta $datosRuta)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "INSERT INTO " . $this->tabla . " (terminal_salida,terminal_llegada,ciudad_salida,ciudad_llegada,tipo_viaje,costo) VALUES (:terminal_salida,:terminal_llegada,:ciudad_salida,:ciudad_llegada,:tipo_viaje,:costo)";
            $stmt = $pdo->prepare($sql);


            $termina_salida = $datosRuta->getTerminal_salida();
            $termina_llegada = $datosRuta->getTerminal_llegada();
            $ciudad_salida = $datosRuta->getCiudad_salida();
            $ciudad_llegada = $datosRuta->getCiudad_llegada();
            $tipo_viaje = $datosRuta->getTipo_viaje();
            $costo = $datosRuta->getCosto();



            $stmt->bindParam(':terminal_salida', $termina_salida, PDO::PARAM_STR);
            $stmt->bindParam(':terminal_llegada', $termina_llegada, PDO::PARAM_STR);
            $stmt->bindParam(':ciudad_salida', $ciudad_salida, PDO::PARAM_STR);
            $stmt->bindParam(':ciudad_llegada', $ciudad_llegada, PDO::PARAM_STR);
            $stmt->bindParam(':tipo_viaje', $tipo_viaje, PDO::PARAM_INT);
            $stmt->bindParam(':costo', $costo, PDO::PARAM_STR);

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

    public function editarRuta(Ruta $datosRuta)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {

            $stmt = $pdo->prepare("UPDATE " . $this->tabla . " SET terminal_salida= :terminal_salida, terminal_llegada = :terminal_llegada, ciudad_salida= :ciudad_salida, ciudad_llegada = :ciudad_llegada, tipo_viaje = :tipo_viaje, costo = :costo WHERE id_ruta = :id_ruta");


            $id_ruta = $datosRuta->getId_ruta();
            $termina_salida = $datosRuta->getTerminal_salida();
            $termina_llegada = $datosRuta->getTerminal_llegada();
            $ciudad_salida = $datosRuta->getCiudad_salida();
            $ciudad_llegada = $datosRuta->getCiudad_llegada();
            $tipo_viaje = $datosRuta->getTipo_viaje();
            $costo = $datosRuta->getCosto();

            $stmt->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
            $stmt->bindParam(':terminal_salida', $termina_salida, PDO::PARAM_STR);
            $stmt->bindParam(':terminal_llegada', $termina_llegada, PDO::PARAM_STR);
            $stmt->bindParam(':ciudad_salida', $ciudad_salida, PDO::PARAM_STR);
            $stmt->bindParam(':ciudad_llegada', $ciudad_llegada, PDO::PARAM_STR);
            $stmt->bindParam(':tipo_viaje', $tipo_viaje, PDO::PARAM_INT);
            $stmt->bindParam(':costo', $costo, PDO::PARAM_STR);
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
    public function eliminarRuta(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "DELETE FROM " . $this->tabla . " WHERE id_ruta = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "Se elimino el registro exitosamente.";
        } catch (Exception $e) {
            $mensaje = "Error al eliminar la Ruta: Asegurese de borrar con anticipación las boletos que incluyan la ruta seleccionada a borrar.";
        }
        return $mensaje;
    }
}
