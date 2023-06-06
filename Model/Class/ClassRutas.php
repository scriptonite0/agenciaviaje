<?php

include_once("ClassConexion.php");

class Ruta extends Conexion
{
    private int $id_ruta;
    private string $terminal_salida;
    private string $terminal_llegada;
    private string $ciudad_salida;
    private string $ciudad_llegada;
    private string $tipo_viaje;
    private float $costo;

    public function __construct(int $id_ruta, string $terminal_salida, string $terminal_llegada, string $ciudad_salida, string $ciudad_llegada, string $tipo_viaje, float $costo)
    {
        $this->id_ruta = $id_ruta;
        $this->terminal_salida = $terminal_salida;
        $this->terminal_llegada = $terminal_llegada;
        $this->ciudad_salida = $ciudad_salida;
        $this->ciudad_llegada = $ciudad_llegada;
        $this->tipo_viaje = $tipo_viaje;
        $this->costo = $costo;
    }
    public function getId_ruta(): int
    {
        return $this->id_ruta;
    }

    public function getTerminal_salida(): string
    {
        return $this->terminal_salida;
    }

    public function getTerminal_llegada(): string
    {
        return $this->terminal_llegada;
    }

    public function getCiudad_salida(): string
    {
        return $this->ciudad_salida;
    }

    public function getCiudad_llegada(): string
    {
        return $this->ciudad_llegada;
    }

    public function getTipo_viaje(): string
    {
        return $this->tipo_viaje;
    }

    public function getCosto(): float
    {
        return $this->costo;
    }

    public function setId_ruta(int $id_ruta): void
    {
        $this->id_ruta = $id_ruta;
    }

    public function setTerminal_salida(string $terminal_salida): void
    {
        $this->terminal_salida = $terminal_salida;
    }

    public function setTerminal_llegada(string $terminal_llegada): void
    {
        $this->terminal_llegada = $terminal_llegada;
    }

    public function setCiudad_salida(string $ciudad_salida): void
    {
        $this->ciudad_salida = $ciudad_salida;
    }

    public function setCiudad_llegada(string $ciudad_llegada): void
    {
        $this->ciudad_llegada = $ciudad_llegada;
    }

    public function setTipo_viaje(string $tipo_viaje): void
    {
        $this->tipo_viaje = $tipo_viaje;
    }

    public function setCosto(float $costo): void
    {
        $this->costo = $costo;
    }
}
