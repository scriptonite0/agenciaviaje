<?php

include_once("ClassConexion.php");

class Boleto extends Conexion
{
    private int $id_boleto;
    private int $id_ruta;
    private int $id_cliente;
    private int $hora_viaje;
    private string $fecha_viaje;
    private string $hora_registro;
    private string $fecha_registro;

    public function __construct(int $id_boleto, int $id_ruta, int $id_cliente, int $hora_viaje, string $fecha_viaje, string $hora_registro, string $fecha_registro)
    {
        $this->id_boleto = $id_boleto;
        $this->id_ruta = $id_ruta;
        $this->id_cliente = $id_cliente;
        $this->hora_viaje = $hora_viaje;
        $this->fecha_viaje = $fecha_viaje;
        $this->hora_registro = $hora_registro;
        $this->fecha_registro = $fecha_registro;
    }

    public function getId_boleto(): int
    {
        return $this->id_boleto;
    }

    public function getId_ruta(): int
    {
        return $this->id_ruta;
    }

    public function getId_cliente(): int
    {
        return $this->id_cliente;
    }

    public function getHora_viaje(): int
    {
        return $this->hora_viaje;
    }

    public function getFecha_viaje(): string
    {
        return $this->fecha_viaje;
    }

    public function getHora_registro(): string
    {
        return $this->hora_registro;
    }

    public function getFecha_registro(): string
    {
        return $this->fecha_registro;
    }

    public function setId_boleto(int $id_boleto): void
    {
        $this->id_boleto = $id_boleto;
    }

    public function setId_ruta(int $id_ruta): void
    {
        $this->id_ruta = $id_ruta;
    }

    public function setId_cliente(int $id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function setHora_viaje(int $hora_viaje): void
    {
        $this->hora_viaje = $hora_viaje;
    }

    public function setFecha_viaje(string $fecha_viaje): void
    {
        $this->fecha_viaje = $fecha_viaje;
    }

    public function setHora_registro(string $hora_registro): void
    {
        $this->hora_registro = $hora_registro;
    }

    public function setFecha_registro(string $fecha_registro): void
    {
        $this->fecha_registro = $fecha_registro;
    }
}
