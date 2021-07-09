<?php
namespace modelo;
use PDO;
use Exception;
include_once("../entorno/conexion.php");

class Sabor{
    private $idSabor;
    private $cantidad;
    private $idCategoria;
    private $nombre;
    private $nombreCategoria;
    private $imagen;
    private $urlImagen;
    private $ruta;
    private $ingredientes;
    private $result;
    private $retorno;
    private $retornoPivote;
    private $retornoSQL;
    private $conexion;
    private $sql="";

    public function __construct(\entidad\Sabor $saborE){
        $this->idSabor = $saborE->getIdSabor();
        $this->idCategoria = $saborE->getIdCategoria();
        $this->cantidad = $saborE->getCantidad();
        $this->nombre = $saborE->getNombre();
        $this->urlImagen = $saborE->getUrlImagen();
        $this->imagen = $saborE->getImagen();
        $this->ingredientes = $saborE->getIngredientes();
        $this->conexion = new \Conexion();
    }
    public function readCategoria(){
        try {
            $this->sql = "SELECT nombre FROM categoria where id_categoria='$this->idCategoria'";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = $this->result->fetch();
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function imagenModificada(){
        $this->nombreCategoria = $this->readCategoria();
        $nombreModificado = "../img/".$this->nombreCategoria[0]."/";
        $extension=substr($this->imagen["type"], 6);
        $nombreTemporal = $this->imagen["tmp_name"];
        $this->ruta = $nombreModificado.$this->nombre.".".$extension;
        if(is_uploaded_file($nombreTemporal)){
            move_uploaded_file($nombreTemporal,$this->ruta);
        }
    }
    public function create(){
        try {
            $this->imagenModificada();
            $this->sql = "INSERT INTO sabor VALUES(NULL, $this->idCategoria, '$this->nombre', '$this->ruta', $this->cantidad, 'activo')";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se registro el sabor";
            $this->idSabor = $this->conexion->ultimoId();
            $this->createSaborIngrediente();
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function createSaborIngrediente(){
        try {
            foreach ($this->ingredientes as $key => $value) {
                $this->sql= "insert into sabor_ingrediente value(null,$value,$this->idSabor,'activo')";
                $this->result = $this->conexion->conn->query($this->sql);
            }
            $this->retorno = "Se registro el sabor_ingrediente";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
    }
    public function readSaborIngrediente(){
        try {
            $this->sql = "SELECT si.id_sabor,si.id_ingrediente,i.nombre FROM sabor_ingrediente as si inner join ingrediente as i on i.id_ingrediente=si.id_ingrediente where si.estado='activo'";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retornoPivote = $this->result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e) {
            $this->retornoPivote = $e->getMessage();
        }
        return $this->retornoPivote;
    }
    public function updateSaborIngrediente(){
        try {
            $this->deleteSaborIngrediente();
            foreach ($this->ingredientes as $key => $value) {
                $this->sql= "SELECT * from sabor_ingrediente WHERE id_sabor=$this->idSabor and id_ingrediente=$value";
                $this->result = $this->conexion->conn->query($this->sql);
                $this->retorno = $this->result->fetch();
                if ($this->retorno) {
                    $this->sql= "UPDATE sabor_ingrediente SET estado='activo' WHERE id_sabor=$this->idSabor and id_ingrediente=$value";
                }else{
                    $this->sql= "INSERT into sabor_ingrediente value(null,$value,$this->idSabor,'activo')";
                }
                $this->result = $this->conexion->conn->query($this->sql);
            }
            $this->retorno = "Se registro el sabor_ingrediente";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
    }
    public function deleteSaborIngrediente(){
        try {
            $this->sql= "UPDATE sabor_ingrediente SET estado='inactivo' WHERE id_sabor=$this->idSabor";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retorno = "Se elimino el sabor_ingrediente";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
    }
    public function update() {
        try {
            if ($this->urlImagen=="") {
                $this->sql= "UPDATE sabor SET id_categoria=$this->idCategoria, nombre='$this->nombre', cantidad=$this->cantidad WHERE id_sabor=$this->idSabor";
            }else{
                $this->imagenModificada();
                $this->sql= "UPDATE sabor SET id_categoria=$this->idCategoria, nombre='$this->nombre', imagen='$this->ruta', cantidad=$this->cantidad WHERE id_sabor=$this->idSabor";
            }
            $this->result = $this->conexion->conn->query($this->sql);
            $this->updateSaborIngrediente();
            $this->retorno = "se modifico sabor";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function delete() {
        try {
            $this->sql = "UPDATE sabor SET estado='inactivo' WHERE id_sabor=$this->idSabor";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->deleteSaborIngrediente();
            $this->retorno = "Se elimino el sabor";
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
    public function read(){
        try {
            $this->sql = "SELECT * FROM sabor where estado='activo'";
            $this->result = $this->conexion->conn->query($this->sql);
            $this->retornoSQL = $this->result->fetchAll(PDO::FETCH_ASSOC);
            $this->retorno = [$this->retornoSQL,$this->readSaborIngrediente()];
        }catch (Exception $e) {
            $this->retorno = $e->getMessage();
        }
        return $this->retorno;
    }
}
?>