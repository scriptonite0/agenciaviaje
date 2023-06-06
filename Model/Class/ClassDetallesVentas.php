<?php

include_once("ClassConexion.php");

class DetalleVenta extends Conexion
{
    private int $id_detalle_venta;
    private int $id_venta;
    private int $id_boleto;
    
    public function __construct(int $id_detalle_venta, int $id_venta, int $id_boleto) {
        $this->id_detalle_venta = $id_detalle_venta;
        $this->id_venta = $id_venta;
        $this->id_boleto = $id_boleto;
    }
    public function getId_detalle_venta(): int {
        return $this->id_detalle_venta;
    }

    public function getId_venta(): int {
        return $this->id_venta;
    }

    public function getId_boleto(): int {
        return $this->id_boleto;
    }

    public function setId_detalle_venta(int $id_detalle_venta): void {
        $this->id_detalle_venta = $id_detalle_venta;
    }

    public function setId_venta(int $id_venta): void {
        $this->id_venta = $id_venta;
    }


    public function setId_boleto(int $id_boleto): void {
        $this->id_boleto = $id_boleto;
    }

}