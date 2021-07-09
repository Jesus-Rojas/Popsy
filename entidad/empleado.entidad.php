<?php
    namespace entidad;
    class Empleado{
        private $idEmpleado=null;
        private $identificacion=null;
        private $nombre=null;
        private $apellido=null;
        private $user=null;
        private $rol=null;
        private $password=null;

        public function getIdEmpleado()
        {
            return $this->idEmpleado;
        }
        public function setIdEmpleado($idEmpleado)
        {
            $this->idEmpleado = $idEmpleado;
        }
        public function getIdentificacion()
        {
            return $this->identificacion;
        }
        public function setIdentificacion($identificacion)
        {
            $this->identificacion = $identificacion;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function getApellido()
        {
            return $this->apellido;
        }
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }
        public function getUser()
        {
            return $this->user;
        }
        public function setUser($user)
        {
            $this->user = $user;
        }
        public function getRol()
        {
            return $this->rol;
        }
        public function setRol($rol)
        {
            $this->rol = $rol;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword($password)
        {
            $this->password = $password;
        }
    }
?>