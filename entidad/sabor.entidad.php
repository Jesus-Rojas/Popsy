<?php
namespace entidad;
class Sabor{
    private $idSabor;
    private $idCategoria;
    private $nombre;
    private $imagen;
    private $urlImagen;
    private $ingredientes;
    private $cantidad;
    
    public function getIdSabor()
    {
        return $this->idSabor;
    }
    public function setIdSabor($idSabor)
    {
        $this->idSabor = $idSabor;
    }
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function getIngredientes()
    {
        return $this->ingredientes;
    }
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;
    }
    public function getUrlImagen()
    {
        return $this->urlImagen;
    }
    public function setUrlImagen($urlImagen)
    {
        $this->urlImagen = $urlImagen;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
}
?>