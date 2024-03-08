<?php

class Usuario {
    
    private $usuario_id;
    private $matricula;
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $fecha_nac;
    private $correo;
    private $contrasena;
    private $carrera;
    private $telefono;

    public function __construct($usuario_id, $matricula, $nombre, $apellido_p, $apellido_m, $fecha_nac, $correo, $contrasena, $carrera, $telefono) {
        $this->usuario_id = $usuario_id;
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->apellido_p = $apellido_p;
        $this->apellido_m = $apellido_m;
        $this->fecha_nac = $fecha_nac;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->carrera = $carrera;
        $this->telefono = $telefono;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidoP() {
        return $this->apellido_p;
    }

    public function getApellidoM() {
        return $this->apellido_m;
    }

    public function getFechaNac() {
        return $this->fecha_nac;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getCarrera() {
        return $this->carrera;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidoP($apellido_p) {
        $this->apellido_p = $apellido_p;
    }

    public function setApellidoM($apellido_m) {
        $this->apellido_m = $apellido_m;
    }

    public function setFechaNac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setCarrera($carrera) {
        $this->carrera = $carrera;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}


