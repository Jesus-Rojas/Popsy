<?php

class Conexion{
    public $conn = null;
    private $recordSet = null;
    private $ultimoId = null;


    public function __construct(){
        $this->conn = new PDO("mysql:dbname=popsy;host:localhost","root","");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    public function ultimoId(){
        $sql = "SELECT LAST_INSERT_ID() as lastid";
        $this->ultimoId = $this->conn->query($sql);
        $respuesta = $this->ultimoId->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta[0]["lastid"];
    }
}

?>