<?php

require_once '../bd/conexion.php';


class UsuarioModel {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }



    public function insertarUsuario(Usuario $usuario) {
        // Obtener los valores de las propiedades del objeto Usuario
        $matricula = $usuario->getMatricula();
        $nombre = $usuario->getNombre();
        $apellido_paterno = $usuario->getApellidoP();
        $apellido_materno = $usuario->getApellidoM();
        $fecha_nacimiento = $usuario->getFechaNac();
        $correo = $usuario->getCorreo();
        $contrasena = $usuario->getContrasena();
        $carrera = $usuario->getCarrera();
        $telefono = $usuario->getTelefono();

        // Hashear la contraseña antes de insertarla en la base de datos
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

        // Preparar la consulta SQL de forma segura con parámetros
        $query = "INSERT INTO usuario (matricula, nombre, apellido_p, apellido_m, fecha_nac, correo, contrasena, carrera, telefono)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $conexion = $this->conexion->conectar();
        
        // Preparar la declaración
        $statement = $conexion->prepare($query);
        
        // Bind de parámetros
        $statement->bind_param("sssssssss", $matricula, $nombre, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $correo, $hashed_password, $carrera, $telefono);
        
        // Ejecutar la consulta
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obtener los datos del usuario por su ID
    public function obtenerUsuarioPorId($usuarioId) {   
        $conexion = $this->conexion->conectar();

        // Preparar la consulta SQL para obtener los datos del usuario por su ID
        $query = "SELECT * FROM usuario WHERE usuario_id = ?";
        $statement = $conexion->prepare($query);
        $statement->bind_param("i", $usuarioId);
        $statement->execute();
        $result = $statement->get_result();

        // Verificar si se obtuvieron resultados
        if ($result->num_rows > 0) {
            // Obtener los datos del usuario
            $row = $result->fetch_assoc();
            // Crear un objeto Usuario con los datos obtenidos de la base de datos
            $usuario = new Usuario($row['usuario_id'], $row['matricula'], $row['nombre'], $row['apellido_p'], $row['apellido_m'], $row['fecha_nac'], $row['correo'], $row['contrasena'], $row['carrera'], $row['telefono']);
            return $usuario;
        } else {
            // No se encontró ningún usuario con el ID proporcionado
            return null;
        }
    }
}



class Usuario
{

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
    private $placas;
    private $modeloAuto;
    private $colorAuto;
    private $marcaAuto;

    public function __construct($usuario_id, $matricula, $nombre, $apellido_p, $apellido_m, $fecha_nac, $correo, $contrasena, $carrera, $telefono)
    {
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
    

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidoP()
    {
        return $this->apellido_p;
    }

    public function getApellidoM()
    {
        return $this->apellido_m;
    }

    public function getFechaNac()
    {
        return $this->fecha_nac;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function getCarrera()
    {
        return $this->carrera;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getPlacas()
    {
        return $this->placas;
    }

    public function getModeloAuto(){
        return $this->modeloAuto;
    }

    public function getColorAuto(){
        return $this->colorAuto;
    }

    public function getMarcaAuto(){
        return $this->marcaAuto;
    }
    
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellidoP($apellido_p)
    {
        $this->apellido_p = $apellido_p;
    }

    public function setApellidoM($apellido_m)
    {
        $this->apellido_m = $apellido_m;
    }

    public function setFechaNac($fecha_nac)
    {
        $this->fecha_nac = $fecha_nac;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function setCarrera($carrera)
    {
        $this->carrera = $carrera;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
}