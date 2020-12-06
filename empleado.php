<?php
    class Empleados{
        private $id;
        private $nombre;
        private $apellidos;
        private $edad;
        private $dni;
        private $email;
        private $ocupacion;
 
        function __construct(){}
 
        public function getId(){
         return $this->Id;
            }
     
         public function setId($id){
                $this->Id = $id;
            }
        public function getNombre(){
        return $this->Nombre;
        }
 
        public function setNombre($nombre){
            $this->Nombre = $nombre;
        }
 
        public function getApellidos(){
            return $this->Apellidos;
        }
 
        public function setApellidos($apellidos){
            $this->Apellidos = $apellidos;
        }
 
        public function getEdad(){
        return $this->Edad;
        }
 
        public function setEdad($edad){
            $this->Edad = $edad;
        }
        public function getDni(){
            return $this->DNI;
        }
 
        public function setDni($dni){
            $this->DNI = $dni;
        }
        public function getEmail(){
            return $this->Email;
        }
 
        public function setEmail($email){
            $this->Email = $email;
        }
        public function getOcupacion(){
            return $this->ocupación;
        }
 
        public function setOcupacion($ocupacion){
            $this->ocupación = $ocupacion;
        }
    }
?>