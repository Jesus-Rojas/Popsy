<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Solicitud{
    private $idSolicitud;
    private $idEmpleado;
    private $texto;
    private $result;
    private $retorno;
    private $conexion;

    public function __construct(\entidad\Solicitud $solicitudE){
        $this->idSolicitud = $solicitudE->getIdSolicitud();
        $this->idEmpleado = $solicitudE->getIdEmpleado();
        $this->texto = $solicitudE->getTxt();
        $this->conexion = new \Conexion();
    }
    public function create(){
        try {
            $this->result = $this->conexion->conn->prepare("INSERT INTO solicitud VALUES(null, :idEmpleado, :texto, 'activo')");
            $this->result->bindParam(":idEmpleado", $this->idEmpleado);
            $this->result->bindParam(":texto", $this->texto);
            $this->result->execute();
            $this->retorno = "Se agrego la solicitud";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function delete(){
        try {
            $this->result = $this->conexion->conn->prepare("UPDATE solicitud SET estado='inactivo' where id_solicitud=:idSolicitud");
            $this->result->bindParam(":idSolicitud",$this->idSolicitud);
            $this->result->execute();
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function read(){
        try {
            $this->result = $this->conexion->conn->prepare("SELECT s.id_solicitud,e.nombre,e.apellido,s.texto FROM solicitud as s INNER join empleado as e on e.id_empleado=s.id_empleado WHERE s.estado='activo'");
            $this->result->execute();
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}

?>