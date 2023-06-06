<?php

include_once(__DIR__ . "/../Class/ClassClientes.php");

class DaoCliente extends Cliente
{
    private string $tabla = "cliente";

    public function __construct()
    {
    }

    public function listaClientes()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT *  FROM " . $this->tabla;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $clientes;
    }
    public function buscarClientePor(string $buscar, string $filtro)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE " . $filtro . " LIKE '%" . $buscar . "%'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $clientes;
    }


    public function seleccionarCliente(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE id_cliente = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $cliente = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $cliente[0];
    }
    public function seleccionarClientePorDni(string $dni)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE dni = '" . $dni . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $cliente = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $cliente[0];
    }
    public function agregarCliente(Cliente $datos)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        $verificarTabla = $this->listaClientes();

        try {
            if ($datos->getContieneFoto() == "si") {
                if (empty($verificarTabla)) {
                    $sql = "INSERT INTO " . $this->tabla . " (id_cliente, nombres, apellidos, dni, carnet_extranjeria, pasaporte, direccion, telefono, correo, genero, foto, fecha_registro_cliente) VALUES (:id_cliente, :nombres, :apellidos, :dni, :carnet_extranjeria, :pasaporte, :direccion, :telefono, :correo, :genero, :foto, :fecha_registro_cliente)";
                    $stmt = $pdo->prepare($sql);
                    $procesarFoto = file_get_contents($datos->getFoto());
                    $id_cliente = 1;
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $stmt->bindParam(':foto', $procesarFoto, PDO::PARAM_LOB);
                } else {
                    $sql = "INSERT INTO " . $this->tabla . " (nombres, apellidos, dni, carnet_extranjeria, pasaporte, direccion, telefono, correo, genero, foto, fecha_registro_cliente) VALUES (:nombres, :apellidos, :dni, :carnet_extranjeria, :pasaporte, :direccion, :telefono, :correo, :genero, :foto, :fecha_registro_cliente)";
                    $stmt = $pdo->prepare($sql);
                    $procesarFoto = file_get_contents($datos->getFoto());
                    $stmt->bindParam(':foto', $procesarFoto, PDO::PARAM_LOB);
                }
            } else {
                if (empty($verificarTabla)) {
                    $sql = "INSERT INTO " . $this->tabla . " (id_cliente, nombres, apellidos, dni, carnet_extranjeria, pasaporte, direccion, telefono, correo, genero, fecha_registro_cliente) VALUES (:id_cliente, :nombres, :apellidos, :dni, :carnet_extranjeria, :pasaporte, :direccion, :telefono, :correo, :genero, :fecha_registro_cliente)";
                    $stmt = $pdo->prepare($sql);
                    $id_cliente = 1;
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                } else {
                    $sql = "INSERT INTO " . $this->tabla . " (nombres, apellidos, dni, carnet_extranjeria, pasaporte, direccion, telefono, correo, genero, fecha_registro_cliente) VALUES (:nombres, :apellidos, :dni, :carnet_extranjeria, :pasaporte, :direccion, :telefono, :correo, :genero, :fecha_registro_cliente)";
                    $stmt = $pdo->prepare($sql);
                }
            }
            $nombres = $datos->getNombres();
            $apellidos = $datos->getApellidos();
            $dni = $datos->getDni();
            $carnet_extranjeria = $datos->getCarnet_extranjeria();
            $pasaporte = $datos->getPasaporte();
            $direccion = $datos->getDireccion();
            $telefono = $datos->getTelefono();
            $correo = $datos->getCorreo();
            $genero = $datos->getGenero();
            $fecha_registro_cliente = $datos->getFecha_registro_cliente();

            $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':dni', $dni, PDO::PARAM_INT);
            $stmt->bindParam(':carnet_extranjeria', $carnet_extranjeria, PDO::PARAM_STR);
            $stmt->bindParam(':pasaporte', $pasaporte, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_registro_cliente', $fecha_registro_cliente, PDO::PARAM_STR);

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

    public function editarCliente(Cliente $datos)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            if ($datos->getContieneFoto() == "si") {
                $stmt = $pdo->prepare("UPDATE " . $this->tabla . " SET nombres = :nombres, apellidos = :apellidos,
                carnet_extranjeria = :carnet_extranjeria, pasaporte = :pasaporte, direccion = :direccion, telefono = :telefono,
                correo = :correo, genero = :genero, foto = :foto, fecha_registro_cliente = :fecha_registro_cliente WHERE dni = :dni");
                $procesarFoto = file_get_contents($datos->getFoto());
                $stmt->bindParam(':foto', $procesarFoto, PDO::PARAM_LOB);
            } else {
                $stmt = $pdo->prepare("UPDATE cliente SET nombres = :nombres, apellidos = :apellidos, carnet_extranjeria = :carnet_extranjeria,
                pasaporte = :pasaporte, direccion = :direccion, telefono = :telefono, correo = :correo,
                genero = :genero, fecha_registro_cliente = :fecha_registro_cliente WHERE dni = :dni");
            }

            $id_cliente = $datos->getId_cliente();
            $nombres = $datos->getNombres();
            $apellidos = $datos->getApellidos();
            $dni = $datos->getDni();
            $carnet_extranjeria = $datos->getCarnet_extranjeria();
            $pasaporte = $datos->getPasaporte();
            $direccion = $datos->getDireccion();
            $telefono = $datos->getTelefono();
            $correo = $datos->getCorreo();
            $genero = $datos->getGenero();
            $fecha_registro_cliente = $datos->getFecha_registro_cliente();

            $stmt->bindParam(':dni', $dni, PDO::PARAM_INT);
            $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':carnet_extranjeria', $carnet_extranjeria, PDO::PARAM_STR);
            $stmt->bindParam(':pasaporte', $pasaporte, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':genero', $genero, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_registro_cliente', $fecha_registro_cliente, PDO::PARAM_STR);

            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "exito";
        } catch (Exception $e) {
            $mensaje = $e;
        }
        return $mensaje;
    }
    public function eliminarCliente(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "DELETE FROM " . $this->tabla . " WHERE id_cliente  = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "Se elimino el registro exitosamente.";
        } catch (Exception $e) {
            $mensaje = "Error al eliminar el Cliente: Asegurese de borrar con anticipación los boletos registrados con el cliente.";
        }
        return $mensaje;
    }

}
