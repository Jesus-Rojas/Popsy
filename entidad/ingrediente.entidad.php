<?php
namespace entidad;
class Ingrediente{
    private $idIngrediente;
    private $nombre;

    public function getIdIngrediente()
    {
        return $this->idIngrediente;
    }
    public function setIdIngrediente($idIngrediente)
    {
        $this->idIngrediente = $idIngrediente;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}

?>