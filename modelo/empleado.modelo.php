<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Empleado{
    private $idEmpleado=null;
    private $identificacion=null;
    private $nombre=null;
    private $apellido=null;
    private $user=null;
    private $rol=null;
    private $password=null;
    private $result;
    private $retorno;
    private $conexion;

    public function __construct(\entidad\Empleado $empleadoE){
        $this->idEmpleado = $empleadoE->getIdEmpleado();
        $this->identificacion = $empleadoE->getIdentificacion();
        $this->nombre = $empleadoE->getNombre();
        $this->apellido = $empleadoE->getApellido();
        $this->user = $empleadoE->getUser();
        $this->password = $empleadoE->getPassword();
        $this->rol = $empleadoE->getRol();
        $this->conexion = new \Conexion();
    }
    public function create(){
        try {
            $this->result = $this->conexion->conn->prepare("INSERT INTO empleado VALUES(NULL, :identificacion, :nombre, :apellido, 'Empleado', :user, :clave, 'activo')");
            $this->result->bindParam(":identificacion",$this->identificacion);
            $this->result->bindParam(":nombre",$this->nombre);
            $this->result->bindParam(":apellido",$this->apellido);
            $this->result->bindParam(":user",$this->user);
            $this->result->bindParam(":clave",$this->password);
            $this->result->execute();
            $this->retorno = "Se agrego el empleado";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function update() {
        try {
            $this->result = $this->conexion->conn->prepare("UPDATE empleado SET identificacion=:identificacion, nombre=:nombre , apellido=:apellido, usuario=:usuario, clave=:clave WHERE id_empleado=:idEmpleado");
            $this->result->bindParam(":idEmpleado",$this->idEmpleado);
            $this->result->bindParam(":identificacion",$this->identificacion);
            $this->result->bindParam(":nombre",$this->nombre);
            $this->result->bindParam(":apellido",$this->apellido);
            $this->result->bindParam(":usuario",$this->user);
            $this->result->bindParam(":clave",$this->password);
            $this->result->execute();
            $this->retorno = "Se modifico el empleado";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function delete() {
        try {
            $this->result = $this->conexion->conn->prepare("UPDATE empleado SET estado='inactivo' WHERE id_empleado=:idEmpleado");
            $this->result->bindParam(":idEmpleado",$this->idEmpleado);
            $this->retorno = "Se elimino el empleado";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function read(){
        try {
            $this->result = $this->conexion->conn->prepare("SELECT * FROM empleado where estado='activo' and rol='Empleado'");
            $this->result->execute();
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}

?>