<?php

include_once("ClassConexion.php");

class Cliente extends Conexion
{
    private int $id_cliente;
    private string $nombres;
    private string $apellidos;
    private string $dni;
    private string $carnet_extranjeria;
    private string $pasaporte;
    private string $direccion;
    private string $telefono;
    private string $correo;
    private string $genero;
    private string $contieneFoto;
    private string $foto;
    private string $fecha_registro_cliente;

    public function __construct(int $id_cliente, string $nombres, string $apellidos, string $dni, string $carnet_extranjeria, string $pasaporte, string $direccion, string $telefono, string $correo, string $genero, string $contieneFoto, string $foto, string $fecha_registro_cliente)
    {
        $this->id_cliente = $id_cliente;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->carnet_extranjeria = $carnet_extranjeria;
        $this->pasaporte = $pasaporte;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->genero = $genero;
        $this->contieneFoto = $contieneFoto;
        $this->foto = $foto;
        $this->fecha_registro_cliente = $fecha_registro_cliente;
    }
    public function getId_cliente(): int
    {
        return $this->id_cliente;
    }

    public function getNombres(): string
    {
        return $this->nombres;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getDni(): string
    {
        return $this->dni;
    }

    public function getCarnet_extranjeria(): string
    {
        return $this->carnet_extranjeria;
    }

    public function getPasaporte(): string
    {
        return $this->pasaporte;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function getContieneFoto(): string
    {
        return $this->contieneFoto;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function getFecha_registro_cliente(): string
    {
        return $this->fecha_registro_cliente;
    }

    public function setId_cliente(int $id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function setNombres(string $nombres): void
    {
        $this->nombres = $nombres;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }

    public function setCarnet_extranjeria(string $carnet_extranjeria): void
    {
        $this->carnet_extranjeria = $carnet_extranjeria;
    }

    public function setPasaporte(string $pasaporte): void
    {
        $this->pasaporte = $pasaporte;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    public function setGenero(string $genero): void
    {
        $this->genero = $genero;
    }

    public function setContieneFoto(string $contieneFoto): void
    {
        $this->contieneFoto = $contieneFoto;
    }

    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }

    public function setFecha_registro_cliente(string $fecha_registro_cliente): void
    {
        $this->fecha_registro_cliente = $fecha_registro_cliente;
    }
}
