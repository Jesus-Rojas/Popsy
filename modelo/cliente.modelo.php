<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Cliente{
    private $idCliente;
    private $identificacion;
    private $nombre;
    private $apellido;
    private $puntos;

    private $result;
    private $retorno;
    private $conexion;
    private $sql="";

    public function __construct(\entidad\Cliente $clienteE){
        $this->idCliente = $clienteE->getIdCliente();
        $this->identificacion = $clienteE->getIdentificacion();
        $this->nombre = $clienteE->getNombre();
        $this->apellido = $clienteE->getApellido();
        $this->puntos = $clienteE->getPuntos();
        $this->conexion = new \Conexion();
    }
    
    public function autocomplete(){
        try {
            $this->sql = "SELECT * FROM cliente where identificacion LIKE '%$this->identificacion%' and estado='activo'";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function create(){
        try {
            $this->result = $this->conexion->conn->prepare("INSERT INTO cliente VALUES(NULL,:identificacion, :nombre, :apellido, 0 , 'activo' )");
            $this->result->bindParam(":identificacion",$this->identificacion);
            $this->result->bindParam(":nombre",$this->nombre);
            $this->result->bindParam(":apellido",$this->apellido);
            $this->result->execute();
            $this->retorno = $this->conexion->ultimoId();
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function updatePuntos(){
        try {
            $this->result = $this->conexion->conn->prepare("UPDATE cliente SET puntos=:puntos WHERE id_cliente=:idCliente");
            $this->result->bindParam(":idCliente",$this->idCliente);
            $this->result->bindParam(":puntos",$this->puntos);
            $this->result->execute();
            $this->retorno = "Se modificaron los puntos";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}

?>