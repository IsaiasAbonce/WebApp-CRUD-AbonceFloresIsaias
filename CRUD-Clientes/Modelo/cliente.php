<?php
class Cliente {
    private $idUsuario;
    private $nombres;
    private $apellidos;
    private $correo;
    private $domicilio;
    private $fechaNac;
    private $rfc;

    public function setIdUsuario($id){
        $this->idUsuario = $id;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function setDomicilio($domicilio){
        $this->domicilio = $domicilio;
    }

    public function setRfc($rfc){
        $this->rfc = $rfc;
    }

    public function setFechaNac($fecha){
        $this->fechaNac = $fecha;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getDomicilio(){
        return $this->domicilio;
    }

    public function getRfc(){
        return $this->rfc;
    }

    public function getFechaNac(){
        return $this->fechaNac;
    }
}