<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Ingrediente{
    private $idIngrediente;
    private $nombre;

    private $result;
    private $retorno;
    private $conexion;
    private $sql="";

    public function __construct(\entidad\Ingrediente $ingredienteE){
        $this->idIngrediente = $ingredienteE->getIdIngrediente();
        $this->nombre = $ingredienteE->getNombre();
        $this->conexion = new \Conexion();
    }
    public function create(){
        try {
            $this->sql = "INSERT INTO ingrediente VALUES(NULL, '$this->nombre', 'activo')";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se registro el ingrediente";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function update() {
        try {
            $this->sql = "UPDATE ingrediente SET nombre='$this->nombre' WHERE id_ingrediente=$this->idIngrediente";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se modifico la categoria";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function delete() {
        try {
            $this->sql = "UPDATE ingrediente SET estado='inactivo' WHERE id_ingrediente=$this->idIngrediente";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se elimino el ingrediente";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function read(){
        try {
            $this->sql = "SELECT * FROM ingrediente where estado='activo'";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}

?>