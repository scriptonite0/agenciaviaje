<?php

include_once("ClassConexion.php");

class Empleado extends Conexion
{

    private int $id;
    private string $nombres;
    private string $apellidos;
    private string $dni;
    private string $direccion;
    private string $num_celular;
    private string $correo;
    private string $cargo;
    private string $contieneFoto;
    private string $foto;

    public function __construct(int $id, string $nombres, string $apellidos, string $dni, string $direccion, string $num_celular, string $correo, string $cargo, string $contieneFoto, string $foto)
    {
        $this->id = $id;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->num_celular = $num_celular;
        $this->correo = $correo;
        $this->cargo = $cargo;
        $this->contieneFoto = $contieneFoto;
        $this->foto = $foto;
    }


    public function getId(): int
    {
        return $this->id;
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

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function getNum_celular(): string
    {
        return $this->num_celular;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function getContieneFoto(): string
    {
        return $this->contieneFoto;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function setNum_celular(string $num_celular): void
    {
        $this->num_celular = $num_celular;
    }

    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    public function setCargo(string $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function setContieneFoto(string $contieneFoto): void
    {
        $this->contieneFoto = $contieneFoto;
    }

    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }
}
