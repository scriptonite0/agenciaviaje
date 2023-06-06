<?php

include_once("ClassConexion.php");

class Venta extends Conexion
{
    private int $id_venta;
    private int $id_cliente;
    private int $cant_boletos;
    private string $tipo_pago;
    private float $monto_total;
    private string $fecha_registro_venta;

    public function __construct(int $id_venta, int $id_cliente, int $cant_boletos, string $tipo_pago, float $monto_total, string $fecha_registro_venta)
    {
        $this->id_venta = $id_venta;
        $this->id_cliente = $id_cliente;
        $this->cant_boletos = $cant_boletos;
        $this->tipo_pago = $tipo_pago;
        $this->monto_total = $monto_total;
        $this->fecha_registro_venta = $fecha_registro_venta;
    }
    public function getId_venta(): int
    {
        return $this->id_venta;
    }

    public function getId_cliente(): int
    {
        return $this->id_cliente;
    }

    public function getCant_boletos(): int
    {
        return $this->cant_boletos;
    }

    public function getTipo_pago(): string
    {
        return $this->tipo_pago;
    }

    public function getMonto_total(): float
    {
        return $this->monto_total;
    }

    public function getFecha_registro_venta(): string
    {
        return $this->fecha_registro_venta;
    }

    public function setId_venta(int $id_venta): void
    {
        $this->id_venta = $id_venta;
    }

    public function setId_cliente(int $id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    public function setCant_boletos(int $cant_boletos): void
    {
        $this->cant_boletos = $cant_boletos;
    }

    public function setTipo_pago(string $tipo_pago): void
    {
        $this->tipo_pago = $tipo_pago;
    }

    public function setMonto_total(float $monto_total): void
    {
        $this->monto_total = $monto_total;
    }

    public function setFecha_registro_venta(string $fecha_registro_venta): void
    {
        $this->fecha_registro_venta = $fecha_registro_venta;
    }
}
