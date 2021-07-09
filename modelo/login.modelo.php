<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Login{
    private $usuario;
    private $password;
    private $result;
    private $retorno;
    private $conexion;

    public function __construct(\entidad\Login $loginE){
        $this->usuario = $loginE->getUsuario();
        $this->password = $loginE->getPassword();
        $this->conexion = new \Conexion();
    }
    public function validar(){
        try {
            $this->result = $this->conexion->conn->prepare("SELECT id_empleado,nombre,apellido,rol FROM empleado WHERE usuario=:usuario AND clave=:clave AND estado='activo'");
            $this->result->bindParam(":usuario",$this->usuario);
            $this->result->bindParam(":clave",$this->password);
            $this->result->execute();
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}

?>