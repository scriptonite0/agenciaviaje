<?php

include_once(__DIR__ . "/../Class/ClassBoletos.php");

class DaoBoleto extends Boleto
{
    private string $tablaBoleto = "boleto";
    private string $tablaCliente = "cliente";
    private string $tablaHoraViaje = "hora_viaje";

    public function __construct()
    {
    }

    public function listaBoletos()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tablaBoleto . " 
            INNER JOIN " . $this->tablaCliente . " ON " . $this->tablaBoleto . ".id_cliente = " . $this->tablaCliente . ".id_cliente 
            INNER JOIN " . $this->tablaHoraViaje . " ON " . $this->tablaBoleto . ".hora_viaje = " . $this->tablaHoraViaje . ".id_hora_viaje";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $boletos = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $boletos;
    }
    public function listaBoletosVenta(int $id_venta)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT b.*, r.*, h.* FROM venta v 
            INNER JOIN detalle_venta dv ON v.id_venta = dv.id_venta 
            INNER JOIN boleto b ON dv.id_boleto = b.id_boleto 
            INNER JOIN ruta r ON b.id_ruta = r.id_ruta 
            INNER JOIN hora_viaje h ON b.hora_viaje = h.id_hora_viaje WHERE v.id_venta = ".$id_venta;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $boletos = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $boletos;
    }

    public function seleccionarBoleto(string $id_boleto)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT *, cliente.dni AS cliente_dni, cliente.nombres AS cliente_nombre, cliente.apellidos AS cliente_apellido FROM boleto 
            INNER JOIN cliente ON boleto.id_cliente = cliente.id_cliente 
            INNER JOIN ruta ON boleto.id_ruta = ruta.id_ruta 
            WHERE id_boleto = '" . $id_boleto . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $boleto = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $boleto[0];
    }

    public function buscarBoletoPor(string $buscar, string $filtro)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tablaBoleto . " 
            INNER JOIN hora_viaje h ON boleto.hora_viaje = h.id_hora_viaje
            INNER JOIN " . $this->tablaCliente . " ON " . $this->tablaBoleto . ".id_cliente = " . $this->tablaCliente . ".id_cliente WHERE " . $this->tablaBoleto . "." . $filtro . " LIKE '%" . $buscar . "%'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $boletos = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $boletos;
    }
    public function listaBoletosRegistradosEditar(int $dni)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT b.*, r.*, h.* FROM boleto b 
            INNER JOIN cliente c ON b.id_cliente = c.id_cliente 
            INNER JOIN ruta r ON b.id_ruta = r.id_ruta 
            INNER JOIN hora_viaje h ON b.hora_viaje = h.id_hora_viaje 
            WHERE c.dni = " . $dni . " and fecha_viaje > CURDATE()";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $boletos = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $boletos;
    }
    public function listaBoletosRegistradosNoEditar(int $dni)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT b.*, r.*, h.* FROM boleto b 
            INNER JOIN cliente c ON b.id_cliente = c.id_cliente 
            INNER JOIN ruta r ON b.id_ruta = r.id_ruta 
            INNER JOIN hora_viaje h ON b.hora_viaje = h.id_hora_viaje 
            WHERE c.dni = " . $dni . " and fecha_viaje <= CURDATE()";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $boletos = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $boletos;
    }
    public function agregarBoleto(Boleto $datosBoleto)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        $id_ruta = $datosBoleto->getId_ruta();
        $id_cliente = $datosBoleto->getId_cliente();
        $hora_viaje = $datosBoleto->getHora_viaje();
        $hora_registro = $datosBoleto->getHora_registro();
        $fecha_registro = $datosBoleto->getFecha_registro();
        $fecha_viaje = $datosBoleto->getFecha_viaje();
        $fechaActual = DateTime::createFromFormat('Y-m-d', date("Y-m-d"));
        $formato_fecha = DateTime::createFromFormat("Y-m-d", $fecha_viaje);
        $estado_boleto = "";

        $verificarTabla = $this->listaBoletos();

        if (empty($verificarTabla)) {
            $sql = "INSERT INTO " . $this->tablaBoleto . " (id_boleto, id_ruta, id_cliente, hora_viaje, fecha_viaje, estado_boleto, hora_registro_boleto, fecha_registro_boleto) VALUES (:id_boleto, :id_ruta, :id_cliente, :hora_viaje, :fecha_viaje, :estado_boleto, :hora_registro_boleto, :fecha_registro_boleto)";
            $stmt = $pdo->prepare($sql);
            $id_boleto = 1;
            $stmt->bindParam(':id_boleto', $id_boleto, PDO::PARAM_INT);
        } else {
            $sql = "INSERT INTO " . $this->tablaBoleto . " (id_ruta, id_cliente, hora_viaje, fecha_viaje, estado_boleto, hora_registro_boleto, fecha_registro_boleto) VALUES (:id_ruta, :id_cliente, :hora_viaje, :fecha_viaje, :estado_boleto, :hora_registro_boleto, :fecha_registro_boleto)";
            $stmt = $pdo->prepare($sql);
        }

        if ($formato_fecha > $fechaActual) {
            $estado_boleto = "PENDIENTE";
            try {
                $stmt->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
                $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                $stmt->bindParam(':hora_viaje', $hora_viaje, PDO::PARAM_INT);
                $stmt->bindParam(':fecha_viaje', $fecha_viaje, PDO::PARAM_STR);
                $stmt->bindParam(':estado_boleto', $estado_boleto, PDO::PARAM_STR);
                $stmt->bindParam(':hora_registro_boleto', $hora_registro, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_registro_boleto', $fecha_registro, PDO::PARAM_STR);
                $stmt->execute();
                $stmt->closeCursor();
                $stmt = null;
                $pdo = null;
                $mensaje = "exito";
            } catch (exception $e) {
                $mensaje = "Error al agregar el registro: " . $e;
            }
        } else if ($formato_fecha == $fechaActual) {
            $estado_boleto = "EN USO";
            try {

                $stmt->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
                $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                $stmt->bindParam(':hora_viaje', $hora_viaje, PDO::PARAM_INT);
                $stmt->bindParam(':fecha_viaje', $fecha_viaje, PDO::PARAM_STR);
                $stmt->bindParam(':estado_boleto', $estado_boleto, PDO::PARAM_STR);
                $stmt->bindParam(':hora_registro_boleto', $hora_registro, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_registro_boleto', $fecha_registro, PDO::PARAM_STR);
                $stmt->execute();
                $stmt->closeCursor();
                $stmt = null;
                $pdo = null;
                $mensaje = "exito";
            } catch (exception $e) {
                $mensaje = "Error al agregar el registro: " . $e;
            }
        } else if ($formato_fecha < $fechaActual) {
            $mensaje = "No puede usar una fecha que ya paso.";
        }
        return $mensaje;
    }

    public function editarBoleto(Boleto $datosBoleto)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT venta.id_venta, venta.monto_total as id_venta FROM detalle_venta INNER JOIN venta ON detalle_venta.id_venta = venta.id_venta WHERE detalle_venta.id_boleto = " . $datosBoleto->getId_boleto();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $venta = $stmt->fetchAll();
            $id_venta = $venta[0][0];
            $monto_venta = $venta[0][1];

            $sql = "SELECT costo FROM ruta WHERE id_ruta = " . $datosBoleto->getId_ruta();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $precio_ruta = $stmt->fetchAll();
            $monto_aumentado = intval($monto_venta) + intval($precio_ruta[0][0]);

            $stmt = $pdo->prepare("UPDATE venta SET monto_total = :monto_total WHERE id_venta = :id_venta");
            $stmt->bindParam(':id_venta', $id_venta, PDO::PARAM_INT);
            $stmt->bindParam(':monto_total', $monto_aumentado, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            $mensaje = "Error al editar el registro: " . $e;
        }
        try {

            $stmt = $pdo->prepare("UPDATE " . $this->tablaBoleto . " SET id_ruta = :id_ruta, id_cliente = :id_cliente, hora_viaje = :hora_viaje, fecha_viaje = :fecha_viaje, hora_registro_boleto = :hora_registro_boleto, fecha_registro_boleto = :fecha_registro_boleto  WHERE id_boleto = :id_boleto");

            $id_boleto = $datosBoleto->getId_boleto();
            $id_ruta = $datosBoleto->getId_ruta();
            $id_cliente = $datosBoleto->getId_cliente();
            $hora_viaje = $datosBoleto->getHora_viaje();
            $fecha_viaje = $datosBoleto->getFecha_viaje();
            $hora_registro = $datosBoleto->getHora_registro();
            $fecha_registro = $datosBoleto->getFecha_registro();

            $stmt->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':hora_viaje', $hora_viaje, PDO::PARAM_INT);
            $stmt->bindParam(':fecha_viaje', $fecha_viaje, PDO::PARAM_STR);
            $stmt->bindParam(':hora_registro_boleto', $hora_registro, PDO::PARAM_STR);
            $stmt->bindParam(':fecha_registro_boleto', $fecha_registro, PDO::PARAM_STR);
            $stmt->bindParam(':id_boleto', $id_boleto, PDO::PARAM_INT);

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
    public function descontarMonto(int $id_boleto, int $descontar_monto)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT venta.id_venta, venta.monto_total as id_venta FROM detalle_venta INNER JOIN venta ON detalle_venta.id_venta = venta.id_venta WHERE detalle_venta.id_boleto = " . $id_boleto;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $venta = $stmt->fetchAll();
            $id_venta = $venta[0][0];
            $monto_venta = $venta[0][1];
            $monto_descontado = intval($monto_venta) - $descontar_monto;

            $stmt = $pdo->prepare("UPDATE venta SET monto_total = :monto_total WHERE id_venta = :id_venta");
            $stmt->bindParam(':id_venta', $id_venta, PDO::PARAM_INT);
            $stmt->bindParam(':monto_total', $monto_descontado, PDO::PARAM_INT);
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
    public function ultimoBoletoRegistrado()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT id_boleto FROM " . $this->tablaBoleto . " ORDER BY id_boleto DESC LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $ultimaBoleto = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            $ventas = $e;
        }
        return $ultimaBoleto[0];
    }
    public function eliminarCliente(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "DELETE FROM " . $this->tablaBoleto . " WHERE id_boleto = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "Se elimino el registro exitosamente.";
        } catch (Exception $e) {
            $mensaje = "Error al eliminar el Boleto: Asegurese de borrar con anticipación los boletos registrados en la tabla de ventas.";
        }
        return $mensaje;
    }
}
