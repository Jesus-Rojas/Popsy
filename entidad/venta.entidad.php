<?php
namespace entidad;
class Venta{
    private $idVenta;
    private $idEmpleado;
    private $idCliente;
    private $total;

    public function getIdVenta()
    {
        return $this->idVenta;
    }
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }
    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }
    public function getIdCliente()
    {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
}
?>