<?php

include_once("ClassConexion.php");

class Usuario extends Conexion
{

    private int $id_usuario;
    private int $dni_usuario;
    private string $password_usuario;
    private string $tipo_usuario;
    private string $fecha_registro_usuario;

    public function __construct(int $id_usuario, int $dni_usuario, string $password_usuario, string $tipo_usuario, string $fecha_registro_usuario)
    {
        $this->id_usuario = $id_usuario;
        $this->dni_usuario = $dni_usuario;
        $this->password_usuario = $password_usuario;
        $this->tipo_usuario = $tipo_usuario;
        $this->fecha_registro_usuario = $fecha_registro_usuario;
    }
    public function getId_usuario(): int
    {
        return $this->id_usuario;
    }

    public function getDni_usuario(): int
    {
        return $this->dni_usuario;
    }

    public function getPassword_usuario(): string
    {
        return $this->password_usuario;
    }

    public function getTipo_usuario(): string
    {
        return $this->tipo_usuario;
    }

    public function getFecha_registro_usuario(): string
    {
        return $this->fecha_registro_usuario;
    }

    public function setId_usuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    public function setDni_usuario(int $dni_usuario): void
    {
        $this->dni_usuario = $dni_usuario;
    }

    public function setPassword_usuario(string $password_usuario): void
    {
        $this->password_usuario = $password_usuario;
    }

    public function setTipo_usuario(string $tipo_usuario): void
    {
        $this->tipo_usuario = $tipo_usuario;
    }

    public function setFecha_registro_usuario(string $fecha_registro_usuario): void
    {
        $this->fecha_registro_usuario = $fecha_registro_usuario;
    }
}
