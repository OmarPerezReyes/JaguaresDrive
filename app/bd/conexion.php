<?php
// Conexión a la base de datos
class Conexion{
private $server_name = "localhost";
private $user_name = "admin";
private $password = "f97b293f28e7e668c3e0ecd6a002129332e809902add42cf";
private $dbname = "prueba_didi";


public function conectar() {
    $conexion = new mysqli($this->server_name, $this->user_name, $this->password, $this->dbname);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }else{
}
    return $conexion;
}
}

?>
