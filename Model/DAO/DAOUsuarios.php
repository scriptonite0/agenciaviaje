<?php

include_once(__DIR__ . "/../Class/ClassUsuarios.php");

class DaoUsuario extends Usuario
{
    private string $tabla = "usuario";

    public function __construct()
    {
    }

    public function iniciarSesion(string $dni, string $password)
    {
        $login = false;
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "SELECT u.*, c.*, e.* FROM usuario u 
            LEFT JOIN cliente c ON u.dni_usuario = c.dni 
            LEFT JOIN empleado e ON u.dni_usuario = e.dni 
            WHERE u.dni_usuario = '" . $dni . "' AND u.password_usuario = '" . $password . "' AND (u.tipo_usuario = 'CLIENTE' 
            OR u.tipo_usuario = 'GERENTE' OR u.tipo_usuario = 'EMPLEADO DE CAJA');";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $usuario = $stmt->fetchAll();

            if (count($usuario) == 0) {
                $login = false;
            } else {
                $login = true;
                session_start();

                $_SESSION["id_usuario"] = $usuario[0][0];
                $_SESSION["dni_usuario"] = $usuario[0][1];
                $_SESSION["tipo_usuario"] = $usuario[0][3];
                if ($usuario[0][3] == "CLIENTE") {
                    $_SESSION["id"] = $usuario[0][5];
                }
                else if($usuario[0][3] == "EMPLEADO DE CAJA" || $usuario[0][3] == "GERENTE") {
                    $_SESSION["id"] = $usuario[0][17];
                }
                $_SESSION["fecha_registro"] = $usuario[0][4];
            }

            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
        }
        return $login;
    }
    public function registrarse(string $nombres, string $apellidos, string $dni, string $password, string $tipo_usuario)
    {
        date_default_timezone_set('America/Lima');
        $mensaje = "";
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        try {
            $sql = "SELECT dni_usuario FROM " . $this->tabla . " WHERE dni_usuario = '" . $dni . "'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $verificarDni = $stmt->fetchAll();
            //Verificar que alguna otra cuenta no se haya creado con el mismo id
            if (empty($verificarDni)) {

                $stmt = $pdo->prepare("INSERT INTO " . $this->tabla . " (dni_usuario, password_usuario, tipo_usuario, fecha_registro_usuario) VALUES (:dni_usuario, :password_usuario, :tipo_usuario, :fecha_registro_usuario)");
                $fecha_registro = date("Y-m-d");
                $stmt->bindParam(':dni_usuario', $dni, PDO::PARAM_INT);
                $stmt->bindParam(':password_usuario', $password, PDO::PARAM_STR);
                $stmt->bindParam(':tipo_usuario', $tipo_usuario, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_registro_usuario', $fecha_registro, PDO::PARAM_STR);
                $stmt->execute();

                $stmt = $pdo->prepare("INSERT INTO cliente (nombres, apellidos, dni, carnet_extranjeria, pasaporte, direccion, telefono, correo, genero, fecha_registro_cliente) VALUES (:nombres, :apellidos, :dni, :carnet_extranjeria, :pasaporte, :direccion, :telefono, :correo, :genero, :fecha_registro_cliente)");
                $fecha_registro = date("Y-m-d");
                $str = "-";
                $stmt->bindParam(':nombres', $nombres, PDO::PARAM_STR);
                $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
                $stmt->bindParam(':dni', $dni, PDO::PARAM_INT);
                $stmt->bindParam(':carnet_extranjeria', $str, PDO::PARAM_STR);
                $stmt->bindParam(':pasaporte', $str, PDO::PARAM_STR);
                $stmt->bindParam(':direccion', $str, PDO::PARAM_STR);
                $stmt->bindParam(':telefono', $str, PDO::PARAM_STR);
                $stmt->bindParam(':correo', $str, PDO::PARAM_STR);
                $stmt->bindParam(':genero', $str, PDO::PARAM_STR);
                $stmt->bindParam(':fecha_registro_cliente', $fecha_registro, PDO::PARAM_STR);
                $stmt->execute();

                $sql = "SELECT * FROM " . $this->tabla . " WHERE dni_usuario = '" . $dni . "' AND password_usuario = '" . $password . "'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $datos = $stmt->fetchAll();
                session_start();
                $_SESSION["dni_usuario"] = $datos[0][0];
                $_SESSION["tipo_usuario"] = $datos[0][3];
                $mensaje = "usuario/dashboard.php";;
            } else {
                $mensaje = "dni duplicado";
            }
            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
            $pdo = null;
        } catch (Exception $e) {
            $mensaje = $e;
        }
        return $mensaje;
    }
}
