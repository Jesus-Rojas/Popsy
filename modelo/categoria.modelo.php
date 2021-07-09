<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Categoria{
    private $idCat;
    private $nombreCat;
    private $precioCat;
    private $directorio;
    private $result;
    private $retorno;
    private $conexion;
    private $sql="";

    public function __construct(\entidad\Categoria $categoriaE){
        $this->idCat = $categoriaE->getIdCat();
        $this->nombreCat = $categoriaE->getNombreCat();
        $this->precioCat = $categoriaE->getPrecioCat();
        $this->conexion = new \Conexion();
    }
    public function carpeta()
    {
        $this->directorio = "../img/".$this->nombreCat;
        if (!is_dir($this->directorio)) {
            mkdir($this->directorio,0777,true);
        }
    }
    public function create(){
        try {
            $this->sql = "INSERT INTO categoria VALUES(NULL, '$this->nombreCat', $this->precioCat, 'activo')";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se registro la categoria";
            $this->carpeta();
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function update() {
        try {
            $this->sql = "UPDATE categoria SET nombre='$this->nombreCat' , precio=$this->precioCat WHERE id_categoria=$this->idCat";
            echo $this->sql;
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se modifico la categoria";
            $this->carpeta();
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function delete() {
        try {
            $this->sql = "UPDATE categoria SET estado='inactivo' WHERE id_categoria=$this->idCat";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se elimino la categoria";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function read(){
        try {
            $this->sql = "SELECT * FROM categoria where estado='activo'";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}

?>