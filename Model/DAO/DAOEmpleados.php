<?php

include_once(__DIR__ . "/../Class/ClassEmpleados.php");

class DaoEmpleado extends Empleado
{
    private string $tabla = "empleado";

    public function __construct()
    {
    }

    public function listaEmpleados()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $empleados = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $empleados;
    }

    public function listaEmpleadosChofer()
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE cargo = 'CHOFER'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $empleados = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $empleados;
    }

    public function seleccionarEmpleado(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE id_empleado = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $empleado = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $empleado[0];
    }

    public function buscarPor(string $buscar, string $filtro)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE " . $filtro . " LIKE '%" . $buscar . "%'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $empleados = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $empleados;
    }
    public function buscarEmpleadoChoferPor(string $buscar, string $filtro)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            $sql = "SELECT * FROM " . $this->tabla . " WHERE " . $filtro . " LIKE '%" . $buscar . "%' AND (cargo = 'CHOFER')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $empleados = $stmt->fetchAll();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $empleados;
    }
    public function agregarEmpleado(Empleado $datosEmpleado)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        $dni_usuario = $datosEmpleado->getDni();
        $tipo_usuario = $datosEmpleado->getCargo();
        $sql = "SELECT dni_usuario FROM usuario WHERE dni_usuario = '" . $dni_usuario . "'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $verificarDni = $stmt->fetchAll();
        //Verificar que alguna otra cuenta no se haya creado con el mismo id
        if (empty($verificarDni)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO usuario (dni_usuario, password_usuario, tipo_usuario, fecha_registro_usuario) VALUES (:dni_usuario, :password_usuario, :tipo_usuario, :fecha_registro_usuario)");
                $fecha_registro = date("Y-m-d");
                $stmt->bindParam(':dni_usuario', $dni_usuario, PDO::PARAM_INT);
                $stmt->bindParam(':password_usuario', $dni_usuario, PDO::PARAM_STR);
                $stmt->bindParam(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_registro_usuario', $fecha_registro, PDO::PARAM_STR);
                $stmt->execute();
            } catch (Exception $e) {
                echo "<script>console.log(" . $e . ");</script>";
            }
        }

        $verificarTabla = $this->listaEmpleados();

        try {
            if ($datosEmpleado->getContieneFoto() == "si") {
                if (empty($verificarTabla)) {
                    $sql = "INSERT INTO " . $this->tabla . " (id_empleado, nombres, apellidos, dni, direccion, telefono, correo, cargo, foto) VALUES (:id_empleado, :nombres, :apellidos, :dni, :direccion, :telefono, :correo, :cargo, :foto)";
                    $stmt = $pdo->prepare($sql);
                    $procesarFoto = file_get_contents($datosEmpleado->getFoto());
                    $id_empleado = 1;
                    $stmt->bindParam(':id_empleado', $id_empleado, PDO::PARAM_INT);
                    $stmt->bindParam(':foto', $procesarFoto, PDO::PARAM_LOB);
                } else {
                    $sql = "INSERT INTO " . $this->tabla . " (nombres, apellidos, dni, direccion, telefono, correo, cargo, foto) VALUES (:nombres, :apellidos, :dni, :direccion, :telefono, :correo, :cargo, :foto)";
                    $stmt = $pdo->prepare($sql);
                    $procesarFoto = file_get_contents($datosEmpleado->getFoto());
                    $stmt->bindParam(':foto', $procesarFoto, PDO::PARAM_LOB);
                }
            } else {
                if (empty($verificarTabla)) {
                    $sql = "INSERT INTO " . $this->tabla . " (id_empleado, nombres, apellidos, dni, direccion, telefono, correo, cargo) VALUES (:id_empleado, :nombres, :apellidos, :dni, :direccion, :telefono, :correo, :cargo)";
                    $stmt = $pdo->prepare($sql);
                    $id_empleado = 1;
                    $stmt->bindParam(':id_empleado', $id_empleado, PDO::PARAM_INT);
                } else {
                    $sql = "INSERT INTO " . $this->tabla . " (nombres, apellidos, dni, direccion, telefono, correo, cargo) VALUES (:nombres, :apellidos, :dni, :direccion, :telefono, :correo, :cargo)";
                    $stmt = $pdo->prepare($sql);
                }
            }

            $nombres = $datosEmpleado->getNombres();
            $apellidos = $datosEmpleado->getApellidos();
            $dni = $datosEmpleado->getDni();
            $direccion = $datosEmpleado->getDireccion();
            $telefono = $datosEmpleado->getNum_celular();
            $correo = $datosEmpleado->getCorreo();
            $cargo = $datosEmpleado->getCargo();

            $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':cargo', $cargo, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "exito";
        } catch (exception $e) {
            $mensaje = $e;
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $mensaje;
    }

    public function editarEmpleado(Empleado $datosEmpleado)
    {
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();
        try {
            if ($datosEmpleado->getContieneFoto() == "si") {
                $stmt = $pdo->prepare("UPDATE " . $this->tabla . " SET nombres=:nombres, apellidos=:apellidos, dni=:dni, direccion=:direccion, telefono=:telefono, correo=:correo, cargo=:cargo, foto=:foto WHERE id_empleado = :id");
                $procesarFoto = file_get_contents($datosEmpleado->getFoto());
                $stmt->bindParam(':foto', $procesarFoto, PDO::PARAM_LOB);
            } else {
                $stmt = $pdo->prepare("UPDATE " . $this->tabla . " SET nombres=:nombres, apellidos=:apellidos, dni=:dni, direccion=:direccion, telefono=:telefono, correo=:correo, cargo=:cargo WHERE id_empleado = :id");
            }

            $id = $datosEmpleado->getId();
            $nombres = $datosEmpleado->getNombres();
            $apellidos = $datosEmpleado->getApellidos();
            $dni = $datosEmpleado->getDni();
            $direccion = $datosEmpleado->getDireccion();
            $telefono = $datosEmpleado->getNum_celular();
            $correo = $datosEmpleado->getCorreo();
            $cargo = $datosEmpleado->getCargo();

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
            $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->bindParam(':cargo', $cargo, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "exito";
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $mensaje;
    }

    public function eliminarEmpleado(string $id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "DELETE FROM " . $this->tabla . " WHERE id_empleado = '" . $id . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
            $mensaje = "Se elimino el registro exitosamente.";
        } catch (Exception $e) {
            echo "<script>console.log(Error: " . $e . ")</script>";
        }
        return $mensaje;
    }
}
