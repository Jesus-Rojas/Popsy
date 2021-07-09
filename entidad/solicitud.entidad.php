<?php
namespace entidad;
class Solicitud{
    private $idSolicitud;
    private $idEmpleado;
    private $txt;
    
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }
    public function setIdSolicitud($idSolicitud)
    {
        $this->idSolicitud = $idSolicitud;
    }
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }
    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }
    public function getTxt()
    {
        return $this->txt;
    }
    public function setTxt($txt)
    {
        $this->txt = $txt;
    }
}

?>