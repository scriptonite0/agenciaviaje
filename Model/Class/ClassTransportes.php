<?php

include_once("ClassConexion.php");

class Transporte extends Conexion
{
    private int $id_transporte;
    private string $id_empleado;
    private string $modelo_transporte;
    private string $placa_transporte;
    private string $seguro_transporte;

    public function __construct(int $id_transporte, string $id_empleado, string $modelo_transporte, string $placa_transporte, string $seguro_transporte)
    {
        $this->id_transporte = $id_transporte;
        $this->id_empleado = $id_empleado;
        $this->modelo_transporte = $modelo_transporte;
        $this->placa_transporte = $placa_transporte;
        $this->seguro_transporte = $seguro_transporte;
    }

    public function getId_transporte(): int
    {
        return $this->id_transporte;
    }

    public function getId_empleado(): string
    {
        return $this->id_empleado;
    }

    public function getModelo_transporte(): string
    {
        return $this->modelo_transporte;
    }

    public function getPlaca_transporte(): string
    {
        return $this->placa_transporte;
    }

    public function getSeguro_transporte(): string
    {
        return $this->seguro_transporte;
    }

    public function setId_transporte(int $id_transporte): void
    {
        $this->id_transporte = $id_transporte;
    }

    public function setId_empleado(string $id_empleado): void
    {
        $this->id_empleado = $id_empleado;
    }

    public function setModelo_transporte(string $modelo_transporte): void
    {
        $this->modelo_transporte = $modelo_transporte;
    }

    public function setPlaca_transporte(string $placa_transporte): void
    {
        $this->placa_transporte = $placa_transporte;
    }

    public function setSeguro_transporte(string $seguro_transporte): void
    {
        $this->seguro_transporte = $seguro_transporte;
    }
}
