<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Venta{
    private $idVenta;
    private $idEmpleado;
    private $idCliente;
    private $total;

    private $result;
    private $retorno;
    private $conexion;

    public function __construct(\entidad\Venta $ventaE){
        $this->idVenta = $ventaE->getIdVenta();
        $this->total = $ventaE->getTotal();
        $this->idEmpleado = $ventaE->getIdEmpleado();
        $this->idCliente = $ventaE->getIdCliente();
        $this->conexion = new \Conexion();
    }
    
    public function create(){
        try {
            $this->result = $this->conexion->conn->prepare("INSERT INTO venta VALUES(NULL,1, :idCliente, now(), :total, 'activo' )");
            $this->result->bindParam(":idCliente",$this->idCliente);
            $this->result->bindParam(":total",$this->total);
            $this->result->execute();
            $this->retorno = "Se agrego venta";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}
?>