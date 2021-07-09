<?php
namespace entidad;
class Categoria{
    private $idCat;
    private $nombreCat;
    private $precioCat;

    public function getIdCat(){
        return $this->idCat;
    }
    public function setIdCat($idCat){
        $this->idCat = $idCat;
    }
    public function getNombreCat(){
        return $this->nombreCat;
    }
    public function setNombreCat($nombreCat){
        $this->nombreCat = $nombreCat;
    }
    public function getPrecioCat(){
        return $this->precioCat;
    }
    public function setPrecioCat($precioCat){
        $this->precioCat = $precioCat;
    }
}

?>